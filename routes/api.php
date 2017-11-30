<?php

use Illuminate\Http\Request;

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

Route::get('/test-data', function () {
    $someTestData = [
        [
            'name' => 'Pehso',
            'email' => 'test@test.cc'
        ],
        [
            'name' => 'Ivan',
            'email' => 'test@test.cc'
        ]
    ];
    return $someTestData;
});

Route::get('/users', function () {
    return \App\User::all();
});

Route::post('/users', function () {
    $user = \App\User::create(request()->all());
    return $user;
});


Route::delete('/users/{id}', function ($id) {
    $user = \App\User::findOrFail($id);
    $user->delete();
    return [];
});
