<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    public function __construct(protected UserRepositoryInterface $repository)
    {
    }
}
