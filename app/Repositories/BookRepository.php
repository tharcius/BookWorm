<?php

namespace App\Repositories;

use App\Http\Interfaces\BookRepositoryInterface;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookRepository implements BookRepositoryInterface
{
    public function __construct(private Book $book)
    {
    }

    public function getAllBooks(): AnonymousResourceCollection
    {
        return BookResource::collection($this->book->all());
    }

    public function createBook(array $book): BookResource|false
    {
        $resource = $this->book->create($book);
        try {
            return new BookResource($resource);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getBook(int $bookId): BookResource|false
    {
        try {
            $resource = $this->book->findOrFail($bookId);

            return new BookResource($resource);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updateBook($data, $bookId): BookResource|false
    {
        try {
            $book = $this->book->findOrFail($bookId);
            $book->update($data);

            return new BookResource($book);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function deleteBook($bookId): BookResource|false
    {
        try {
            $book = $this->book->findOrFail($bookId);
            $book->deleteOrFail();

            return new BookResource($book);
        } catch (\Exception $e) {
            return false;
        }
    }
}
