<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LawCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categories() {
        $categories = LawCategory::all();
        return view('admin.category.index', compact('categories'));
    }

    public function createCategory() {
        return view('admin.category.create');
    }

    public function storeCategory(Request $request) {
        $this->validate(request(), [
            'category'         => 'required|unique:law_categories',       
        ]);

        LawCategory::create([
            'category' => $request->category,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category added successfully');
    }

    public function editCategory($id) {
        $category = LawCategory::whereId($id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id) {
        $this->validate(request(), [
            'category'         => 'required|unique:law_categories,category,'.$id,       
        ]);

        LawCategory::updateOrCreate(
            ['id' => $id],
            [
                'category' => $request->category,
            ]
        );

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
    }

    public function deleteCategory($id) {
        LawCategory::whereId($id)->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
    }   
}
