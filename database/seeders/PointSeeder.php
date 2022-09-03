<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach(Employee::all() as $item){
            $date = Carbon::now()->subMinutes(rand(1, 850));
            $item->point()->create(
                array(
                    'point_date' => $date,
                    'created_at' => $date,
                    'updated_at' => $date,
                ),
            );

            $date = Carbon::now()->subMinutes(rand(1, 850));
            $item->point()->create(
                array(
                    'point_date' => $date,
                    'created_at' => $date,
                    'updated_at' => $date,
                ),
            );

            $date = Carbon::now()->subMinutes(rand(1, 850));
            $item->point()->create(
                array(
                    'point_date' => $date,
                    'created_at' => $date,
                    'updated_at' => $date,
                ),
            );

            $date = Carbon::now()->subMinutes(rand(1, 850));
            $item->point()->create(
                array(
                    'point_date' => $date,
                    'created_at' => $date,
                    'updated_at' => $date,
                ),
            );
        }
    }
}
