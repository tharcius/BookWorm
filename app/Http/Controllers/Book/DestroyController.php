<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\JsonResponse;

class DestroyController extends BookController
{
    /**
     * Delete a book.
     */
    public function __invoke($bookId): JsonResponse
    {
        $book = $this->repository->deleteBook($bookId);

        if (! $book) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Fail on delete Book',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $book,
                'status' => 'success',
                'message' => 'Book deleted successfully',
            ],
            self::HTTP_OK
        );
    }
}
