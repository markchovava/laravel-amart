<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function delete($id){
        $item = CartItem::find($id);
        $cart = Cart::where('id', $item->cart_id)->first();
        $cart->quantity -= $item->quantity; 
        $cart->total -= $item->total;
        $cart->save();
        $item->delete();
        response()->json([
            'message' => 'Deleted successfully.'
        ]); 
    }
}
