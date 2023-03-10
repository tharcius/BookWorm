<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\JsonResponse;

class IndexController extends UserController
{
    /**
     * Return an array with all Users.
     */
    public function __invoke(): JsonResponse
    {
        $users = $this->repository->getAllUsers();

        return response()->json(
            [
                'data' => $users,
                'status' => 'success',
                'message' => 'Students retrieved successfully',
            ],
            self::HTTP_OK
        );
    }
}
