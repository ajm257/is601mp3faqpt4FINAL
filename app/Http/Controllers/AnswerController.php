<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Like;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($question)
    {
        $answer = new Answer;
        $edit = FALSE;
        return view('answerForm', ['answer' => $answer,'edit' => $edit, 'question' =>$question  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question)
    {

        $input = $request->validate([
            'body' => 'required|min:5',
        ], [

            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',

        ]);
        $input = request()->all();
        $question = Question::find($question);
        $Answer = new Answer($input);
        $Answer->user()->associate(Auth::user());
        $Answer->question()->associate($question);
        $Answer->save();

        return redirect()->route('question.show',['question_id' => $question->id])->with('message', 'Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($question,  $answer)
    {
        $answer = Answer::find($answer);

        return view('answer')->with(['answer' => $answer, 'question' => $question]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($question,  $answer)
    {
        $answer = Answer::find($answer);
        $edit = TRUE;
        return view('answerForm', ['answer' => $answer, 'edit' => $edit, 'question'=>$question ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $question, $answer)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [

            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',

        ]);

        $answer = Answer::find($answer);
        $answer->body = $request->body;
        $answer->save();

        return redirect()->route('answer.show',['question_id' => $question, 'answer_id' => $answer])->with('message', 'Updated');

    }

    public function likeAnswer(Request $request)
    {
        $answer_id = $request['answerId']; //retrieve the answer id
        $answer = Answer::find($answer_id); //retrieve isLike data from ajax request - determining if it is like or dislike
        $is_like = $request['isLike'] === 'true' ? true : false; //convert string to boolean
        $update = false; //to store that after post is liked, knows to update or just save

        if (!$answer) {
            return "not working";
        }
        $user = Auth::user();
        $like = $user->likes()->where('answer_id', $answer_id)->first(); //check if post is already liked by this user
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) { //if currently liked, undo it, or if disliked, change like to zero
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->answer_id = $answer->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return "not working";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question, $answer)
    {
        $answer = Answer::find($answer);

        $answer->delete();
        return redirect()->route('question.show',['question_id' => $question])->with('message', 'Deleted!');

    }
}