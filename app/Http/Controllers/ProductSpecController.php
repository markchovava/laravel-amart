<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductSpecResource;
use App\Models\ProductSpec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductSpecController extends Controller
{

    public function indexByProductId($id){
        $data = ProductSpec::with(['user', 'product'])
            ->where('product_id', $id)
            ->orderBy('updated_at', 'desc')->get();
        return ProductSpecResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new ProductSpec();
        $data->user_id = $user_id;
        $data->product_id = $request->product_id;
        $data->name = $request->name;
        $data->value = $request->value;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
        ]);
    }

    public function delete($id){
        ProductSpec::find($id)->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted successfully.'
        ]);
    }
}
