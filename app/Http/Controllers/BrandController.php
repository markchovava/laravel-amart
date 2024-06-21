<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public $upload_location = 'assets/img/brand/';

    public function index(Request $request){
        $data = Brand::with(['user'])->where('name', 'LIKE', '%'. $request->search . '%' )->paginate(12);
        if(isset($data)){
            return BrandResource::collection($data);
        } else{
            $data = Brand::with(['user'])->orderBy('name', 'asc')->paginate(12);
            return BrandResource::collection($data);
        }
    }

    public function indexAll(){
            $data = Brand::with(['user'])->orderBy('name', 'asc')->get();
            return BrandResource::collection($data);
     
    }

    public function brandProducts($id){
        $data = Product::with(['product_images'])->where('brand_id', $id)->paginate(12);
        return ProductResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Brand();
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->slug = $request->slug;
        $data->created_at = now();
        $data->updated_at = now();
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'brand_' . date("Ydh") . rand(0, 1000) . '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->image = $this->upload_location . $image_name;                        
        }
        $data->save();
        return response()->json([
            'data' => new BrandResource($data),
            'message' => 'Saved Successfully.',
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Brand::find($id);
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->slug = $request->slug;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'brand_' . date("Ydh") . rand(0, 1000) . '.' . $image_extension;
            if(!empty($data->image)){
                if(file_exists( public_path($data->image) )){
                    unlink($data->image);
                }
                $image->move($this->upload_location, $image_name);
                $data->image = $this->upload_location . $image_name;                    
            }else{
                $image->move($this->upload_location, $image_name);
                $data->image = $this->upload_location . $image_name;
            }           
        }
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'data' => new BrandResource($data),
            'message' => 'Saved Successfully.',
        ]);
    }

    public function view($id){
        $data = Brand::with(['user'])->find($id);
        return  new BrandResource($data);
    }

    public function delete($id){
        $data = Brand::find($id);
        if(isset($data->image)){
            if(file_exists( public_path($data->image) )){
                unlink($data->image);
            }
        }
        $data->delete();
        return  response()->json([
            'message' => 'Deleted successfully.'
        ]);
    }


}
