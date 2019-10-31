@extends('layouts.app')

@section('content')
  <h1>Edit</h1>
  {!! Form::open(['action'=>["QuestionsController@update", $question->id], 'method'=>'post']) !!}
    {{ Form::label("title") }}
    {{ Form::text("title", $question->title, ['class'=>"form-control"]) }}
    <br>
    {{ Form::label("description") }}
    {{ Form::textarea("description", $question->description, ['class'=>"form-control"]) }}
    <br>
    {{ Form::submit("Update Question", ['class'=>'btn btn-primary']) }}
    {{ Form::hidden("_method", "PUT") }}
  {!! Form::close() !!}
@endsection
