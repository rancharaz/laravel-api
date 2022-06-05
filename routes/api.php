<?php

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/anime', function() {
    return Anime::all();
});

Route::post('/anime', function() {
    request()-> validate([
        'title'=>'required'
    ]);
    return Anime::create([
        'title' => request('title'),
        'watched' => request('watched')
    ]);
});

Route::put("/anime/{anime}", function(Anime $anime) {
    return $anime->update([
        'title'=>request('title'),
        'watched'=>request('watched')
    ]);
});

Route::delete("/anime/{anime}", function(Anime $anime) {
    return $anime->delete();
});