<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\Majors;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;



class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::orderby('id','desc')->get(); -->versi 1
        // $users = User::latest()->get(); --> versi 2
        // versi 3 -->
        $title = "Instructor Management";
        $instructors = Instructor::with('major', 'user')->orderByDesc('id')->get();
        return view('instructor.index', compact('instructors', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Instructor";
        $majors = Majors::get();
        return view('instructor.create', compact('title', 'majors'));
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

        DB::beginTransaction();
        try {
            // insert usert
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            // insert students
            Instructor::create([
                'name' => $request->name,
                'user_id' => $user->id,
                'major_id' => $request->major_id,
                'phone' => $request->phone
            ]);
            // Alert::success('Success!', 'Create user success');
            DB::commit();
            toast('Success create stundent!', 'success');
            return redirect()->to('instructor');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Fail!', $th->getMessage());
            return back()->withInput();
        }
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
        $title = "Edit Instructor";
        // $edit = User::find($id); // blank
        $edit = Instructor::with('user')->findOrFail($id); // akan muncul 404
        $majors = Majors::get();
        return view('instructor.edit', compact('title', 'edit', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {

        DB::beginTransaction();
        try {
            $dataUser = [
                'name' => $request->name,
                'email' => $request->email
            ];

            $user = $instructor->user;
            // jika user ingin mengganti password
            if ($request->filled('password')) {
                $dataUser['password'] = $request->password;
            }

            $user->update($dataUser);
            $data = [
                'major_id' => $request->major_id,
                'name' => $request->name,
                'phone' => $request->phone,

            ];

            $instructor->update($data);
            DB::commit();
            toast('Success update!', 'success');
            return redirect()->to('instructor');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
            Alert::error('Fail!', $th->getMessage());
            return back()->withInput();
        }
        // jika user memasukan password

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        try {
            $instructor->user()->delete();
            toast('Success Delete!', 'success');
            return redirect()->to('instructor');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Fail!', $th->getMessage());
            return back();
        }
    }
}
