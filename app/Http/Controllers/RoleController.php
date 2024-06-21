<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{


    public function index(Request $request){
        if(!empty($request->search)){
            $data = Role::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(12);
            return RoleResource::collection($data);
        }
        $data = Role::with(['user'])
                ->orderBy('level', 'asc')
                ->paginate(12);
        return RoleResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Role();
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->level = $request->level;
        $data->save();
        return response()->json([
            'message' => 'Saved successfully.',
            'data' => new RoleResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Role::find($id);
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->level = $request->level;
        $data->save();
        return response()->json([
            'message' => 'Saved successfully.',
            'data' => new RoleResource($data),
        ]);
    }

    public function view($id){
        $data = Role::with(['user'])->find($id);
        return new RoleResource($data);
    }

    public function delete($id){
        $data = Role::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Deleted successfully.',
        ]);
    }


}
