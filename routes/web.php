<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EntryController;

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

/*ルート設定の書き方
Route::HTTPメソッド('URL', [コントローラー::class, 'メソッド'])
->name('ルート名');
*/

/*複数のミドルウェアの設定方法
　middleware(['ミドルウェア名', 'ミドルウェア名']);
*/

/*リソースコントローラー作成コマンドの入力方法
Route::resource('URL', コントローラー名::class);
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('post', PostController::class);

/* リソースコントローラーを使わなかった場合の記述
Route::post('post', [PostController::class, 'store'])
->name('post.store');

Route::middleware(['auth', 'admin'])->group(function () { //ログインしていないユーザーがpost/create,postにアクセスすると、ミドルウェアでログインページに遷移する
Route::get('post/create', [PostController::class, 'create']);
Route::get('post', [PostController::class, 'index'])->name('post.index');
});

Route::get('post/show/{post}', [PostController::class, 'show']) //{post}に投稿(post)のid情報を入れて受け渡す
->name('post.show');

Route::get('post/{post}/edit', [PostController::class, 'edit'])
->name('post.edit');

Route::patch('post/{post}', [PostController::class, 'update'])
->name('post.update');

Route::delete('post/{post}', [PostController::class, 'destroy'])
->name('post.destroy');
*/

Route::get('entry/player', [EntryController::class, 'create'])
->name('entry.player');

Route::post('entry', [EntryController::class, 'store'])
->name('entry.store');

Route::get('entry', [EntryController::class, 'index'])
->name('entry.index');

Route::get('entry/player/{player}', [EntryController::class, 'show'])
->name('entry.show');

Route::get('entry/{player}/edit', [EntryController::class, 'edit'])
->name('entry.edit');

Route::patch('entry/{player}', [EntryController::class, 'update'])
->name('entry.update');

Route::delete('entry/{player}', [EntryController::class, 'destroy'])
->name('entry.destroy');