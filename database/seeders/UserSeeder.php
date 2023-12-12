<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 0;
        while($x < 1500){
            DB::table('users')->insert([
                'fname' => fake()->firstName(),
                'mname' => "T",
                'lname' => fake()->lastName(),
                'address' => fake()->address(),
                'birthdate' => fake()->date('Y-m-d'),
                'contact' => fake()->phoneNumber(),
                'marital_status' => 0,
                'gender' => fake()->numberBetween(1,2),
                'password' => fake()->password(),
                'username' => fake()->email(),
                'email' => fake()->email(),
                'user_access' => 'resident'
            ]);
            $x++;
        }
    }
}
