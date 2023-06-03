<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Enums\PageGalleryImageStatus;
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
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PageGalleryImageController extends Controller
{

    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @param PageGallery $pageGallery
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request, Page $page, PageGallery $pageGallery)
    {

        $request->validate([
            "title"              => "required",
            "alt"              => "required",
        ]);

        if ($request->has('updated_image')) {


            $image = base64_decode(base64trimmer($request->get('updated_image')));
            $name = time() . '.jpg';
            Storage::disk('public')->put("temp/{$name}", $image);

            $path = storage_path("app" . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "temp" . DIRECTORY_SEPARATOR . $name);

            $file = new UploadedFile($path, $name, 'image/jpeg', null);

            $fileName = $this->imageService->upload($file,[
                'original' => [
                    'w'=>800,
                    'h'=>800,
                ],
                'medium' => [
                    'w'=>420,
                    'h'=>360,
                ],
                'thumbnail' => [
                    'w'=>150,
                    'h'=>150,
                ],
            ]);

            $page_gallery_image = $pageGallery->page_gallery_images()->create(
                ['status'=>PageGalleryImageStatus::Approved]
            );
            $page_gallery_image->update(['priority' => $page_gallery_image->id]);

            $page_gallery_image->image()->create([
                'alt' => $request->alt,
                'title' => $request->title,
                'name' => $fileName,
            ]);

        }
        return redirect()->back();
    }


    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
}
