<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDeliveryController extends Controller
{

    public function generateRandomText($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($characters);
        return substr($shuffled, 0, $length);
    }

    public function index(Request $request){
        $role = Role::where('slug', 'delivery')->first();
        $user_id = Auth::user()->id;
        if(!empty($request->search)) {
            $data = User::where('id', '!=', $user_id)
                    ->where('role_level', $role->level)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(12);
            return  UserResource::collection($data);
        } else{
            $data = User::where('id', '!=', $user_id)
                    ->where('role_level', $role->level)
                    ->orderBy('name', 'asc')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(12);
            return UserResource::collection($data);
        }
    }

    public function store(Request $request){
        $role = Role::where('slug', 'delivery')->first();
        $data = User::where('email', $request->email)->first();
        if(isset($data)){
            return response()->json([
                'status' => 0,
                'message' => 'Email already exists, try another one.',
            ]);
        } else{
            $data = new User();
            $data->role_level = $role->level;
            $data->fname = $request->fname;
            $data->lname = $request->lname;
            $data->name = $request->fname . ' ' . $request->lname;
            $data->email = $request->email;
            $data->gender = $request->gender;
            $data->dob = $request->dob;
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->code = $this->generateRandomText();
            $data->password = Hash::make($data->code);
            $data->save();
            return response()->json([
                'status' => 1,
                'message' => 'Saved successfully.',
                'data' => new UserResource($data),
            ]);
        }
    }

    public function view($id){
        $data = User::find($id);
        return  new UserResource($data);
    }

    public function update(Request $request, $id){
        $role = Role::where('slug', 'delivery')->first();
        $data = User::where('id', '!=', $id)
                    ->where('email', $request->email)
                    ->first();
        if(isset($data)){
            return response()->json([
                'status' => 0,
                'message' => 'Email is already taken, please try anaother one.',
            ]);
        }
        $data = User::find($id);
        $data->role_level = $role->level;
        $data->name = $request->fname . ' ' . $request->lname;
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->dob = $request->dob;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new UserResource($data),
        ]);
    }

    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }

    
}
