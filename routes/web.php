<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{IndexController,
    AuthController,
    OrderController,
    AdminController
};

Route::get("/", [IndexController::class, "index"])
    ->name("home");

Route::controller(AuthController::class)->group(function () {
    Route::post("/register", "register");
    Route::post("/login", "login");
    Route::get("logout", "logout")->name("logout");
});

Route::middleware(["auth"])->group(function () {
    Route::controller(OrderController::class)->group(function () {
        Route::get("/user", "index")->name("profile");
        Route::post("/user", "store");
        Route::delete("/user/{order}", "delete")->name("order.delete");
    });

    Route::middleware(["admin"])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get("/groom", "index")->name("admin");
            Route::patch("/groom/{order}", "changeStatus");
        });
    });
});




