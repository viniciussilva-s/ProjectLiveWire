<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\{
    HomePage,
    TicketList,
    CategoryList
};

Route::get('/', HomePage::class)->name('home');
Route::get('/list', TicketList::class)->name('tickets.list');
Route::get('/categorias', CategoryList::class)->name('categories.list');
