<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ProductNotForUser extends Exception
{
    //
    public function render()
    {
        return response()->json([
            'errors' => 'You can only manipulate your own product'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);

    }
}
