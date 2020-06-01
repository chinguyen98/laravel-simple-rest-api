<?php

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

//REST API
//GET: /coffees -> Lay ve het coffee -> function index()
//GET: /coffees/{id} -> Lay ve 1 coffee -> function show()
//POST: /coffees -> Tao 1 coffee -> function store()
//PUT: /coffees/{id} -> Cap nhat 1 coffee -> function update()
//DELETE: /coffees/{id} -> Xoa 1 coffee -> function destroy()

Route::apiResource('coffees', 'Api\CoffeeController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
