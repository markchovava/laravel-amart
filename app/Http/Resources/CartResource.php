<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'cart_session' => $this->cart_session,
            'ip_address' => $this->ip_address,
            'total' => $this->total,
            'quantity' => $this->quantity,
            'user' => new UserResource($this->whenLoaded('user')),
            'cart_items' => CartItemResource::collection($this->whenLoaded('cart_items')),
            'created_at' => $this->created_at->format('d M Y H:i a'),
            'updated_at' => $this->updated_at->format('YmdHi'),
        ];
    }
}
