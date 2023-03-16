<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index() {
        $contactUs = ContactUs::all();
        return view('admin.contact-us.index', compact('contactUs'));
    }

    public function delete($id) {
        $delete = ContactUs::findOrFail($id);
        $delete->delete();

        return redirect()->back()->with('success', 'Deleted record successfully');
    }
}
