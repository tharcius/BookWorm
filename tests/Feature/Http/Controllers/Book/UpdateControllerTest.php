<?php

use App\Models\Book;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('should update book data', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $book = Book::factory()->create();

    $response = $this->patch("/books/{$book->id}", [
        'title' => 'Animais Fantásticos e onde Habitam',
        'publication_date' => '13/07/1897',
        'isbn' => '9324897489415',
    ]);

    $response->assertStatus(200);

    $response->assertJson([
        'data' => [
            'id' => $book->id,
            'title' => 'Animais Fantásticos e onde Habitam',
            'publication_date' => '13/07/1897',
            'isbn' => '9324897489415',
            'author' => $book->author->name
        ],
        'status' => 'success',
        'message' => 'Book updated successfully',
    ]);

    $this->assertDatabaseHas('books', [
        "id" => $book->id,
        'title' => 'Animais Fantásticos e onde Habitam',
        'publication_date' => '1897-07-13',
        'isbn' => '9324897489415',
        'author_id' => $book->author_id
    ]);
});
