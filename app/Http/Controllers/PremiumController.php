<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PremiumController extends Controller
{
    // Dashboard Premium Starter
    public function premiumStarterDashboard()
{
    $user = Auth::user();

    // Daily Personalized Menu (refresh limit 3x)
    $dailyMenu = $this->getDailyPersonalizedMenu($user);

    // Get refresh count from session (per hour)
    $refreshCount = session()->get("daily_menu_refresh_" . $user->id . "_" . date("Y-m-d"), 0);
    $refreshLeft = max(0, 3 - $refreshCount); // Starter limit 3 refresh

    // Recipes
    $recipes = Recipe::where("visibility", "public")->paginate(6);
    $premiumRecipes = Recipe::where("type", "premium")->limit(5)->get();

    // Perbaikan di sini: Gunakan ->recipes() bukan ::recipes()
    $userRecipes = $user->recipes()->latest()->limit(3)->get();

    // Daily Planner Data
    $plannerData = $this->getDailyPlannerTasks();

    // Blog articles
    $blogs = $this->getPremiumBlogArticles();

    return view('dashboard.premium-starter', compact(
        'user',
        'dailyMenu',
        'refreshLeft',
        'recipes',
        'premiumRecipes',
        'userRecipes',
        'plannerData',
        'blogs'
    ));
}

    // Dashboard Premium Starter+
    public function premiumStarterPlusDashboard()
    {
        $user = Auth::user();

        // Daily Personalized Menu (refresh limit: 5x)
        $dailyMenu = $this->getDailyPersonalizedMenu($user);

        // Get refresh count from session (per hari)
        $refreshUsed = Session::get('daily_menu_refresh_' . $user->id . '_' . date('Y-m-d'), 0);
        $refreshLeft = max(0, 5 - $refreshUsed); // Starter+: 5x refresh

        // Recipes
        $recipes = Recipe::where('visibility', 'public')->paginate(8);
        $premiumRecipes = Recipe::where('type', 'premium')->limit(10)->get();
        $userRecipes = $user->recipes()->latest()->limit(5)->get();

        // Daily Planner Data
        $plannerTasks = $this->getDailyPlannerTasks();

        // AI Chat History (simulasi)
        $aiChatHistory = $this->getAiChatHistory();

        // Blog Articles
        $blogs = $this->getPremiumBlogArticles();

        // Stats
        $stats = $this->getUserStats($user);
        $progress = $this->calculateProgress($user);

        return view('dashboard.premium-starter-plus', compact(
            'user', 'dailyMenu', 'refreshLeft', 'refreshUsed',
            'recipes', 'premiumRecipes', 'userRecipes',
            'plannerTasks', 'aiChatHistory', 'blogs', 'stats', 'progress'
        ));
    }

    // Refresh Daily Menu (AJAX)
    public function refreshDailyMenu(Request $request)
    {
        try {
            $user = Auth::user();
            $plan = $user->subscription_plan;

            // Validate plan
            if (!in_array($plan, ['starter', 'starter_plus'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Fitur ini hanya untuk user premium'
                ], 403);
            }

            // Set max refresh based on plan
            $maxRefresh = $plan === 'starter_plus' ? 5 : 3;

            // Get today's refresh count
            $sessionKey = 'daily_menu_refresh_' . $user->id . '_' . date('Y-m-d');
            $refreshUsed = Session::get($sessionKey, 0);

            // Log refresh attempt
            Log::info('Refresh attempt', [
                'user_id' => $user->id,
                'plan' => $plan,
                'refresh_used' => $refreshUsed,
                'max_refresh' => $maxRefresh
            ]);

            // Check if refresh limit reached
            if ($refreshUsed >= $maxRefresh) {
                return response()->json([
                    'success' => false,
                    'message' => 'Batas refresh harian telah habis. Coba lagi besok!',
                    'refresh_used' => $refreshUsed,
                    'max_refresh' => $maxRefresh
                ]);
            }

            // Increment refresh count
            Session::put($sessionKey, $refreshUsed + 1);

            // Get new menu
            $newMenu = $this->getDailyPersonalizedMenu($user, true);

            Log::info('Refresh successful', [
                'user_id' => $user->id,
                'new_refresh_count' => $refreshUsed + 1
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Menu berhasil di-refresh!',
                'menu' => $newMenu,
                'refresh_used' => $refreshUsed + 1,
                'refresh_left' => $maxRefresh - ($refreshUsed + 1),
                'max_refresh' => $maxRefresh
            ]);

        } catch (\Exception $e) {
            Log::error('Refresh error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    // Private Methods
    private function getDailyPersonalizedMenu($user, $forceNew = false)
    {
        $menus = [
            [
                'id' => 1,
                'name' => 'Salmon Teriyaki dengan Quinoa',
                'calories' => 420,
                'time' => '25 menit',
                'protein' => '35g',
                'carbs' => '45g',
                'fat' => '15g',
                'image' => 'salmon',
                'difficulty' => 'Sedang',
                'benefits' => ['Kaya Omega-3', 'Protein Tinggi', 'Rendah Karbohidrat'],
                'description' => 'Salmon panggang dengan saus teriyaki sehat dan quinoa sebagai sumber karbohidrat kompleks.'
            ],
            [
                'id' => 2,
                'name' => 'Bowl Ayam Panggang Mediterania',
                'calories' => 380,
                'time' => '20 menit',
                'protein' => '30g',
                'carbs' => '40g',
                'fat' => '12g',
                'image' => 'chicken',
                'difficulty' => 'Mudah',
                'benefits' => ['Kaya Serat', 'Rendah Lemak', 'Antioksidan'],
                'description' => 'Ayam panggang dengan sayuran mediterania dan dressing minyak zaitun.'
            ],
            [
                'id' => 3,
                'name' => 'Tofu Scramble dengan Sayuran',
                'calories' => 320,
                'time' => '15 menit',
                'protein' => '25g',
                'carbs' => '35g',
                'fat' => '10g',
                'image' => 'tofu',
                'difficulty' => 'Mudah',
                'benefits' => ['Vegetarian', 'Protein Nabati', 'Rendah Kalori'],
                'description' => 'Scramble tahu dengan paprika, jamur, dan bayam untuk sarapan tinggi protein.'
            ],
            [
                'id' => 4,
                'name' => 'Udang Saus Lemon dengan Brokoli',
                'calories' => 350,
                'time' => '18 menit',
                'protein' => '28g',
                'carbs' => '30g',
                'fat' => '11g',
                'image' => 'shrimp',
                'difficulty' => 'Sedang',
                'benefits' => ['Rendah Kalori', 'Kaya Protein', 'Vitamin C'],
                'description' => 'Udang segar dengan saus lemon dan brokoli kukus sebagai pendamping.'
            ],
        ];

        // Get or set today's menu for this user
        $sessionMenuKey = 'daily_menu_' . $user->id . '_' . date('Y-m-d');

        if ($forceNew || !Session::has($sessionMenuKey)) {
            // Generate deterministic but varied menu based on user ID and date
            $dayOfYear = date('z');
            $menuIndex = ($user->id + $dayOfYear) % count($menus);

            // If forcing new, get a different menu
            if ($forceNew) {
                $currentMenuId = Session::get($sessionMenuKey . '_id', 0);
                $availableMenus = array_filter($menus, function($menu) use ($currentMenuId) {
                    return $menu['id'] != $currentMenuId;
                });

                if (!empty($availableMenus)) {
                    $newMenu = $availableMenus[array_rand($availableMenus)];
                } else {
                    $newMenu = $menus[$menuIndex];
                }
            } else {
                $newMenu = $menus[$menuIndex];
            }

            // Store in session
            Session::put($sessionMenuKey, $newMenu);
            Session::put($sessionMenuKey . '_id', $newMenu['id']);
        }

        return Session::get($sessionMenuKey);
    }

    private function calculateProgress($user)
    {
        $totalWeightToLose = $user->weight_difference;

        // Simulate progress
        $daysSinceJoin = $user->created_at->diffInDays(now());
        $estimatedDailyLoss = 0.1; // 100g per day
        $weightLost = min($totalWeightToLose, $daysSinceJoin * $estimatedDailyLoss);

        $currentProgress = $totalWeightToLose > 0 ?
            min(100, ($weightLost / $totalWeightToLose) * 100) : 100;

        return [
            'percentage' => round($currentProgress, 1),
            'weight_lost' => number_format($weightLost, 1),
            'target_remaining' => number_format(max(0, $totalWeightToLose - $weightLost), 1),
            'streak_days' => min($daysSinceJoin, rand(7, 45)),
            'total_days' => $daysSinceJoin,
        ];
    }

    private function getDailyPlannerTasks()
    {
        $today = now()->format('Y-m-d');
        $tasks = [
            [
                'id' => 1,
                'task' => 'Sarapan: Oatmeal dengan buah',
                'time' => '07:00',
                'completed' => false,
                'icon' => '🌅',
                'category' => 'makan',
                'calories' => 280
            ],
            [
                'id' => 2,
                'task' => 'Minum air 500ml',
                'time' => '08:00',
                'completed' => false,
                'icon' => '💧',
                'category' => 'hidrasi',
                'calories' => 0
            ],
            [
                'id' => 3,
                'task' => 'Olahraga: Jogging 30 menit',
                'time' => '09:00',
                'completed' => false,
                'icon' => '🏃',
                'category' => 'olahraga',
                'calories' => -200
            ],
            [
                'id' => 4,
                'task' => 'Makan Siang: Menu personalized',
                'time' => '12:00',
                'completed' => false,
                'icon' => '🍽️',
                'category' => 'makan',
                'calories' => 420
            ],
            [
                'id' => 5,
                'task' => 'Snack sehat: Yoghurt Greek',
                'time' => '15:00',
                'completed' => false,
                'icon' => '🥛',
                'category' => 'snack',
                'calories' => 150
            ],
            [
                'id' => 6,
                'task' => 'Makan Malam: Protein & sayur',
                'time' => '19:00',
                'completed' => false,
                'icon' => '🌙',
                'category' => 'makan',
                'calories' => 380
            ],
            [
                'id' => 7,
                'task' => 'Minum air 500ml sebelum tidur',
                'time' => '21:00',
                'completed' => false,
                'icon' => '💧',
                'category' => 'hidrasi',
                'calories' => 0
            ],
        ];

        // Check session for completed tasks today
        foreach ($tasks as &$task) {
            $taskKey = 'planner_task_' . $task['id'] . '_' . $today . '_' . Auth::id();
            $task['completed'] = Session::get($taskKey, false);
        }

        return $tasks;
    }

    private function getAiChatHistory()
    {
        return [
            [
                'id' => 1,
                'role' => 'ai',
                'message' => 'Halo! Saya AI Assistant EJOY. Ada yang bisa saya bantu mengenai program diet Anda?',
                'time' => '10:30',
                'date' => now()->format('Y-m-d')
            ],
            [
                'id' => 2,
                'role' => 'user',
                'message' => 'Bagaimana cara menurunkan 5kg dalam 1 bulan?',
                'time' => '10:32',
                'date' => now()->format('Y-m-d')
            ],
            [
                'id' => 3,
                'role' => 'ai',
                'message' => 'Untuk turun 5kg dalam 1 bulan, perlu defisit 500-750 kalori/hari. Sarankan: 1) Makan 1500 kalori/hari 2) Olahraga 30 menit/hari 3) Minum 2L air 4) Tidur cukup 7-8 jam.',
                'time' => '10:33',
                'date' => now()->format('Y-m-d')
            ],
        ];
    }

    private function getPremiumBlogArticles()
    {
        return [
            [
                'id' => 1,
                'title' => 'Strategi Diet Defisit Kalori yang Aman',
                'category' => 'Premium',
                'read_time' => '5 min',
                'excerpt' => 'Panduan lengkap menghitung defisit kalori tanpa kelaparan dan menjaga metabolisme tetap aktif.',
                'views' => 1245,
                'likes' => 89
            ],
            [
                'id' => 2,
                'title' => 'Meal Prep untuk 7 Hari: Panduan Lengkap',
                'category' => 'Tips',
                'read_time' => '8 min',
                'excerpt' => 'Cara menyiapkan makanan sehat untuk seminggu dalam 2 jam. Hemat waktu dan tetap konsisten diet.',
                'views' => 987,
                'likes' => 67
            ],
            [
                'id' => 3,
                'title' => 'Suplemen untuk Diet: Perlukah?',
                'category' => 'Edukasi',
                'read_time' => '6 min',
                'excerpt' => 'Analisis kebutuhan suplemen selama program diet. Mana yang benar-benar bekerja berdasarkan science.',
                'views' => 1543,
                'likes' => 112
            ],
        ];
    }

    private function getUserStats($user)
    {
        $progress = $this->calculateProgress($user);

        return [
            'weight_loss' => $progress['weight_lost'] . ' kg',
            'days_streak' => $progress['streak_days'],
            'meals_logged' => rand(50, 200),
            'water_intake' => '2.5L',
            'calories_burned' => rand(5000, 15000),
            'progress_percentage' => $progress['percentage'],
        ];
    }

    // Update planner task (AJAX)
public function updatePlannerTask(Request $request)
{
    $request->validate([
        'task_id' => 'required|integer',
        'completed' => 'required|boolean'
    ]);

    $user = Auth::user();
    $today = now()->format('Y-m-d');
    $taskKey = 'planner_task_' . $request->task_id . '_' . $today . '_' . $user->id;

    Session::put($taskKey, $request->completed);

    // Calculate current progress
    $tasks = $this->getDailyPlannerTasks();
    $totalTasks = count($tasks);
    $completedTasks = collect($tasks)->where('completed', true)->count();
    $progressPercentage = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

    return response()->json([
        'success' => true,
        'message' => 'Task updated',
        'completed' => $request->completed,
        'progress' => $progressPercentage,
        'completed_tasks' => $completedTasks,
        'total_tasks' => $totalTasks
    ]);
}
}
