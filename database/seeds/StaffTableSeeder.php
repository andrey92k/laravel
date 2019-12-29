<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = [];

        for ($i = 0; $i <= 10; $i++){
            $full_name = 'Full name #' . $i;
            $dob =  date(rand(1970,2000).'-'.rand(1,12).'-'.rand(1,31));
            $department_id = ($i > 4) ? rand(1,4) : 1;
            $position = 'Position #' . $i;
            $rate = rand(0,1);
            if($rate == 0){
                $clock = rand(0, 168);
                $payment = rand(0, 100) * $clock;
            }else{
                $payment = rand(1000, 10000);
                $clock = '';
            }
            $staff[] = [
                'full_name' => $full_name,
                'dob'	=> $dob,
                'department_id' => $department_id,
                'position' => $position,
                'rate' => $rate,
                'clock' => $clock,
                'payment' => $payment,
            ];
        }
        \DB::table('staff')->insert($staff);
    }
}
