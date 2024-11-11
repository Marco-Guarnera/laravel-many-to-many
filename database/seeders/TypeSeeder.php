<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run() : void {
        $types_list = [
            'Full-Stack',
            'Front-End',
            'Back-End'
        ];

        foreach ($types_list as $item) {
            $type = new Type();
            $type->name = $item;
            $type->save();
        }
    }
}
