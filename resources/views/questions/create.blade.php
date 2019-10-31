@extends('layouts.app')

@section('content')
  <h2 class="pt-3">Create Question</h2>
  {!! Form::open(['action'=>"QuestionsController@store", 'method'=>'post']) !!}
    {{ Form::label("title") }}
    {{ Form::text("title", '', ['class'=>"form-control"]) }}
    <br>
    {{ Form::label("description") }}
    {{ Form::textarea("description", '', ['class'=>"form-control"]) }}
    <br>
    {{ Form::submit("Add Question", ['class'=>'btn btn-primary']) }}
  {!! Form::close() !!}
  
@endsection