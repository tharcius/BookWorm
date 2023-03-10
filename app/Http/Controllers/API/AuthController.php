<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @unauthenticated
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (! auth()->attempt($credentials)) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Invalid credentials',
                ],
                self::HTTP_UNAUTHORIZED
            );
        }

        $this->revokeTokens();

        return response()->json([
            'data' => [
                'token' => auth()->user()->createToken('default')->plainTextToken,
            ],
        ]);
    }

    public function logout(): JsonResponse
    {
        $this->revokeTokens();

        return response()->json([], 204);
    }

    private function revokeTokens(): void
    {
        auth()->user()->tokens()->delete();
    }
}
