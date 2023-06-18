<?php

use App\Http\Controllers\Api\CategoriesController;
use Database\Seeders\SampleAccountsSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use PHPOpenSourceSaver\JWTAuth\JWTGuard;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\GenericUser;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/categories", [CategoriesController::class, 'allCategories']);
Route::post("/categories/create", [CategoriesController::class, 'createCategories']);
Route::put("/categories/{categoriesId}/update", [CategoriesController::class, 'updateCategories']);
Route::delete("/categories/{categoriesId}/delete", [CategoriesController::class, "deleteCategories"]);
Route::post("/categories/account", [SampleAccountsSeeder::class, "run"]);
Route::post("/categories/account", [SampleAccountsSeeder::class, "run"]);
Route::post("/categories/account", [SampleAccountsSeeder::class, "run"]);

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
}); 