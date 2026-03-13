<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIagentController;

Route::post('/ai-agent', [AIAgentController::class, 'ask']);


