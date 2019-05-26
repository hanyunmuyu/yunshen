<?php

use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userList = \App\User::all();
        $categories = \App\Models\Category::count();
        foreach ($userList as $key => $user) {
            $data = [];
            $data['community_name'] = 'community---' . $key;
            $data['school_id'] = $user->school_id;
            $data['user_id'] = $user->id;
            $data['community_logo'] = 'community.jpg';
            $data['description'] = 'community---' . $key;
            $community = \App\Models\Community::firstOrCreate($data);
            if ($community) {
                $categoryList = range(1, $categories);
                foreach ($categoryList as $item) {
                    $tmp = [];
                    $tmp['category_id'] = $item;
                    $tmp['community_id'] = $community->id;
                    \App\Models\CommunityCategory::create($tmp);
                }
            }
        }
        unset($userList);
    }
}
