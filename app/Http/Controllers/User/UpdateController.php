<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\JsonResponse;

class UpdateController extends UserController
{
    /**
     * Update user information.
     */
    public function __invoke(UpdateRequest $data, $userId): JsonResponse
    {
        $user = $this->repository->updateUser($data->only('name', 'email'), $userId);

        if (! $user) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Fail on update User',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $user,
                'status' => 'success',
                'message' => 'User updated successfully',
            ],
            self::HTTP_OK
        );
    }
}
