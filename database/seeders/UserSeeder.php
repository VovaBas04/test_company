<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
        $data=[];
        foreach (range(1,10) as $i)
            $data[] = ['id'=>$i,'login'=>Str::random(10),'password'=>Str::random(10)];
        DB::table('users')->insert($data);
    }
}
