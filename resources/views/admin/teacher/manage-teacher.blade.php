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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $teacher->teacher_name }}</td>
                        <td>{{ $teacher->teacher_phone }}</td>
                        <td>{{ $teacher->teacher_email }}</td>
                        <td>
                            <img src="{{ asset($teacher->image) }}" style="height:60px; width:60px;" alt="" srcset="">
                        </td>
                        <td>{{ $teacher->address }}</td>
                        <td>
                            <a href=" {{route ('edit-teacher',['id'=>$teacher->id])}}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('delete-teacher')}}" method="POST" id="delete">
                                @csrf
                                <input type="hidden" name="teacher_id" value="{{ $teacher->id}}">
                                <input type="submit" value="Delete" class="btn btn-danger" title="Delete"
                                    onclick="return confirm('Are You Sure delete this!!') ">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection