<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\ForumAnswers;
use Illuminate\Http\Request;

class QuestionAnswerController extends Controller
{
    public function list() {
        $forums = Forum::whereIsVerified(1)->get();
        $ids = [];
        foreach($forums as $k => $forum) {
            if(!$forum->to_lawyer || $forum->to_lawyer == auth()->user()->id) {
                $ids[] = $forum->id;
            }
        } 
        $forums = Forum::whereIn('id', $ids)->paginate(10);
        return view('lawyer.qa.list', compact('forums'));
    }

    public function view($slug) {
        $forum = Forum::whereSlug($slug)->first();
        $answers = ForumAnswers::whereForumId($forum->id)->get();
        return view('lawyer.qa.view', compact('forum', 'answers'));
    }

    public function answer(Request $request, $id) {
        $isAnswered = ForumAnswers::where([
            'forum_id'  => $id,
            'lawyer_id' => auth()->user()->id,
        ])->first();

        if(!$isAnswered) {
            $queAns = ForumAnswers::create([
                'lawyer_id' => auth()->user()->id,
                'forum_id'  => $id,
                'answer'    => $request->answer
            ]);

            $htmlPart = (string) view('lawyer.qa.email',  compact('queAns'));  
            $forum = Forum::whereId($id)->first();
            $mail_data = [
                'subject' => $forum->title,
                'htmlPart' => $htmlPart,
                'email' => $queAns->forum->email,
            ];

            $job = (new \App\Jobs\SendQAEmail($mail_data))
                    ->delay(now()->addSeconds(2)); 
    
            dispatch($job);

        }else {
            ForumAnswers::updateOrCreate(
                ['id' => $isAnswered->id],
                [
                    'lawyer_id' => auth()->user()->id,
                    'forum_id'  => $id,
                    'answer'    => $request->answer
                ]
            );
        }

        return redirect()->route('lawyer.qa.list')->with('success', 'Your answer has been submitted successfully');
    }
}
