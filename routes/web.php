<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AiChatController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminRecipeController;
use App\Http\Controllers\Admin\AdminDailyPlannerTemplateController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminVisitorController;

// ==============================================
// GUEST ROUTES
// ==============================================
Route::get('/', [DashboardController::class, 'guestView'])->name('home');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Google OAuth
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');

// Midtrans redirect helper & finish
Route::post('/subscription/pay-redirect', [SubscriptionController::class, 'payRedirect'])
    ->name('subscription.pay.redirect');
Route::get('/subscription/finish', [SubscriptionController::class, 'finish'])
    ->name('subscription.finish');


// ==============================================
// ADMIN ROUTES (AUTH + ADMIN)
// ==============================================
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Users
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('users.show');

        // Blog CRUD
        Route::get('/blogs', [AdminBlogController::class, 'index'])->name('blogs.index');
        Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('blogs.create');
        Route::post('/blogs', [AdminBlogController::class, 'store'])->name('blogs.store');
        Route::get('/blogs/{blog}/edit', [AdminBlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/blogs/{blog}', [AdminBlogController::class, 'update'])->name('blogs.update');
        Route::delete('/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('blogs.destroy');

        // Recipe CRUD
        Route::get('/recipes', [AdminRecipeController::class, 'index'])->name('recipes.index');
        Route::get('/recipes/create', [AdminRecipeController::class, 'create'])->name('recipes.create');
        Route::post('/recipes', [AdminRecipeController::class, 'store'])->name('recipes.store');
        Route::get('/recipes/{recipe}/edit', [AdminRecipeController::class, 'edit'])->name('recipes.edit');
        Route::put('/recipes/{recipe}', [AdminRecipeController::class, 'update'])->name('recipes.update');
        Route::delete('/recipes/{recipe}', [AdminRecipeController::class, 'destroy'])->name('recipes.destroy');

        // Daily Planner Template (premium)
        Route::get('/planner', [AdminDailyPlannerTemplateController::class, 'index'])->name('planner.index');
        Route::get('/planner/create', [AdminDailyPlannerTemplateController::class, 'create'])->name('planner.create');
        Route::post('/planner', [AdminDailyPlannerTemplateController::class, 'store'])->name('planner.store');
        Route::get('/planner/{template}/edit', [AdminDailyPlannerTemplateController::class, 'edit'])->name('planner.edit');
        Route::put('/planner/{template}', [AdminDailyPlannerTemplateController::class, 'destroy'])->name('planner.destroy');

        // Visitors (opsional)
        Route::get('/visitors', [AdminVisitorController::class, 'index'])->name('visitors.index');
    });

Route::middleware(['auth', 'check.subscription'])->group(function () {
    // My Menu (list menu buatan user)
    Route::get('/my-recipes', [RecipeController::class, 'myRecipes'])->name('recipes.my');

    // Create
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');

    // Read (detail)
    Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

    // Update
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');

    // Delete
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});

// ==============================================
// PROTECTED ROUTES (Harus Login)
// ==============================================
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard.user');
    Route::get('/dashboard/premium/starter', [PremiumController::class, 'premiumStarterDashboard'])->name('dashboard.premium.starter');
    Route::get('/dashboard/premium/starter-plus', [PremiumController::class, 'premiumStarterPlusDashboard'])->name('dashboard.premium.starter.plus');

    // Subscription
    Route::get('/subscription/plans', [SubscriptionController::class, 'plans'])->name('subscription.plans');
    Route::get('/subscription/checkout/{plan}', [SubscriptionController::class, 'checkout'])->name('subscription.checkout');
    Route::post('/subscription/free', [SubscriptionController::class, 'subscribeFree'])->name('subscription.free');
    Route::post('/subscription/demo-activate', [SubscriptionController::class, 'demoActivate'])
    ->name('subscription.demo.activate')
    ->middleware('auth');

    // Recipes (User)
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/my-recipes', [RecipeController::class, 'myRecipes'])->name('recipes.my');
    Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
    Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // Premium API
    Route::prefix('premium')->group(function () {
        Route::post('/refresh-menu', [PremiumController::class, 'refreshDailyMenu'])->name('premium.refresh.menu');
        Route::get('/daily-menu', [PremiumController::class, 'getDailyMenu'])->name('premium.daily.menu');

        Route::post('/update-planner', [PremiumController::class, 'updatePlannerTask'])->name('premium.update.planner');

        Route::post('/update-weight', [PremiumController::class, 'updateWeightProgress'])->name('premium.update.weight');
        Route::get('/weight-history', [PremiumController::class, 'getWeightHistory'])->name('premium.weight.history');

        Route::post('/ai/chat', [AiChatController::class, 'chat'])->name('ai.chat');
    });

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// ==============================================
// FALLBACK ROUTE
// ==============================================
Route::fallback(function () {
    return redirect('/');
});
