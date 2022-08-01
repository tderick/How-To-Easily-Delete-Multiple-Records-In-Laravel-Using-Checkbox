<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;

Route::get("/contact", [ContactController::class, 'index']);

Route::post("/send-message", [ContactController::class, 'store']);

Route::get("/admin/view-messages", [ContactController::class, 'listMessages']);
Route::get("/admin/messages/{id}", [ContactController::class, 'message_details']);
Route::delete("/admin/messages/{id}/delete", [ContactController::class, 'delete_message']);
