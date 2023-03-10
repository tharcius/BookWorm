<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\JsonResponse;

class IndexController extends AuthorController
{
    /**
     * Return an array with all Users.
     */
    public function __invoke(): JsonResponse
    {
        $users = $this->repository->getAllAuthors();

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
