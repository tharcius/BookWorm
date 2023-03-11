<?php

use App\Models\Book;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('should test return all books', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $response = $this->get('/books');

    $response->assertStatus(200);

    $response->assertJsonCount(0, 'data');

    Book::factory(15)->create();

    $response = $this->get('/books');

    $response->assertJsonCount(15, 'data');
});
