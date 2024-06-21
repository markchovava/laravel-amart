<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeliveryResource;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    
    public function index(Request $request){
        $data = Delivery::with(['user'])->where('name', 'LIKE', '%' . $request->search . '%')->paginate(12);
        if(isset($data)){
            return DeliveryResource::collection($data);
        } else{
            $data = Delivery::with(['user'])->orderBy('name', 'asc')->orderBy('created_at', 'desc')->paginate(12);
            return DeliveryResource::collection($data);
        }
    }

    public function indexAll(){
        $data = Delivery::orderBy('name', 'asc')->get();
        return DeliveryResource::collection($data);
    }

    public function view($id){
        $data = Delivery::with(['user'])->find($id);
        return new DeliveryResource($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Delivery();
        $data->name = $request->name;
        $data->user_id = $user_id;
        $data->price = $request->price;
        $data->save();
        return response()->json([
            'message' => 'Saved Successfully',
            'data' => new DeliveryResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Delivery::find($id);
        $data->name = $request->name;
        $data->user_id = $user_id;
        $data->price = $request->price;
        $data->save();
        return response()->json([
            'message' => 'Saved Successfully',
            'data' => new DeliveryResource($data),
        ]);
    }

    public function delete($id){
        $data = Delivery::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }

}
