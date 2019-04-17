<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user); //associate question w. user as they cannot be separate
        $question->save();
        $answer = factory(\App\Answer::class)->make(); //generate answer from factory
        $answer->user()->associate($user); //associate user with answer
        $answer->question()->associate($question); //associate answer with question
        $this->assertTrue($answer->save());
    }
}
