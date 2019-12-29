<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DepartamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$departaments = [];

    	for ($i = 0; $i <= 5; $i++){
    		$cName = 'Departament #' . $i;

    		$departaments[] = [
    			'title' => $cName,
    			'slug'  => Str::slug($cName),
    		];
    	}
    	\DB::table('departments')->insert($departaments);
    }
}
