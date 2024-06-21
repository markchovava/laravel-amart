<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
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
            'cart_id' => $this->cart_id,
            'product_id' => $this->product_id,
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'total' => $this->total,
            'user' => new UserResource($this->whenLoaded('user')),
            'cart_items' => CartItemResource::collection($this->whenLoaded('cart_items')),
            'created_at' => $this->created_at->format('d M Y H:i a'),
            'updated_at' => $this->updated_at->format('YmdHi'),
        ];
    }
}
