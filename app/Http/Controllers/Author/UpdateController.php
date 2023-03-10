<?php

namespace App\Http\Controllers\Author;

use App\Http\Requests\Author\UpdateRequest;
use Illuminate\Http\JsonResponse;

class UpdateController extends AuthorController
{
    /**
     * Update an author.
     */
    public function __invoke(UpdateRequest $data, $authorId): JsonResponse
    {
        $author = $this->repository->updateAuthor($data->only('name', 'birthdate', 'nationality'), $authorId);

        if (! $author) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Fail on update Author',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $author,
                'status' => 'success',
                'message' => 'Author updated successfully',
            ],
            self::HTTP_OK
        );
    }
}
