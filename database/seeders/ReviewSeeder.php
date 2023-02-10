<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $review = new Review();
            $review->doc_profile_id = 1;
            $review->text = $faker->text(600);
            $review->vote = $faker->numberBetween(1, 5);
            $review->username = $faker->name();

            $review->save();
        }
    }
}
