<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class QaRatingController extends Controller
{
    public function qaRatings() {
        $ratings = Rate::all();
        return view('admin.qa-rate.index', compact('ratings'));
    }

    public function verifyRating(Request $request, $ratingId) {
        $rating = Rate::whereId($ratingId)->first();
        $rating->is_verified = $rating->is_verified ? 0 : 1;
        $rating->save();

        return true;
    }
}
