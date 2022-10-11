@extends('admin.master')
@section('title')
Manage Teacher
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
                        <th>Teacher Name</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Description</th>
                        <th>Course Fee</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($courses as $course)
                    @if($course->teacher_id==Session::get('teacherId'))
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $course->teacher_name }}</td>
                        <td>{{substr($course->course_name,0,20) }}</td>
                        <td>{{ $course->course_code }}</td>
                        <td>{{substr( $course->description, 0,20) }}</td>
                        <td>{{ $course->course_fee }}</td>
                        <td>
                            <img src="{{ asset($course->image) }}" style="height:60px; width:60px; border-radius: 50%;"
                                alt="" srcset="">
                        </td>
                        <td>
                            <a href="{{route ('edit-course',['id'=>$course->id])}}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('delete-course')}}" method="POST" id="delete">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id}}">
                                <input type="submit" value="Delete" class="btn btn-danger" title="Delete"
                                    onclick="return confirm('Are You Sure delete this!!') ">
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection