<?php


namespace App\Services\V1;



use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function store($data)
    {
        return User::create($data);
    }

    public function update(User $user, $data)
    {
        $user->update($data);
    }

    public function storeUserAvatar(User $user, $base64ImageString)
    {
        $image = base64_decode(base64trimmer($base64ImageString));
        $name = time() . '.jpg';
        Storage::disk('public')->put("temp/{$name}", $image);

        $path = storage_path("app" . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "temp" . DIRECTORY_SEPARATOR . $name);

        $file = new UploadedFile($path, $name, 'image/jpeg', null);

        $imageService = new ImageService();

        $fileName = $imageService->upload($file, [
            'original' => [
                'w' => 200,
                'h' => 200,
            ],
            'medium' => [
                'w' => 100,
                'h' => 100,
            ],
            'thumbnail' => [
                'w' => 52,
                'h' => 52,
            ],
        ]);


        $user->avatar()->create([
            'name' => $fileName,
            'status' => true,
        ]);

    }

    public function updateUserAvatar(User $user, $base64ImageString)
    {
        $user->avatar()->delete();
        $this->storeUserAvatar($user, $base64ImageString);
    }
}
