<?php

namespace App\Http\Controllers;

use session;
use App\Models\Term;
use App\Models\AcademicSession;
use App\Models\Class_arm;
use App\Models\Classes;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Services\StudentCreationService;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $service;
    public function __construct(StudentCreationService $service){
        $this->service = $service;
    }



    public function index()
    {
        //
        $students = Student::with(['classes', 'class_arm', 'term', 'academicsessions'])->get();
     
        return view('students.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        //
        $classes = \App\Models\Classes::all();
        $class_arms = \App\Models\Class_arm::all();
        $terms = Term::all();
        $academic_sessions = AcademicSession::all();


        return view('students.create', compact('classes', 'class_arms', 'terms', 'academic_sessions'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //createStudent
        $validated = $request->validated();
        $student = $this->service->createStudent($validated);
        
        return back()->with("success", "Student created with admission no" . $student->admission_no);



    }



public function excelUpload(){
    //
        $classes = \App\Models\Classes::all();
        $class_arms = \App\Models\Class_arm::all();
        $terms = Term::all();
        $academic_sessions = AcademicSession::all();


        return view('students.excelUpload', compact('classes', 'class_arms', 'terms', 'academic_sessions'));
        
}



    

public function import(Request $request)
{
    // dump($request->file);
    // die;
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv',
        'class_id' => 'required|integer|exists:classes,id',
        'class_arm_id' => 'required|integer|exists:class_arms,id',
        'term_id' => 'required|integer|exists:terms,id',
        'academic_sessions_id' => 'required|integer|exists:academic_sessions,id',
    ]);

    Excel::import(
        new StudentsImport(
            $request->class_id,
            $request->class_arm_id,
            $request->term_id,
            $request->academic_sessions_id
        ),
        $request->file('file')
    );



    return back()->with('success', 'Students imported successfully!');
}








    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        
        $student->load(['classes', 'class_arm','term', 'academicsessions']);
        
        return view('students.show', compact('student'));

    }

    public function deactivate($id){
        $student = Student::find($id);
        if(!$student){
            abort(404);
        }
        $student->update(['status' => 0]);

        return back()->with('success', 'Student deactivated successfully');


    }

    public function activate($id){
        $student = Student::find($id);
        if(!$student){
            abort(404);
        }
        $student->update(['status' => 1]);

        return back()->with('success', 'Student activated successfully');


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
         $classes = \App\Models\Classes::all();
        $class_arms = \App\Models\Class_arm::all();
        $terms = Term::all();
        $academic_sessions = AcademicSession::all();
        
        $student->load(['classes', 'class_arm','term', 'academicsessions']);
        return view('students.edit', compact('student', 'classes', 'class_arms', 'terms', 'academic_sessions'));



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //

        $validated = $request->validated();
        // DB::transaction(function() use($validated, $student){
            $student->update($validated);

        // });

        return back()->with('success', 'Student updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
