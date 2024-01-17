<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function edit(User $user): View
    {
        return view('userinfo.editar', compact('user'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
        ]);
    
        $user->update($request->all());
    
        return redirect()->route('dashboard')->with('status', 'Usuario actualizado correctamente');    
    }

    public function update_password(Request $request, User $user){
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
    
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);
    
        return back()->with('status', 'password-updated');
    }

    public function delete_user (User $user){
        $user->delete();

        return redirect()->route('dashboard')->with('status', 'Usuario eliminado correctamente');
    }

}
