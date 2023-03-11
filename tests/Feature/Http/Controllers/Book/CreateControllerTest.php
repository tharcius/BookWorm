<?php

use App\Models\Author;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('can create a book', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $author = Author::factory(Author::class)->create(['name' => 'Newton Artemis Fido Scamander']);

    $response = $this->post('/books', [
        'title' => 'Animais Fantásticos e onde Habitam',
        'publication_date' => '13/07/1897',
        'isbn' => '9324897489415',
        'author_id' => $author->id,
    ]);

    $bookId = $response->json()['data']['id'];

    $response->assertStatus(201)
        ->assertJson([
            'data' => [
                'title' => 'Animais Fantásticos e onde Habitam',
                'publication_date' => '13/07/1897',
                'isbn' => '9324897489415',
                'author' => $author->name,
                'id' => $bookId
            ],
            'status' => 'success',
            'message' => 'Book created successfully',
        ]);

    $this->assertDatabaseHas('books', [
        "id" => $bookId,
        "title" => "Animais Fantásticos e onde Habitam",
        "publication_date" => "1897-07-13",
        "isbn" => "9324897489415",
        "author_id" => $author->id,
    ]);

});
