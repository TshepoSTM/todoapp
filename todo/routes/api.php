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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//Login
Route::post('/login','App\Http\Controllers\UserprofileController@login');


//Get all userprofiles
Route::post('/userprofiles','App\Http\Controllers\UserprofileController@getUserprofiles');

//Get specific userprofile
Route::post('/userprofile/{id}','App\Http\Controllers\UserprofileController@getUserprofileById');

//Add user's profile
Route::post('/adduserprofile','App\Http\Controllers\UserprofileController@addUserprofile');

//Update user's profile
Route::post('/updateuserprofile/{id}','App\Http\Controllers\UserprofileController@updateUserprofile');

//Delete user profile
Route::delete('/deleteuserprofile/{id}','App\Http\Controllers\UserprofileController@deleteUserprofile');


//For task/to do
//Get all task in to-do
Route::get('/tasks','App\Http\Controllers\TasksController@getTasks');

//Get specific task
Route::get('/task/{id}','App\Http\Controllers\TasksController@getTaskById');

//Get user's tasks
Route::post('/getTaskByUser','App\Http\Controllers\TasksController@getTaskByUser');

//Add Tasks
Route::post('/addTask','App\Http\Controllers\TasksController@addTask');

//Update Tasks
Route::post('/updateTask/{id}','App\Http\Controllers\TasksController@updateTask');

//Delete Task
Route::post('/deleteTask/{id}','App\Http\Controllers\TasksController@deleteTask');


