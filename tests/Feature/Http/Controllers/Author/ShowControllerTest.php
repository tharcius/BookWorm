<?php

use App\Models\Author;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

test('should return author data', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $author = Author::factory()->create();

    $response = $this->get("/authors/{$author->id}");

    $response->assertStatus(200);

    $response->assertStatus(200)
        ->assertJson([
            'status' => 'success',
            'message' => 'Author found successfully',
        ])->assertJsonFragment([
            'id' => $author->id,
            'name' => $author->name,
            'birthdate' => $author->birthdate,
            'nationality' => $author->nationality,
        ]);
});
