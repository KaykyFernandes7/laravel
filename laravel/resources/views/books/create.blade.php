<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <h1>Adicionar Livro</h1>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subtitulo">Subtítulo</label>
            <input type="text" name="subtitulo" class="form-control">
        </div>
        <div class="form-group">
            <label for="edicao">Edição</label>
            <input type="text" name="edicao" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="editora">Editora</label>
            <input type="text" name="editora" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação</label>
            <input type="number" name="ano_publicacao" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="capa">Capa do Livro</label>
            <input type="file" name="capa" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
</body>
</html>
