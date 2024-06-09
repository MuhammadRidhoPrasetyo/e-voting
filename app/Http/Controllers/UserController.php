<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::query()
                    ->toBase()
                    ->get(['id','name']);
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        $user = User::create($validated);
        $user->assignRole($validated['role_id']);
        return to_route('user.index')->with('toast_success','Siswa Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::query()
                    ->toBase()
                    ->get(['id','name']);
        return view('user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);
        if($request->has('role_id'))
        {
            $user->syncRoles($validated['role_id']);
        }

        return to_route('user.index')->with('toast_success','Data Siswa Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('toast_success','Siswa Berhasil Dihapus!');
    }
}
