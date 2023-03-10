<?php

namespace App\Http\Interfaces;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface UserRepositoryInterface
{
    public function getAllUsers(): AnonymousResourceCollection;

    public function createUser(array $user): UserResource|false;

    public function getUser(int $userId): UserResource|false;

    public function updateUser(array $data, int $userId): UserResource|false;

    public function deleteUser(int $userId): UserResource|false;
}
