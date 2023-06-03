<?php


namespace App\Services\V1;



use App\Models\Page;
use App\Services\V1\Traits\Page\UserPageServiceTrait;
use Illuminate\Http\UploadedFile;
use Storage;

class PageService
{
    public function storePageImage(Page $page, $base64ImageString)
    {
        $image = base64_decode(base64trimmer($base64ImageString));
        $name = time() . '.jpg';
        Storage::disk('public')->put("temp/{$name}", $image);

        $path = storage_path("app" . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "temp" . DIRECTORY_SEPARATOR . $name);

        $file = new UploadedFile($path, $name, 'image/jpeg', null);

        $imageService = new ImageService();

        $fileName = $imageService->upload($file, [
            'original' => [
                'w' => 720,
                'h' => 360,
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


        $page->image()->create([
            'name' => $fileName,
            'status' => true,
        ]);

    }

    public function updatePageImage(Page $page, $base64ImageString)
    {
        $page->image()->delete();
        $this->storePageImage($page, $base64ImageString);
    }

}