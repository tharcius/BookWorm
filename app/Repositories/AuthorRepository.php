<?php

namespace App\Repositories;

use App\Http\Interfaces\AuthorRepositoryInterface;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function __construct(private Author $author)
    {
    }

    public function getAllAuthors(): AnonymousResourceCollection
    {
        return AuthorResource::collection($this->author->all());
    }

    public function createAuthor(array $author): AuthorResource|false
    {
        try {
            $resource = $this->author->create($author);

            return new AuthorResource($resource);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getAuthor(int $authorId): AuthorResource|false
    {
        try {
            $resource = $this->author->findOrFail($authorId);

            return new AuthorResource($resource);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updateAuthor($data, $authorId): AuthorResource|false
    {
        dd($data);

        try {
            $author = $this->author->findOrFail($authorId);
            $author->update($data);

            return new AuthorResource($author);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function deleteAuthor($authorId): AuthorResource|false
    {
        try {
            $author = $this->author->findOrFail($authorId);
            $author->deleteOrFail();

            return new AuthorResource($author);
        } catch (\Exception $e) {
            return false;
        }
    }
}
