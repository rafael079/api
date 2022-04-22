<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Stores')->insert([
            [
                'name' => 'Apple',
                'email' => Str::random(10) . '@genezys.io',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Microsoft',
                'email' => Str::random(10) . '@genezys.io',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Google',
                'email' => Str::random(10) . '@genezys.io',
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
