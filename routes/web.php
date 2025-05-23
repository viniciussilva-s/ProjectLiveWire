<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\{
    HomePage,
    TicketList,
    CategoryList
};
use App\Http\Controllers\CategoryController;

Route::get('/', HomePage::class)->name('home');
Route::get('/list', TicketList::class)->name('tickets.list');
Route::get('/categorias', CategoryList::class)->name('categories.list');
Route::post('/api/categories', [CategoryController::class, 'store']);
