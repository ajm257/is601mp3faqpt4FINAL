<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all(); //retrieves all users
        for ($i = 1; $i <= 16; $i++) {
            $users->each(function ($user) { //make 1 question per user
                $question = factory(\App\Question::class)->make(); //make a question
                $question->user()->associate($user); //associate user with a question
                $question->save();
            });
        }
    }
}
