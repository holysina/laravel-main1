<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/posts' ,function (){
// return  response()->json([
//'posts'=>  [
//'title' => 'cbr300',
// 'price' => '6000$',
//   'i can'

//   ]//
//]);
//});
//خب ما اول متود تعریف میکنیم بعد سراغ ریسپانس میگیریم بعد تبدیل لبه جیسان میکنیم و اطلاعات ارسال میشه :)



