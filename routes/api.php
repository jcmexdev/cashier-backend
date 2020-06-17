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

Route::get('cashier/balance', 'CashRegisterController@getOpenDay')->name('cashRegister.getOpenDay');
Route::post('cashier/balance/open/day', 'CashRegisterController@storeOpenDay')->name('cashRegister.storeOpenDay');
Route::post('cashier/balance/close/day', 'CashRegisterController@storeCloseCash')->name('cashRegister.storeCloseDay');
Route::get('has/open/cashier/balance', 'CashRegisterController@getCloseCash')->name('cashRegister.getCloseDay');
