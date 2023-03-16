<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class HireController extends Controller
{
    public function index() {
        $hired = Payment::all();
        return view('admin.hired.index', compact('hired'));
    }
}
