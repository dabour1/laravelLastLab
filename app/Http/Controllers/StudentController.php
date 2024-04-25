<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Storage;

use App\Models\Student;


class StudentController extends Controller
{
    function index () {

        $students = Student::paginate(10);  
        return view('students', compact('students'));
    
    }
    function create () {
        return view('addstudents');
    }


    function store (StoreStudentRequest $request) {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            // $imagePath = $request->file('image')->store('post_images');
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $imageName);
            $validatedData['image'] =  $imageName;

            // Storage::disk('local')->put($imageName, 'Contents');


        }

    Student::create($validatedData);
        return redirect("/students ") ;
    }
    function edit ($id) {
        $student = Student::findOrFail($id);

        return view('editstudents',["student"=>$student]);
         
    }
    function update (StoreStudentRequest $request, Student $student) {

        $validatedData = $request->validated();

         
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('storage'), $imageName);
                if ($student->image && file_exists(public_path('storage/' . $student->image))) {
                    unlink(public_path('storage/' . $student->image));
                }
             
            $validatedData['image'] = $imageName;
        }
    
        $student->update($validatedData);
 
        return redirect("/students") ;
    }

    function destroy ($id) {
        $student = Student::findOrFail($id);
        if ($student->image) {
            $imagePath = public_path('storage/' . $student->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $student->delete();
        return redirect("/students?fromdelete") ;
    }

    function show ($id) {
        $studentId = Student::findOrFail($id);

        $student = array(
            "id"=>1,
            "name"=>"ahmed",
            "address"=>"tanta",
            "age"=>22 
             
        );
        return view('show',["student"=>$student]);
    }
}


 