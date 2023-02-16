<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Renvoyer une vue template (welcome.blade.php)
// Route::get('/', function () {
//     return view('welcome');
// });

// // Renvoyer une chaine de caractères
// Route::get('/posts', function() {
//     return "Coucou les amis";
// });

// // Renvoyer une réponse en JSON
// Route::get('/json', function() {
//     return response()->json([
//         'title' => 'Mon super titre',
//         'description' => 'Ma super description'
//     ]);
// });

// Avec le namespace
// Route::get('/', 'App\Http\Controllers\PostController@index');

// Avec le nom de la class directement
Route::get('/posts/{id}', [PostController::class, 'show'])->whereNumber('id')->name('posts.show');
Route::get('/', [PostController::class, 'index'])->name('welcome');
Route::get('/contact', [PostController::class, 'contact'])->name('contact');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');
Route::get('/create-polymorphic-regitrations', [PostController::class, 'register']);
