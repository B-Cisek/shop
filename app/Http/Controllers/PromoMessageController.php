<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromoMessageController extends Controller
{
    /**
     * Return promo or info message to Home page
     */
    public function __invoke(Request $request): JsonResponse
    {
        $response = $this->checkUserEmailVerified()['emailVerified']
            ? ['emailVerified' => true, 'message' => 'Get free delivery on orders over $100']  // TODO:
            : ['emailVerified' => false, 'message' => $this->checkUserEmailVerified()['message']];

        return new JsonResponse($response);
    }

    private function checkUserEmailVerified(): array
    {
        return [
            'emailVerified' => (bool) Auth::user()->email_verified_at,
            'message' => __('auth.email_verified_message')
        ];
    }
}
