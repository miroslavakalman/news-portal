<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = NewUser::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'login' => 'required|unique:new_users',
            'email' => 'required|email|unique:new_users',
            'password' => 'required|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        NewUser::create($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно создан.');
    }

    public function edit(NewUser $newUser)
    {
        return view('admin.users.edit', compact('newUser'));
    }

    public function update(Request $request, NewUser $newUser)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'login' => ['required', Rule::unique('new_users')->ignore($newUser->id)],
            'email' => ['required', 'email', Rule::unique('new_users')->ignore($newUser->id)],
            'password' => 'nullable|confirmed',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $newUser->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно обновлен.');
    }

    public function destroy(NewUser $newUser)
    {
        $newUser->delete();
        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно удален.');
    }
}
