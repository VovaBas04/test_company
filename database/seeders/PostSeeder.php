<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
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
            $data[] = ['id'=>$i,'user_id'=>1,'name'=>Str::random(10),'surname'=>Str::random(10),'email'=>Str::random(10) . '@gmail.com'];
        DB::table('posts')->insert($data);
    }
}
