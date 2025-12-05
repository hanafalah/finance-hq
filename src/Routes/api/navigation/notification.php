<?php

use Illuminate\Support\Facades\Route;
use Projects\FinanceHq\Controllers\API\Navigation\Notification\NotificationController;

Route::apiResource('notification',NotificationController::class)->parameters(['notification' => 'id']);