<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\JsonResponse;

class ShowController extends BookController
{
    /**
     * Retrieve book information.
     */
    public function __invoke($bookId): JsonResponse
    {
        $book = $this->repository->getBook($bookId);

        if (! $book) {
            return response()->json(
                [
                    'data' => null,
                    'status' => 'error',
                    'message' => 'Fail on search book',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $book,
                'status' => 'success',
                'message' => 'Book found successfully',
            ],
            self::HTTP_OK
        );
    }
}
