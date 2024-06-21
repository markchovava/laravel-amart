<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'brand_id' => $this->brand_id,
            'code' => $this->code,
            'condition' => $this->condition,
            'description' => $this->description,
            'name' => $this->name,
            'price' => $this->price,
            'priority' => $this->priority,
            'quantity' => $this->quantity,
            'source' => $this->source,
            'shop_id' => $this->shop_id,
            'source' => $this->source,
            'user' => new UserResource($this->whenLoaded('user')),
            'shop' => new ShopResource($this->whenLoaded('shop')),
            'brand' => new BrandResource($this->whenLoaded('brand')),
            'product_specs' => ProductSpecResource::collection($this->whenLoaded('product_specs')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'sub_categories' => SubCategoryResource::collection($this->whenLoaded('sub_categories')),
            'product_images' => ProductImageResource::collection($this->whenLoaded('product_images')),
            'product_variations' => ProductVariationResource::collection($this->whenLoaded('product_variations')),
            'product_specs' => ProductSpecResource::collection($this->whenLoaded('product_specs')),
            'created_at' => $this->created_at->format('d M Y H:i a'),
            'updated_at' => $this->updated_at->format('YmdHi'),

        ];
    }
}
