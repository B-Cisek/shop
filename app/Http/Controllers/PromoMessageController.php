<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PromoMessageController extends Controller
{
    /**
     * Return promo message to Home page
     */
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse([
            'message' => 'Get free delivery on orders over $100'
        ]);
    }
}
