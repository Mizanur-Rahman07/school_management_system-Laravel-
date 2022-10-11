@extends('admin.master')
@section('title')
Teacher Update Form
@endsection

@section('content')
<div class="row">
    <h5 class="">Teacher Update Form</h5>
    <div class="col-xl-9 mx-auto">
        <h6 class="text-center text-uppercase">Update Teacher Form</h6>
        <hr />
        <h1 class="text-center">{{session('message')}}</h1>
        <div class="card">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">

                    </div>
                    <hr />
                    <form action="{{route ('update-teacher')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Teacher Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="teacher_name" value="{{ $teacher->teacher_name }}"
                                    class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                            <div class="col-sm-9">
                                <input type="text" name="teacher_phone" value="{{ $teacher->teacher_phone }}"
                                    class="form-control" id="inputPhoneNo2" placeholder="Phone No">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" name="teacher_email" value="{{ $teacher->teacher_email }}"
                                    class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" id="inputEmailAddress2"><br>
                                <img src="{{ asset($teacher->image) }}" style="width:80px; height: 80px; " alt=""><br>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputAddress4" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="address" id="inputAddress4" rows="3"
                                    placeholder="Address">{{ $teacher->address }}</textarea>
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
<!--end row-->
@endsection