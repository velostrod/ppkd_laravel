<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::orderby('id','desc')->get(); -->versi 1
        // $users = User::latest()->get(); --> versi 2
        // versi 3 -->
        $majors = Majors::orderByDesc('id')->get();
        $title = "Major Management";
        return view('major.index', compact('majors', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Major";
        return view('major.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert into user () values ()
        $validate = $request->validate([
            'name' => 'required',
            'is_active' => 'required',

        ]);
        Majors::create($request->all());
        // Alert::success('Success!', 'Create user success');
        toast('Create major Success', 'success');
        return redirect()->to('major');
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
        $title = "Edit Major";
        // $edit = User::find($id); // blank
        $edit = Majors::findOrFail($id); // akan muncul 404
        return view('major.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'is_active' => $request->is_active,
        ];
        // jika user memasukan password

        Majors::find($id)->update($data);
        return redirect()->to('major');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Majors::find($id)->delete();
        return redirect()->to('major');
    }
}
