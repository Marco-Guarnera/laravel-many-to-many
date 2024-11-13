<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run() : void {
        $technologies_list = [
            'HTML',
            'CSS',
            'JavaScript',
            'Vue',
            'PHP',
            'SQL',
            'Laravel'
        ];

        foreach ($technologies_list as $item) {
            $technology = new Technology();
            $technology->name = $item;
            $technology->save();
        }
    }
}
