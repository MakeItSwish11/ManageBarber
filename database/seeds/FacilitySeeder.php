<?php

use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facilities = [
            [
                "name" => "For Male",
                "image" => Storage::url("male.jpg")
            ],
            [
                "name" => "Beard",
                "image" => Storage::url("ambulance.jpg")
            ],
            [
                "name" => "Massage",
                "image" => Storage::url("massage.jpg")
            ],
            [
                "name" => "Creambath",
                "image" => Storage::url("creambath.jpg")
            ],
            [
                "name" => "Colouring",
                "image" => Storage::url("colour.jpg")
            ],
        ];
    }
}
