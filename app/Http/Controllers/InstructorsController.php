<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors =DB:: table('instructors')-> get();
        return view('instructors.index',compact('instructors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        DB::table('instructors')->insert([
            'id'=> $request ->id ,
            'first_name'=> $request ->first_name ,
            'last_name'=> $request ->last_name ,
            'email'=> $request -> email ,
            'phone'=> $request ->phone,
            'address'=> $request ->address,
            'birth_date'=> $request ->birth_date,
            'scientific_degree'=> $request ->scientific_degree,
            'account_id'=> $request ->account_id,
        ]);
        return response('instructors inserted successfully');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructors = DB::table('instructors ')->where ('id',$id)->first();
        return view('instructors .edit',compact('instructors '));
        
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
        DB::table('instructors')->updated([
            'id'=> $request ->id ,
            'first_name'=> $request ->first_name ,
            'last_name'=> $request ->last_name ,
            'email'=> $request -> email ,
            'phone'=> $request ->phone,
            'address'=> $request ->address,
            'birth_date'=> $request ->birth_date,
            'scientific_degree'=> $request ->scientific_degree,
            'account_id'=> $request ->account_id,
        ]);
        return response('instructors updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $instructors= DB::table('instructors')->where ('id',$id)->delete();
        
    }
}
