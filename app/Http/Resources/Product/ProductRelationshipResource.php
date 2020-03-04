<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductRelationshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user'=>[
                'data'=>[
                    'type'=>'user',
                    'id'=>$this->user_id
                ]
            ],
                'reviews' => new ProductReviewsRelationshipResource($this->reviews),
        ];
    }

}
