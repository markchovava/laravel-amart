<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartItemResource;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{

    public function generateRandomText($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($characters);
        return substr($shuffled, 0, $length);
    }


    public function cartSession(Request $request){
        $data = Cart::with(['cart_items'])->where('cart_session', $request->cart_session)->first();
        if(!isset($data)){
            return response()->json([
                'message' => 'Cart is empty.',
                'data' => [],
            ]);
        }
        return new CartResource($data);
    }

    public function view(Request $request){
        $cart = Cart::with(['cart_items'])->where('cart_session', $request->cart_session)->first();
        if(isset($cart)){
            $items = CartItem::where('cart_id', $cart->id)->get();
            if(isset($items)){
                return response()->json([
                    'cart' => new CartResource($cart),
                    'items' => CartItemResource::collection($items)
                ]);
            }
        }
        return response()->json([
            'message' => 'No data available.',
            'cart' => [],
            'items' => []
        ]);

    }

    public function store(Request $request){
        $cart = Cart::where('cart_session', $request->cart_session)->first();
        if(isset($cart)){
            $item = CartItem::where('product_id', $request->product_id)->first();
            if(isset($item)){
                Log::info('Cart Item is there');
                Log::info((int)$request->quantity);
                $item->price = (int)$request->price;
                $item->quantity += (int)$request->quantity;
                $item->total = $item->price * $item->quantity;
                $item->save();
            } else{
                $item = new CartItem();
                $item->cart_id = $cart->id;
                $item->product_id = $request->product_id;
                $item->name = $request->name;
                $item->image = $request->image;
                $item->price = (int)$request->price;
                $item->quantity = (int)$request->quantity;
                $item->total = $item->price * $item->quantity;
                $item->save();
            }
            /* CART */
            $cart->ip_address = $request->ip();
            $cart->quantity += $request->quantity;
            $cart->total += $item->total;
            $cart->save();
            return response()->json([
                'message' => 'Added to Cart Successfully.',
                'data' => new CartResource($cart),
            ]);
        } else{
            /* CART */
            $cart = new Cart();
            $cart->cart_session = $this->generateRandomText();
            $cart->ip_address = $request->ip();
            $cart->quantity = (int)$request->quantity;
            $cart->total = (int)$request->price * (int)$request->quantity;
            $cart->save();
            /* CART ITEMS */
            $item = new CartItem();
            $item->cart_id = $cart->id;
            $item->product_id = $request->product_id;
            $item->name = $request->name;
            $item->image = $request->image;
            $item->price = (int)$request->price;
            $item->quantity = (int)$request->quantity;
            $item->total = $item->price * $item->quantity;
            $item->save();
            /*  */
            return response()->json([
                'message' => 'Added to Cart Successfully.',
                'data' => new CartResource($cart),
            ]);
        }
            
    }

    public function update(Request $request, $id){
        CartItem::where('cart_id', $id)->delete();
        $cart = Cart::find($id);
        $cart->quantity = $request->quantity;
        $cart->total = $request->total;
        $cart->save();
        for($i = 0; $i < count($request->items); $i++){
            $item = new CartItem();
            $item->cart_id = $id;
            $item->product_id = $request->items[$i]['product_id'];
            $item->name = $request->items[$i]['name'];
            $item->image = $request->items[$i]['image'];
            $item->price = $request->items[$i]['price'];
            $item->quantity = $request->items[$i]['quantity'];
            $item->total = (int)$request->items[$i]['quantity'] * (int)$request->items[$i]['price'];
            $item->save();
        }

        return response()->json([
            'message' => 'Cart updated successfully',
            'data' => new CartResource($cart),
        ]);
    }


}
