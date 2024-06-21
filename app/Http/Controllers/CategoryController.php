<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public $upload_location = 'assets/img/category/';


    public function indexAll(){
        $data = Category::orderBy('name', 'asc')->get();
        return CategoryResource::collection($data);
    }

    public function indexCategoryProducts($id){
        $productIds = ProductCategory::where('category_id', $id)->pluck('product_id');
        $data = Product::with(['product_images', 'brand'])
                    ->whereIn('id', $productIds)
                    ->orderBy('priority', 'asc')
                    ->paginate(12);
        return ProductResource::collection($data);
    }
    
    public function indexBySlug(Request $request){
        if(!empty($request->slug)){
            $category = Category::where('slug', $request->slug)->first();
            $productIds = ProductCategory::where('category_id', $category->id)->pluck('product_id');
            $data = Product::with(['product_images', 'brand'])
                        ->whereIn('id', $productIds)
                        ->orderBy('priority', 'asc')
                        ->paginate(12);

            return ProductResource::collection($data);
        }
    }

    public function viewBySlug(Request $request){
        if(!empty($request->slug)){
            $category = Category::where('slug', $request->slug)->first();
            return response()->json([
                'data' => new CategoryResource($category),
            ]);
        }
    }

    public function indexFeatured(){
        $category = Category::where('slug', 'featured')->first();
        $productIds = ProductCategory::where('category_id', $category->id)->pluck('product_id');
        $data = Product::with(['product_images', 'brand'])
                    ->whereIn('id', $productIds)
                    ->orderBy('priority', 'asc')
                    ->paginate(8);
        return response()->json([
            'data' => ProductResource::collection($data),
            'category' => new CategoryResource($category),
        ]);
    }

    public function indexFeatured4(){
        $category = Category::where('slug', 'featured')->first();
        $productIds = ProductCategory::where('category_id', $category->id)->pluck('product_id');
        $data = Product::with(['product_images', 'brand'])
                    ->whereIn('id', $productIds)
                    ->orderBy('priority', 'asc')
                    ->paginate(4);
        return response()->json([
            'data' => ProductResource::collection($data),
            'category' => new CategoryResource($category),
        ]);
    }


    public function indexTopSelling(){
        $category = Category::where('slug', 'top-selling')->first();
        $productIds = ProductCategory::where('category_id', $category->id)->pluck('product_id');
        $data = Product::with(['product_images', 'brand'])
                    ->whereIn('id', $productIds)
                    ->orderBy('priority', 'asc')
                    ->paginate(8);
        return response()->json([
            'data' => ProductResource::collection($data),
            'category' => new CategoryResource($category),
        ]);
    }


    public function index(Request $request){
        $data = Category::with(['user'])->where('name', 'LIKE', '%' . $request->search . '%')->paginate(12);
        if(isset($data)){
            return CategoryResource::collection($data);
        } else{
            $data = Category::with(['user'])->orderBy('name', 'desc')->paginate(12);
            return CategoryResource::collection($data);
        }
    }

    public function view($id){
        $data = Category::with(['user'])->find($id);
        return new CategoryResource($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Category();
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->user_id = $user_id;
        $data->description = $request->description;
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'cat_' . date('Ymd') . rand(0, 10000) .  '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->image = $this->upload_location . $image_name;                        
        }
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'message' => 'Saved Successfully',
            'data' => new CategoryResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Category::find($id);
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->user_id = $user_id;
        $data->description = $request->description;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'cat_' . date('Ymd') . rand(0, 10000) .  '.' . $image_extension;
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
            'message' => 'Saved Successfully',
            'data' => new CategoryResource($data),
        ]);
    }

    public function delete($id){
        $data = Category::find($id);
        if(isset($data->image)){
            if(file_exists( public_path($data->image) )){
                unlink($data->image);
            }
        }
        $data->delete();
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);

    }



   
   

    

}
