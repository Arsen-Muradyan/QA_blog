@extends('layouts.app')
@section('content')
  @foreach ($questions as $question)
    <h3 class="mt-4">
      <a href="/questions/{{$question->id}}">{{ $question->title }}</a>
    </h3>
    <p>{{ $question->description }}</p>
    <hr>
  @endforeach
  {{ $questions->links() }}
@endsection