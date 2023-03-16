<?php

use App\Http\Controllers\admin\ArbitrationAreaController;
use App\Http\Controllers\admin\BlogsArticlesController;
use App\Http\Controllers\admin\CallbackController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ChatRequestController;
use App\Http\Controllers\admin\ContactUsController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ForumController;
use App\Http\Controllers\admin\HireController;
use App\Http\Controllers\admin\LanguageController;
use App\Http\Controllers\admin\LawyerController;
use App\Http\Controllers\admin\LawyerSlotController;
use App\Http\Controllers\admin\QaRatingController;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\TestimonialsController;
use App\Http\Controllers\Common\LoginController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HireLawyerController;
use App\Http\Controllers\Lawyer\SlotController;
use App\Http\Controllers\Lawyer\ChatOnlineRequestController;
use App\Http\Controllers\Lawyer\CommunityController;
use App\Http\Controllers\Lawyer\DashboardController as LawyerDashboardController;
use App\Http\Controllers\Lawyer\GroupController;
use App\Http\Controllers\Common\HomeController;
use App\Http\Controllers\Lawyer\ChatController;
use App\Http\Controllers\Lawyer\LawArticleController;
use App\Http\Controllers\Lawyer\LawyerServiceController;
use App\Http\Controllers\Lawyer\PostController;
use App\Http\Controllers\Lawyer\QuestionAnswerController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\vendor\Chatify\MessagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',                                             [HomeController::class, 'home'])->name('home');
Route::get('/online-offline-lawyers/{section}',             [HomeController::class, 'onlineOfflineLawyers'])->name('online-offline-lawyers');

