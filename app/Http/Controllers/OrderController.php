<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeliveryOrderResource;
use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\DeliveryOrder;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    
    public function generateRandomText($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($characters);
        return substr($shuffled, 0, $length);
    }

    public function index(Request $request){
        if(!empty($request->search)){
            $data = Order::where('order_ref', $request->search)->paginate(12);
            return OrderResource::collection(($data));
        } else{
            $data = Order::with('user', 'order_items')->orderBy('created_at', 'desc')->paginate(12);
            return OrderResource::collection(($data));
        }
    }

    public function orderByUser(Request $request){
        $user_id = Auth::user()->id;
        if(!empty($request->search)){
            $data = Order::where('user_id', $user_id)
                        ->where('order_ref', $request->search)
                        ->paginate(12);
            return OrderResource::collection(($data));
        } else{
            $data = Order::where('user_id', $user_id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(12);
            return OrderResource::collection(($data));
        }
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        /* ORDER */
        $order = new Order();
        $order->user_id = $user_id ? $user_id : 0;
        $order->message = $request->order['message'];
        $order->status = 'Processing';
        $order->order_ref = date('Ymd') . $this->generateRandomText();
        $order->products_total = $request->order['products_total'];
        $order->products_quantity = $request->order['products_quantity'];
        $order->delivery_name = $request->order['delivery_name'];
        $order->delivery_fee = $request->order['delivery_fee'];
        $order->order_total = $request->order['order_total'];
        $order->created_at = now();
        $order->updated_at = now();
        $order->save();
        /* ORDER ITEM */
        if(!empty($request->items)){
            for($i = 0; $i < count($request->items); $i++){
                $item = new OrderItem();
                $item->user_id = $user_id;
                $item->order_id = $order->id;
                $item->image = $request->items[$i]['image'];
                $item->name = $request->items[$i]['name'];
                $item->price = $request->items[$i]['price'];
                $item->product_id = $request->items[$i]['product_id'];
                $item->quantity = $request->items[$i]['quantity'];
                $item->total = $request->items[$i]['total'];
                $item->created_at = now();
                $item->updated_at = now();
                $item->save();
            }
        } 
        /* ORDER DELIVERY DETAILS */
        $delivery = new DeliveryOrder();
        $delivery->user_id = $user_id;
        $delivery->order_id = $order->id;
        $delivery->fname = $request->delivery_order['fname'];
        $delivery->lname =$request->delivery_order['lname'];
        $delivery->address =$request->delivery_order['address'];
        $delivery->city =$request->delivery_order['city'];
        $delivery->country =$request->delivery_order['country'];
        $delivery->phone =$request->delivery_order['phone'];
        $delivery->email =$request->delivery_order['email'];
        $delivery->created_at = now();
        $delivery->updated_at = now();
        $delivery->save();
    
        /*  */
        $cart = Cart::where('id', $request->cart_id)->first();
        if(!empty($cart)){
            Cart::where('id', $request->cart_id)->delete();
            CartItem::where('cart_id', $request->cart_id)->delete();
        }
        // RETURN
        return response()->json([
            'message' => 'Saved successfully.',
        ]); 
    }

    public function status(Request $request){
        $data = Order::where('id', $request->order_id)->first();
        $data->status = $request->status;
        $data->save();
        return response()->json([
            'message' => 'Status updated successfully.',
        ]);
    }

    public function view($id){
        $data = Order::with(['user', 'delivery_order', 'order_items'])->find($id);
        $user = DeliveryOrder::where('user_id', $data->user_id)->first();
        // RETURN
        return response()->json([
            'data' => new OrderResource($data),
            'user' => $user ? new DeliveryOrderResource($user) : [],
        ]);
    }


    public function delete($id){
        $order = Order::find($id);
        DeliveryOrder::where('order_id', $order->id)->delete();
        OrderItem::where('order_id', $order->id)->delete();
        $order->delete();
        return response()->json([
            'message' => 'Deleted successfully.',
        ]);

    }


}
