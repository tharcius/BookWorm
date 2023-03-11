<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('should test return all authors', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $response = $this->get('/authors');

    $response->assertStatus(200);
});
