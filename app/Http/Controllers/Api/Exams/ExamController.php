<?php

namespace App\Http\Controllers\Api\Exams;
use App\Http\Controllers\Controller;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('course_id')) {
            $x = Exam::with("questions")->where('course_id', request('course_id'))->get();
        } else {

            $x = Exam::with("questions")->get();
        }

        return response()->json([
            "status" => "success",
            "data" => $x
        ], 200);
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
    public function store(ExamRequest $request)
    {
        //
        $exam = Exam::create([
            'exam_date' => $request->exam_date,
            'exam_title' => $request->exam_title,
            'created_by' => $request->created_by,
        ]);
        $exam->questions()->createMany($request->question);
        return response()->json([
            "status" => "success",
            "data" => "Exam created"
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRequest $request, Exam $exam)
    {
        //
        $exam->update([
            'exam_date' => $request->exam_date,
            'exam_title' => $request->exam_title,
            'created_by' => $request->created_by,
        ]);
        $exam->questions()->delete();
        $exam->questions()->createMany($request->question);
        return response()->json([
            "status" => "success",
            "data" => "Exam updated"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($exam)
    {

        $exam->delete();
        return response()->json([
            "status" => "success",
            "data" => "Exam deleted"
        ], 200);
    }


}
