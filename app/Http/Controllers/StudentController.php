<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view("students.index", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "string|required",
            "student_id" => "integer|digits:8"
        ]);
        $Student = Student::create([
            "name" => $request->name,
            "student_id" => $request->student_id,
        ]);
        return redirect()->route("student.index")->with("success", "Student added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specifFreied resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view("students.edit", compact("student"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "string|required",
            "student_id" => "required|digits:8"
        ]);
        Student::findOrFail($id)->update($request->all());
        return redirect()->route("student.index")->with("success", "Student  editted successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route("Student.index")->with("success", "Student deleted");
    }
}
