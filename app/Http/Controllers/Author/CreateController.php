<?php

namespace App\Http\Controllers\Author;

use App\Http\Requests\Author\CreateRequest;
use Illuminate\Http\JsonResponse;

class CreateController extends AuthorController
{
    /**
     * Create a new author.
     */
    public function __invoke(CreateRequest $author): JsonResponse
    {
        $data = $author->only('name', 'birthdate', 'nationality');

        $result = $this->repository->createAuthor($data);

        if (! $result) {
            return response()->json(
                [
                    'data' => null,
                    'status' => 'error',
                    'message' => 'Fail on create Author',
                ],
                self::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(
            [
                'data' => $result,
                'status' => 'success',
                'message' => 'Author created successfully',
            ],
            self::HTTP_CREATE_OK
        );
    }
}
