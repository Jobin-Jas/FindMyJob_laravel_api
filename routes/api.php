<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

/*
 *
 * Auth
 */
Route::group([
    'prefix'=>'auth'
], function(){
    Route::post('/signup', [AuthenticationController::class, 'createNewUser']);
    Route::post('login', [AuthenticationController::class, 'loginWIthEmail']);   
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix'=>'profile',
    'middleware' => ['auth:sanctum']
], function(){
    Route::post('/', [ProfileController::class, 'create']);
    Route::get('', [ProfileController::class, 'show']);
    Route::put('/', [ProfileController::class, 'update']);   
});
