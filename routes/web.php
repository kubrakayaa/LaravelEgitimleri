<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Yonet;
use App\Http\Controllers\Formislemleri;
use App\Http\Controllers\Veritabaniislemleri;
use App\Http\Controllers\Modelislemleri;
use App\Http\Controllers\Iletisim;
use App\Http\Controllers\ResimYukle;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodolistController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get("/web",[Yonet::class,"site"])->name("web");
Route::get("/form",[Formislemleri::class,"gorunum"]);

Route::middleware("arakontrol")->post("/form-sonuc",[Formislemleri::class,"sonuc"])->name("sonuc");

Route::get("/ekle",[Veritabaniislemleri::class,"ekle"]);

Route::get("/guncelle",[Veritabaniislemleri::class,"guncelle"]);

Route::get("/sil",[Veritabaniislemleri::class,"sil"]);
Route::get("/listele",[Veritabaniislemleri::class,"bilgiler"]);

Route::get("/modelliste",[Modelislemleri::class,"liste"]);
Route::get("/modelekle",[Modelislemleri::class,"ekle"]);
Route::get("/modelsil",[Modelislemleri::class,"sil"]);
Route::get("/modelguncelle",[Modelislemleri::class,"guncelle"]);

Route::get("/iletisim",[Iletisim::class,"index"]);
Route::post("/iletisim-sonuc",[Iletisim::class,"ekleme"])->name("iletisim-sonuc");

Route::get("/upload",function(){
  return view("upload");
});

Route::post("/resim-ilet",[ResimYukle::class,"resimyukleme"])->name("yukle");

Route::get("/uye",function(){
  return view("uyelik");
});
Route::post("/uye-kayit",[App\Http\controllers\Uyelikislemleri::class,"uyekayit"])->name("uyekayit");

Route::get("/create",[TodoController::class,"create"]);
Route::post("todos/store",[TodoController::class,"create"]);


Route::get("/",[TodolistController::class,"index"])->name("index");
Route::post("/",[TodolistController::class,"store"])->name("store");
Route::delete("/{todolist:id}",[TodolistController::class,"destroy"])->name("destroy");
