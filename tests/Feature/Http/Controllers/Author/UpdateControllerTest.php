<?php

use App\Models\Author;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('should update author data', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $author = Author::factory()->create();

    $response = $this->patch('/authors/'.$author->id, [
        'name' => 'Newton Artemis Fido Scamander',
        'birthdate' => '24/02/1887',
        'nationality' => 'british',
    ]);

    $response->assertStatus(200);

    $response->assertJson([
        'data' => [
            'id' => $author->id,
            'name' => 'Newton Artemis Fido Scamander',
            'birthdate' => '24/02/1887',
            'nationality' => 'british',
        ],
        'status' => 'success',
        'message' => 'Author updated successfully',
    ]);

    $this->assertDatabaseHas('authors', [
        'id' => $author->id,
        'name' => 'Newton Artemis Fido Scamander',
        'birthdate' => '1887-02-24',
        'nationality' => 'british',
    ]);
});
