<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Device;
use App\Models\User;
use App\Models\UserFace;
use App\Models\UserScan;
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


Route::post('/device/{id}/online', function (Request $request, $id) {
    $device = Device::findOrFail($id);
    $device->last_online = Carbon::now();
    $device->is_online = true;
    $device->save();
    return $device;
});

Route::post('/device/{id}/donescan', function (Request $request, $id) {
    $device = Device::findOrFail($id);
    $device->is_scan = 0;
    $device->save();
    return $device;
});

Route::post('/device/{id}/addface', function (Request $request, $id) {
    $device = Device::findOrFail($id);
    $device->is_add_face = 0;
    $device->save();
    return $device;
});


Route::post('/device/{id}/scan', function (Request $request, $id) {
    $device = Device::findOrFail($id);
    
    $user = User::where('email',$request->userId)->first();

    $newScan = new UserScan;
    $newScan->user_id = $user->id;
    $newScan->prisoner_id = 1;
    $newScan->cell_id = 1;
    $newScan->reason = null;
    $newScan->status = true;
    $newScan->is_active = true;
    $newScan->is_scan = true;
    $newScan->save();
    
    $device->is_scan = 0;
    $device->save();

    return $device;
});

Route::post('/device/{id}/addFace/add', function (Request $request, $id) {
    $device = Device::findOrFail($id);
    $addFace = UserFace::where('is_scan', false)->where('user_id', $request->userId)->with('user')->first();
    $addFace->is_scan = true;
    $addFace->save();

    $newScan = new UserScan;
    $newScan->user_id = $request->userId;
    $newScan->prisoner_id = 1;
    $newScan->cell_id = 1;
    $newScan->reason = null;
    $newScan->status = true;
    $newScan->is_active = true;
    $newScan->is_scan = true;
    $newScan->save();

    $device->is_add_face = false;
    $device->save();
    return $device;
});

Route::get('/device/{id}', function ($id) {
    $mutable = Carbon::now();
    $device = Device::findOrFail($id);
    if($device->last_online < $mutable->add(-2, 'minute')){
        $device->is_online = 0;
        $device->save();
    }
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

Route::get('/device/{id}/scanFace', function ($id) {
    $addFace = UserScan::where('is_scan',false)->with('user')->first();
    if($addFace){
        return $addFace->toJson();
    }else{
        return null;
    }
});
