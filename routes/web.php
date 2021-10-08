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

Route::get('/', [App\Http\Controllers\VacancyController::class, 'index'])->name('home');

Route::get('vacancies', [App\Http\Controllers\VacancyController::class, 'index'])->name('vacancies.index');
Route::get('vacancies/create', [App\Http\Controllers\VacancyController::class, 'create'])->name('vacancies.create');
Route::post('vacancies', [App\Http\Controllers\VacancyController::class, 'store'])->name('vacancies.store');
Route::get('vacancies/{vacancy}', [App\Http\Controllers\VacancyController::class, 'show'])->name('vacancies.show');
Route::get('vacancies/{vacancy}/edit', [App\Http\Controllers\VacancyController::class, 'edit'])->name('vacancies.edit');
Route::put('vacancies/{vacancy}', [App\Http\Controllers\VacancyController::class, 'update'])->name('vacancies.update');
Route::delete('vacancies/{vacancy}', [App\Http\Controllers\VacancyController::class, 'destroy'])->name('vacancies.destroy');
