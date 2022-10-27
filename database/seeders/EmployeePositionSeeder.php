<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('employee_positions')->insert([
            'id' => 2,
            'position'=>'Teacher',
            'description'=>'',
        ]);
        DB::table('employee_positions')->insert([
            'id' => 3,
            'position'=>'Admin',
            'description'=>'',
        ]);

//        DB::table('employee_positions')->insert([
//            'position'=>'Supervisor',
//            'description'=>'',
//        ]);

//        DB::table('employee_positions')->insert([
//            'position'=>'Trainee',
//            'description'=>'',
//        ]);
    }
}
