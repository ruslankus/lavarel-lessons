<?php

use Illuminate\Database\Seeder;
use App\Models\Mood;

class MoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Moods')->delete();

        Mood::create([
            'id' => 1,
            'mood_name' => 'Good',
        ]);

        Mood::create([
            'id' =>2,
            'mood_name' => 'Bad',
        ]);


    }
}

