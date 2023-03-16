<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumAnswers extends Model
{
    use HasFactory;

    protected $fillable = [
        'lawyer_id',
        'forum_id',
        'answer',
    ];

    public function lawyer() {
        return $this->belongsTo(User::class);
    }

    public function getPosition($userId) {
        $position = Lawyer::whereUserId($userId)->first();
        return $position->position;
    }

    public function forum() {
        return $this->belongsTo(Forum::class);
    }
    
    public function getProfilePic($id) {
        $lawyer =  Lawyer::whereUserId($id)->first();
        return $lawyer->profile_pic;
    }

    public function isRatedAlready($answerId) {
        $isRated = Rate::where([
            'answer_id' => $answerId,
            'rated_by'  => auth()->user()->id
        ])->first();

        return $isRated ? true : false;
    }

    public function getRating($answerId) {
        $rating = Rate::where([
            'answer_id' => $answerId,
            'rated_by'  => auth()->user()->id
        ])->first();

        return $rating ? $rating->rate : 0;
    }

    public function getComment($answerId) {
        $rating = Rate::where([
            'answer_id' => $answerId,
            'rated_by'  => auth()->user()->id
        ])->first();

        return $rating->comment ?? 'No Comments';
    }

    public function ratingData($answerId) {
        $rating = Rate::where([
            'answer_id'     => $answerId,
            'is_verified'   => 1
        ])->get();

        $one = 0;
        $two = 0;
        $three = 0;
        $four = 0;
        $five = 0;
        $totalRatings = 0;
        $avg = 0;

        foreach($rating as $k => $rate) {
            switch($rate->rate) {
                case(1):
                    ++$totalRatings;
                    ++$one;
                    break;
                case(2):  
                    ++$totalRatings;
                    ++$two;                  
                    break;
                case(3):  
                    ++$totalRatings;
                    ++$three;                  
                    break;
                case(4):  
                    ++$totalRatings;
                    ++$four;                  
                    break;
                case(5):  
                    ++$totalRatings;
                    ++$five;                  
                    break;
                default:
                    $msg = 'Something went wrong.';
            }
        }

        if($rating->count() > 0) {
            $avg = (1 * $one + 2 * $two + 3 * $three + 4 * $four + 5 * $five) / $totalRatings;
        }
        
        return $rating ? $avg :  false;
    }

    public function getViews($forumId) {
        $getViews = ForumAnswers::whereForumId($forumId)->first();
        return $getViews->views;
    }
    
}
