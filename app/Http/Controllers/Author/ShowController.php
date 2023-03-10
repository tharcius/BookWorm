<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\JsonResponse;

class ShowController extends AuthorController
{
    /**
     * Return an author.
     */
    public function __invoke($authorId): JsonResponse
    {
        $author = $this->repository->getAuthor($authorId);

        if (! $author) {
            return response()->json(
                [
                    'data' => null,
                    'status' => 'error',
                    'message' => 'Fail on search author',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $author,
                'status' => 'success',
                'message' => 'Author found successfully',
            ],
            self::HTTP_CREATE_OK
        );
    }
}
