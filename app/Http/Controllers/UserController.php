<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::orderby('id','desc')->get(); -->versi 1
        // $users = User::latest()->get(); --> versi 2
        // versi 3 -->
        $users = User::with('roles')->orderByDesc('id')->get();
        $title = "User Management";
        $deleteTitle = 'Delete User';
        $deleteText = 'Are you sure to delete this user?';
        confirmDelete($deleteTitle, $deleteText);
        return view('user.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New User";
        $roles = Role::all();
        return view('user.create', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert into user () values ()
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',

        ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $user->roles()->sync($request->role_ids);

            DB::commit();
            toast('Create user success', 'success');
            return redirect()->to('user');
        } catch (\Throwable $th) {
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
        $title = "Edit User";
        // $edit = User::find($id); // blank
        $edit = User::findOrFail($id); // akan muncul 404
        $roles = Role::get();
        return view('user.edit', compact('title', 'edit', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            // jika user memasukan password
            if (filled($request->password)) {
                $data['password'] = $request->password;
            }


            $user = User::find($id);
            $user->save($data);
            $user->roles()->sync($request->role_ids);
            DB::commit();
            Alert::success('Success!', 'Data success update.');
            return redirect()->to('user');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Fail', 'Update Failed!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        Alert::success('Success!', 'Delete user success');
        return redirect()->to('user');
    }
}
