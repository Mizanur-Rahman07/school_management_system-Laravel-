<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Admission;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function studentRegister()
    {
        return view('frontEnd.student.register-student');
    }

    public function saveStudent(Request $request)
    {
        // return $request;
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->password = bcrypt($request->password);
        $student->address = $request->address;
        if ($request->file('image')) {
            $student->image = $this->saveImage($request);
        }

        $student->save();
        return redirect('/')->with('message', 'Insert Success');
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


    public function studentLogin()
    {
        return view('frontEnd.student.student-login');
    }

    public function studentLoginCheck(Request $request)
    {

        $loginInfo = Student::where('email', $request->user_name)
            ->orWhere('phone', $request->user_name)
            ->first();

        if ($loginInfo) {
            $expassword = $loginInfo->password;
            // return $expassword;
            // if (Hash::check( ($request->password),($loginInfo->password))) {
            // return '$Hash';

            if (password_verify($request->password, $expassword)) {
                Session::put('studentId',  $loginInfo->id);
                Session::put('studentName',  $loginInfo->name);
                return redirect('/');
            } else {
                return back()->with('message', 'Use Valid password');
            }
        } else {
            return back()->with('message', 'Use Valid Email or phone');
        }
    }

    public function studentLogout()
    {
        Session::forget('studentId');
        Session::forget('studentName');
        return  redirect('/');
    }

    // some of problem in studentProfile
    public function studentProfile()
    {
        $student = DB::table('students')
            ->join('admissions', 'admissions.student_id', '=', 'students.id')
            ->join('courses', 'admissions.course_id', 'courses.id')
            ->select('students.*', 'courses.course_name',)->orderBy('courses.course_name', 'desc')->take(2)
            ->get();
        // return $student;
        return view('frontEnd.student.student-profile', [
            // 'students' => Student::all()
            'students' => $student
        ]);
    }

    public function editProfile($id)
    {
        return view('frontEnd.student.edit-profile', [
            'student' => Student::find($id)
        ]);
    }

    public function updateProfile(Request $request)
    {
        $student = Student::find($request->student_id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->password = bcrypt($request->password);
        $student->address = $request->address;
        if ($request->file('image')) {
            if ($student->image) {
                unlink($student->image);
            }
            // else{
            // }
            $student->image = $this->saveImage($request);
        }
        $student->save();
        return redirect('/student-profile')->with('message', 'Profile Update Success');
    }

    public function studentAdmission(Request $request)
    {
        $this->validate($request, [
            'confirmation' => 'required'
        ]);

        $admission = new Admission();
        $admission->student_id = $request->student_id;
        $admission->course_id = $request->course_id;
        $admission->confirmation = $request->confirmation;
        $admission->save();
        return back();
    }
}