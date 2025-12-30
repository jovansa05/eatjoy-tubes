<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiChatController;

// ==============================================
// GUEST ROUTES
// ==============================================

// Home Page (Guest View)
Route::get('/', [DashboardController::class, 'guestView'])->name('home');

// Auth Routes (Login & Register)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/subscription/pay-redirect', [SubscriptionController::class, 'payRedirect'])
    ->name('subscription.pay.redirect');

Route::get('/subscription/finish', [SubscriptionController::class, 'finish'])
    ->name('subscription.finish');


// ==============================================
// PROTECTED ROUTES (Harus Login)
// ==============================================
Route::middleware(['auth'])->group(function () {

    // ========== DASHBOARD ROUTES ==========
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard.user');
    Route::get('/dashboard/premium/starter', [PremiumController::class, 'premiumStarterDashboard'])->name('dashboard.premium.starter');
    Route::get('/dashboard/premium/starter-plus', [PremiumController::class, 'premiumStarterPlusDashboard'])->name('dashboard.premium.starter.plus');

    // ========== SUBSCRIPTION ROUTES ==========
    Route::get('/subscription/plans', [SubscriptionController::class, 'showPlans'])->name('subscription.plans');
    Route::post('/subscription/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscription.subscribe');

    // ========== RECIPE/MENU ROUTES ==========
    // Create Menu
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');

    // My Recipes (Menu Saya)
    Route::get('/my-recipes', [RecipeController::class, 'myRecipes'])->name('recipes.my');

    // View Single Recipe
    Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');

    // Edit Recipe
    Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');

    // Delete Recipe
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // ========== PREMIUM FEATURES API ROUTES ==========
    Route::prefix('premium')->group(function () {
        // Daily Menu Refresh
        Route::post('/refresh-menu', [PremiumController::class, 'refreshDailyMenu'])->name('premium.refresh.menu');
        Route::get('/daily-menu', [PremiumController::class, 'getDailyMenu'])->name('premium.daily.menu');

        // Daily Planner
        Route::post('/update-planner', [PremiumController::class, 'updatePlannerTask'])->name('premium.update.planner');

        // Weight Progress (For Chart)
        Route::post('/update-weight', [PremiumController::class, 'updateWeightProgress'])->name('premium.update.weight');
        Route::get('/weight-history', [PremiumController::class, 'getWeightHistory'])->name('premium.weight.history');

        Route::post('/ai/chat', [AiChatController::class, 'chat'])
        ->middleware(['auth'])
        ->name('ai.chat');

    });



    // ========== LOGOUT ==========
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ==============================================
// FALLBACK ROUTE (404 Page)
// ==============================================
Route::fallback(function () {
    return redirect('/');

return response()->json([
  'reply' => $reply
]);

});

