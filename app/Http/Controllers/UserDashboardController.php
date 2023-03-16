<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\DaysSlot;
use App\Models\SchduledMeeting;
use App\Models\ScheduleMeeting;
use App\Models\Forum;
use App\Models\User;
use App\Models\ChatOnline;
use App\Models\LawyerConsultation;
use App\Traits\ZoomMeetingTrait;
use DateTime;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function dashboard() {
        if(session('checkoutId') && session('date')) {
            $checkoutId = session('checkoutId');
            $date = session('date');
            session()->forget('checkoutId');
            session()->forget('date');
    
            $getScheduledDetails = SchduledMeeting::whereCheckoutId($checkoutId)->first();
            $lawyer = User::whereId($getScheduledDetails->lawyer_id)->first();
            $slot = DaysSlot::whereId($getScheduledDetails->days_slot_id)->first();
    
            if(str_contains($slot->slot_start_time, "am")) {
                $startTime = str_replace("am", "", $slot->slot_start_time);
            }else {
                $startTime = str_replace("pm", "", $slot->slot_start_time);
            }
    
            $endTime = $slot->slot_end_time;
    
            if(str_contains($endTime, "am")) {
                $endTime = str_replace("am", "", $endTime);
            }else {            
                $endTime = str_replace("pm", "", $endTime);
            }
    
            $duration = $this->getDuration($date, $startTime, $endTime);
            $data = [];
            
            $data['topic']              = "One to one meeting for";
            $data['start_time']         = $date.'T'.$startTime.':00';
            $data['end_time']           = $date.'T'.$endTime.':00';
            $data['duration']           = $duration;
            $data['agenda']             = "Meeting Agenda";
            $data['host_video']         = 1;
            $data['participant_video']  = 1;
            $data['email']              = $lawyer->email;
            $data['daySlotId']          = $slot->id;
            $data['paymentId']          = $getScheduledDetails->id;
            $this->create($data);
            
            Alert::success('Meeting Scheduled', 'Successfully scheduled the meeting');
            return redirect()->route('user.dashboard');       
        }else {
            $data['questions_asked'] = Forum::whereUserId(auth()->user()->id)
            ->latest()
            ->take(3)
            ->get();

            $data['lawyers_consulted_count'] = LawyerConsultation::whereUserId(auth()->user()->id)->count();            
            $data['lawyers_consulted'] = LawyerConsultation::whereUserId(auth()->user()->id)
            ->latest()
            ->take(3)
            ->get();

            $data['service_purchased_count'] = SchduledMeeting::whereScheduledBy(auth()->user()->id)->count();   
            $data['service_purchased'] = SchduledMeeting::whereScheduledBy(auth()->user()->id)
            ->latest()
            ->take(3)
            ->get();

            $data['chat_requests_count'] = ChatOnline::whereUserId(auth()->user()->id)->count();   
            $data['chat_requests_completed_count'] = ChatOnline::whereUserId(auth()->user()->id)
            ->whereComplete(1)
            ->count();   
            $data['chat_requests'] = ChatOnline::whereUserId(auth()->user()->id)
            ->latest()
            ->take(3)
            ->get();


            return view('common.user.dashboard', compact('data'));
        }
    }

    public function getDuration($date, $startTime, $endTime) {
        $time1 = new DateTime($date.' '.$startTime.':00');
        $time2 = new DateTime($date.' '.$endTime.':00');
        $duration = $time1->diff($time2);
        return (int) $duration->format('%i');
    }
}
