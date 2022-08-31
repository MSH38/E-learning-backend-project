@extends('layouts.AdminDashboard')
@section('title')
    Edit exam
@endsection
@section('owner')
    Instructor
@endsection
<?php
$models=['users','categories','subCategories','courses'];
$maps=['primary'=>['create','plus'],'info'=>['read','book'],'warning'=>['update','edit'],'danger'=>['delete','']];
?>
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New Exam</h3>
        </div>
        @foreach($errors->all() as $error)
            <div class="alert mt-2 alert-danger">
                {{$error}}
            </div>
        @endforeach
        <div class="card-body">
            <form method="post" action="{{route('exams.update',$exam)}}">
                {{  csrf_field()}}
                {{  method_field('put')}}

                <div class="form-group">
                    <label for="exampleInputEmail1">Exam Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="exam_title" placeholder="" value="{{$exam->exam_title}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Exam Date</label>
                    <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="exam_date" placeholder="" value="{{$exam->exam_date}}">
                </div>
                @if(Auth::user()->instructor)
                    <div class="form-group">
                        <label for="exampleInputEmail1">Course</label>

                        <select class="form-select form-control" name ='course_id' aria-label="Default select example">
                            @foreach(Auth::user()->instructor()->join('courses','instructors.id','courses.instructor_id')->select('courses.id','courses.name')->get() as $course)
                                <option {{$exam->course_id==$course->id?'selected':""}} value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    @if($exam->with("questions"))
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Exam Questions</h3>
                            </div>
                            <div class="card-body" id="mainQuestions">



{{--                                {{dd($exam)->exam_title}}--}}

                                @foreach($exam->questions as $i=> $question)

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span  class="input-group-text bg-light" >Q {{$i+1}}</span>
                                            </div>
                                            <input type="text"  name="question[]" class="form-control" placeholder="Question {{$i}}" value="{{$question->question}}">

                                            <input type="hidden" name="answer_number[]" value="{{$i}}">
                                            <input type="hidden" name="value[]" value="10"  >
                                            <div class="input-group-append">
                                                <span class="input-group-text">?</span>


                                                <form method="post" action="{{route('question.destroy',$question)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('delete')}}
                                                <button type="submit" class=" btn  btn-outline-danger delete" {{Auth::user()->hasRole('instructor')&&\App\Models\Course::find($exam->course_id)->instructor_id==Auth::user()->instructor->id?'':'disabled'}}><i class="fa fa-trash"></i></button>
                                                </form>

                                            </div>
                                        </div>
                                        <div class="row ">
                                            <!-- /.col-lg-6 -->
                                            <div class="col-lg-6 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input name="is_correct[]" value="1" {{$question->options[0]['is_correct']?'checked':""}} type="checkbox">
                        </span>
                                                    </div>
                                                    <input type="text"  name="option[]" class="form-control" placeholder="answer 1" value="{{$question->options[0]['option']}}">
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <input name="is_correct[]" value="2" type="checkbox" {{$question->options[1]['is_correct']?'checked':""}}>
                        </span>
                                                    </div>
                                                    <input type="text"  name="option[]" class="form-control" placeholder="answer 2" value="{{$question->options[1]['option']}}">
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <input name="is_correct[]" value="3" {{$question->options[2]['is_correct']?'checked':""}} type="checkbox">
                        </span>
                                                    </div>
                                                    <input type="text" name="option[]" class="form-control" placeholder="answer 3" value="{{$question->options[2]['option']}}">
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                        <span class="input-group-text">
                         <input name="is_correct[]" value="4" type="checkbox" {{$question->options[3]['is_correct']?'checked':""}}>
                        </span>
                                                    </div>
                                                    <input type="text" name="option[]" class="form-control" placeholder="answer 4" value="{{$question->options[3]['option']}}">
                                                </div>
                                                <!-- /input-group -->
                                            </div>

                                            <!-- /.col-lg-6 -->
                                        </div>
                                    </div>
                                @endforeach
                                <!-- /.row -->


                                <!-- /input-group -->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-warning  " {{Auth::user()->hasRole('instructor')&&\App\Models\Course::find($exam->course_id)->instructor_id==Auth::user()->instructor->id?'':'disabled'}}><i class="fa fa-edit"></i> update </button>
                            </div>
                        </div>
                    @endif
                    <!-- /.card-body -->


            </form>
{{--            @if(!isset($qnumber))--}}
{{--                <form method="get" action="{{route("exams.create")}}">--}}
{{--                    <input type="number" name="qnumber" min="1" class="form-control w-25">--}}
{{--                    <br>--}}
{{--                    <button type="submit" class="btn btn-primary"> Questions count  </button>--}}
{{--                </form>--}}
{{--            @endif--}}



        </div>
@endsection
