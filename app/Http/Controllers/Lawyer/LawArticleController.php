<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\LawArticle;
use App\Models\LawCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LawArticleController extends Controller
{
    public function index() {
        $articles = LawArticle::all();
        return view('lawyer.law-article.index', compact('articles'));
    }

    public function categories() {
        $categories = LawCategory::all();
        if(auth()->user()->id == 1) {
            return view('admin.category.index', compact('categories'));
        }else {
            return view('lawyer.law-article.category.index', compact('categories'));
        }
    }


    public function create() {
        $categories = LawCategory::pluck('category', 'id');
        return view('lawyer.law-article.create', compact('categories'));
    }

    public function createCategory() {
    return view('lawyer.law-article.category.create');
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'title'         => 'required',       
            'description'   => 'required',       
        ]);

        $article = LawArticle::create([
            'category_id'   => $request->category,
            'added_by'      => auth()->user()->id,
            'title'         => $request->title,
            'descr'         => $request->description,
        ]);

        $this->articleImage($article, $request);
        return redirect()->route('lawyer.article')->with('success', 'Article added successfully');
    }

    public function storeCategory(Request $request) {
        $this->validate(request(), [
            'category'         => 'required|unique:law_categories',       
        ]);

        LawCategory::create([
            'category' => $request->category,
        ]);

        return redirect()->route('lawyer.article.categories')->with('success', 'Category added successfully');
    }

    public function edit($id) {
        $categories = LawCategory::pluck('category', 'id');
        $article = LawArticle::whereId($id)->first();
        return view('lawyer.law-article.edit', compact('article', 'categories'));
    }

    public function editCategory($id) {
        $category = LawCategory::whereId($id)->first();
        return view('lawyer.law-article.category.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $this->validate(request(), [
            'title'         => 'required',       
            'description'   => 'required',       
        ]);

        $article = LawArticle::updateOrCreate(
            ['id' => $id],
            [
                'category_id'   => $request->category,
                'title'         => $request->title,
                'descr'         => $request->description,
            ]
        );
        $this->articleImage($article, $request);
        return redirect()->route('lawyer.article')->with('success', 'Article updated successfully');
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

        return redirect()->route('lawyer.article.categories')->with('success', 'Category updated successfully');
    }

    public function delete($id) {
        LawArticle::whereId($id)->delete();
        return redirect()->route('lawyer.article')->with('success', 'Article deleted successfully');
    }   

    public function deleteCategory($id) {
        LawCategory::whereId($id)->delete();
        return redirect()->route('lawyer.article.categories')->with('success', 'Category deleted successfully');
    }   

    public function articleImage($article, $request) {
        $imageDir = 'lawyer/article/' . $article->id;

        $image = $request->file('image');
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete($article->image);
            }
            $article->image = $image->store($imageDir);
            $article->save();
        }
        return true;
    }
}
