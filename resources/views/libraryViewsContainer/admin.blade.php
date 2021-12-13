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
            <th>Update</th>
            <th>Delete</th>
            <th>Show</th>
            <th>Restore</th>
            <th>Delete For Ever</th>



        </thead>

        <tbody>
            @foreach ($sections as $section)
            {!! Form::open(["url" => "library/$section->id","method" => "patch"]) !!}

            @if ($section->trashed())
            <tr class="bg-secondary">
                @else
            <tr class="bg-white">
                @endif

                <td>
                    {!! Form::text('section_name',$section->section_name) !!}

                </td>
                <td>
                    {!! Form::text('book_total',$section->book_total) !!}
                </td>



                <td>
                    {{-- Erorr Test On The Browser --}}
                    {!! Form::submit('Update',["class" => "btn btn-success"]) !!}
                </td>
                {!! Form::close() !!}


                {!! Form::open(["url" => "library/$section->id","method" => "delete"]) !!}

                <td>
                    {!! Form::submit('Delete',["class" => "btn btn-danger"]) !!}
                </td>
                {!! Form::close() !!}

                <td><a href="library/{{$section->id}}" class="btn btn-info">Show</a></td>


                @if ($section->trashed())
                <td>
                    {!! Form::open(["url" => "library/restore/$section->id"]) !!}
                    {!! Form::submit('Restore',["class" => "btn btn-warning"]) !!}
                    {!! Form::close() !!}
                </td>
                @endif


                @if ($section->trashed())
                <td>
                    {!! Form::open(["url" => "library/delete-forever/$section->id"]) !!}
                    {!! Form::submit('Delete For Ever',["class" => "btn btn-primary"]) !!}
                    {!! Form::close() !!}
                </td>
                @endif


            </tr>
            @endforeach

        </tbody>

    </table>

    @endif


</div>

@endsection