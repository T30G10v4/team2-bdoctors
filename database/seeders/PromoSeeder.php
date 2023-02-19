<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $promos = [
            ['name' => 'Lead', 'price' => 2.99, 'duration' => 24],
            ['name' => 'Silver', 'price' => 5.99, 'duration' => 72],
            ['name' => 'Tungsten', 'price' => 9.99, 'duration' => 144]
        ];

        foreach ($promos as $promo) {
            Promo::create($promo);
        }
    }
}
