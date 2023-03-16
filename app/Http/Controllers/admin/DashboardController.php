<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ChatOnline;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index() {
    $hiredData = Payment::take(5)->get();
    $unrespondedChatRqsts = ChatOnline::where([
      ['created_at', '<=', Carbon::now()->subDay()],
      ['reminder', 0],
      ['status', 0]
    ])->get();
    return view('admin.dashboard', compact('hiredData', 'unrespondedChatRqsts'));
  }

  public function test()
  {
    return view('content.dashboard.dashboards-analytics');
  }

  public function sendReminder($id) {
    $chatRqst = ChatOnline::whereId($id)->first();
    $chatRqst->reminder = 1;
    $chatRqst->save();

    $mail_data = [
      'subject' => "Send reminder",
      'htmlPart' => 'Some Content',
      'user' => $chatRqst->user_id ? $chatRqst->user->email : null,
    ];

    $job = (new \App\Jobs\SendReminder($mail_data))
            ->delay(now()->addSeconds(2)); 

    dispatch($job);

    return redirect()->back()->with('success', 'Sent reminder successfully');
  }
}
