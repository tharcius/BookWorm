<?php

use App\Models\Book;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

test('should return book data', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $book = Book::factory()->create();

    $response = $this->get("/books/{$book->id}");

    $response->assertStatus(200);

    $response->assertStatus(200)
        ->assertJson([
            'status' => 'success',
            'message' => 'Book found successfully',
        ])->assertJsonFragment([
            'id' => $book->id,
            'title' => $book->title,
            'publication_date' => $book->publication_date,
            'isbn' => $book->isbn,
            'author' => $book->author->name,
        ]);
});
