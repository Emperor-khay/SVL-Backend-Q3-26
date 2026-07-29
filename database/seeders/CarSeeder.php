<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function(){
            DB::table('cars')->insert([
                'name' => 'Mercedes',
                'model' => 'GLK',
                'status' => 'available',
                'year' => '2014',
                'colour' => 'Black',
                'price' => 13000000.00,
            ]);
            DB::table('cars')->insert([
                'name' => 'Toyota',
                'model' => 'Camry',
                'status' => 'sold',
                'year' => '2024',
                'colour' => 'Cream',
                'price' => 22000000.00,
            ]);
            DB::table('cars')->insert([
                'name' => 'Mercedes',
                'model' => 'CLA',
                'status' => 'in_purchase',
                'year' => '2022',
                'colour' => 'Red',
                'price' => 45000000.00,
            ]);
            DB::table('cars')->insert([
                'name' => 'Lexus',
                'model' => 'RX350',
                'status' => 'available',
                'year' => '2017',
                'colour' => 'White',
                'price' => 34000000.00,
            ]);
            DB::table('cars')->insert([
                'name' => 'Chevrolet',
                'model' => 'Camaro',
                'status' => 'in_purchase',
                'year' => '2025',
                'colour' => 'Yellow and Black',
                'price' => 150000000.00,
            ]);
        });
    }
}
