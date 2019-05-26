<?php

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = file_get_contents(__DIR__ . '/school.json');
        $schoolList = json_decode($json);
        $areas = \App\Models\Area::all();
        $provinceMap = [];
        $cityMap = [];
        foreach ($areas as $area) {
            $provinceMap[$area->name] = $area->id;
            $cityMap[$area->name] = $area->id;
        }
        foreach ($schoolList->RECORDS as $key => $school) {
            $data = [];
            $data['school_name'] = $school->school_name;
            $data['province'] = $provinceMap[$school->province];
            $data['city'] = $cityMap[$school->city];
            $data['school_code'] = $school->school_code;
            $data['level'] = $school->level;
            $data['note'] = $school->note ? $school->note : '';
            $data['school_description'] = 'school_description';
            $data['school_logo'] = 'school.jpg';
            $data['user_number'] = $key * 10;
            $data['community_number'] = $key;
            \App\Models\School::create($data);
        }
        unset($json, $schoolList, $area, $provinceMap, $cityMap);
    }
}
