<?php

namespace App\Repositories;

use App\Http\Interfaces\UserRepositoryInterface;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private User $user)
    {
    }

    public function getAllUsers(): AnonymousResourceCollection
    {
        return UserResource::collection($this->user->all());
    }

    public function createUser(array $user): UserResource|false
    {
        try {
            $resource = $this->user->create($user);

            return new UserResource($resource);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getUser(int $userId): UserResource|false
    {
        try {
            $resource = $this->user->findOrFail($userId);

            return new UserResource($resource);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updateUser($data, $userId): UserResource|false
    {
        try {
            $user = $this->user->findOrFail($userId);
            $user->update($data);

            return new UserResource($user);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function deleteUser($userId): UserResource|false
    {
        try {
            $user = $this->user->findOrFail($userId);
            $user->deleteOrFail();

            return new UserResource($user);
        } catch (\Exception $e) {
            return false;
        }
    }
}
