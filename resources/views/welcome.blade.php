@extends("layouts.app")

@section('content')
  <div class="jumbotron text-center mt-2">
    <h1>Welcome QA Blog</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At nihil repellendus praesentium voluptates blanditiis ea necessitatibus porro quo veritatis, est quam minima. Laudantium, ratione est distinctio porro repudiandae exercitationem? Sapiente?</p>
    @guest
    <a class="btn btn-success" href="/login">Login</a>
    <a class="btn btn-primary" href="/register">Register</a>
    @else 
    <a href="/dashboard" class='btn btn-success'>Dashboard</a>
    @endguest
  </div>
@endsection