Route::get('forgot-password',           [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password.get');
Route::post('forgot-password',          [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('forgot.password.post'); 
Route::get('forgot-password/{email}',   [ForgotPasswordController::class, 'forgotPwdEmail'])->name('forgot.password.email'); 
Route::get('reset-password/{token}',    [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password',           [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/login',                                        [LoginController::class, 'loginPage'])->name('user.login');
Route::get('/register-as',                                  [LoginController::class, 'registerAs'])->name('user.register-as');
Route::get('/user-register',                                [LoginController::class, 'registerAsUser'])->name('user.register-page');
Route::post('user-registeration',                           [LoginController::class, 'userRegister'])->name('user.register');
Route::post('/login-user',                                  [LoginController::class, 'userLogin'])->name('login');

Route::get('/how-it-works',             [CommonController::class, 'howItWorks'])->name('howItWorks');
Route::post('/forum',                   [CommonController::class, 'storeForum'])->name('store.forum');
Route::post('/contact-us',              [CommonController::class, 'storeContactUs'])->name('store.contact-us');
Route::post('/store-testimonial',       [CommonController::class, 'storeTestimonials'])->name('store.testimonials');
Route::get('/testimonials',             [CommonController::class, 'testimonials'])->name('testimonials');
Route::get('/book-a-meeting/{id}',      [CommonController::class, 'bookAMeeting'])->name('book-a-meeting');


Route::post('/consult-lawyer',              [CommonController::class, 'consultTheLawyer'])->name('consult.lawyer');

#Page practice area
Route::get('/page-practice-area',               [CommonController::class, 'pagePracticeArea'])->name('page-practice-area');
// Route::get('/page-practice-area/details',       [CommonController::class, 'pagePracticeAreaDetails'])->name('page-practice-area');
// Route::get('/page-practice-area/details/1',       [CommonController::class, 'pagePracticeAreaDetails'])->name('page-practice-area');

#Q&A
Route::get('/question-answers/{sort?}',          [CommonController::class, 'questionAnswer'])->name('question-answer');
Route::get('/question-answers/list',             [CommonController::class, 'questionAnswerListView'])->name('question-answer.list');
Route::get('/question-answer/view/{slug}',       [CommonController::class, 'viewQA'])->name('question-answer.view');

Route::get('/unauthenticated-user',           [LoginController::class, 'unauthenticated'])->name('unauthenticated');

Route::post('chat-online',                      [CommonController::class, 'chatOnline'])->name('chat-online');

// Route::get('blogs-articles-store/{page}',       [CommonController::class, 'blogsArticles'])->name('blogs-articles2');
Route::get('blogs-articles/{page}',             [CommonController::class, 'index2'])->name('blogs-articles');
// Route::get('blogs-articles-details/{id}',       [CommonController::class, 'blogsArticleDetails'])->name('blogs-article-details');
Route::get('blogs-articles-details/{id}',       [CommonController::class, 'blogDetails2'])->name('blogs-article-details');

Route::post('callback',                         [CommonController::class, 'callback'])->name('callback');

Route::get('/legal-services/{sort?}/{search?}/{area?}',                      [HireLawyerController::class, 'hireALawyer'])->name('hire-a-lawyer');
Route::get('/lawyer-services/{lawyerId}/{sort?}/{search?}/{area?}',         [HireLawyerController::class, 'LawyerServicesToHire'])->name('hire-a-lawyer.user');
Route::get('service-step-1/{service_id}',                                   [HireLawyerController::class, 'serviceStepOne'])->name('service.step-one');
Route::get('service-step-2/{service_id}',                                   [HireLawyerController::class, 'serviceStepTwo'])->name('service.step-two');
Route::get('service-step-3/{service_id}',                                   [HireLawyerController::class, 'serviceStepThree'])->name('service.step-three');
Route::post('service-payment',                                              [HireLawyerController::class, 'servicePayment'])->name('service.payment');
Route::get('service-step-5/{meeting_id}',                                   [HireLawyerController::class, 'servicePaymentCompleted'])->name('service.payment.completed');
Route::get('/generate-invoice/{meeting_id}',                                [HireLawyerController::class, 'generateInvoice'])->name('generate-invoice');
Route::get('/services-search',                                              [HireLawyerController::class, 'search'])->name('services.search');
Route::get('/services-filter/{area_id}',                                    [HireLawyerController::class, 'filterByArea'])->name('services.filter-by-area');
// Route::get('/download-invoice',                 [HireLawyerController::class, 'servicePaymentCompleted'])->name('generate-invoice');
Route::get('service/lawyers/{id}',                                          [HireLawyerController::class, 'serviceLawyers'])->name('service.lawyers');
Route::get('lawyer-services/{id}',                                          [HireLawyerController::class, 'lawyerServices'])->name('lawyer.services.list');
Route::post('request-for-quotes/store',                                     [HireLawyerController::class, 'requestForQuotes'])->name('request-for-quotes');

Route::get('legal-articles',                        [CommonController::class, 'articleList'])->name('legal.article-list');
Route::get('legal-articles/{id}',                   [CommonController::class, 'articleDetails'])->name('legal.article-details');
Route::get('filter-by-category',                    [CommonController::class, 'filterByCategory'])->name('legal.filter-by-category');
Route::get('our-lawyers/{area?}/{search?}',         [CommonController::class, 'ourLawyers'])->name('our-lawyers');
Route::get('our-lawyers/details/{id}',              [CommonController::class, 'lawyerDetail'])->name('our-lawyer.details');
Route::get('filter-by-lawyer-name',                 [CommonController::class, 'filterByLawyerName'])->name('filter-by-lawyer-name');
Route::get('filter-by-area',                        [CommonController::class, 'filterByArea'])->name('filter-by-area');

Route::get('zoom',     [MeetingController::class, 'store']);


Route::get('/verify-email/{token}',     [CommonController::class, 'verify']);



#################                           END USER                  ###################################

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/logout',                         [LoginController::class, 'logout'])->name('user.logout');
    
    Route::get('/dashboard',      [UserDashboardController::class, 'dashboard'])->name('user.dashboard');

    Route::post('/stripe-payment',      [StripeController::class, 'payment'])->name('stripe.payment');
    Route::post('/schedule-meeting',    [MeetingController::class, 'scheduleMeeting'])->name('schedule.meeting');

    Route::post('/send-chat-request',        [CommonController::class, 'sendChatRequest'])->name('send.chat.request');
    
    Route::post('/question-answer/rate/{id}',        [CommonController::class, 'rate'])->name('question-answer.rate');
    Route::get('/chat/requests',                     [CommonController::class, 'onlineChatRequests'])->name('online-chat.requests');

    Route::get('/my-activity',                         [UserActivityController::class, 'userActivty'])->name('user.activity');

    Route::post('online-chat/sendMessage',             [MessagesController::class, 'send'])->name('send.message');
    
    Route::post('chat-with-user/{toId}',               [ChatController::class, 'sendMsg'])->name('chat-with-user');
    Route::post('/user/latest-group-chat',             [ChatController::class, 'userLatestMsg'])->name('user.latest-msg');
    Route::get('user-latest-msg/{toId}',               [ChatController::class, 'latestUsrMsg'])->name('latest.user-msg');
    
});

#################                           ADMIN                  ###################################

Route::prefix('admin')->group(function () {
    Route::get('/',                            [Controller::class, 'redirectToLogin']);

    Route::get('/login',                       [LoginController::class, 'adminLoginPage'])->name('admin.login_page');
    Route::post('/login',                      [LoginController::class, 'adminLogin'])->name('admin.login');
    
    Route::group(['middleware' => ['adminauth']], function () {
        Route::get('/logout',                 [LoginController::class, 'logout'])->name('admin.logout');

        Route::get('/dashboard',                [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/send-reminder/{id}',       [DashboardController::class, 'sendReminder'])->name('admin.send-reminder');
        // Route::get('/dash',             [DashboardController::class, 'test']);

        #Arbitration Area
        Route::get('/arbitration-area',                     [ArbitrationAreaController::class, 'index'])->name('admin.arbitration-area');
        Route::get('/create/arbitration-area',              [ArbitrationAreaController::class, 'create'])->name('admin.create.arbitration-area');
        Route::post('/store/arbitration-area',              [ArbitrationAreaController::class, 'store'])->name('admin.store.arbitration-area');
        Route::get('/edit/arbitration-area/{id}',           [ArbitrationAreaController::class, 'edit'])->name('admin.edit.arbitration-area');
        Route::post('/update/arbitration-area/{id}',        [ArbitrationAreaController::class, 'update'])->name('admin.update.arbitration-area');
        Route::get('/delete/arbitration-area/{id}',         [ArbitrationAreaController::class, 'delete'])->name('admin.delete.arbitration-area');
        
        #Lawyers
        Route::get('/lawyers',                     [LawyerController::class, 'index'])->name('admin.lawyer_list');
        Route::get('/view/lawyer/{id}',            [LawyerController::class, 'view'])->name('admin.view.lawyer');
        Route::get('/delete/lawyer/{id}',          [LawyerController::class, 'delete'])->name('admin.delete.lawyer');
        Route::post('/verify/lawyer/{id}',         [LawyerController::class, 'verify'])->name('admin.verify.lawyer');
        Route::post('/update/lawyer/{id}',         [LawyerController::class, 'update'])->name('admin.update.lawyer');
        Route::get('/verify-lawyer/{id}',          [LawyerController::class, 'verifyLawyer'])->name('admin.verify-lawyer');
        
        #Forums
        Route::get('/forums/{status}',                     [ForumController::class, 'index'])->name('admin.forums');
        Route::post('/change-status/forum/{id}',           [ForumController::class, 'changeForumStatus'])->name('admin.change-status.forum');
        Route::post('/forum/title/{id}',                   [ForumController::class, 'addTitle'])->name('admin.forum.add-title');
        Route::get('/forum/edit-title/{id}',               [ForumController::class, 'editTitle'])->name('admin.forum.edit-title');
        Route::post('/forum/update-title/{id}',            [ForumController::class, 'updateTitle'])->name('admin.forum.update-title');
        Route::get('/filtered-forums/{status}',            [ForumController::class, 'forums'])->name('admin.filtered-forums');
        Route::get('/forum-modal/{id}',                    [ForumController::class, 'forumModal'])->name('admin.forum-modal');
        Route::get('/delete/forum/{id}',                   [ForumController::class, 'delete'])->name('admin.delete.forum');

        #Testimonials
        Route::get('/testimonials',                     [TestimonialsController::class, 'index'])->name('admin.testimonials');
        Route::get('/delete/testimonial/{id}',          [TestimonialsController::class, 'delete'])->name('admin.delete.testimonial');
        Route::post('/approve/testimonial/{id}',        [TestimonialsController::class, 'approve'])->name('admin.approve.testimonial');
       
        #Contact Us
        Route::get('/contact-us',                       [ContactUsController::class, 'index'])->name('admin.contact-us');
        Route::get('/delete/contact-us/{id}',           [ContactUsController::class, 'delete'])->name('admin.delete.contact-us');

        #Services
        Route::get('services',                                          [ServicesController::class, 'index'])->name('admin.services');
        Route::post('store/service',                                    [ServicesController::class, 'store'])->name('admin.service.store');
        Route::get('edit/service/{id}',                                 [ServicesController::class, 'edit'])->name('admin.service.edit');
        Route::post('update/service/{id}',                              [ServicesController::class, 'update'])->name('admin.service.update');
        Route::get('delete/service/{id}',                               [ServicesController::class, 'delete'])->name('admin.service.delete');
        Route::post('/approve/service/{id}',                            [ServicesController::class, 'approve'])->name('admin.approve.service');        
        Route::get('service/lawyers/{id}',                              [ServicesController::class, 'serviceLawyers'])->name('admin.service.lawyers');
        Route::post('service/lawyers/add-platform-fee/{id}',            [ServicesController::class, 'addPlatformFee'])->name('admin.service.lawyers.add-platform-fee');
        
        #QA Rating
        Route::get('qa/ratings',                              [QaRatingController::class, 'qaRatings'])->name('admin.qa.ratings');
        Route::post('verify/rating/{id}',                     [QaRatingController::class, 'verifyRating'])->name('admin.verify.rating');

        Route::get('callback/requests',                     [CallbackController::class, 'callbackRequests'])->name('admin.callback.requests');

        Route::get('chat/requests',                     [ChatRequestController::class, 'chatRequests'])->name('admin.chat.requests');
        Route::get('chat/requests/{status}',            [ChatRequestController::class, 'filteredChatRequest'])->name('admin.pending.chat.requests');

        #CATEGORY
        Route::get('categories',                   [CategoryController::class, 'categories'])->name('admin.categories');
        Route::get('category/create',              [CategoryController::class, 'createCategory'])->name('admin.category.create');
        Route::post('category/store',              [CategoryController::class, 'storeCategory'])->name('admin.category.store');
        Route::get('category/edit/{id}',           [CategoryController::class, 'editCategory'])->name('admin.category.edit');
        Route::post('category/update/{id}',        [CategoryController::class, 'updateCategory'])->name('admin.category.update');
        Route::get('category/delete/{id}',         [CategoryController::class, 'deleteCategory'])->name('admin.category.delete');

        #LANGUAGE
        Route::get('languages',                    [LanguageController::class, 'languages'])->name('admin.languages');
        Route::get('language/create',              [LanguageController::class, 'createLang'])->name('admin.language.create');
        Route::post('language/store',              [LanguageController::class, 'storeLang'])->name('admin.language.store');
        Route::get('language/edit/{id}',           [LanguageController::class, 'editLang'])->name('admin.language.edit');
        Route::post('language/update/{id}',        [LanguageController::class, 'updateLang'])->name('admin.language.update');
        Route::get('language/delete/{id}',         [LanguageController::class, 'deleteLang'])->name('admin.language.delete');
        
        #Blogs and Articles
        Route::get('blogs-articles',                    [BlogsArticlesController::class, 'index'])->name('admin.blogs-articles');
        Route::get('blogs-article/create',              [BlogsArticlesController::class, 'create'])->name('admin.blogs-article.create');
        Route::post('blogs-article/store',              [BlogsArticlesController::class, 'store'])->name('admin.blogs-article.store');
        Route::get('blogs-article/edit/{id}',           [BlogsArticlesController::class, 'edit'])->name('admin.blogs-article.edit');
        Route::post('blogs-article/update/{id}',        [BlogsArticlesController::class, 'update'])->name('admin.blogs-article.update');
        Route::get('blogs-article/delete/{id}',         [BlogsArticlesController::class, 'delete'])->name('admin.blogs-article.delete');
        Route::post('blogs-article/image-upload',       [BlogsArticlesController::class, 'imageUpload'])->name('admin.blog-article.image-upload');
        
        Route::get('hired',       [HireController::class, 'index'])->name('admin.hired-lawyer');
        
        #Slots
        Route::get('lawyer-slots',                      [LawyerSlotController::class, 'lawyers'])->name('admin.lawyer-slots');
        Route::get('lawyer-slots/{id}',                 [LawyerSlotController::class, 'slots'])->name('admin.lawyer-slots-list');
        Route::post('lawyer--update-slots/{id}',        [LawyerSlotController::class, 'updateSlots'])->name('admin.update-slots');
    });
});
#################                           ADMIN                  ###################################





#################                           LAWYER                  ###################################
Route::group(['middleware' => ['web']], function () {
// Route::group(['middleware' => ['web']], function () {
    Route::prefix('lawyer')->group(function () { 
        Route::get('/register',                    [LoginController::class, 'register'])->name('lawyer.register-page');
        Route::post('/registration',               [LoginController::class, 'registerLawyer'])->name('lawyer.register');
        
        // Route::group(['middleware' => ['lawyerauth', 'auth.timeout']], function () {
        Route::group(['middleware' => ['lawyerauth', 'auth.timeout']], function () {
            Route::get('/logout',                       [LoginController::class, 'logout'])->name('logout');

            Route::get('/dashboard',                    [LawyerDashboardController::class, 'index'])->name('lawyer.dashboard');
            Route::get('/profile',                      [LawyerDashboardController::class, 'profile'])->name('lawyer.profile');
            Route::get('/my-activity',                  [LawyerDashboardController::class, 'myActivity'])->name('lawyer.my-activity');
            Route::post('/profile/update/{id}',         [LawyerDashboardController::class, 'updateProfile'])->name('lawyer.update_profile');
            Route::get('/close-notification/{id}',      [LawyerDashboardController::class, 'closeNotification'])->name('lawyer.close-notification');
            
            Route::get('/online-chat-requests',                 [ChatOnlineRequestController::class, 'requests'])->name('lawyer.online-chat-requests');
            Route::post('/accept/chat-online-request/{id}',     [ChatOnlineRequestController::class, 'acceptRequest'])->name('lawyer.accept-request');
            Route::post('/complete/chat-online-request/{id}',   [ChatOnlineRequestController::class, 'completeRequest'])->name('lawyer.complete-request');

            Route::get('/scheduled-events',                     [SlotController::class, 'scheduledEvents'])->name('lawyer.scheduled-events');
            Route::get('/consultation-requests',                [SlotController::class, 'consultationRqsts'])->name('lawyer.consultation-requests');
            Route::get('/slots',                                [SlotController::class, 'addSlots'])->name('lawyer.slots');
            Route::get('/add-slots',                            [SlotController::class, 'addSlots'])->name('lawyer.add-slots');
            Route::post('/add-slot-service',                    [SlotController::class, 'addSlotService'])->name('lawyer.add-slot-service');
            Route::post('/update-timepicker',                   [SlotController::class, 'timepicker'])->name('lawyer.timepicker');
            Route::post('/store-slots',                         [SlotController::class, 'storeSlots'])->name('lawyer.store-slots');
            Route::post('/available-day',                       [SlotController::class, 'availableDay'])->name('lawyer.slot.available-day');

            Route::get('/services',                  [LawyerServiceController::class, 'index'])->name('lawyer.services');
            Route::post('store/service',             [LawyerServiceController::class, 'store'])->name('lawyer.service.store');
            Route::get('edit/service/{id}',          [LawyerServiceController::class, 'edit'])->name('lawyer.service.edit');
            Route::post('update/service/{id}',       [LawyerServiceController::class, 'update'])->name('lawyer.service.update');
            Route::get('delete/service/{id}',        [LawyerServiceController::class, 'delete'])->name('lawyer.service.delete');
            Route::post('service/add-fee/{id}',      [LawyerServiceController::class, 'addFee'])->name('lawyer.service.add-fee');
            
            Route::get('/community',                  [CommunityController::class, 'community'])->name('lawyer.community');
            Route::get('/community/all-lawyers',      [CommunityController::class, 'allLawyers'])->name('lawyer.community.all-lawyers');
            
            Route::post('create/post',                  [PostController::class, 'store'])->name('lawyer.create.post');
            Route::post('add/comment/{id}',             [PostController::class, 'addComment'])->name('lawyer.add.comment');
            Route::post('/updated-post',                [PostController::class, 'updatedPost'])->name('lawyer.updated-post');
            Route::post('/updated-comment',             [PostController::class, 'updatedComment'])->name('lawyer.updated-comment');
            
            Route::get('/community/groups/{sort?}',                             [GroupController::class, 'groups'])->name('lawyer.community.groups');
            Route::post('/community/group/store',                               [GroupController::class, 'store'])->name('lawyer.community.group.store');
            Route::get('/community/group/feed/{id}',                            [GroupController::class, 'groupFeed'])->name('lawyer.community.group.feed');
            Route::post('/community/create/group/post/{id}',                    [GroupController::class, 'storeGroupPost'])->name('lawyer.create.group.post');
            Route::get('/community/group/about/{id}',                           [GroupController::class, 'aboutGroup'])->name('lawyer.community.group.about');
            Route::get('/community/group/chat/{id}',                            [GroupController::class, 'groupChat'])->name('lawyer.community.group.chat');
            Route::post('/community/group/send-message/{id}',                   [GroupController::class, 'sendGroupMessage'])->name('lawyer.community.group.send-message');
            Route::post('/community/group/latest-group-chat',                   [GroupController::class, 'getLatestGroupMsg']);
            Route::post('/community/group/make-seen',                           [GroupController::class, 'makeSeen']);
            
            #QA
            Route::get('/question-answer/list',              [QuestionAnswerController::class, 'list'])->name('lawyer.qa.list');
            Route::get('/question-answer/view/{slug}',       [QuestionAnswerController::class, 'view'])->name('lawyer.qa.view');
            Route::post('/question-answer/answer/{id}',      [QuestionAnswerController::class, 'answer'])->name('lawyer.qa.answer');
            
            #Article
            Route::get('/articles',                 [LawArticleController::class, 'index'])->name('lawyer.article');
            Route::get('/article/create',           [LawArticleController::class, 'create'])->name('lawyer.article.create');
            Route::post('/article/store',           [LawArticleController::class, 'store'])->name('lawyer.article.store');
            Route::get('/article/edit/{id}',        [LawArticleController::class, 'edit'])->name('lawyer.article.edit');
            Route::post('/article/update/{id}',     [LawArticleController::class, 'update'])->name('lawyer.article.update');
            Route::get('/article/delete/{id}',      [LawArticleController::class, 'delete'])->name('lawyer.article.delete');
            
            Route::get('/article/categories',                   [LawArticleController::class, 'categories'])->name('lawyer.article.categories');
            Route::get('/article/category/create',              [LawArticleController::class, 'createCategory'])->name('lawyer.article.category.create');
            Route::post('/article/category/store',              [LawArticleController::class, 'storeCategory'])->name('lawyer.article.category.store');
            Route::get('/article/category/edit/{id}',           [LawArticleController::class, 'editCategory'])->name('lawyer.article.category.edit');
            Route::post('/article/category/update/{id}',        [LawArticleController::class, 'updateCategory'])->name('lawyer.article.category.update');
            Route::get('/article/category/delete/{id}',         [LawArticleController::class, 'deleteCategory'])->name('lawyer.article.category.delete');
            
            Route::get('/chat-with-user/{id}',         [ChatController::class, 'chatWithUser'])->name('lawyer.chat-with-user');

        });
    });
});


#################                           LAWYER                  ###################################

Route::getGroupStack();





$controller_path = 'App\Http\Controllers';


// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');
