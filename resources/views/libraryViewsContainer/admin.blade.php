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

    <div class="panel-default">
        <div class="panel-heading">Manging sections </div>
        <div class="panal-body">
            <h2>Update section </h2>

            {{-- @foreach($sections as $item) --}}
            {!! Form::open(["url" => "library/$sections->id", "method"=>"patch"]) !!};
            {!! Form::text("section_name" , $sections->section_name) !!}
            <br>
            <div class="bg-faded">
                {{$sections->book_total}}
            </div>
            {!! Form::submit('Update') !!}
            {!! Form::close() !!}
            {{-- @endforeach --}}
        </div>
    </div>
    <hr>


    {{-- <div class="panel-default">
        <div class="panel-heading">Manging sections </div>
        <div class="panal-body">
            <h2>Delete section </h2>



            {!! Form::open(["url" => "library/$section->id", "method"=>"delete"]) !!}
            {!! Form::text("section_name" , $section->section_name) !!}


            {!! Form::submit('Delete') !!}
            {!! Form::close() !!}

        </div>
    </div> --}}
</div>

@endsection