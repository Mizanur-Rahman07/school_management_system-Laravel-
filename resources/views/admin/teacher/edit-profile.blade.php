@extends('admin.master')
@section('title')
Teacher Update Form
@endsection

@section('content')
<div class="row">
    <h5 class="mb-4">Update Profile Form</h5>
    <div class="col-xl-9 mx-auto">
        <h1 class="text-center">{{ session('message')}}</h1>
        <div class="card">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                    </div>
                    <h6 class="text-center text-uppercase">Update Profile</h6>
                    <hr />
                    <form action="{{route ('update-tcr-profile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                            <div class="col-sm-9">
                                <input type="text" name="teacher_phone" value="{{ $teacher->teacher_phone }}"
                                    class="form-control" id="inputPhoneNo2" placeholder="Phone No">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" value="{{ substr($teacher->password,0,10) }}"
                                    class="form-control" id="inputEmailAddress2" placeholder="password">
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
                                <button type="submit" class="btn btn-primary px-5">Update</button>
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