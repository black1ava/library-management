<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentPostRequest;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{

    public function __construct(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentPostRequest $request)
    {
        $req = $request->except('_token');

        $student = new Student();
        $student->name = $req['name'];
        $student->gender = $req['gender'];
        $student->dob = $req['dob'];
        $student->pob =  $req['pob'];
        $student->address = $req['address'];
        $student->phone = $req['phone'];
        $student->email = $req['email'];

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $path = public_path('/images');

            if(!File::isDirectory($path)){

                File::makeDirectory($path, 0777, true, true);
        
            }

           $file = time().'.'.$request->file('photo')->getClientOriginalExtension();
           $request->file('photo')->move(public_path('/images'), $file);
           $student->photo = $file;  
        }

        $student->save();

        return redirect()->route('student.index')->with('message', 'Add a new student successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentPostRequest $request, Student $student)
    {
        $req = $request->except('_token');

        $student->name = $req['name'];
        $student->gender = $req['gender'];
        $student->dob = $req['dob'];
        $student->pob =  $req['pob'];
        $student->address = $req['address'];
        $student->phone = $req['phone'];
        $student->email = $req['email'];

        if($request->hasFile('photo') && $request->file('photo')->isValid()){

            $photo = $student->photo;
            if($photo !== null){
                unlink(public_path('images/'.$photo));
            }

            $file = time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/images'), $file);
            $student->photo = $file; 
         }
 

        $student->save();

        return redirect()->route('student.index')->with('message', 'Update a student successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $photo = $student->photo;

        unlink(public_path('images/'.$photo));
        $student->delete();

        return redirect()->route('student.index')->with('message', 'Delete a student successfully');
    }
}
