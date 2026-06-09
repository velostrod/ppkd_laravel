<?php

namespace App\Http\Controllers;

use App\Models\Keys;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::orderby('id','desc')->get(); -->versi 1
        // $users = User::latest()->get(); --> versi 2
        // versi 3 -->
        $keys = Keys::orderByDesc('id')->get();
        $title = "Key Management";
        return view('key.index', compact('keys', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Key";
        return view('key.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert into user () values ()
        $validate = $request->validate([
            'name' => 'required|unique:keys,name',
            'is_active' => 'required',

        ]);
        Keys::create($request->all());
        // Alert::success('Success!', 'Create user success');
        toast('Create key Success', 'success');
        return redirect()->to('key');
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
        $title = "Edit Key";
        // $edit = User::find($id); // blank
        $edit = Keys::findOrFail($id); // akan muncul 404
        return view('key.edit', compact('title', 'edit'));
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

        Keys::find($id)->update($data);
        return redirect()->to('key');
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
