@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($questions) > 0)
                        <table class="table ">
                            <tr>
                                <td>Title</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            @foreach ($questions as $question)
                            <tr>
                                <td>{{$question->title}}</td>
                                <td>
                                    <a href="/questions/{{$question->id}}/edit" class="btn btn-default">Edit</a>
                                </td>
                                <td>
                                    {!! Form::open(['action' => ["QuestionsController@destroy", $question->id], 'method'=>'post'])
                                    !!}
                                    {{ Form::submit("DELETE", ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Are You Sure?")']) }}
                                    {{Form::hidden("_method", 'DELETE')}}
                                    {!! Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
