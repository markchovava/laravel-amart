<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public $upload_location = 'assets/img/product/';

    public function index(Request $request){
        $data = Product::with(['user', 'brand', 'categories', 'product_images'])
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->paginate(12);
        if(isset($data)){
            return ProductResource::collection($data);
        } else {
            $data = Product::with(['user', 'brand', 'categories', 'product_images'])
                    ->orderBy('updated_at', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->orderBy('name', 'asc')
                    ->paginate(12);
            return ProductResource::collection($data);
        }
    }
    
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Product();
        $data->user_id = $user_id;
        $data->brand_id = (int)$request->brand_id;
        $data->name = $request->name;
        $data->condition = $request->condition;
        $data->priority = (int)$request->priority;
        $data->shop_id = $request->shop_id;
        $data->price = (int)$request->price;
        $data->code = $request->code;
        $data->source = $request->source;
        $data->description = $request->description;
        $data->quantity = (int)$request->quantity;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        /*  */
        if(!empty($request->file('product_images'))){
            $product_images = $request->file('product_images');
            for($i = 0; $i < count($product_images); $i++){
                $item = new ProductImage();
                $item->product_id = $data->id;
                $item->user_id = $user_id;
                if( isset($product_images[$i]) ) {
                    $image = $product_images[$i];
                    $image_extension = strtolower($image->getClientOriginalExtension());
                    $image_name = 'product_' . date('Ymh') . rand(0, 10000) . '.' . $image_extension;
                    $image->move($this->upload_location, $image_name);
                    $item->image = $this->upload_location . $image_name;                        
                }
                $item->save();
            }
        }
        return response()->json([
            'status' => 1,
            'message' => 'Product Saved Successfully.',
            'data' => new ProductResource($data),
        ]);
 
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Product::find($id);
        $data->user_id = $user_id;
        $data->brand_id = (int)$request->brand_id;
        $data->name = $request->name;
        $data->condition = $request->condition;
        $data->priority = (int)$request->priority;
        $data->shop_id = $request->shop_id;
        $data->price = (int)$request->price;
        $data->code = $request->code;
        $data->source = $request->source;
        $data->description = $request->description;
        $data->quantity = (int)$request->quantity;
        $data->updated_at = now();
        $data->save();
        /*  */
        if(!empty($request->file('product_images'))){
            $product_images = $request->file('product_images');
            for($i = 0; $i < count($product_images); $i++){
                $item = new ProductImage();
                $item->product_id = $data->id;
                $item->user_id = $user_id;
                if( isset($product_images[$i]) ) {
                    $image = $product_images[$i];
                    $image_extension = strtolower($image->getClientOriginalExtension());
                    $image_name = 'product_' . date('Ymh') . rand(0, 10000) . '.' . $image_extension;
                    $image->move($this->upload_location, $image_name);
                    $item->image = $this->upload_location . $image_name;                        
                }
                $item->save();
            }
        }

        return response()->json([
            'status' => 1,
            'message' => 'Products Saved Successfully.',
            'data' => new ProductResource($data),
        ]);

    }

    public function view($id){
        $data = Product::with(['user', 'shop', 'brand', 'categories', 'sub_categories', 'product_specs', 'product_variations', 'product_images'])
                ->find($id);
        return new ProductResource($data);
    }

    public function delete($id){
        $product_images = ProductImage::where('product_id', $id)->get();
        for($i = 0; $i < count($product_images); $i++){
            if(file_exists( public_path($product_images[$i]['image']) )){
                unlink($product_images[$i]['image']);
            }
        }
        ProductImage::where('product_id', $id)->delete();
        $data = Product::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Deleted successfully.'
        ]);
    }
    
}
