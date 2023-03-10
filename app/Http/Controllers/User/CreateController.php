<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\CreateRequest;
use Illuminate\Http\JsonResponse;

class CreateController extends UserController
{
    /**
     * Create a new user.
     */
    public function __invoke(CreateRequest $user): JsonResponse
    {
        $data = $user->only('name', 'email', 'password');

        $result = $this->repository->createUser($data);

        if (! $result) {
            return response()->json(
                [
                    'data' => null,
                    'status' => 'error',
                    'message' => 'Fail on create User',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $result,
                'status' => 'success',
                'message' => 'User created successfully',
            ],
            self::HTTP_CREATE_OK
        );
    }
}
