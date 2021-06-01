<?php
/*
 * @Author: your name
 * @Date: 2021-03-24 01:25:11
 * @LastEditTime: 2021-05-27 13:59:39
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /laravel8/routes/api.php
 */

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

Route::get('/test', 'Controller@index');

//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
