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

use Stichoza\GoogleTranslate\GoogleTranslate;

Route::get('/', function () {
    // return view('welcome');
    $tr = new GoogleTranslate('ta');
    return $tr->translate('Hello world');
});
