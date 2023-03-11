<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create(['password' => Hash::make('password')]);

    $token = $this->post('/login', ['email' => $user->email, 'password' => 'password'])
        ->json()['data']['token'];

    $response = $this->head('/users', [
        'Authorization' => "Bearer {$token}",
    ]);

    $response->assertStatus(200);
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});
