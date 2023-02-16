<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 150; $i++) {
            $message = new Message();
            $message->doc_profile_id = 3;
            $message->username = $faker->name(50);
            $message->slug = Str::slug($message->username, '-');
            $message->mail = $faker->email();
            $message->text = $faker->text(600);
            $message->save();
        }
    }
}
