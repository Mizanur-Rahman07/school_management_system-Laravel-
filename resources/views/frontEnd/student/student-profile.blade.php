@extends('frontEnd.master')
@section('title')
Student Profile
@endsection

@section('content')


<body id="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <section class="inner_banner mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="full">
                        <h3>Student Profile </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach ($students as $student)
    @if($student->id==Session::get('studentId'))
    <a href="{{route ('edit-profile',['id'=>$student->id])}}" class="btn btn-primary float-right m-2">Update Profile</a>
    @endif
    @endforeach
    <div class="section layout_padding contact_section" style="background:#f6f6f6;">
        <div class="container">
            <div class="row">
                @foreach ($students as $student)
                @if($student->id==Session::get('studentId'))
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="full float-right_img">
                        <img src="{{ asset($student->image) }}" style="height:250px; width:250px; border-radius:10%"
                            alt="" srcset="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="row mb-3">
                        <label class="col-sm-4">Name :</label>
                        <div class="col-sm-8">
                            <td>{{ $student->name }}</td>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4">Email :</label>
                        <div class="col-sm-8">
                            <td>{{ $student->email }}</td>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4">Phone :</label>
                        <div class="col-sm-8">
                            <td>{{ $student->phone }}</td>
                        </div>
                    </div>
                    <!-- <div class="row mb-3">
                        <label class="col-sm-2">Password :</label>
                        <div class="col-sm-8">
                            <td>{{ $student->password }}</td>
                        </div>
                    </div> -->
                    <div class="row mb-3">
                        <label class="col-sm-4">Address :</label>
                        <div class="col-sm-8">
                            <td>{{ $student->address }}</td>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4">Enroll Course :</label>
                        <div class="col-sm-8">
                            <td>{{ $student->course_name }}</td>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <!-- section -->
                    <div class="section ">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="full">
                                        <img src="{{asset('frontEndAsset')}}/images/img2.png" alt="#" />
                                    </div>
                                </div>
                                <div class="col-md-12 layout_padding_2">
                                    <div class="full">
                                        <div class="heading_main text_align_left">
                                            <h2><span>Welcome To</span> Education</h2>
                                        </div>
                                        <div class="full">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut
                                                labore et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                ut aliquip ex ea
                                                commodo consequat.
                                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                dolore eu fugiat nulla
                                                pariatur.
                                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                                officia deserunt mollit
                                                anim id est laborum</p>
                                        </div>
                                        <div class="full">
                                            <a class="hvr-radial-out button-theme" href="#">About more</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end section -->
                </div>
            </div>
        </div>
    </div>


    @endsection