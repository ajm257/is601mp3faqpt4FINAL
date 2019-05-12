@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Likes</div>

                    <div class="card-body ">


                        @foreach ($answers as $a)
                            <li> <b>Question ID:</b> {{$a->question_id}} ||
                                <b>Answer:</b> {{ $a->body }} </li>
                            <br>
                        @endforeach




                    </div>
                    <div class="card-footer">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection