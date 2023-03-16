<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function languages() {
        $languages = Language::all();
        return view('admin.language.index', compact('languages'));
    }

    public function createLang() {
        return view('admin.language.create');
    }

    public function storeLang(Request $request) {
        $this->validate(request(), [
            'language'         => 'required|unique:languages',       
        ]);

        Language::create([
            'language' => $request->language,
        ]);

        return redirect()->route('admin.languages')->with('success', 'Language added successfully');
    }

    public function editLang($id) {
        $language = Language::whereId($id)->first();
        return view('admin.language.edit', compact('language'));
    }

    public function updateLang(Request $request, $id) {
        $this->validate(request(), [
            'language'         => 'required|unique:languages,language,'.$id,       
        ]);

        Language::updateOrCreate(
            ['id' => $id],
            [
                'language' => $request->language,
            ]
        );

        return redirect()->route('admin.languages')->with('success', 'Language updated successfully');
    }

    public function deleteLang($id) {
        Language::whereId($id)->delete();
        return redirect()->route('admin.languages')->with('success', 'Language deleted successfully');
    }   
}
