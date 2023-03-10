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

    public function user(): JsonResponse
    {
        $me = auth()->user()->only(
            'name',
            'email',
        );

        if (! $me) {
            return response()->json(
                [
                    'data' => null,
                    'status' => 'error',
                    'message' => 'Fail on search author',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $me,
                'status' => 'success',
                'message' => 'It\'s me honey.',
            ],
            self::HTTP_CREATE_OK
        );
    }

    private function revokeTokens(): void
    {
        auth()->user()->tokens()->delete();
    }
}
