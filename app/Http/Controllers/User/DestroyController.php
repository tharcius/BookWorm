<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\JsonResponse;

class DestroyController extends UserController
{
    /**
     * Delete a user.
     */
    public function __invoke($userId): JsonResponse
    {
        $user = $this->repository->deleteUser($userId);

        if (! $user) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Fail on delete User',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $user,
                'status' => 'success',
                'message' => 'User deleted successfully',
            ],
            self::HTTP_OK
        );
    }
}
