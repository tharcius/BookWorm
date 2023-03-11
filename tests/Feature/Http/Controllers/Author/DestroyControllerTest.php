<?php

use App\Models\Author;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('deletes an author', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $author = Author::factory()->create();

    $response = $this->delete("/authors/{$author->id}");

    $response->assertStatus(200);

    $response->assertExactJson([
        'data' => [
            'id' => $author->id,
            'name' => $author->name,
            'birthdate' => $author->birthdate,
            'nationality' => $author->nationality,
        ],
        'status' => 'success',
        'message' => 'Author deleted successfully',
    ]);

    $this->assertSoftDeleted('authors', [
        'id' => $author->id,
    ]);
});
