<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserBookController extends Controller
{
    public function index() {
        $data = UserBook::all();
        return response()->json([
            'status_code' => Response::HTTP_OK,
            'message' => 'Success',
            'data' => $data->loadMissing('book:id,title')
        ]);
    }

    public function store(Request $request) {

        $request['admin_id'] = Auth::user()->id;
        $request->validate([
            'peminjam' => 'required',
            'admin_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'status' => 'required',
        ]);

        $data = UserBook::create($request->all());

        return response()->json([
            'status_code' => Response::HTTP_CREATED,
            'message' => 'Resource created succesfully',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id) {
        $data = UserBook::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            'status_code' => Response::HTTP_NO_CONTENT,
            'message' => 'Resource updated succesfully',
            'data' => $data
        ]);
    }

    public function delete($id) {
        $data = UserBook::findOrFail($id);
        $data->delete();

        return response()->json([
            'status_code' => Response::HTTP_NO_CONTENT,
            'message' => 'Resource deleted succesfully',
            'data' => $data
        ]);
    }
}
