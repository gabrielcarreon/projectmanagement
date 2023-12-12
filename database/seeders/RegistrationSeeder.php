<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 0;
        while($x < 1500){
            DB::table('registration')->insert([
                'user_id' => $x,
                'event_id' => 1
            ]);
            $x++;
        }
    }
}
