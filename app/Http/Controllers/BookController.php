<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

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

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            // 'desc' => 'required',
            // 'cover' => 'required',
        ]);

        if ($request->file) {
            $file_name = '';
            $file_name = $request->file->getClientOriginalName();
            Storage::putFileAs('cover', $request->file, $file_name);
            $request['cover'] = $file_name;
        }
        $data = Book::create($request->all());

        return response()->json([
            'status_code' => Response::HTTP_CREATED,
            'message' => 'Resource created succesfully',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id) {
        $data = Book::findOrFail($id);  

        if ($request->file) {
            $file_name = '';
            $file_name = $request->file->getClientOriginalName();
            Storage::putFileAs('cover', $request->file, $file_name);
            $request['cover'] = $file_name;
        }
        $data->update($request->all());

        return response()->json([
            'status_code' => Response::HTTP_NO_CONTENT,
            'message' => 'Resource updated succesfully',
            'data' => $data
        ]);
    }

    public function delete($id) {
        $data = Book::findOrFail($id);
        $data->delete();

        return response()->json([
            'data' => $data
        ]);
    }
}
