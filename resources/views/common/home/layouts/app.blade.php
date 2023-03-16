<!DOCTYPE html>
<html lang="en">
    <head>
        @include('common.home.layouts.header')
    </head>
    <body>
        @php 
            $lawyers = App\Models\Lawyer::whereIsVerified(1)->get();
            $onlineLawyers = 0;
            $offlineLawyers = 0;
            foreach($lawyers as $k => $v) {
                if($v->user->isOnline()) {
                    ++$onlineLawyers;
                }else {
                    ++$offlineLawyers;
                }
            }
        @endphp
        <div class="main_div">
            @if(Route::currentRouteName() != "home")
                @include('common.home.layouts.sidenav')
            @endif
            <div id="main">
                @if(Route::currentRouteName() === "home")
                    @include('common.home.layouts.nav-home')
                @else
                    <header class="top-header">
                        @include('common.home.layouts.nav')
                    </header>
                @endif
                @include('sweetalert::alert')
                @yield('content')
                @if(Route::currentRouteName() === "home")
                    @include('common.home.layouts.footer2')      
                @else 
                    @include('common.home.layouts.footer')                      
                @endif
            </div>
        </div>
        <script>
            Pusher.logToConsole = true;

            var pusher = new Pusher('a34a416e0fe588185c8e', {
                cluster: 'ap2'
            });
            // Subscribe to the channel we specified in our Laravel Event
            var channel = pusher.subscribe('lawyer-login-logout');

            // Bind a function to a Event (the full Laravel class)
            channel.bind('App\\Events\\LawyerLoginLogout', function(data) {
                if(data.type === "lawyerLoginLogout") {
                        $.ajax({
                        method:"get",
                        url: "/online-offline-lawyers/nav",
                        success: function(res){
                            $(".online-offline").empty();
                            $(".online-offline").append(res.onlineOffline);
                            $("#lawyer-online-count").empty();
                            $("#lawyer-online-count").append(res.onlineOfflineCount);
                        }
                    });
                }
            }); 
            
            function validateLogin(event) {
                valid = true
                var email = $("#email").val()
                var pwd = $("#pwd").val()
                $(".email-error").empty()
                $(".pwd-error").empty()
                if(!email) {
                    valid = false
                    $(".email-error").append('Please enter your email');
                }
                
                if(!pwd) {
                    valid = false
                    $(".pwd-error").append('Please enter your password');
                }

                if(!valid) {
                    event.preventDefault()
                }            
            }        

            function validateRegistration(event) {
                valid = true
                var name = $("#name").val()
                var email = $("#email-reg").val()
                var pwd = $("#password-reg").val()
                $(".name-error").empty()
                $(".email-error").empty()
                $(".pwd-error").empty()
                debugger
                if(!name) {
                    valid = false
                    $(".name-error").append('Please enter your name');
                }

                if(!email) {
                    valid = false
                    $(".email-error").append('Please enter your email');
                }
                
                if(!pwd) {
                    valid = false
                    $(".pwd-error").append('Please enter your password');
                }else {
                    if(pwd.length < 6) {                        
                        $(".pwd-error").append('The password must be at least 6 characters');
                    }
                }
                

                if(!valid) {
                    event.preventDefault()
                }            
            } 
            
            function openForumModal(lawyerId) {   
                var forumModal = document.getElementById("forumModal_"+lawyerId);
                var lawyersProfileModal = document.getElementById("lawyers_profile_"+lawyerId);
                
                lawyersProfileModal.style.display = "none";
                forumModal.style.display = "block";
            }

            function closeProfileModal(lawyerId) {
                var lawyersProfileModal = document.getElementById("lawyers_profile_"+lawyerId);
                
                lawyersProfileModal.style.display = "none";
            }

            function openChatModal(lawyerId) {  
                var chatModal = document.getElementById("chat-request-"+lawyerId);
                var lawyersProfileModal = document.getElementById("lawyers_profile_"+lawyerId);
                
                
                lawyersProfileModal.style.display = "none";                
                chatModal.style.display = "block";
            }

            function openChatModalTwo(lawyerId) {  
                var chatModal = document.getElementById("chat-request-"+lawyerId);
                var profModal = document.getElementById('lawyer-profile-'+lawyerId);
                
                
                profModal.style.display = "none";                
                chatModal.style.display = "block";
            }


            function validateForumForm(e) {
                var valid = true;
                $(".forum-errors").empty()
                var name = $("#forum-name").val()
                var email = $("#forum-email").val()
                var mobile = $("#forum-mobile").val()
                var msg = $(".forum-msg").val()

                if(!name) {
                    valid = false;
                    $("#forum-name").after('<span class="forum-errors" style="color:red;">This field is required</span>')
                }
                if(!email) {
                    valid = false;
                    $("#forum-email").after('<span class="forum-errors" style="color:red;">This field is required</span>')
                }
                if(!mobile) {
                    valid = false;
                    $("#forum-mobile-div").after('<span class="forum-errors" style="color:red;">This field is required</span>')
                }
                if(!msg) {
                    valid = false;
                    $(".forum-msg").after('<span class="forum-errors" style="color:red;">This field is required</span>')
                }

                if(!valid) {
                    e.preventDefault()
                }
            }

            function validateChatRqstForm(e, id) {
                var valid = true;
                $(".cf-errors").empty()
                var descr = $(".chat-rqst-form-"+id).val();
                if(!descr) {
                    valid = false;
                    $(".chat-rqst-form-"+id).after('<span class="cf-errors" style="color:red;">This field is required</span>')
                }

                if(!valid) {
                    e.preventDefault()
                }
            }

            function validateConsultForm(e, id) {
                var valid = true;
                $(".errors").empty()
                var name = $("#name-"+id).val()
                var email = $("#email-"+id).val()
                var mobile = $("#mobile-"+id).val()
                var msg = $("#msg-"+id).val()

                if(!name) {
                    valid = false;
                    $("#name-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
                }
                if(!email) {
                    valid = false;
                    $("#email-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
                }
                if(!mobile) {
                    valid = false;
                    $("#mobile-div-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
                }
                if(!msg) {
                    valid = false;
                    $("#msg-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
                }

                if(!valid) {
                    e.preventDefault()
                }
            }

            

            $(document).ready(function(){

                $("section").click(function(){
                    debugger
                $(".menu-sidebar").removeClass('show');
                $(".offcanvas offcanvas-start").css('visibilty','hidden','display','none');
                });

                $(".menu-sidebar").click(function(event) {
                event.stopPropagation();
                });

                //  $(".btn btn-208C84").click(function(event){
                //    event.preventDefault();
                //   //  event.stopPropagation();
                //    $(".modal fade popuphome").show();

                //  })
                });
        </script>
        
        @stack('script')
    </body>
</html>