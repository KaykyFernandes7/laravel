@extends('layouts.app')

@section('content')
    <div class="container">
   
        <!-- Conteúdo adicional da sua página -->
    </div>
@endsection



<div class="container">
    <h1>Meus Livros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Adicionar Livro</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Título</th>
                <th>Edição</th>
                <th>Editora</th>
                <th>Ano de Publicação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->autor }}</td>
                    <td>{{ $book->titulo }}</td>
                    <td>{{ $book->edicao }}</td>
                    <td>{{ $book->editora }}</td>
                    <td>{{ $book->ano_publicacao }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links() }}
</div>
