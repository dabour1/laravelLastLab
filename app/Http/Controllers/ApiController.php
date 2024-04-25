<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\StudentResource;

use App\Models\Student;

class ApiController extends Controller
{
    function index () {

        // $posts = Post::with('user')->get();

        return StudentResource::collection(Student::all());
        
    
    }
    function store (StoreStudentRequest $request) {
        $validatedData = $request->validated();
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $imageName);
            $validatedData['image'] =  $imageName;
     Student::create($validatedData);
    return Student::create($validatedData);
    }
    
    function update (StoreStudentRequest $request, Student $student) {
        // $student = Student::find($id);

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
 
        return  $student->update($validatedData);
    }

    function destroy (Student $student) {
       
        if ($student->image) {
            $imagePath = public_path('storage/' . $student->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $student->delete();
        return 'DeletedDone' ;
    }

    function show (Student $student) {
        return new StudentResource($student);
    }
}
