<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTechnologySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker) : void {
        $projects_list = Project::all();
        $technologies_list = Technology::all()->pluck('id');

        foreach ($projects_list as $item) {
            $item->technologies()->sync($faker->randomElements($technologies_list, 5));
        }
    }
}
