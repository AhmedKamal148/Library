<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  App\Models\book;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $book_title = $request->book_title;
      $book_edition = $request->book_edition;
      $book_description = $request->book_description;
      $section_id = $request->section_id;

      DB::table('books')->insert([
          "book_title" => $book_title,
          "book_edition" =>$book_edition,
          "book_description" =>$book_description,
          "book_publication" => date("Y-m-d"),
          "section_id" =>$section_id,

      ]);

      return redirect("library/$section_id");

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $author_id = 1;
        $another_author = $request->another_author;
        $author2 = DB::table('authors')
                            ->where("first_name" ,$another_author)
                            ->select("id")
                            ->first();


  

        $book_title = $request->book_title;
        $book_edition = $request->book_edition;
        $book_description = $request->book_description;
        // $author_name =$request->author_name;
        $section_id = $request->section_id ;
       $ID_BOOk = DB::table("books") 
        ->where("id" , $id)
        ->update
        ->insertGetId([
            "book_title" =>$book_title,
            "book_edition"=>$book_edition ,
            "book_description"=>$book_description
        ]);
        
        return redirect("library/$section_id");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $section_id = $book->section_id;
        $book->delete();
        return redirect("library/$section_id");
    }
}