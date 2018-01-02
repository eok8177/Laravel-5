<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\User;


class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', ['users' => User::all()]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request, User $user)
    {
        $user = $user->create($request->all());

        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => Rule::unique('users')->ignore($user->id),
            'email' => Rule::unique('users')->ignore($user->id),
        ]);

        $data = $request->all();

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.user.edit', ['id' => $user->id])->with('success', 'User updated');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return 'success';
    }
}
