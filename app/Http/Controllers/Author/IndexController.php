<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\JsonResponse;

class IndexController extends AuthorController
{
    /**
     * List all Authors.
     */
    public function __invoke(): JsonResponse
    {
        $author = $this->repository->getAllAuthors();

        return response()->json(
            [
                'data' => $author,
                'status' => 'success',
                'message' => 'Students retrieved successfully',
            ],
            self::HTTP_OK
        );
    }
}
