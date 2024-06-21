<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public $upload_location = 'assets/img/sub_category/';

    public function indexAll(){
        $data = SubCategory::orderBy('name', 'asc')->get();
        return SubCategoryResource::collection($data);
    }

    public function subCategoryByCategoryId($id){
        $data = SubCategory::where('category_id', $id)->get();
        return SubCategoryResource::collection($data);
    }

    public function index(Request $request){
        if(!empty($request->search)){
            $data = SubCategory::with(['user', 'category'])->where('name', 'LIKE', '%' . $request->search . '%')->paginate(12);
            return SubCategoryResource::collection($data);
        }
        $data = SubCategory::with(['user', 'category'])->orderBy('updated_at', 'desc')->paginate(12);
        return SubCategoryResource::collection($data);
    }

    public function view($id){
        $data = SubCategory::with(['user', 'category'])->find($id);
        return new SubCategoryResource($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new SubCategory();
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->category_id = $request->category_id;
        $data->slug = $request->slug;
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'sub_' . date('Ymd') . rand(0, 10000) .  '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->image = $this->upload_location . $image_name;                        
        }
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new SubCategoryResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = SubCategory::find($id);
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->slug = $request->slug;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'shop_' . date('Ymd') . rand(0, 10000) .  '.' . $image_extension;
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
            'message' => 'Saved Successfully.',
            'data' => new SubCategoryResource($data),
        ]);
    }

    public function delete($id){
        $data = SubCategory::find($id);
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
