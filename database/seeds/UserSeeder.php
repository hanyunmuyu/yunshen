<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $schoolList = \App\Models\School::limit(20)->get();
        foreach ($schoolList as $school) {
            for ($i = 0; $i < 20; $i++) {
                $data = [];
                $data['name'] = 'hanyun-' . $school->id . '-' . $i;
                $data['school_id'] = $school->id;
                $data['password'] = encrypt(123456);
                $data['avatar'] = 'avatar.jpg';
                \App\User::create($data);
            }
        }
        unset($schoolList);
    }
}
