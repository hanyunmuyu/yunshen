<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            [
                'category_name' => '体育',
            ],
            [
                'category_name' => '绘画',
            ],
            [
                'category_name' => '舞蹈',
            ],
            [
                'category_name' => '学习',
            ]
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
