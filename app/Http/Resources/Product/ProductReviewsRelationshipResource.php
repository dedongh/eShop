<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\User\UserIdentifierResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductReviewsRelationshipResource extends ResourceCollection
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
            'data'=> UserIdentifierResource::collection($this->collection)
        ];
    }

}
