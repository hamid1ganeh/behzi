<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Enums\PageGalleryImageStatus;
use App\Filters\Admin\PageGalleryImageFilter;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageGallery;
use App\Models\PageGalleryImage;
use App\Services\V1\ImageService;
use App\Services\V1\PageService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\Facades\Image;

class PageGalleryImageController extends Controller
{

    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
//        http://learninfinity.info/drag-and-drop-table-row-sorting-ajax-php-and-mysqli/
//        https://www.youtube.com/watch?v=1Yrzli1PqFc
//        https://www.youtube.com/watch?v=0ZWT-ArMhio
//        https://artisansweb.net/create-thumbnail-in-laravel-using-intervention-image-library/

        $pageGalleryImageFilter = new PageGalleryImageFilter($request);

        $this->bulkOperation($request);

        $images = PageGalleryImage::withTrashed()->with([
            'page_gallery' => function ($query) {
                return $query->withTrashed();
            }
        ])->orderBy('updated_at', 'desc')->filter($pageGalleryImageFilter)->paginate(10);

        $galleries = PageGallery::all();

        return view('admin-panel.gallery_images.index', compact([
            'images',
            'galleries'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @param PageGallery $pageGallery
     * @return RedirectResponse
     */
    public function store(Request $request, Page $page, PageGallery $pageGallery)
    {
        $request->validate([
//            "title"              => "required",
//            "alt"              => "required",
            "image" => "mimes:jpeg,jpg,png,gif|required|max:10000",
        ], [
            'image.required' => 'تصویر رو وارد کن',
            'image.mime' => 'نوع تصویر مناسب نیست',
            'image.max' => 'حجم تصویر مناسب نیست',
        ]);
        $date = Carbon::now();
//        dd($date->format("Y"));
//        dd($request->toArray());
        if ($request->hasFile('image')) {
            $fileName = $this->imageService->upload($request->file('image'), [
                'original' => [
                    'w' => 800,
                    'h' => 800,
                ],
                'medium' => [
                    'w' => 420,
                    'h' => 360,
                ],
                'thumbnail' => [
                    'w' => 150,
                    'h' => 150,
                ],
            ]);

            $page_gallery_image = $pageGallery->page_gallery_images()->create();
            $page_gallery_image->update(['priority' => $page_gallery_image->id]);

            $page_gallery_image->image()->create([
                'alt' => $request->alt,
                'title' => $request->title,
                'name' => $fileName,
                'status' => PageGalleryImageStatus::Pending,
            ]);


//            $image = $request->file('image');
//            //get filename with extension
//            $ext = $image->getClientOriginalExtension();
//            $fileStoreName = time().'.'.$ext;
//            $fileThumbnailStoreName = 'thumb_'.time().'.'.$ext;
//            $image->storeAs('public/images', $fileStoreName);
//            $image->storeAs('public/thumbnail', $fileThumbnailStoreName);
//            $thumbnailPath = public_path('storage/thumbnail/'.$fileThumbnailStoreName);
//            $this->createThumbnail($thumbnailPath, 150, 93);
//            return  redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param PageGalleryImage $pageGalleryImage
     * @return void
     */
    public function show(PageGalleryImage $pageGalleryImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PageGalleryImage $pageGalleryImage
     * @return void
     */
    public function edit(PageGalleryImage $pageGalleryImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PageGalleryImage $pageGalleryImage
     * @return \Response
     */
    public function update(Request $request, PageGalleryImage $pageGalleryImage)
    {
        if ($request->has('alt') || $request->has('title') || $request->has('status')) {
            if ($request->has('status')) {
                $pageGalleryImage->update(['status' => $request->get('status')]);
            }
            $pageGalleryImage->image()->update($request->only(['alt', 'title']));
        } else if ($request->hasFile('photo')) {
            $fileName = $this->imageService->upload($request->file('photo'), [
                'original' => [
                    'w' => 800,
                    'h' => 800,
                ],
                'medium' => [
                    'w' => 420,
                    'h' => 360,
                ],
                'thumbnail' => [
                    'w' => 150,
                    'h' => 150,
                ],
            ]);

            //TODO: must delete previous photo

            $pageGalleryImage->image()->update([
                'name' => $fileName,
            ]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PageGalleryImage $pageGalleryImage
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(PageGalleryImage $pageGalleryImage)
    {
        $pageGalleryImage->delete();

        return back();
    }


    public function recycle(PageGalleryImage $pageGalleryImage)
    {
        $pageGalleryImage->restore();
        return back();
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    private function bulkOperation(Request $request)
    {
        if ($request->has('bulk_operation_item_select')) {
            $action = $request->get('action');
            $targetImagesId = $request->get('bulk_operation_item_select');

            if ($action == 0) {
                \App\Models\Image::whereIn('imageable_id', $targetImagesId)->where('imageable_type', 'App\Models\PageGalleryImage')->update([
                    'status' => PageGalleryImageStatus::Approved
                ]);

                PageGalleryImage::whereIn('id', $targetImagesId)->update([
                    'updated_at' => now()
                ]);
            } else if ($action == 1) {
                \App\Models\Image::whereIn('imageable_id', $targetImagesId)->where('imageable_type', 'App\Models\PageGalleryImage')->update([
                    'status' => PageGalleryImageStatus::Pending
                ]);

                PageGalleryImage::whereIn('id', $targetImagesId)->update([
                    'updated_at' => now()
                ]);
            } else if ($action == 2) {
                \App\Models\Image::whereIn('imageable_id', $targetImagesId)->where('imageable_type', 'App\Models\PageGalleryImage')->update([
                    'status' => PageGalleryImageStatus::Ban
                ]);

                PageGalleryImage::whereIn('id', $targetImagesId)->update([
                    'updated_at' => now()
                ]);
            } else if ($action == 3) {
                PageGalleryImage::whereIn('id', $targetImagesId)->delete();
            } else if ($action == 4) {
                PageGalleryImage::whereIn('id', $targetImagesId)->restore();
            }
        }
    }
}
