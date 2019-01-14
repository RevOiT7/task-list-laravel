<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Auth\TasksController@show');
Route::post('/task', 'Auth\TasksController@addTask');
Route::delete('/task/{id}', 'Auth\TasksController@delete');
