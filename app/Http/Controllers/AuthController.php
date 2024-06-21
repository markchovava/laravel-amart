<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request){
        $email = User::where('email', $request->email)->first();
        if(isset($email)){
            return response()->json([
                'message' => 'Email is aleady taken, please try another one.',
                'status' => 0,
            ]);
        }
        $data = new User();
        $data->email = $request->email;
        $data->code = $request->password;
        $data->password = Hash::make($request->password);
        $data->role_level = 1;
        $data->save();
        return response()->json([
            'message' => 'Created Successfully.',
            'data' => new UserResource($data),
        ]);
    }

    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        /* Check Email... */
        if(!isset($user)){
            return response()->json([
                'message' => 'Email was not found.',
                'status' => 0,
            ]);
        }
        /* Check Password... */
        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'The password is incorrect.',
                'status' => 1,
            ]);
        }

        return response()->json([
            'status' => 2,
            'message' => 'Login Successful.',
            'auth_token' => $user->createToken($user->email)->plainTextToken,
            'role_level' => $user->role_level,
        ]);
    }

    public function password(Request $request){
        $user_id = Auth::user()->id;
        $data = User::find($user_id);
        $data->code = $request->password;
        $data->password = Hash::make($request->password);
        $data->save();
        return response()->json([
            'message' => 'Password updated successfully.',
            'data' => new UserResource($data),
        ]);
    }

    public function view(){
        $user_id = Auth::user()->id;
        $data = User::find($user_id);
        return response()->json([
            'data' => new UserResource($data),
        ]);
    }

    public function update(Request $request){
        $user_id = Auth::user()->id;
        $data = User::find($user_id);
        $data->name = $request->fname . ' ' . $request->lname;
        $data->dob = $request->dob;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->save();
        return response()->json([
            'message' => 'Profile updated successfully.',
            'data' => new UserResource($data),
        ]);
    }

    public function emailUpdate(Request $request){
        $user_id = Auth::user()->id;
        $email = User::where('email', $request->email)->first();
        if(isset($email)){
            return response()->json([
                'status' => 0,
                'message' => 'Email already exists, try another one.',
            ]);
        } else {
            $data = User::find($user_id);
            $data->email = $request->email;
            $data->save();
            return response()->json([
                'status' => 1,
                'message' => 'Email updated successfully.',
            ]);
        }
    }


    public function logout(){
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Log out succesfully.',
        ]);
    }


}
