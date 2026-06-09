<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Majors;
use RealRashid\SweetAlert\Facades\Alert;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::orderby('id','desc')->get(); -->versi 1
        // $users = User::latest()->get(); --> versi 2
        // versi 3 -->
        $title = "Student Management";
        $students = Student::with('major')->orderByDesc('id')->get();
        return view('student.index', compact('students', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Student";
        $majors = Majors::get();
        return view('student.create', compact('title', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert into user () values ()
        $validate = $request->validate([
            'major_id' => 'required',
            'name' => 'required',
            'phone' => 'nullable'

        ]);
        Student::create($request->all());
        // Alert::success('Success!', 'Create user success');
        toast('Create student Success', 'success');
        return redirect()->to('student');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Student";
        // $edit = User::find($id); // blank
        $edit = Student::findOrFail($id); // akan muncul 404
        $majors = Majors::get();
        return view('student.edit', compact('title', 'edit', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'major_id' => $request->major_id,
            'name' => $request->name,
            'phone' => $request->phone
        ];
        // jika user memasukan password

        Student::find($id)->update($data);
        return redirect()->to('student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::find($id)->delete();
        return redirect()->to('student');
    }
}
