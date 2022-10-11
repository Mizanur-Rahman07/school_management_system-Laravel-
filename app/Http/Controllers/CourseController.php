<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;
use DB;

class CourseController extends Controller
{

   public function addCourse()
   {
      return view('admin.course.add-course');
   }


   public function saveCourse(Request $request)
   {

      $this->validate($request, [
         'course_name' => 'required|unique:courses,course_name|string|min:10|max:50'
      ]);
      $course = new Course();
      $course->teacher_id = $request->teacher_id;
      $course->course_name  = $request->course_name;
      $course->slug = $this->makeSlug($request);
      $course->course_code = $request->course_code;
      $course->description = $request->description;
      $course->course_fee = $request->course_fee;
      $course->image = $this->saveImage($request);
      $course->save();
      return redirect('/manage-course')->with('message', 'Update Successfully');
   }
   private function makeSlug($request)
   {
      if ($request->slug) {
         $str = $request->slug;
         return preg_replace('/\s+/u', '-', trim($str));
      }
      $str = $request->course_name;
      return preg_replace('/\s+/u', '-', trim($str));
   }
   private function saveImage($request)
   {
      $image = $request->file('image');
      $imageName = rand() . '.' . $image->getClientOriginalExtension();
      $directory = 'adminAsset/course_image/';
      $imgUrl = $directory . $imageName;
      $image->move($directory, $imageName);
      return $imgUrl;
   }


   public function manageCourse()
   {
      $Course = DB::table('courses')
         ->join('teachers', 'courses.teacher_id', 'teachers.id')
         ->select('courses.*', 'teachers.teacher_name')
         ->get();

      return view('admin.course.manage-course', [
         'courses' => $Course
      ]);
   }

   public function editCourse($id)
   {
      return view('admin.course.edit-course', [
         'course' => Course::find($id)
      ]);
   }

   public function updateCourse(Request $request)
   {

      $course = Course::find($request->course_id);
      $course->course_name = $request->course_name;
      $course->slug = $this->makeSlug($request);
      $course->course_code = $request->course_code;
      $course->description = $request->description;
      $course->course_fee = $request->course_fee;
      if ($request->file('image')) {
         if ($course->image) {
            unlink($course->image);
         }
         // else{
         // }
         $course->image = $this->saveImage($request);
      }
      $course->save();
      return redirect('/manage-course')->with('message', 'Update Successfully');
   }

   public function deleteCourse(Request $request)
   {
      $course = Course::find($request->course_id);
      if ($course->image) {
         unlink($course->image);
      }
      $course->delete();
      return back()->with('message', 'Delete success');
   }

   public function manageApplicant()
   {
      $applicants = DB::table('admissions')
         ->join('students', 'admissions.student_id', 'students.id')
         ->join('courses', 'admissions.course_id', 'courses.id')
         ->select(
            'students.name',
            'students.email',
            'students.phone',
            'courses.course_name',
            'courses.course_code',
            'courses.course_fee',
            'admissions.confirmation',
            'admissions.id'
         )
         ->get();

      //   return  $applicants;
      return view('admin.teacher.manage-applicant', [
         'applicants' => $applicants
      ]);
   }
}