<?php
<<<<<<< HEAD


namespace App\Http\Controllers;




use App\Http\Controllers\Controller;
=======
namespace App\Http\Controllers;


use App\Models\Course;
>>>>>>> cd8630b85284da0471c1cf56f2fb1831633a3d56

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->has("subCatID")){
            $cources = Course::where("sub_category_id",request()->get("subCatID"))->get();
        return view('courses.new.cources', ['cources' => $cources]);

        }
        $cources = Course::all();



        return view('courses.new.cources', ['cources' => $cources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        //

        return view('AdminDashboard.create');
=======
        return view('courses.new.create-course',);
>>>>>>> cd8630b85284da0471c1cf56f2fb1831633a3d56
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { Course::create($request->all());
        return redirect()->route('allcourses');
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
