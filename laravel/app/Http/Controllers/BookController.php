<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('user_id', Auth::id())->paginate(10); // Paginação com 10 livros por página
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'autor' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'edicao' => 'required|string|max:255',
            'editora' => 'required|string|max:255',
            'ano_publicacao' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
            'capa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $book = new Book;
        $book->user_id = Auth::id();
        $book->autor = $request->autor;
        $book->titulo = $request->titulo;
        $book->subtitulo = $request->subtitulo;
        $book->edicao = $request->edicao;
        $book->editora = $request->editora;
        $book->ano_publicacao = $request->ano_publicacao;

        if ($request->hasFile('capa')) {
            $book->capa = $request->file('capa')->store('covers', 'public');
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Livro adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $this->authorize('view', $book);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        if (!Gate::forUser(Auth::user())->allows('book', $book)){
            abort(403);
        }

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //$this->authorize('update', $book);

        $request->validate([
            'autor' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'edicao' => 'required|string|max:255',
            'editora' => 'required|string|max:255',
            'ano_publicacao' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
            'capa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $book->autor = $request->autor;
        $book->titulo = $request->titulo;
        $book->subtitulo = $request->subtitulo;
        $book->edicao = $request->edicao;
        $book->editora = $request->editora;
        $book->ano_publicacao = $request->ano_publicacao;

        if ($request->hasFile('capa')) {
            $book->capa = $request->file('capa')->store('covers', 'public');
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //$this->authorize('delete', $book);

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso.');
    }

}
