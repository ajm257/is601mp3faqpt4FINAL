@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Answer</div>
                    <div class="card-body" data-answerid= "{{ $answer->id }}">
                        {{$answer->body}}

                        <br>

                        <div class="interaction">
                            <a href="#" class="like">{{ Auth::user()->likes()->where('answer_id', $answer->id)->first() ? Auth::user()->likes()->where('answer_id', $answer->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                            <a href="#" class="like">{{ Auth::user()->likes()->where('answer_id', $answer->id)->first() ? Auth::user()->likes()->where('answer_id', $answer->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>

                        </div>

                    </div>
                    <div class="card-footer">
                        {{ Form::open(['method'  => 'DELETE', 'route' => ['answers.destroy', $question, $answer->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                        <a class="btn btn-primary float-right" href="{{ route('answers.edit',['question_id'=> $question, 'answer_id'=> $answer->id, ])}}">
                            Edit Answer
                        </a>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}';
    </script>

@endsection