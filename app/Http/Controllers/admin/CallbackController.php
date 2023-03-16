<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Callback;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function callbackRequests() {
        $callbackRequests = Callback::all();
        return view('admin.callback.index', compact('callbackRequests'));
    }
}
