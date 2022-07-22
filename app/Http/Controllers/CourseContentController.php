<?php

namespace App\Http\Controllers;

use App\Models\courseContent;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content= courseContent::all();
        return $content;
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
        courseContent::create([
            'content_type'=>$request->title ,
            'source'=>$request->source,
            'courseId'=>$request->courseId
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\courseContent  $courseContent
     * @return \Illuminate\Http\Response
     */
    public function show(courseContent $courseContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\courseContent  $courseContent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content= courseContent::findorFail($id);
        return $content;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\courseContent  $courseContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $content= courseContent::findorFail($id );
        // $content->content_type=$request->content_type;
        // $content->source=$request->source;
        // $content->courseId=$request->courseId;
        // $content->save();
        $courseContent->update([
            $content=>$request->content_type,
            $content=>$request->source,
            // $content=>$request->courseId

        ]);
        return redirect()->route('courseContents.index',compact($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\courseContent  $courseContent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        courseContent::findorFail($id)->delete();
        return redirect()->route('courseContents.index');
    }
}
