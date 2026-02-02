<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeExplainerController;

/**
 * Display the code explainer page.
 *
 * @route GET /
 * @controller CodeExplainerController@index
 * @return \Illuminate\Contracts\View\View
 */
Route::get('/', [CodeExplainerController::class, 'index']);

/**
 * Explain submitted source code (any language).
 *
 * @route POST /explain
 * @controller CodeExplainerController@explain
 * @param string code
 * @return \Illuminate\Contracts\View\View
 */
Route::post('/explain', [CodeExplainerController::class, 'explain']);
