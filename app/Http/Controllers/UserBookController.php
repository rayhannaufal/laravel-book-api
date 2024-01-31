<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;

class UserBookController extends Controller
{
    public function index() {
        $data = UserBook::all();
        return response()->json([
            'data' => $data->loadMissing('book')
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

        return response()->json($data);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'peminjam' => 'required',
            'status' => 'required'
        ]);

        $data = UserBook::findOrFail($id);
        $data->update($request->all());

        return response()->json($data);
    }
}
