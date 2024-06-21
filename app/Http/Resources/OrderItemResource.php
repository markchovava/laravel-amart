<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     * 
     * 
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'name' => $this->name,
            'image' => $this->image,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total' => $this->total,
            'user' => new UserResource($this->whenLoaded('user')), 
            'product' => new ProductResource($this->whenLoaded('product')), 
            'created_at' => $this->created_at->format('d M Y H:i a'),
            'updated_at' => $this->updated_at->format('d M Y H:i a'),  
        ];
        
    }
}
