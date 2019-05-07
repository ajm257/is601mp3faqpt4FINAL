<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Like;
use App\User;
use App\Answer;

class LikeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCheckIfLike()
    {

       /* $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user); //associate question w. user as they cannot be separate
        $question->save();
        $answer = factory(\App\Answer::class)->make(); //generate answer from factory
        $answer->user()->associate($user); //associate user with answer
        $answer->question()->associate($question); //associate answer with question
        $answer->save();

        $like = new Like;
        $like->user()->associate($user);
        $like->answer()->associate($answer);

        $this->assertTrue($like->save()); */

        $user = User::inRandomOrder()->first();

        $answer = Answer::inRandomOrder()->first();

        $answer->user()->associate($user);

        $like = $answer->likes()->count();

        $answer->likes($user);

        if($like === 0) {

            $this->assertEquals(0, $answer->likes()->count());

        }elseif($like === 1){

            $this->assertEquals(1, $answer->likes()->count());
        } else {

            $this->assertEquals(null, $answer->likes()->count());
        }
    }
}
