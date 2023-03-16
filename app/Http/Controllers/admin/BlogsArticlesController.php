<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogsArticles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogsArticlesController extends Controller
{
    public function index() {
        $blogsArticles = BlogsArticles::all();
        return view('admin.blogs-articles.index', compact('blogsArticles'));
    }

    public function create() {
        return view('admin.blogs-articles.create');
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'title'                     => 'required|unique:blogs_articles',       
            'image'                     => 'required',       
            'short_description'         => 'required',       
            'written_by'                => 'required',       
            'description'               => 'required',       
        ]);

        $blogArticle = BlogsArticles::create([
            'title'             => $request->title,
            'description'       => $request->short_description,
            'written_by'        => $request->written_by,
            'full_descr'        => $request->description,
        ]);
        $this->blogImage($blogArticle, $request);
        return redirect()->route('admin.blogs-articles')->with('success', 'Created blogs and articles successfully');
    }

    public function edit($id) {
        $blog = BlogsArticles::whereId($id)->first();
        return view('admin.blogs-articles.edit', compact('blog'));
    }

    public function update(Request $request, $id) {
        $this->validate(request(), [
            'title'                     => 'required|unique:blogs_articles,title, '.$id,       
            'short_description'         => 'required',       
            'written_by'                => 'required',       
            'description'               => 'required',       
        ]);

        $blogArticle = BlogsArticles::updateOrCreate(
            ['id' => $id],
            [
                'title'             => $request->title,
                'description'       => $request->short_description,
                'written_by'        => $request->written_by,
                'full_descr'        => $request->description,
            ]
        );
        $this->blogImage($blogArticle, $request);
        return redirect()->route('admin.blogs-articles')->with('success', 'Updated blogs and articles successfully');
    }

    public function delete($id) {
        BlogsArticles::whereId($id)->delete();
        return redirect()->route('admin.blogs-articles')->with('success', 'Deleted blogs and articles successfully');
    }

    public function imageUpload(Request $request) {
        print_r($request->all());exit;
    }

    public function blogImage($blogArticle, $request) {
        $imageDir = 'blog/article/' . $blogArticle->id;

        $image = $request->file('image');
        if ($request->hasFile('image')) {
            if ($blogArticle->image) {
                Storage::delete($blogArticle->image);
            }
            $blogArticle->image = '/storage/'.$image->store($imageDir);
            $blogArticle->save();
        }
        return true;
    }
}
