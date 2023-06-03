<?php

use App\Enums\PageConnectionType;
use App\Enums\PageGalleryImageStatus;
use App\Enums\PageGalleryStatus;
use App\Enums\UserTypeStatus;
use App\Models\Page;
use App\Models\PageAddress;
use App\Models\Phone;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        if ($users->count() < 4) {
            dd('You have must at least 4 users in database!');
        }

        factory(Page::class, 10)->create()->each(function ($page) {

            $users = User::all()->random(rand(1, 4));

            $page->users()->attach($users, [
                'user_type' => UserTypeStatus::Owner
            ]);

            $page->address()->save(factory(PageAddress::class)->make());

            $faker = Factory::create();

            if (!Storage::disk('public')->exists('images')) {
                Storage::disk('public')->makeDirectory('images');
            }

            $faker = Factory::create();
            $imageService = new \App\Services\V1\ImageService;

            $file = new UploadedFile(
                realpath(public_path('images/static/not-found.png')),
                'not-found.png',
                'image/jpg',
                null,
                true
            );

            $sizes = [
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
            ];

            $name = $imageService->upload($file, $sizes);

            $title = $faker->word;

            $page->image()->create([
                'title' => $title,
                'alt' => $title,
                'name' => $name,
            ]);

            for ($i = 0; $i < rand(3, 7); $i++) {
                $gallery = $page->page_galleries()->create([
                    'name' => $faker->word,
                    'status' => PageGalleryStatus::Approved
                ]);


                for ($j = 0; $j < rand(6, 10); $j++) {

                    $page_gallery_image = $gallery->page_gallery_images()->create(['status' => PageGalleryImageStatus::Approved]);

                    $page_gallery_image->update([
                        'priority' => $page_gallery_image->id
                    ]);

                    $sizes = [
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
                    ];

                    $imageService->upload($file, $sizes);

                    $title = $faker->word;

                    $page_gallery_image->image()->create([
                        'title' => $title,
                        'alt' => $title,
                        'name' => $name,
                    ]);
                }
            }


            $connections = [
                'Telegram' => [
                    'priority' => '0',
                    'type' => PageConnectionType::Telegram,
                    'value' => $faker->userName
                ],
                'Instagram' => [
                    'priority' => '1',
                    'type' => PageConnectionType::Instagram,
                    'value' => $faker->userName
                ],
                'Whatsapp' => [
                    'priority' => '2',
                    'type' => PageConnectionType::Whatsapp,
                    'value' => $faker->phoneNumber
                ],
                'Mail' => [
                    'priority' => '3',
                    'type' => PageConnectionType::Mail,
                    'value' => $faker->email
                ],
                'Twitter' => [
                    'priority' => '6',
                    'type' => PageConnectionType::Twitter,
                    'value' => $faker->userName
                ],
                'Facebook' => [
                    'priority' => '7',
                    'type' => PageConnectionType::Facebook,
                    'value' => $faker->userName
                ]
            ];


            foreach ($connections as $connectionName => $connection) {
                $page->page_connections()->create([
                    'priority' => $connection['priority'],
                    'type' => $connection['type'],
                    'title' => $connectionName,
                    'value' => $connection['value'],
                    'status' => $faker->boolean(60)
                ]);
            }


            $page->phones()->saveMany(\factory(Phone::class, rand(1, 3))->create());

        });
    }
}
