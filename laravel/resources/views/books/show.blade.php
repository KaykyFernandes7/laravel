<?php
@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ $book->title }}</h1>
        <p><strong>Autor:</strong> {{ $book->author }}</p>
        <!-- Adicione os demais detalhes do livro aqui -->
    </div>
@endsection
