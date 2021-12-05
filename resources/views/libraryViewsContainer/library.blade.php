@extends('master')

@section('content')

<div class="jumbotron  d-flex justify-content-between">
    <div class="text-center">
        <h1 class="display-3">The Book Store</h1>
        <p class="lead">Welcome Sir !</p>
    </div>
    <div class="d-flex align-items-center flex-column">
        <a href="{{url('/')}}">Home</a>
        <a href="{{url('library')}}">Admin</a>

    </div>


</div>

<div class="container">
    <div class="row">
        @foreach($sections as $section)
        <div class="col-md-4">
            <div class="book bg-whtie text-center ">
                <img src='{{asset("images/$section->image_name")}}' class="img-fluid">



                <p>This Is Math Book </p>
            </div>
        </div>



        @endforeach


    </div>
</div>


@endsection