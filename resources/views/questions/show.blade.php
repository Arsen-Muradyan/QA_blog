@extends('layouts.app')

@section('content')
  <h1 class="pt-2">{{ $question->title }}</h1>
  <p>{{ $question->description }}</p>
  @foreach ($answers as $answer)
    <strong>{{$answer->username}}:</strong>
    <br>
    <p>{{ $answer->body }}</p>
  @endforeach
  {!! Form::open(['action'=>["AnswersController@store", $question->id],'method'=>'post']) !!}
    {{ Form::label("Body") }}
    {{ Form::textarea("body", '', ['class'=>'form-control']) }}
    <br>
    {{ Form::submit("Add Answer", ['class'=>'btn btn-primary']) }}
  {!! Form::close() !!}
@endsection