<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Device;
use App\Models\UserFace;
use Carbon\Carbon;

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

Route::get('/device/{id}', function ($id) {
    $device = Device::findOrFail($id);
    return $device->toJson();
});

Route::get('/device/{id}/addface', function ($id) {
    $addFace = UserFace::where('is_scan',false)->with('user')->first();
    if($addFace){
        return $addFace->toJson();
    }else{
        return null;
    }
});

Route::post('/device/{id}/online', function (Request $request, $id) {
    $device = Device::findOrFail($id);
    $device->last_online = Carbon::now();
    $device->is_online = true;
    $device->save();
    return $device;
});

Route::post('/device/{id}/scan', function (Request $request, $id) {
    $device = Device::findOrFail($id);
    return $device;
});

Route::post('/device/{id}/addFace', function (Request $request, $id) {
    $device = Device::findOrFail($id);
    $addFace = UserFace::where('is_scan',false)->with('user')->first();
    return $device;
});
