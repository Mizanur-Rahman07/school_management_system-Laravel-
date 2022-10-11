@extends('frontEnd.master')
@section('title')
Student Register
@endsection

@section('content')

<body id="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <section class="inner_banner mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="full">
                        <h3>Student Registrtion </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end section -->

    <!-- section -->
    <div class="section layout_padding contact_section" style="background:#f6f6f6;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="full float-right_img">
                        <img src="{{asset('frontEndAsset')}}/images/img10.png" alt="#">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">

                    <form action="{{ route ('new-student')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Student Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="inputEnterYourName"
                                    placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="inputPhoneNo2"
                                    placeholder="Phone No">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Phone No</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" class="form-control" id="inputEmailAddress2"
                                    placeholder="Email Address">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputAddress4" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="inputEmailAddress2"
                                    placeholder="Email Address">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="address" id="inputAddress4" rows="3"
                                    placeholder="Address"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" id="inputEmailAddress2"
                                    placeholder="Email Address">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputAddress4" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck4">
                                    <label class="form-check-label" for="gridCheck4">Check me out</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary px-5">Register</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end section -->
    @endsection()

    <!-- Start Footer -->