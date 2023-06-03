<?php


namespace App\Services\V1;


use Illuminate\Http\UploadedFile;
use Image;

class ImageService
{

    public function saveImages(UploadedFile $file,$path,$name,$sizes=[])
    {
        $data = [];
        foreach ($sizes as $key=>$size)
        {
            $fileNameStore = $size['w'].'-'.$size['h'].'-'.$name;
            $img = Image::make($file->getRealPath());
            $img->resize($size['w'], $size['h'])->save($path.$fileNameStore);
            $data[$key] = $fileNameStore;
        }
        return $data;
    }
    public function upload(UploadedFile $file,$sizes=[])
    {
        $path = storage_path('app/public/images/');
        $ext = $file->getClientOriginalExtension();
        $fileStoreName = time().'.'.$ext;
        return $this->saveImages($file,$path,$fileStoreName,$sizes);
    }

    public function remove(\App\Models\Image $image)
    {

        foreach($image->getName() as $imageName) {
            $file = storage_path('images' . DIRECTORY_SEPARATOR . $imageName);

            if (file_exists($file))
            {
                unlink($file);
            }
        }


    }
}