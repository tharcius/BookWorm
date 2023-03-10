<?php

namespace App\Http\Interfaces;

use App\Http\Resources\AuthorResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface AuthorRepositoryInterface
{
    public function getAllAuthors(): AnonymousResourceCollection;

    public function createAuthor(array $author): AuthorResource|false;

    public function getAuthor(int $authorId): AuthorResource|false;

    public function updateAuthor(array $data, int $authorId): AuthorResource|false;

    public function deleteAuthor(int $authorId): AuthorResource|false;
}
