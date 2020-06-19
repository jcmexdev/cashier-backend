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

Route::get('cashier/balance', 'CashRegisterController@getOpenCashRegister')->name('cashRegister.getOpenCashRegister');
Route::post('cashier/balance/open/day', 'CashRegisterController@storeOpenCashRegister')->name('cashRegister.storeOpenCashRegister');
Route::post('cashier/balance/close/day', 'CashRegisterController@storeCloseCashRegister')->name('cashRegister.storeCloseCashRegister');
Route::get('has/open/cashier/balance', 'CashRegisterController@getCloseCashRegister')->name('cashRegister.getCloseCashRegister');
