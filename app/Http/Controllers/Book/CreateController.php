<?php

namespace App\Http\Controllers\Book;

use App\Http\Requests\Book\CreateRequest;
use Illuminate\Http\JsonResponse;

class CreateController extends BookController
{
    /**
     * Create a new book.
     */
    public function __invoke(CreateRequest $book): JsonResponse
    {
        $data = $book->only('title', 'publication_date', 'isbn', 'author_id');

        $result = $this->repository->createBook($data);

        if (! $result) {
            return response()->json(
                [
                    'data' => null,
                    'status' => 'error',
                    'message' => 'Fail on create Book',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $result,
                'status' => 'success',
                'message' => 'Book created successfully',
            ],
            self::HTTP_CREATE_OK
        );
    }
}
