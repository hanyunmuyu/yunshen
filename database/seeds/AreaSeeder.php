<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = file_get_contents(__DIR__ . '/area.json');
        $areaList = json_decode($json);
        foreach ($areaList->RECORDS as $key => $area) {
            $data = [];
            $data['id'] = $area->id;
            $data['name'] = $area->name;
            $data['pid'] = $area->pid;
            \App\Models\Area::create($data);
        }
        unset($json, $areaList);
    }
}
