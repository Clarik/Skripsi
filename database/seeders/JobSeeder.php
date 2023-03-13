<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        for ($i = 1; $i <= 10; $i++) {
            $now = Carbon::now();
            DB::table('job')->insert([
                'jobName' => $faker->jobTitle,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
