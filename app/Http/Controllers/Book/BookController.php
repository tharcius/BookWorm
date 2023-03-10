<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\BookRepositoryInterface;

class BookController extends Controller
{
    public function __construct(protected BookRepositoryInterface $repository)
    {
    }
}
