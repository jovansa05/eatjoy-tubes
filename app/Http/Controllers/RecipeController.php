<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Show the form for creating a new recipe.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created recipe in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'calories' => 'required|integer|min:1|max:5000',
            'ingredients' => 'required|array|min:1',
            'ingredients.*' => 'required|string',
            'instructions' => 'required|array|min:1',
            'instructions.*' => 'required|string',
            'cooking_time' => 'required|integer|min:1|max:480',
            'difficulty' => 'required|in:easy,medium,hard',
            'type' => 'required|in:regular,premium',
            'visibility' => 'required|in:public,private',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe-images', 'public');
        }

        // Create recipe
        $recipe = Recipe::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'calories' => $validated['calories'],
            'ingredients' => $validated['ingredients'],
            'instructions' => $validated['instructions'],
            'cooking_time' => $validated['cooking_time'],
            'difficulty' => $validated['difficulty'],
            'type' => $validated['type'],
            'visibility' => $validated['visibility'],
            'image' => $imagePath,
        ]);

        return redirect()->route('recipes.show', $recipe->id)
            ->with('success', 'Menu berhasil dibuat!');
    }

    /**
     * Display all user's recipes.
     */
    public function myRecipes()
    {
        $recipes = Auth::user()->recipes()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('recipes.my-recipes', compact('recipes'));
    }

    /**
     * Display the specified recipe.
     */
    public function show($id)
    {
        $recipe = Recipe::with('user')->findOrFail($id);

        // Check if recipe is private and user is not the owner
        if ($recipe->visibility === 'private' && $recipe->user_id !== Auth::id()) {
            abort(403, 'Menu ini bersifat pribadi.');
        }

        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified recipe.
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);

        // Authorization check
        if ($recipe->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit menu ini.');
        }

        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified recipe in storage.
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        // Authorization check
        if ($recipe->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit menu ini.');
        }

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'calories' => 'required|integer|min:1|max:5000',
            'ingredients' => 'required|array|min:1',
            'ingredients.*' => 'required|string',
            'instructions' => 'required|array|min:1',
            'instructions.*' => 'required|string',
            'cooking_time' => 'required|integer|min:1|max:480',
            'difficulty' => 'required|in:easy,medium,hard',
            'type' => 'required|in:regular,premium',
            'visibility' => 'required|in:public,private',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($recipe->image) {
                Storage::disk('public')->delete($recipe->image);
            }

            $imagePath = $request->file('image')->store('recipe-images', 'public');
            $validated['image'] = $imagePath;
        }

        $recipe->update($validated);

        return redirect()->route('recipes.show', $recipe->id)
            ->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Remove the specified recipe from storage.
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);

        // Authorization check
        if ($recipe->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus menu ini.');
        }

        // Delete image if exists
        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();

        return redirect()->route('recipes.my')
            ->with('success', 'Menu berhasil dihapus!');
    }
}
