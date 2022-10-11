<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Session;
use Hash;


class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teacher.add-teacher');
    }
    public function saveTeacher(Request $request)
    {
        // return $request->file('image');
        $teacher = new Teacher();
        $teacher->teacher_name = $request->teacher_name;
        $teacher->teacher_phone = $request->teacher_phone;
        $teacher->teacher_email = $request->teacher_email;
        $teacher->password = bcrypt(12345678);
        $teacher->image = $this->saveImage($request);
        $teacher->address = $request->address;
        $teacher->save();
        return redirect('/manage-teacher')->with('message', 'Insert Success');
    }

    private function saveImage($request)
    {
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'adminAsset/teacher_image/';
        $imgUrl = $directory . $imageName;
        $image->move($directory, $imageName);
        return $imgUrl;
    }

    public function manageTeacher()
    {
        return view('admin.teacher.manage-teacher', [
            'teachers' => Teacher::all()
        ]);
    }

    public function deleteTeacher(Request $request)
    {
        $teacher = Teacher::find($request->teacher_id);
        if ($teacher->image) {
            unlink($teacher->image);
        }
        $teacher->delete();
        return back()->with('message', 'Delete success');
    }

    public function teacherLogin()
    {
        return view('admin.teacher.login');
    }

    public function teacherLoginCheck(Request $request)
    {
        $loginInfo = Teacher::where('teacher_email', $request->user_name)
            ->orWhere('teacher_phone', $request->user_name)
            ->first();

        if ($loginInfo) {
            $expassword = $loginInfo->password;
            // if (Hash::check('password', bcrypt($request->password))) {
            if (password_verify($request->password, $expassword)) {
                Session::put('teacherId',  $loginInfo->id);
                Session::put('teacherName',  $loginInfo->teacher_name);
                return redirect('/');
            } else {
                return back()->with('message', 'Use Valid password');
            }
        } else {
            return back()->with('message', 'Use Valid Email or phone');
        }
    }

    public function editTeacher($id)
    {
        return view('admin.teacher.edit-teacher', [
            'teacher' => Teacher::find($id)
        ]);
    }

    public function updateTeacher(Request $request)
    {
        $teacher = Teacher::find($request->teacher_id);
        $teacher->teacher_name = $request->teacher_name;
        $teacher->teacher_phone = $request->teacher_phone;
        $teacher->teacher_email = $request->teacher_email;
        $teacher->password = bcrypt(12345678);
        if ($request->file('image')) {
            if ($teacher->image) {
                unlink($teacher->image);
            }
            // else{
            // }
            $teacher->image = $this->saveImage($request);
        }
        $teacher->address = $request->address;
        $teacher->save();
        return redirect('/manage-teacher')->with('message', 'Update Success');
    }

    public function teacherLogout()
    {
        Session::forget('teacherId');
        Session::forget('teacherName');
        return redirect('/');
    }

    public function teacherProfile()
    {
        return view('admin.teacher.profile', [
            'teachers' => Teacher::all()
        ]);
    }

    public function editTcrProfile($id)
    {
        return view('admin.teacher.edit-profile', [
            'teacher' => Teacher::find($id)
        ]);
    }

    public function updateTcrProfile(Request $request)
    {
        $teacher = Teacher::find($request->teacher_id);
        $teacher->teacher_phone = $request->teacher_phone;
        $teacher->password = bcrypt($request->password);
        if ($request->file('image')) {
            if ($teacher->image) {
                unlink($teacher->image);
            }
            // else{
            // }
            $teacher->image = $this->saveImage($request);
        }
        $teacher->address = $request->address;
        $teacher->save();
        return redirect('/teacher-profile')->with('message', 'Update Success');
    }
}