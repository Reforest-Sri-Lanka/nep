<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
        foreach(range(1,3) as $i){
            DB::table('roles')->insert([
                'title' => $faker->name,
                'created_at' => $faker->dateTime,
                'status' => 1
            ]);
        }

        foreach(range(1,3) as $i){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => $faker->dateTime,
                'password' => $faker->password,
                'role' => 1,
                'designation' => 1,
                'organization' => 1,
                'created_by_user_id' => 1,
                'created_at' => $faker->dateTime,
                'status' => 1
            ]);
        }
    }
}
