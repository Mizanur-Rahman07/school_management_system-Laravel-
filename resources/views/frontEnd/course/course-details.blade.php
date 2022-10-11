@extends('frontEnd.master')
@section('title')
Course Details
@endsection

@section('content')
<section class="inner_banner mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="full">
                    <h3>Course Details </h3>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section margin-top_50 silver_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="full float-right_img mt-5">
                    <img src="{{asset($course->image)}}" alt="#" />
                </div>
            </div>
            <div class="col-md-6 layout_padding_2">
                <div class="full">
                    <div class="heading_main text_align_left">
                        <h2><span>Course Details</h2>
                    </div>
                    <div class="full">
                        <h4><strong>Course Name :</strong> {{ $course->course_name }}</h4>
                        <h4><strong>Teacher Name :</strong> {{ $course->teacher_name }}</h4>
                        <h4><strong>Teacher Phone :</strong> {{ $course->teacher_phone }}</h4>
                        <h4><strong>Teacher Email :</strong> {{ $course->teacher_email }}</h4>
                        <h4><strong>Course Fee :</strong> {{ $course->course_fee }} tk</h4>
                        <p> {{ $course->description }}</p>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="full">
                        @if(Session::get('studentId'))
                        <a class="hvr-radial-out button-theme " data-toggle="modal" data-target="#exampleModal"
                            href="#">Apply</a>
                        @else
                        <a class="hvr-radial-out button-theme " href="{{ route('student-login')}}">Login</a><br>
                        <p class="" style="color: red;">Please first login then Enroll this course</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admission')}}" method="post">
                    @csrf
                    <input type="hidden" name="student_id" value="{{Session::get('studentId')}}">
                    <input type="hidden" name="course_id" value="{{ $course->id}}">
                    <input type="checkbox" name="confirmation" value="1">Are You sure admission this Course
                    <!-- <input type="submit" value="confirm"> -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>