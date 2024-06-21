<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShopResource;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    
    public $upload_location = 'assets/img/shop/';

    public function indexAll(){    
        $data = Shop::with(['user'])->orderBy('name', 'desc')->get();
        return ShopResource::collection($data);
    }
    
    public function index(Request $request){
        $data = Shop::with(['user', 'categories'])->where('name', 'LIKE', '%' . $request->search . '%')->paginate(12);
        if(isset($data)){
            return ShopResource::collection($data);
        } else{
            $data = Shop::with(['user'])->orderBy('name', 'desc')->paginate(12);
            return ShopResource::collection($data);
        }
    }

    public function view($id){
        $data = Shop::with(['user', 'categories'])->find($id);
        return new ShopResource($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Shop();
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->address = $request->address;
        $data->facebook = $request->facebook;
        $data->whatsapp = $request->whatsapp;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->instagram = $request->instagram;
        $data->website = $request->website;
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'shop_' . date('Ymd') . rand(0, 10000) .  '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->image = $this->upload_location . $image_name;                        
        }
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'message' => 'Saved Successfully',
            'data' => new ShopResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Shop::find($id);
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->address = $request->address;
        $data->facebook = $request->facebook;
        $data->whatsapp = $request->whatsapp;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->instagram = $request->instagram;
        $data->website = $request->website;
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
            'message' => 'Saved Successfully',
            'data' => new ShopResource($data),
        ]);
    }

    public function delete($id){
        $data = Shop::find($id);
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
