<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::select('id','title','cover', 'description','user_id')
                // ->where('user_id', Auth::user()->id)
                ->when((Auth::user()->level == 'User'), function($query){
                    $query->where('user_id', Auth::user()->id);
                })
                ->paginate(10);
        return view("book.index", compact('books'));
    }

    public function create()
    {
        return view("book.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'desc' => 'required|string',
        ], [
            'title.required' => 'Judul harus diisi.',
            'cover.required' => 'Cover harus diunggah.',
            'cover.image' => 'File yang diunggah harus berupa gambar.',
            'cover.mimes' => 'Gambar harus bertipe: jpeg, png, jpg.',
            'cover.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'desc.required' => 'Deskripsi harus diisi.',
            'desc.string' => 'Deskripsi harus berupa teks.',
        ]);

        try {
            $book = new Book;
            $book->title = $request->title;
            $book->cover = $request->file('cover')->store('book', 'public');
            $book->description = $request->desc;
            $book->user_id = \Auth::user()->id;
            $book->save();

            return redirect()->route('book.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            return redirect()->route('book.index')->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $book = Book::findOrFail($id);
            return view('book.edit',compact('book'));
        } catch (\Throwable $th) {
            return redirect()->route('book.index')->with('error', 'Buku tidak ditemukan');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'desc' => 'required|string',
        ], [
            'title.required' => 'Judul harus diisi.',
            'cover.image' => 'File yang diunggah harus berupa gambar.',
            'cover.mimes' => 'Gambar harus bertipe: jpeg, png, jpg.',
            'cover.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'desc.required' => 'Deskripsi harus diisi.',
            'desc.string' => 'Deskripsi harus berupa teks.',
        ]);

        try {
            $book = Book::findOrFail($id);
            $book->title = $request->title;
            if ($request->hasFile('cover')) {
                $book->cover = $request->file('cover')->store('book', 'public');
            }
            $book->description = $request->desc;
            $book->user_id = Auth::user()->id;
            $book->save();

            return redirect()->route('book.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            return redirect()->route('book.index')->with('error', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();

            return redirect()->route('book.index')->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            return redirect()->route('book.index')->with('error', $th->getMessage());
        }
    }
}
