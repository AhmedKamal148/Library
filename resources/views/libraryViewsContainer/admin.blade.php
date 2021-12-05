@extends('master')

@section('content')

<div class="container">
    <div class="panel-default">
        <div class="panel-heading">Manging sections </div>
        <div class="panal-body">
            <h2>Create new section </h2>



            {!! Form::open(["url" => "library", "files"=>"ture"]) !!}
            {!! Form::text("section_name") !!}
            <br>
            {!! Form::file('image') !!}
            <br>
            {!! Form::submit('create') !!}
            {!! Form::close() !!}

        </div>
    </div>
    <hr>
    @if($sections != null)
    <table class="table table-border">
        <thead>
            <th>Section Name</th>
            <th>Total Books</th>
            {{-- <th>Image</th> --}}
            <th>Update</th>
            <th>Delete</th>
        </thead>

        <tbody>
            @foreach ($sections as $section)
            @if($section->trashed())
            <tr class="bg-danger">
                @else
            <tr class="bg-light">
                @endif

                <td>{{$section->section_name}}</td>
                <td>{{$section->book_total}}</td>
                {{-- <td> <img src="{{asset($section->image_name)}}" class="img-fluid" alt=""></td> --}}

                {!! Form::open(["url" => "library/$section->id","method" => "patch"]) !!}

                <td>
                    {!! Form::submit('Update',["class" => "btn btn-success"]) !!}
                </td>
                {!! Form::close() !!}


                {!! Form::open(["url" => "library/$section->id","method" => "delete"]) !!}

                <td>
                    {!! Form::submit('Delete',["class" => "btn btn-danger"]) !!}
                </td>
                {!! Form::close() !!}

                <td>

                    @if($section->trashed())
                <td>
                    {!! Form::open(["url" => "library/restore/$section->id"]) !!}
                    {!! Form::submit('Restore',["class" => "btn btn-ligth"]) !!}
                    {!! Form::close() !!}
                </td>
                @endif

                </td>


            </tr>
            @endforeach

        </tbody>

    </table>

    @endif



    <hr>
    <div class="panel-default">
        <div class="panel-heading">Manging sections </div>
        <div class="panal-body">
            <h2>Update section </h2>

            @foreach($sections as $section)
            {!! Form::open(["url" => "library/$section->id", "method"=>"patch"]) !!}
            {!! Form::text("section_name" , $section->section_name) !!}
            <br>
            <div class="bg-dark text-white">
                {{$section->book_total}}
            </div>
            {!! Form::submit('Update') !!}
            {!! Form::close() !!}
            @endforeach
        </div>
    </div>
    <hr>


    <div class="panel-default">
        <div class="panel-heading">Manging sections </div>
        <div class="panal-body">
            <h2>Delete section </h2>



            @foreach ($sections as $section)

            {!! Form::open(["url" => "library/$section->id", "method"=>"delete"]) !!}
            {!! Form::text("section_name" , $section->section_name) !!}


            {!! Form::submit('Delete') !!}
            {!! Form::close() !!}

            @endforeach
        </div>
    </div>
</div>

@endsection