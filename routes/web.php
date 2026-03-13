<?php

use App\Http\Controllers\VacancyController;
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

Route::get('/', [VacancyController::class, 'index'])->name('home');

Route::get('vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('vacancies/create', [VacancyController::class, 'create'])->name('vacancies.create');
Route::post('vacancies', [VacancyController::class, 'store'])->name('vacancies.store');
Route::get('vacancies/{vacancy}', [VacancyController::class, 'show'])->name('vacancies.show');
Route::get('vacancies/{vacancy}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit');
Route::put('vacancies/{vacancy}', [VacancyController::class, 'update'])->name('vacancies.update');
Route::delete('vacancies/{vacancy}', [VacancyController::class, 'destroy'])->name('vacancies.destroy');
