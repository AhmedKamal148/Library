@extends('master')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between alinge-items-center">
        <h1>{{$section->section_name}}</h1>
        <h2><a href="{{url('library')}}">Home</a></h2>
    </div>
    <table class="table">
        {!! Form::open(["url"=>"books"]) !!}
        {!! Form::hidden("section_id" ,$section->id) !!}

        <tr>
            <td>Enter The Title Of The Book :</td>
            <td>{!! Form::text("book_title") !!}</td>
        </tr>
        <tr>
            <td>Enter The Edition Number : </td>
            <td>{!! Form::text("book_edition") !!}</td>
        </tr>
        <tr>
            <td>Describe The Book :</td>
            <td>
                {!! Form::textarea("book_description") !!}

            </td>
        </tr>
        <tr>
            <td>{!! Form::submit("Add" , ["class" => "btn btn-primary"]) !!}</td>
        </tr>

        {!! Form::close() !!}
    </table>

    <table class="table table-striped table-inverse table-responsive text-center">
        <thead class="thead-inverse ">
            <tr>
                <th>
                    <h4>Book Title</h4>
                </th>
                <th>
                    <h4>Book Edition</h4>
                </th>
                <th>
                    <h4>Book Description </h4>
                </th>
                <th>
                    <h4>Update</h4>
                </th>
                <th>
                    <h4>Delete</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allBooks as $book)
            {!! Form::open(["url"=>"books/$book->id","method"=>"patch"]) !!}
            {!! Form::hidden("section_id",$section->id) !!}
            <tr>
                <td scope="row">
                    {!! Form::text("book_title" ,$book->book_title) !!}
                </td>
                <td>
                    {!! Form::text("book_edition" ,$book->book_edition) !!}

                </td>
                <td>
                    {!! Form::textarea("book_description" ,$book->book_description) !!}
                </td>
                <td>
                    {!! Form::submit("Update" ,["class" => "btn btn-primary"]) !!}
                </td>

                {!! Form::close() !!}
                <td>
                    {!! Form::open(["url" =>"books/$book->id", "method" => "DELETE"]) !!}
                    {!! Form::hidden("section_id",$section->id) !!}
                    {!! Form::submit("Delete", ["class" =>"btn btn-danger"]) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection