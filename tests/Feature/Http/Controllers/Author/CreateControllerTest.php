<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('can create an author', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $response = $this->post('/authors', [
        'name' => 'Sirius Black III',
            'birthdate' => '03/11/1959',
            'nationality' => 'british',
        ]
    );

    $authorId = $response->json()['data']['id'];

    $response->assertStatus(201)
        ->assertJson([
            'data' => [
                'id' => $authorId,
                'name' => 'Sirius Black III',
                'birthdate' => '03/11/1959',
                'nationality' => 'british',
            ],
            'status' => 'success',
            'message' => 'Author created successfully',
        ]);

    $this->assertDatabaseHas('authors', [
        'id' => $authorId,
        'name' => 'Sirius Black III',
        'birthdate' => '1959-11-03',
        'nationality' => 'british',
    ]);
});
