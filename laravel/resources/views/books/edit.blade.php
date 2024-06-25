@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Livro</h1>
    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ $book->autor }}" required>
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ $book->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="subtitulo">Subtítulo</label>
            <input type="text" name="subtitulo" class="form-control" value="{{ $book->subtitulo }}">
        </div>
        <div class="form-group">
            <label for="edicao">Edição</label>
            <input type="text" name="edicao" class="form-control" value="{{ $book->edicao }}" required>
        </div>
        <div class="form-group">
            <label for="editora">Editora</label>
            <input type="text" name="editora" class="form-control" value="{{ $book->editora }}" required>
        </div>
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação</label>
            <input type="text" name="ano_publicacao" class="form-control" value="{{ $book->ano_publicacao }}" required>
        </div>
        <div class="form-group">
            <label for="capa">Capa</label>
            <div class="custom-file">
                <input type="file" name="capa" class="custom-file-input" id="capa">
                <label class="custom-file-label" for="capa">Escolher arquivo</label>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Livro</button>
    </form>
</div>
@endsection
