<?php

namespace App\Http\Controllers\Book;

use App\Http\Requests\Book\UpdateRequest;
use Illuminate\Http\JsonResponse;

class UpdateController extends BookController
{
    /**
     * Update book information.
     */
    public function __invoke(UpdateRequest $data, $bookId): JsonResponse
    {
        $book = $this->repository->updateBook($data->only('title', 'publication_date', 'isbn'), $bookId);

        if (! $book) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Fail on update Book',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $book,
                'status' => 'success',
                'message' => 'Book updated successfully',
            ],
            self::HTTP_OK
        );
    }
}
