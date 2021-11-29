@extends('master')

@section('content')

<div class="jumbotron ">
    <h1 class="display-3">Jumbo heading</h1>
    <p class="lead">Jumbo helper text</p>
    <hr class="my-2">
    <p>More info</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
    </p>
</div>

<div class="container">
    <div class="row">
        @foreach($sections as $k => $v)
        <div class="col-md-4">
            <div class="book bg-whtie text-center ">
                <img src='{{asset("images/$v")}}' class="img-fluid">



                <p>This Is Math Book </p>
                <a class="btn btn-primary" href="#">{{$k}}</a>
            </div>
        </div>



        @endforeach


    </div>
</div>


@endsection
