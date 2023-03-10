<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\JsonResponse;

class DestroyController extends AuthorController
{
    /**
     * Delete an author.
     */
    public function __invoke($authorId): JsonResponse
    {
        $author = $this->repository->deleteAuthor($authorId);

        if (! $author) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Fail on delete Author',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $author,
                'status' => 'success',
                'message' => 'Author deleted successfully',
            ],
            self::HTTP_OK
        );
    }
}
