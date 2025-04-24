<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController; 




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

Route::get("/", function () {
    return view('public.layout.homepage');
});
Route::get('/home', function () {
    return view('public.layout.homepage');
});

Route::get('/about', function () {
    return view('public.layout.about');
});


Route::get('/recipe', function () {
    return view('public.layout.recipe');
});

Route::get('/detail', function () {
    return view('public.layout.detail');
});

Route::get('/faq', function () {
    return view('public.layout.faq');
});

Route::get('/contact', function () {
    return view('public.layout.contact');
});


Route::get('/cart', function () {
    return view('public.layout.cart');
});

Route::get('/checkout', function () {
    return view('public.layout.checkout');
});

Route::get('signup', function () {
    return view('public.layout.signup');
});

Route::get('/dashboard', function () {
    return view('dashboard.layout.dashboard');
});

Route::resource('contacts', ContactController::class);

Route::resource('category', CategoryController::class);

Route::resource('recipes', RecipeController::class);

Route::resource('ingredient', IngredientController::class); 




//  Route::get('/recipe', [CategoryController::class, 'showCategories']);

Route::get('/recipe', [App\Http\Controllers\RecipeController::class, 'publicIndex'])->name('recipes.public');
Route::get('/recipe/category/{category}', [App\Http\Controllers\RecipeController::class, 'showByCategory'])->name('recipes.byCategory');



