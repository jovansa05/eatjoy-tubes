<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'nickname' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@ejoy.com',
            'password' => Hash::make('admin123'),
            'current_weight' => 70,
            'target_weight' => 65,
            'subscription_plan' => 'starter_plus',
        ]);

        // Create test users
        User::create([
            'nickname' => 'John Diet',
            'username' => 'john',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
            'current_weight' => 85,
            'target_weight' => 70,
            'subscription_plan' => 'free',
        ]);

        User::create([
            'nickname' => 'Jane Premium',
            'username' => 'jane',
            'email' => 'jane@example.com',
            'password' => Hash::make('password123'),
            'current_weight' => 60,
            'target_weight' => 55,
            'subscription_plan' => 'starter',
        ]);

        User::create([
            'nickname' => 'Bob Plus',
            'username' => 'bob',
            'email' => 'bob@example.com',
            'password' => Hash::make('password123'),
            'current_weight' => 95,
            'target_weight' => 80,
            'subscription_plan' => 'starter_plus',
        ]);

        // Create 25+ sample recipes
        $recipes = [
            // Regular Recipes
            [
                'title' => 'Salad Ayam Panggang',
                'description' => 'Salad sehat dengan ayam panggang dan sayuran segar, cocok untuk makan siang',
                'calories' => 350,
                'ingredients' => "200g ayam dada tanpa kulit\n100g selada romaine\n50g tomat cherry\n30g mentimun\n1 sdm minyak zaitun\n1 sdt jus lemon\nGaram dan lada secukupnya",
                'instructions' => "1. Panggang ayam dengan bumbu bawang putih, garam, dan lada selama 15 menit\n2. Potong sayuran menjadi ukuran yang diinginkan\n3. Campur semua bahan dalam mangkuk besar\n4. Tambahkan dressing minyak zaitun dan lemon\n5. Aduk rata dan sajikan segar",
                'type' => 'regular',
                'visibility' => 'public',
            ],
            [
                'title' => 'Oatmeal dengan Buah Berry',
                'description' => 'Sarapan sehat dengan oatmeal dan buah-buahan segar',
                'calories' => 280,
                'ingredients' => "50g oatmeal rolled\n200ml susu almond tanpa gula\n100g pisang\n50g strawberry\n20g kacang almond\n1 sdt madu (opsional)",
                'instructions' => "1. Masak oatmeal dengan susu almond hingga matang\n2. Potong buah pisang dan strawberry\n3. Tuang oatmeal ke mangkuk\n4. Tambahkan potongan buah dan kacang almond\n5. Beri madu jika diinginkan",
                'type' => 'regular',
                'visibility' => 'public',
            ],
            [
                'title' => 'Smoothie Green Detox',
                'description' => 'Smoothie detoks dengan sayuran hijau dan buah',
                'calories' => 220,
                'ingredients' => "100g bayam segar\n1 buah pisang\n200ml air kelapa\n1 sdm chia seed\n1/2 buah lemon (peras airnya)\nEs batu secukupnya",
                'instructions' => "1. Cuci bersih bayam\n2. Masukkan semua bahan ke dalam blender\n3. Blender hingga halus dan tercampur rata\n4. Tuang ke gelas dan segera sajikan",
                'type' => 'regular',
                'visibility' => 'public',
            ],
            [
                'title' => 'Quinoa Bowl Vegetarian',
                'description' => 'Bowl sehat dengan quinoa dan berbagai sayuran',
                'calories' => 380,
                'ingredients' => "100g quinoa\n100g brokoli\n50g jagung manis\n50g wortel\n50g paprika merah\n1 sdm minyak zaitun\nBumbu: bawang putih, garam, lada",
                'instructions' => "1. Masak quinoa sesuai petunjuk kemasan\n2. Kukus brokoli, wortel, dan paprika\n3. Tumis jagung dengan sedikit minyak\n4. Campur semua bahan dalam mangkuk\n5. Beri bumbu dan aduk rata",
                'type' => 'regular',
                'visibility' => 'public',
            ],
            [
                'title' => 'Ikan Dori Kukus',
                'description' => 'Ikan dori kukus dengan jamur dan sayuran',
                'calories' => 320,
                'ingredients' => "200g ikan dori fillet\n50g jamur shiitake\n50g tahu sutra\n1 batang daun bawang\n1 sdt kecap ikan rendah sodium\n1 sdt minyak wijen",
                'instructions' => "1. Kukus ikan dori selama 10 menit\n2. Tambahkan jamur dan tahu\n3. Kukus lagi 5 menit\n4. Taburi daun bawang\n5. Siram dengan campuran kecap ikan dan minyak wijen",
                'type' => 'regular',
                'visibility' => 'public',
            ],
            // Premium Recipes
            [
                'title' => 'Salmon Teriyaki Premium',
                'description' => 'Salmon dengan saus teriyaki khusus chef, kaya omega-3',
                'calories' => 450,
                'ingredients' => "200g salmon fillet\n2 sdm saus teriyaki rendah gula\n1 sdt madu\n1 sdt jahe parut\n50g asparagus\n1 sdt minyak wijen\nWijen putih untuk taburan",
                'instructions' => "1. Marinasi salmon dengan saus teriyaki, madu, dan jahe selama 30 menit\n2. Panggang salmon di oven 180°C selama 12-15 menit\n3. Tumis asparagus dengan minyak wijen\n4. Sajikan salmon dengan asparagus\n5. Taburi wijen putih",
                'type' => 'premium',
                'visibility' => 'public',
            ],
            [
                'title' => 'Avocado Toast dengan Telur Poach',
                'description' => 'Menu sarapan premium dengan avocado dan telur poach sempurna',
                'calories' => 380,
                'ingredients' => "2 lembar roti gandum utuh\n1 buah alpukat matang\n2 butir telur\n1 sdt jus lemon\nMerica hitam\nDaun parsley untuk hiasan\nSea salt",
                'instructions' => "1. Panggang roti gandum hingga renyah\n2. Haluskan alpukat dengan jus lemon dan sea salt\n3. Oleskan pada roti panggang\n4. Buat telur poach dengan teknik whirlpool\n5. Letakkan telur di atas avocado toast\n6. Taburi merica hitam dan parsley",
                'type' => 'premium',
                'visibility' => 'public',
            ],
            [
                'title' => 'Beef Steak dengan Sweet Potato Mash',
                'description' => 'Steak daging sapi premium dengan mashed sweet potato',
                'calories' => 520,
                'ingredients' => "150g tenderloin steak\n200g ubi jalar\n1 sdt butter rendah lemak\n2 siung bawang putih\nRosemary segar\nGaram himalaya\nLada hitam kasar",
                'instructions' => "1. Panggang steak dengan rosemary dan bawang putih\n2. Masak sesuai tingkat kematangan yang diinginkan\n3. Kukus ubi jalar hingga lunak\n4. Haluskan ubi dengan butter\n5. Sajikan steak dengan sweet potato mash",
                'type' => 'premium',
                'visibility' => 'public',
            ],
        ];

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }

        // Create additional recipes using factory
        Recipe::factory()->count(20)->create();
    }
}
