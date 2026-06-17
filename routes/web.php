<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditController;



Route::get('/', [CreditController::class, 'step1'])->name('credit.step1');
Route::get('/passport', [CreditController::class, 'step2'])->name('credit.step2');
Route::get('/inn-snils', [CreditController::class, 'step3'])->name('credit.step3');
Route::get('/work', [CreditController::class, 'step4'])->name('credit.step4');
Route::get('/credit-params', [CreditController::class, 'step5'])->name('credit.step5');
Route::get('/collateral', [CreditController::class, 'step6'])->name('credit.step6');
Route::get('/bank', [CreditController::class, 'step7'])->name('credit.step7');


Route::post('/save-step/{step}', [CreditController::class, 'saveStep'])->name('save');


Route::post('/generate', [CreditController::class, 'generate'])->name('credit.generate');


Route::get('/clear', [CreditController::class, 'clearSession'])->name('credit.clear');

