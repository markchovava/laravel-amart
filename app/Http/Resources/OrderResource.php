<?php

namespace App\Http\Resources;

use App\Models\DeliveryOrder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'order_ref' => $this->order_ref,
            'products_quantity' => $this->products_quantity,
            'products_total' => $this->products_total,
            'delivery_name' => $this->delivery_name,
            'delivery_fee' => $this->delivery_fee,
            'order_total' => $this->order_total,
            'message' => $this->message,
            'status' => $this->status,
            'user' => new UserResource($this->whenLoaded('user')), 
            'delivery_order' => new DeliveryOrderResource($this->whenLoaded('delivery_order')), 
            'order_items' => OrderItemResource::collection($this->whenLoaded('order_items')),
            'created_at' => $this->created_at->format('d M Y H:i a'),
            'updated_at' => $this->updated_at->format('d M Y H:i a'),  
        ];
    }
}
