<?php

use App\Collegue;
use Illuminate\Database\Seeder;

class ColleguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $col=['IT', 'COM' , 'Archi', 'Medicine', 'Pharma'];

        foreach ($col as $key => $c) {
            $collegue=Collegue::create([
            'name'=>$c,
        ]);
        }

        $collegue=Collegue::find(1);
        $collegue->professors()->syncWithoutDetaching([3,4 ,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]);

        $collegue=Collegue::find(2);
        $collegue->professors()->syncWithoutDetaching([25,26,27,28,29]);

    }
}
