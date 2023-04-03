<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $brands = [
            [
                "name" => "Calvin Klein",    
            ],
            [
                "name" => "Armani",    
            ],            
            [
                "name" => "Hermes",    
            ],            
            [
                "name" => "Dolce&Gabbana",    
            ],            
            [
                "name" => "Paco Rabanne",    
            ],    
        ];

        foreach ($brands as $brand) {
        $newbrand = new Brand();
        $newbrand->name = $brand['name'];

        $newbrand->save();
        }
    }
};
