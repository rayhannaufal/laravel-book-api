<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return response()->json([
            'status_code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $books
        ]);
    }
}
