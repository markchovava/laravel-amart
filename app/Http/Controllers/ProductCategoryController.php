<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCategoryResource;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    public function store(Request $request){
        $productCategory = ProductCategory::where('product_id', $request->product_id)
                    ->where('category_id', $request->category_id)
                    ->first();
        if(isset($productCategory)){
            return response()->json([
                'status' => 0,
                'message' => 'Category has already been added, add a different one.'
            ]);
        }
        $data = new ProductCategory();
        $data->user_id = Auth::user()->id;
        $data->product_id = $request->product_id;
        $data->category_id = $request->category_id;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved Successfully.',
        ]);
    }

    public function indexByProductId($id){
        $data = ProductCategory::with(['product', 'category', 'user'])
                ->where('product_id', $id)
                ->orderBy('updated_at', 'desc')
                ->get();
        if(!isset($data)){
            return response()->json([
                'status' => 0,
                'message' => 'No Data available.',
                'data' => [],
            ]);
        }
        return response()->json([
            'status' => 1,
            'data' => ProductCategoryResource::collection($data),
        ]);
    }
    
    public function delete($id){
        $data = ProductCategory::find($id);
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted Successfully.',
        ]);
    }
}
