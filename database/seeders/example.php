<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class example extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       DB::table('example2')->insert([
            'nombre' => Str::random(10)
        ]);
    }
}
