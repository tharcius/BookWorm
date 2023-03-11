<?php

use App\Models\Book;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('deletes an book', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $book = Book::factory()->create();

    $response = $this->delete("/books/{$book->id}");

    $response->assertStatus(200);

    $response->assertExactJson([
        'data' => [
            'id' => $book->id,
            'title' => $book->title,
            'publication_date' => $book->publication_date,
            'isbn' => $book->isbn,
            'author' => $book->author->name
        ],
        'status' => 'success',
        'message' => 'Book deleted successfully',
    ]);

    $this->assertSoftDeleted('books', [
        'id' => $book->id,
    ]);
});
