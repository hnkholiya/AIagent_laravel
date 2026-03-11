<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AIAgentController;
use App\Http\Controllers\AIagentController as ControllersAIagentController;

Route::post('/ai-agent',[ControllersAIagentController::class,'ask']);