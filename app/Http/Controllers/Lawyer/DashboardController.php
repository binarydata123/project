<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\ArbitrationArea;
use App\Models\ChatNotification;
use App\Models\ForumAnswers;
use App\Models\Language;
use App\Models\Lawyer;
use App\Models\LawyerService;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index() {
        if(!auth()->user()->messenger_color) {
            User::updateOrCreate(['id' => auth()->user()->id],
                ['messenger_color' => auth()->user()->getColor()]
            );
        }

        $lawyerService = LawyerService::whereLawyerId(auth()->user()->id)->get();
        $paymentCompletedServiceIds = [];
        foreach($lawyerService as $k => $service) {
            $payment = Payment::whereLawyerServiceId($service->id)->first();
            if($payment)
                $paymentCompletedServiceIds[] = $payment->id;
        }
        $hiredData = Payment::whereIn('id', $paymentCompletedServiceIds)->get();

        $chatNotifications = ChatNotification::where([
            'to_user' => auth()->user()->id,
            'seen'    => 0,
            'closed'    => 0,
        ])
        ->distinct()
        ->take(3)
        ->get();
        // dd($chatNotifications);
        $questionAnswered = ForumAnswers::whereLawyerId(auth()->user()->id)->count();
        // return view('lawyer.dashboard', compact('hiredData', 'chatNotifications'));
        return view('lawyer.pages.dashboard', compact('hiredData', 'chatNotifications', 'questionAnswered'));
    }

    public function profile() {
        $lawyer = Lawyer::whereUserId(auth()->user()->id)->first();
        $arbitrationArea = ArbitrationArea::pluck('area', 'id');
        $languages = Language::pluck('language', 'id');
        return view('lawyer.profile', compact('lawyer', 'arbitrationArea', 'languages'));
    }

    public function updateProfile(Request $request, $id) {
        $lawyer = Lawyer::updateOrCreate(
            ['id' => $id],
            [
                'law_firm_name'                 => $request->lawfirm_name,
                'law_firm_website'              => $request->lawfirm_website,
                'emirates'                      => $request->emirates,
                'office_address'                => $request->office_address,            
                'contact_number'                => $request->contact_number,
                'landline_number'               => $request->landline_number,
                'position'                      => $request->position,
                'linkedin_profile'              => $request->linkedin_profile,
                'calendly_link'                 => $request->calendly_link,
                'language_ids'                  => $request->language ? implode(',', $request->language) : null,
                'other_lang'                    => $request->other_lang,
                'arbitration_area_id'           => $request->area,
                'summary'                       => $request->summary,
                'education'                     => $request->education,
                'assosiation_and_membership'    => $request->assosiation_and_membership,
                'honors_and_awards'             => $request->honors_and_awards,
                'disclaimer'                    => $request->disclaimer,
            ]
        );
        $this->profilePic($lawyer, $request);
        return redirect()->route('lawyer.profile')->with('success','Your profile updated successfully!');
    }


    public function profilePic($lawyer, $request) {
        $imageDir = 'lawyer/profile_pic/' . $lawyer->id;

        $image = $request->file('profile_pic');
        if ($request->hasFile('profile_pic')) {
            $lawyer->profile_pic = $image->store($imageDir);
            $lawyer->save();
        }
        return true;
    }

    public function myActivity() {
        $user = auth()->user();
        $answers = ForumAnswers::whereLawyerId($user->id)->get();

        $lawyerService = LawyerService::whereLawyerId(auth()->user()->id)->get();
        $paymentCompletedServiceIds = [];
        foreach($lawyerService as $k => $service) {
            $payment = Payment::whereLawyerServiceId($service->id)->first();
            if($payment)
                $paymentCompletedServiceIds[] = $payment->id;
        }
        $hiredData = Payment::whereIn('id', $paymentCompletedServiceIds)
        ->take(5)
        ->get();
        return view('lawyer.my-activity', compact('answers', 'hiredData'));
    }

    public function closeNotification($notificationId) {
        $notificationData = ChatNotification::whereId($notificationId)->first();
        // if($notificationData->group_id) {
        //     $closeAllNotification = ChatNotification::where([
        //         'group_id' => $notificationData->group_id,
        //         'to_user'  => auth()->user()->id,
        //         'seen'     => 0
        //     ])->get();
        // }else {
        //     $closeAllNotification = ChatNotification::where([
        //         'to_user'  => auth()->user()->id,
        //         'seen'     => 0
        //     ])->get();
        // }   
        // foreach($closeAllNotification as $k => $notification) {
            ChatNotification::updateOrCreate(['id' => $notificationId],
                [
                    'closed' => 1
                ]
            );
        // }
        // Alert::success("")
        return redirect()->back();
    }

}
