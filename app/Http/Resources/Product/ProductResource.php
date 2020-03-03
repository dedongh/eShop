<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{


    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'product',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->details,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'rating' => $this->reviews->count() > 0 ?
                    round($this->reviews->sum('rating') / $this->reviews->count()) : 0,
                'image' => $this->image,
            ],
            'relationships' => [
                'reviews' => route('reviews.index', $this->id),
                'user'=>[
                    'data'=>[
                        'type'=>'user',
                        'id'=>$this->user_id
                    ]
                ]
            ],
        ];
    }
}
