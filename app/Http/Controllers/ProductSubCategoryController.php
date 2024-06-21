<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductSubCategoryResource;
use App\Http\Resources\SubCategoryResource;
use App\Models\Product;
use App\Models\ProductSubCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductSubCategoryController extends Controller
{
    public function store(Request $request){
        $productSubCategory = ProductSubCategory::where('product_id', $request->product_id)
                    ->where('sub_category_id', $request->sub_category_id)
                    ->first();
        if(isset($productSubCategory)){
            return response()->json([
                'status' => 0,
                'message' => 'Category has already been added, add a different one.'
            ]);
        }
        $data = new ProductSubCategory();
        $data->user_id = Auth::user()->id;
        $data->product_id = $request->product_id;
        $data->sub_category_id = $request->sub_category_id;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved Successfully.',
        ]);
    }

    public function subCategoriesByProductId($id) {
        $data = ProductSubCategory::with(['product', 'sub_category'])->where('product_id', $id)->get();
        return ProductSubCategoryResource::collection($data);
    }

    public function delete($id){
        $data = ProductSubCategory::find($id);
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted Successfully.',
        ]);
    }
}
