<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->password =  Hash::make($request->input('password'));
        if ($request->hasFile('photoProfile')){
            $user->photo_profile = Storage::url($request->file('photoProfile')
                ->store('public/photoProfiles')
            );
        }
        $user->assignRole('user');
        $user->save();
        return response([
            'message'=>'Success Register'
        ], 200);
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email','password'))){
            return response([
                'message'=>'invalid credentials!'
            ], 404);
        }
        $user =Auth::user();
        $token = $user->createToken('token')->plainTextToken;

        return (new UserResource($user))->additional([
            'token'=>$token,
            'msg'=>[
                'summary' => 'Login success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message'=>'Success logout'
        ]);
    }
}
