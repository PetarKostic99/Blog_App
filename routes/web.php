<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth.log_reg');
});

//Home ruta
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//O nama ruta
Route::get('/about', [\App\Http\Controllers\AboutUsController::class, 'index']);

//Posts
//Ruta koja pokazuje jedan post sa svim komentarima GET /posts/{id}: View a single post along with comments.
Route::get('/post/{post}', [\App\Http\Controllers\PostController::class, 'show']);
// Ruta za prikaz svih postova, dostupna i neautentifikovanim korisnicima GET /posts: List all posts.
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('post.guest');

//Pocetna Login ruta nakon startovanja aplikacije 
Auth::routes();


// Posts (samo za autorizovane korisnike)
Route::middleware(['auth'])->group(function () {

    //Comments
    //Ruta za brisanje komentara DELETE /comments/{id}: Delete a comment (only the comment owner or post owner).
    Route::delete('/comments/{id}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.delete');
    //Ruta za komentarisanje POST /posts/{id}/comments: Add a comment (for authenticated users and guests).
    Route::post('/comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');


    //Posts 
    //Ruta koja otvara formu za novi post GET /posts/create: Show the form to create a new post (authenticated users only).
    Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('create.post');
    //Ruta koja unosi podatke POST /posts: Store the post (authenticated users only).
    Route::post('/post/store', [\App\Http\Controllers\PostController::class, 'store'])->name('store.post');
    //Ruta za brisanje posta DELETE /posts/{id}: Delete the post (only the owner of the post).
    Route::delete('/post/{id}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');
    //Ruta za editovanje posta GET /posts/{id}/edit: Edit the post (only the owner of the post).
    Route::get('edit/{id}', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    //Ruta za azuriranje posta PUT /posts/{id}: Update the post (only the owner of the post).
    Route::put('update-post/{id}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
});

Route::middleware(['roles:admin', 'auth'])->group(function () {
    //Ruta za adminovu pocetnu stranicu naog logovanja
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    //Ruta koja lista sve komentare 
    Route::get('/admin/comments', [\App\Http\Controllers\CommentController::class, 'comments']);
    //Ruta za brisanje komentara
    Route::delete('/admin/comment/delete/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.destroy');
    //Ruta koja lista sve postove
    Route::get('/admin/post', [\App\Http\Controllers\AdminController::class, 'listPosts']);
    //Ruta za kreiranje posta kao admin
    Route::get('/admin/posts/create', [\App\Http\Controllers\AdminController::class, 'create']);
    //Ruta za cuvanje posta 
    Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.post.store');
    //Ruta za brisanje postova
    Route::delete('/admin/post/delete/{post}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('post.destroy');

});