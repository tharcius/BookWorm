<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AuthorRepositoryInterface;

class AuthorController extends Controller
{
    public function __construct(protected AuthorRepositoryInterface $repository)
    {
    }
}
