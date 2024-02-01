<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserBookController extends Controller
{
    public function index() {
        $data = UserBook::all();
        return response()->json([
            'status_code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $data->loadMissing('book:id,title')
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'peminjam' => 'required',
            'admin_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'status' => 'required',
        ]);

        $data = UserBook::create($request->all());

        return response()->json([
            'status_code' => Response::HTTP_CREATED,
            'message' => 'success',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'status' => 'required'
        ]);

        $data = UserBook::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            'status_code' => Response::HTTP_NO_CONTENT,
            'message' => 'update success',
            'data' => $data
        ]);
    }
}
