<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Section;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $sections = Section::all();
        $sections = Section::withTrashed()->get();
        return view('libraryViewsContainer.admin')->with('sections', $sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section_name = $request->input('section_name');
        $file =  $request->file('image');
        $destinationPath = 'images';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);

        // DB::table('section')->insert(['section_name' => $section_name, 'image_name' => $filename]);


        //ORM
        $sections = new Section;
        $sections->section_name = $section_name;
        $sections->image_name = $filename;
        $sections->save();
        return redirect('library');
    }

    /**
     * Display the specified resource.d
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);
        // dd($section);
        // $allBooks = DB::table('sections')->join('books','sections.id', '=' , 'books.section_id')->where('sections.id',$id)->get();

        $allBooks = $section->books;
        return view('libraryViewsContainer.books',compact('section',$section,'allBooks' ,$allBooks));
        
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
    
        $section_name = $request->section_name;
        $book_total= $request->book_total;



        $section = Section::find($id);
        $section->section_name = $section_name;
        $section->book_total = $book_total;
        $section->save();
        return redirect('library');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $library)
    {
        $library->delete();

        return redirect('library');

    }


    public function restore($id)
    {
       
        $section = Section::onlyTrashed()->find($id);
        $section->restore();
        return redirect()->back();
    }

    public function deleteForever($id)
    {
        $section = Section::onlyTrashed()->find($id);
        $section->forceDelete();
        return redirect()->back();
    }
}