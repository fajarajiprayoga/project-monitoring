<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class ProjectLeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('project_leaders')->insert([
        //     'name' => Str::random(5),
        //     'image' => Str::random(5),
        //     'email' => Str::random(5) . '@gmail.com'
        // ]);

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('project_leaders')->insert([
                'name' => $faker->name,
                'image' => "",
                'email' => $faker->email
            ]);
        }
    }
}
