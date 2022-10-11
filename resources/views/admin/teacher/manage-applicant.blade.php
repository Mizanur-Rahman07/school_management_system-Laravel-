@extends('admin.master')
@section('title')
Manage Applicant
@endsection

@section('content')

<h6 class="mb-0 text-uppercase">DataTable Example</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Phone</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Course Fee</th>
                        <th>Confirmation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($applicants as $applicant)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $applicant->name }}</td>
                        <td>{{ $applicant->email }}</td>
                        <td>{{ $applicant->phone }}</td>
                        <td>{{ $applicant->course_name}}</td>
                        <td>{{ $applicant->course_code }}</td>
                        <td>{{ $applicant->course_fee }}</td>
                        <td>{{ $applicant->confirmation }}</td>
                        <td>
                            <a href="{{route ('manage-course')}}" class="btn btn-primary">Edit</a>
                            <a href="{{route ('manage-course')}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</div>
@endsection