<?php

namespace App\Http\Interfaces;

use App\Http\Resources\BookResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface BookRepositoryInterface
{
    public function getAllBooks(): AnonymousResourceCollection;

    public function createBook(array $book): BookResource|false;

    public function getBook(int $bookId): BookResource|false;

    public function updateBook(array $data, int $bookId): BookResource|false;

    public function deleteBook(int $bookId): BookResource|false;
}
