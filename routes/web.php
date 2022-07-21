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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('admin')->group(function () {

    Route::get('/menus', \Tall\Menus\Http\Livewire\Admin\Menus\ListComponent::class)->name(config("menus.routes.menus.list"));
    Route::get('/menu/cadastrar', \Tall\Menus\Http\Livewire\Admin\Menus\CreateComponent::class)->name(config("menus.routes.menus.create"));
    Route::get('/menu/{model}/editar', \Tall\Menus\Http\Livewire\Admin\Menus\EditComponent::class)->name(config("menus.routes.menus.edit"));
    Route::get('/menu/{model}/gerenciar', \Tall\Menus\Http\Livewire\Admin\Menus\BuilderComponent::class)->name(config("menus.routes.menus.builder"));

});
