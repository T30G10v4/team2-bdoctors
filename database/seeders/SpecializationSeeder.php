<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialization;
use Illuminate\Support\Str;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $specializations = ['Cardiologia', 'Dermatologia', 'Urologia', 'Oncologia', 'Ginecologia', 'Neurologia'];

        foreach ($specializations as $specialization) {
            $new_specialization = new Specialization();
            $new_specialization->name = $specialization;
            $new_specialization->slug = Str::slug($specialization);
            $new_specialization->save();
        }
    }
}
