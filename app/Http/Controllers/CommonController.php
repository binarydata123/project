<?php

namespace App\Http\Controllers;

Use Alert;
use App\Models\ArbitrationArea;
use App\Models\BlogsArticles;
use App\Models\Callback;
use App\Models\ChatOnline;
use App\Models\ContactUs;
use App\Models\DaysSlot;
use App\Models\Forum;
use App\Models\ForumAnswers;
use App\Models\Language;
use App\Models\LawArticle;
use App\Models\LawCategory;
use App\Models\Rate;
use App\Models\PasswordReset;
use App\Models\Lawyer;
use App\Models\Slot;
use App\Models\Testimonial;
use App\Models\LawyerConsultation;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Mail; 
use Mailjet\Resources;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CommonController extends Controller
{
    public function howItWorks() {
        $testimonials = Testimonial::whereApproved(1)->latest()->take(3)->get();        
        // return view('common.how-it-works', compact('testimonials'));
        return view('common.pages.how-it-works', compact('testimonials'));
    }

    public function storeForum(Request $request) {
        $request->validate([
            'qa_email' => ['required', 'string', 'email', 'max:255'],
            'qa_name' => ['required', 'string'],
            'mobile' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        Forum::create([
            'name' => $request->qa_name,
            'email' => $request->qa_email,
            'mobile' => $request->mobile,
            'message' => $request->message,
            'to_lawyer' => $request->lawyerId ?? null,
            'user_id' => auth()->user() ? auth()->user()->id : null
        ]);

        Alert::success('Success', 'Your query has been sent successfully!');
        return redirect()->route('home');
    }

    public function storeContactUs(Request $request) {
        $request->validate([
            'contact_name'      => ['required', 'string', 'max:255'],
            'contact_email'     => ['required', 'string', 'email', 'max:255'],
            'contact_mobile'    => ['required', 'string'],
            'contact_subject'   => ['required', 'string'],
            'contact_message'   => ['required', 'string'],
        ]);

        ContactUs::create([
            'name'      => $request->contact_name,
            'email'     => $request->contact_email,
            'contact'   => $request->contact_mobile,
            'subject'   => $request->contact_subject,
            'message'   => $request->contact_message
        ]);

        Alert::success('Success', 'Your query has been sent successfully!');
        return redirect()->route('howItWorks');
    }

    public function storeTestimonials(Request $request) {
        $request->validate([
            'name' =>    ['required', 'string', 'max:255'],
            'emirate' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        Testimonial::create([
            'name' => $request->name,
            'emirate' => $request->emirate,
            'message' => $request->message
        ]);
        Alert::success('Success', 'Your feedback has been sent successfully!');
        return redirect()->route('testimonials');
    }

    public function questionAnswer($sort = null) {
        $sort = $sort ?? 'desc';
        $forums = Forum::whereIsVerified(1)
        ->orderBy('updated_at', $sort)
        ->paginate(10);
        // return view('common.question-answer.list', compact('forums'));
        return view('common.pages.question-answer.grid', compact('forums', 'sort'));
    }

    public function questionAnswerListView() {
        $forums = Forum::whereIsVerified(1)->paginate(10);
        // return view('common.question-answer.list', compact('forums'));
        return view('common.pages.question-answer.list', compact('forums'));
    }

    public function testimonials() {
        $testimonials = Testimonial::whereApproved(1)
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);
        // return view('common.testimonials', compact('testimonials'));
        return view('common.pages.testimonials.list', compact('testimonials'));
    }

    public function  bookAMeeting($id) {
        $lawyer = Lawyer::whereId($id)->first();
        $slot = Slot::whereLawyerId($lawyer->user_id)->first();
        if($slot->isActive($lawyer->user->id)) {
            $unavailableDays = [];
            if($slot) {
                if(!$slot->monday_slot)
                    $unavailableDays[] = 1;
                if(!$slot->tuesday_slot)
                    $unavailableDays[] = 2;
                if(!$slot->wednesday_slot)
                    $unavailableDays[] = 3;
                if(!$slot->thursday_slot)
                    $unavailableDays[] = 4;
                if(!$slot->friday_slot)
                    $unavailableDays[] = 5;
                if(!$slot->saturday_slot)
                    $unavailableDays[] = 6;
                if(!$slot->sunday_slot)
                    $unavailableDays[] = 0;
            }
    
            $daySlots = DaysSlot::whereSlotId($slot->id)->get();
            $intent = null;
            if(auth()->user()) {
                $intent = auth()->user()->createSetupIntent();
            }
            // return view('common.book-meeting',  compact('lawyer', 'daySlots', 'slot', 'unavailableDays'));
            return view('common.pages.book-a-meeting',  compact('lawyer', 'daySlots', 'slot', 'unavailableDays', 'intent'));
        }else {
            return view('common.book-no-meeting');
        }
    }

    public function notAvailableDays($day) {
        switch($day) {
            case("monday_slot"):
               return 1;
                break;            
            case("tuesday_slot"):
               return 2;
                break;            
            case("wednesday_slot"):
               return 3;
                break;            
            case("thursday_slot"):
               return 4;
                break;            
            case("friday_slot"):
               return 5;
                break;            
            case("saturday_slot"):
               return 6;
                break;            
            case("sunday_slot"):
               return 0;
                break;            
            default:
                $msg = 'Something went wrong.';
        }
    }

    function chatOnline(Request $request) {
        $isAlreadyRequested = ChatOnline::where([
            'user_id'   => auth()->user()->id,
            'lawyer_id' => $request->lawyerId,
            'status'    => 1
        ])->first();
        if($isAlreadyRequested) {
            Alert::error('Error', 'Oops! You can send free online chat request only once to the same lawyer');
            return redirect()->route('home');
        }else {
            $request->validate([
                'message'          =>  ['required'],
            ]);
    
            $chatOnlineRqst = ChatOnline::create([
                'user_id' => auth()->user()->id,
                'comment' => $request->message,
                'lawyer_id' => $request->lawyerId,
                'any' => $request->lawyerId ? false : true,
            ]);
    
            $mail_data = [
                'subject' => "Chat online request",
                'htmlPart' => $request->message,
                'lawyer' => $chatOnlineRqst->lawyer_id ? $chatOnlineRqst->lawyer->user->email : null,
            ];
    
            $job = (new \App\Jobs\OnlineChatRqstEmail($mail_data))
                    ->delay(now()->addSeconds(2)); 
    
            dispatch($job);
            Alert::success('Success', 'Your query has been sent successfully!');
            return redirect()->route('home');
        }
    }

    public function onlineChatRequests() {
        $chatRequests = ChatOnline::whereUserId(auth()->user()->id)->get();
        return view('common.chat-requests', compact('chatRequests'));
    }

    public function blogsArticles($page) {
        $url = "https://connectlegal.ae/wp-json/wp/v2/posts?page=".$page;
        $ch = curl_init();
        $headers = [];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // this function is called by curl for each header received
        curl_setopt($ch, CURLOPT_HEADERFUNCTION,
        function($curl, $header) use (&$headers) {
            $len = strlen($header);
            $header = explode(':', $header, 2);
            if (count($header) < 2) // ignore invalid headers
            return $len;

            $headers[strtolower(trim($header[0]))][] = trim($header[1]);
            
            return $len;
        });

        $data = curl_exec($ch);
        $response = json_decode($data);
        $totalPages = $headers['x-wp-totalpages'];
        $pagesNo = range(1,$totalPages[0]);
        foreach($response as $k => $v) {
            $writtenBy = "Written by";
            BlogsArticles::create([
                'image'         => $v->yoast_head_json->og_image[0]->url,
                'title'         => $v->title->rendered,
                'description'   => $v->excerpt->rendered,
                'written_by'    => $v->yoast_head_json->twitter_misc->$writtenBy,
                'full_descr'    => $this->blogDetails($v->id)
            ]);
        }
        return view('common.blogs.index', compact('response', 'pagesNo', 'page'));
    } 
    
    public function index2() {
        // $blogs = BlogsArticles::orderBy('created_at', 'DESC')->paginate(10);
        $blogs = BlogsArticles::orderBy('created_at', 'DESC')->take(4)->get();
        $randomBlogs = BlogsArticles::inRandomOrder()
        ->take(4)
        ->get();
        // return view('common.blogs.index2', compact('blogs'));
        return view('common.pages.blogs.list', compact('blogs', 'randomBlogs'));
    }

    public function blogDetails2($id) {
        $blog = BlogsArticles::whereId($id)->first();
        // return view('common.blogs.details2', compact('blog'));
        $randomBlogs = BlogsArticles::inRandomOrder()
        ->take(4)
        ->get();
        return view('common.pages.blogs.details', compact('blog', 'randomBlogs'));

    }

    public function blogDetails($id) {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://connectlegal.ae/wp-json/wp/v2/posts/".$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                "Content-Type: application/json",
                "Access-Control-Allow-Origin: *",
                "Access-Control-Allow-Methods: GET, POST, OPTIONS",
                "Access-Control-Allow-Headers: X-Requested-With, X-WP-Total, X-WP-TotalPages"
            ],
        ));

        $response = curl_exec($curl);
        $blog = json_decode($response);
        // print_r($response);exit;
        curl_close($curl); 

        return $blog->content->rendered;
    }

    public function blogsArticleDetails($id) {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://connectlegal.ae/wp-json/wp/v2/posts/".$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                "Content-Type: application/json",
                "Access-Control-Allow-Origin: *",
                "Access-Control-Allow-Methods: GET, POST, OPTIONS",
                "Access-Control-Allow-Headers: X-Requested-With, X-WP-Total, X-WP-TotalPages"
            ],
        ));

        $response = curl_exec($curl);
        $blog = json_decode($response);
        // print_r($response);exit;
        curl_close($curl);   
        return view('common.blogs.details', compact('blog'));
    }

    public function viewQA($slug) {
        $forum = Forum::whereSlug($slug)->first();

        $increaseViews = Forum::findOrFail($forum->id);
        $increaseViews->views = ++$increaseViews->views;
        $increaseViews->save();

        if(!$forum) {
            return view('404');
        }
        $forumAnswers = ForumAnswers::whereForumId($forum->id)->get();
        $randomLawyers = Lawyer::whereIsVerified(1)
        ->inRandomOrder()
        ->take(5)
        ->get();
        $randomServices = Services::whereApproved(1)
        ->inRandomOrder()
        ->take(4)
        ->get();
        // return view('common.question-answer.view', compact('forum', 'forumAnswers'));
        return view('common.pages.question-answer.detail', compact('forum', 'forumAnswers', 'randomLawyers', 'randomServices'));
    }

    public function rate(Request $request, $answerId) {
        $answer = ForumAnswers::whereId($answerId)->first();
        Rate::create([
            'answer_id'     => $answerId,
            'rated_by'      => auth()->user()->id,
            'rate'          => $request->rating,
            'comment'       => $request->comment,
        ]);
        Alert::success('Success', 'You have rated successfully');
        return redirect()->route('question-answer.view', $answer->forum->slug);
    }

    public function callback(Request $request) {
        $request->validate([
            'name'          =>  ['required', 'string', 'max:255'],
            'contact'       =>  ['required'],
            'message'       =>  ['required'],
        ]);

        Callback::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'message'       => $request->message,
            'contact_no'    => $request->contact,
            'to_lawyer'     => $request->lawyer_id ?? null
        ]);
        Alert::success('Success', 'Your query has been sent successfully');
        return redirect()->route('home');
    }

    public function articleList() {
        $articleList = LawArticle::orderBy('updated_at', 'DESC')
        ->paginate(5);
        $categories = LawCategory::pluck('category', 'id');
        return view('common.law-article.index', compact('articleList', 'categories'));
    }

    public function articleDetails($id) {
        $article = LawArticle::whereId($id)->first();
        return view('common.law-article.detail', compact('article'));
    }

    public function filterByCategory() {
        $categoryId = $_GET['category'];
        $articles = LawArticle::whereCategoryId($categoryId)
        ->orderBy('updated_at', 'DESC')
        ->paginate(5);
        return (string) view('common.law-article.category-filter',  compact('articles')); 
    }

    public function ourLawyers(Request $request, $area = null, $search = null) {
        //area - no search
        //no-area - search
        //no-area - no-search
        //area - search
        if($area) {
            $tmpArea = $area;
            $area = is_numeric($area) ? $area : null;
            if(!$area && !$search) {
                $search = $tmpArea;
            }
        }

        $areaSelected = $area ?? null;
        if($area && !$search) {
            $lawyers = Lawyer::whereIsVerified(1)
                ->whereArbitrationAreaId($area)
                ->paginate(2);
        }elseif(!$area && $search) {
            $lawyers = Lawyer::join('users', 'users.id', '=', 'lawyers.user_id')
                ->where('users.name', 'LIKE', '%'.$search.'%')
                ->whereIsVerified(1)            
                ->paginate(2);
        }elseif(!$area && !$search) {            
            $lawyers = Lawyer::whereIsVerified(1)->paginate(2);
        }elseif($area && $search) {
            $lawyers = Lawyer::join('users', 'users.id', '=', 'lawyers.user_id')
                ->where('users.name', 'LIKE', '%'.$search.'%')
                ->whereIsVerified(1)      
                ->whereArbitrationAreaId($area)      
                ->paginate(2);
        }

        $arbitrationAreas = ArbitrationArea::pluck('area', 'id');
        if ($request->ajax()) {            
            return (string) view('common.pages.our-lawyers.loaded-list', compact('lawyers'));
        }
        // return view('common.our-lawyers.index', compact('lawyers', 'arbitrationAreas'));
        return view('common.pages.our-lawyers.list', compact('lawyers', 'arbitrationAreas', 'areaSelected'));
    }

    public function lawyerDetail($lawyerId) {
        $lawyerDetails = Lawyer::whereId($lawyerId)->first();
        $languages = Language::whereIn('id', explode(',', $lawyerDetails->language_ids))->get();
        $langs = [];
        foreach($languages as $k => $v) {
            $langs[] = $v->language;
        }
        $otherLang = explode(',', $lawyerDetails->other_lang);
        foreach($otherLang as $k => $v) {
            $langs[] = trim($v);
        }
        $answers = ForumAnswers::whereLawyerId($lawyerDetails->user_id)->get();
        return view('common.our-lawyers.detail', compact('lawyerDetails', 'langs', 'answers'));
    }

    public function filterByLawyerName() {
        $name = $_GET['name'];
        $area = $_GET['area'];
        
        if($name && $area) {
            $lawyers = Lawyer::where([
                'is_verified' => 1,
                'arbitration_area_id' => $area,
            ])
            ->whereHas('user', function ($query) use($name) {
                $query->where([
                    ['user_type', 2],
                    ['name', 'LIKE', '%'.$name.'%']
                ]);
            })
            ->with('user')
            ->paginate(2);
            $lawyers->withPath('/our-lawyers');
        }else if($name) {
            $lawyers = Lawyer::whereIsVerified(1)
            ->whereHas('user', function ($query) use($name) {
                $query->where([
                    ['user_type', 2],
                    ['name', 'LIKE', '%'.$name.'%']
                ]);
            })
            ->with('user')
            ->paginate(2);
            $lawyers->withPath('/our-lawyers');
        }else if($area) {
            $lawyers = Lawyer::where([
                'is_verified' => 1,
                'arbitration_area_id' => $area,
            ])
            ->paginate(2);
            $lawyers->withPath('/our-lawyers');
        }else {
            $lawyers = Lawyer::whereIsVerified(1)->paginate(2);
            $lawyers->withPath('/our-lawyers');
        }

        return (string) view('common.our-lawyers.filtered', compact('lawyers'));
    }

    public function filterByArea() {
        $name = $_GET['name'];
        $area = $_GET['area'];
        
        if($name && $area) {
            $lawyers = Lawyer::where([
                'is_verified' => 1,
                'arbitration_area_id' => $area,
            ])
            ->whereHas('user', function ($query) use($name) {
                $query->where([
                    ['user_type', 2],
                    ['name', 'LIKE', '%'.$name.'%']
                ]);
            })
            ->with('user')
            ->paginate(2);
            $lawyers->withPath('/our-lawyers');
        }else if($area) {
            $lawyers = Lawyer::where([
                'is_verified' => 1,
                'arbitration_area_id' => $area,
            ])
            ->paginate(2);
            $lawyers->withPath('/our-lawyers');
        }else {
            $lawyers = Lawyer::whereIsVerified(1)->paginate(2);
            $lawyers->withPath('/our-lawyers');
        }

        return (string) view('common.our-lawyers.filtered', compact('lawyers'));
    }

    public function pagePracticeArea() {
        return view('common.pages.practice-area.list');
    }

    public function pagePracticeAreaDetails() {
        return view('common.pages.practice-area.detail');
    }

    public function consultTheLawyer(Request $request) {
        $validator = Validator::make($request->all(),[
            'name'      => 'required',
            'email'     => 'required|email',
            'message'   => 'required',
        ]);

        if($validator->fails()) {
            Alert::error('Error', 'Please go back to the form to view the errors');
            return redirect()->back()->withErrors($validator);
        }
        $email = $request->email;
        LawyerConsultation::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'message' => $request->message,
            'lawyer_id' => $request->lawyerId,
            'user_id' => auth()->user() ? auth()->user()->id : null,
        ]);

        $apikey = env('MJ_APIKEY_PUBLIC');
        $apisecret = env('MJ_APIKEY_PRIVATE');

        $mj = new \Mailjet\Client($apikey, $apisecret,true,['version' => 'v3.1']);
        // $url = "https://127.0.0.1:8000/reset-password/".$token;
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "s4shamma@gmail.com",
                        'Name' => "Connect Legal"
                    ],
                    'To' => [
                        [
                            'Email' => $request->email,
                            'Name' => "You"
                        ]
                    ],
                    'Subject' => "Connect Legal: Reset Password",
                    // 'TextPart' => "Greetings from Mailjet!",
                    'HTMLPart' => "Hey there."
                ]
            ]
        ];
        $mj->post(Resources::$Email, ['body' => $body]);

        Alert::success('Success', 'Your request has been submitted successfully');
        return redirect()->back();
    }

    public function sendChatRequest(Request $request) {
        $request->validate([
            'description'          =>  ['required'],
        ]);
        // dd($request->lawyerId);
        ChatOnline::create([
            'lawyer_id' => $request->lawyerId,
            'user_id'   => auth()->user()->id,
            'comment'   => $request->description,
            'any'       => 0,
        ]);

        Alert::success('Success', 'Your chat request has been submitted successfully');
        return redirect()->back();
    }

    public function verify($token) {
        $isExist = PasswordReset::where([
            'token' => $token
            ])
            ->first();

        if($isExist) {

            $verify = User::whereEmail($isExist->email)->first();
            $verify->email_verified_at = 1;
            $verify->save();

            // $deleteToken = PasswordReset::whereToken($token)->first();
            // $deleteToken->delete();

            Alert::success('Success', 'You have verified your account successfully. Please login');
            return redirect()->route('home');
        }
    }
}
