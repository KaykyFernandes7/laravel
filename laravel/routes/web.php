<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Rota principal
Route::get('/', function () {
    return view('welcome');
});

// Rota do dashboard, acessível apenas para usuários autenticados e verificados
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas de perfil, protegidas por autenticação
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas para gerenciamento de livros, protegidas por autenticação
    Route::resource('books', BookController::class);
});

// Rotas de autenticação
require __DIR__.'/auth.php';

// Rota da home, para redirecionar após login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rota de edição de livros
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');


