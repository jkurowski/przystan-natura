<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// CMS
use App\Models\Investment;
use App\Http\Controllers\Api\History\IndexController as DatasetController;

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

Route::middleware('api')->group(function () {

    Route::get('/xml/create', [DatasetController::class, 'createXml']);
    Route::get('/xml/update', [DatasetController::class, 'updateXml']);
    Route::get('/xml/showAsTable/{investment}', [DatasetController::class, 'showAsTable']);
    Route::get('/xml/generate-md5', [DatasetController::class, 'generateMD5']);
    Route::get('/xml/send-to-ftp', [DatasetController::class, 'sendToFTP']);

    Route::get('/api/inwestycje', function () {
        return Investment::where('status', 1)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
    });
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
