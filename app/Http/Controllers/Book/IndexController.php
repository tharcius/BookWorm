<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\JsonResponse;

class IndexController extends BookController
{
    /**
     * List all Books.
     */
    public function __invoke(): JsonResponse
    {
        $book = $this->repository->getAllBooks();

        return response()->json(
            [
                'data' => $book,
                'status' => 'success',
                'message' => 'Students retrieved successfully',
            ],
            self::HTTP_OK
        );
    }
}
