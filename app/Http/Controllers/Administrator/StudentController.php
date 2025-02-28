<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        return view('administrator.pages.student.all');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.pages.student.create');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data = Classroom::find($id)->name;

        return view('administrator.pages.student.index',[
            'data' => $data,
            'id' => $id,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, string $studentId)
    {
        $classroomId = Classroom::findOrFail($id);
        $studentId = Student::findOrFail($studentId);

        return view('administrator.pages.student.detail', compact('classroomId', 'studentId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $studentId)
    {
        $classroomId = Classroom::findOrFail($id);
        $studentId = Student::findOrFail($studentId);

        return view('administrator.pages.student.edit', compact('classroomId', 'studentId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
