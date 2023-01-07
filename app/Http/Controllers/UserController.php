<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::find();
    }

    public function show(User $user)
    {

    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->photo_profile = $request->input('photoProfile');
        $user->password =  Hash::make($request->input('password'));
        $user->save();
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
