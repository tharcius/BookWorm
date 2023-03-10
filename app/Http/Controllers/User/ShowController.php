<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\JsonResponse;

class ShowController extends UserController
{
    /**
     * Return a user.
     */
    public function __invoke($userId): JsonResponse
    {
        $user = $this->repository->getUser($userId);

        if (! $user) {
            return response()->json(
                [
                    'data' => null,
                    'status' => 'error',
                    'message' => 'Fail on search user',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $user,
                'status' => 'success',
                'message' => 'User found successfully',
            ],
            self::HTTP_CREATE_OK
        );
    }
}
