<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Manajemen User - PPKD Sticker';
        $users = User::orderBy('id', 'desc')->get(); // select * from user order by id desc

        return view('admin.user.index', compact('title', 'users'));
    }

    public function create()
    {
        $title = 'Tambah User - PPKD Sticker';

        return view('admin.user.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return redirect()->route('admin.user.index')
            ->with('success', 'Data User Berhasil Dibuat!');

    }

    public function edit(User $user)
    {
        $title = 'Edit User - PPKD Sticker';

        return view('admin.user.edit', compact('user', 'title'));
    }

    public function show(string $id) {}

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|min:8',
        ]);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if ($request->filled('password')) {
            $user->password = $validated['password'];
        }
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Data user Berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('admin.user.index');
    }
}
