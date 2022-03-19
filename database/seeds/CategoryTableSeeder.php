<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat=['Graduation', 'Final' , 'Fourth Year', 'Third Year'];

        foreach ($cat as $key => $c) {
            $category=Category::create([
            'type'=>$c,
        ]);
        }

    }
}
