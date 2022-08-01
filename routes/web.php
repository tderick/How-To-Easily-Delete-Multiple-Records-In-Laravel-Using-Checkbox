<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post("/authenticate", [LoginController::class, 'authenticate']);

Route::get("/contact", [ContactController::class, 'index']);
Route::post("/send-message", [ContactController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get("/admin/view-messages", [ContactController::class, 'listMessages']);
    Route::get("/admin/messages/{id}", [ContactController::class, 'message_details']);
    Route::delete("/admin/messages/{id}/delete", [ContactController::class, 'delete_message']);

    Route::post("/logout", [LoginController::class, 'logout']);
});
