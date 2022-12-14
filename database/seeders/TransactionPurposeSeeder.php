<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TransactionPurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_purposes')->insert([
            'type'=>'IN',
            'purpose'=>'',
            'default_amount'=>0,
        ]);       
    }
}
