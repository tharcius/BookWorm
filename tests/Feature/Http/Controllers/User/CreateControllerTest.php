<?php

use \Illuminate\Support\Str;

it('should return status 201 on creation of users', function (array $dataset) {
    $response = $this->post('/users', $dataset);
    $response->assertStatus(201);
})->with([
    'test #01' =>
        [
            [
                "name" => "Sirius Black III",
                "email" => "black.sirius@hogwarts.wiz",
                "password" => Str::password(16)            ]
        ],
    'test #02' =>
        [
            [
                "name" => "Ginevra Molly Weasley",
                "email" => "weasley.ginevra@hogwarts.wiz",
                "password" => Str::password(16)
            ]
        ],
    'test #03' =>
        [
            [
                "name" => "Remus John Lupin",
                "email" => "lupin.remus@hogwarts.wiz",
                "password" => Str::password(16)
            ]
        ],
]);
