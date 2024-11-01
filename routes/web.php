<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\FrontContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\UserController;
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

//Page d'accuiel
Route::get('/', [HomeController::class, 'index'])->name('home');

//Page detail article
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('article.detail');

//Commentaires
Route::post('/comment/{id}', [DetailController::class, 'comment'])->name('comment');

//Categories
Route::get('/categorie/{slug}', [FrontCategoryController::class, 'index'])->name('category.article');

//Recherches
Route::post('/recherches', [SearchController::class, 'index'])->name('search');

Route::get('/contacts', [FrontContactController::class, 'index'])->name('front.contact');
Route::post('/contact/envoyer', [FrontContactController::class, 'contact'])->name('contact.send');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'checkRole:admin,author'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Partie categorie
Route::resource('/category', CategoryController::class)->middleware('admin');

//Partie articles
Route::resource('/article', ArticleController::class);

//Partie author
Route::resource('/author', UserController::class)->middleware('admin');

//Partie Reseaux Sociaux
Route::resource('/social', SocialMediaController::class)->middleware('admin');

//Partie commentaires
Route::resource('/comment', CommentController::class);
Route::put('/comment/unlock/{id}', [CommentController::class, 'unlock'])->name('comment.unlock');

//Partie contact
Route::resource('/contact', ContactController::class);

//Partie Paramettrage
Route::get('/paramettre', [SettingsController::class, 'index'])->name('setting.index')->middleware('admin');
Route::put('/modifier/paramettre', [SettingsController::class, 'update'])->name('setting.update')->middleware('admin');




require __DIR__.'/auth.php';
