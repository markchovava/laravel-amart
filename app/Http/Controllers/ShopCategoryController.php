<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShopCategoryResource;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopCategoryController extends Controller
{
    
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new ShopCategory();
        $data->user_id = $user_id;
        $data->shop_id = $request->shop_id;
        $data->category_id = $request->category_id;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();

        return response()->json([
            'message' => 'Saved Successfully.',
        ]);
    }


    public function storeAll(Request $request){
        if($request->shop_categories) {
            $shop_categories = $request->shop_categories;
            foreach ($shop_categories as $item) {
                $data = new ShopCategory();
                $data->user_id = Auth::user()->id;
                $data->shop_id = $item['shop_id'];
                $data->category_id = $item['category_id'];
                $data->created_at = now();
                $data->updated_at = now();
                $data->save();
            } 
        }
        return response()->json([
            'message' => 'Saved Successfully.',
        ]);
    }

    public function indexByShopId($id){
        $data = ShopCategory::with(['shop', 'category', 'user'])
                ->where('shop_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        if(!isset($data)){
            return response()->json([
                'status' => 0,
                'message' => 'No Data available.',
                'data' => [],
            ]);
        } else{
            return response()->json([
                'status' => 1,
                'data' => ShopCategoryResource::collection($data),
            ]);
        }
    }
    
    public function delete($id){
        $data = ShopCategory::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }

}
