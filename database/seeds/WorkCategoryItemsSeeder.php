<?php

use Illuminate\Database\Seeder;

class WorkCategoryItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'=>'کامپبوتر',
                'items'=>[
                    'بک اند',
                    'فرانت اند',
                ]
            ],
            [
                'name'=>'ورزش',
                'items'=>[
                    'فوتبال',
                    'بسکتبال',
                    'تنیس',
                ],
            ],
        ];
        foreach ($data as $d)
        {
            $workCategory = new \App\Models\WorkCategory();
            $workCategory->name = $d['name'];
            $workCategory->status = 1;
            $workCategory->save();
            foreach ($d['items'] as $item)
            {
                $workItem = new \App\Models\WorkItem();
                $workItem->name = $item;
                $workItem->work_category_id = $workCategory->id;
                $workItem->status = 1;
                $workItem->save();
            }
        }
    }
}
