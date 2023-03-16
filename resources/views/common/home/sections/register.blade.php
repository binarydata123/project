<section>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="why-b">
              <h2>Why Register?</h2>
              <p>Register with Connect Legal and get access to a larger client base now! Register now and get access to our Legal services instantly!</p>
              <p><a href="#" class="circle-right"><i class="fa-solid fa-circle-right"></i></a></p>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="why-b Keep">
              <div class="row">
                <div class="col-2 m-p-0">
                  <img src="/new-design/assets/images/why-b-1.png" alt="why-b-1">
                </div>
                <div class="col-10">
                  <p>Keep the history of all your chats, questions and callback requests</p>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-2 m-p-0">
                  <img src="/new-design/assets/images/why-b-2.png" alt="why-b-2">
                </div>
                <div class="col-10">
                  <p>Track your interactions with lawyers and receive notifications</p>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-2 m-p-0">
                  <img src="/new-design/assets/images/why-b-3.png" alt="why-b-3">
                </div>
                <div class="col-10">
                  <p>Ask lawyers follow-up questions if something is not clear from their answers</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="why-register bg-E5EAED">
      <div class="container">
        <div class="get-started">
          <div class="row ">
            <div class="col-lg-7 col-md-12 m-p-0">
              <div class="are-you">
                <div class="row reverse-mobile">
                  <div class="col-lg-6 col-md-12 fav-img">
                    <img src="/new-design/assets/images/fav-icon.png" alt="fav-icon" class="fav-icon fav-2">
                    <img src="/new-design/assets/images/legal--2.png" alt="legal--2" class="legal-2-">
                    <div class="you-a">
                      <h3>Are you a Lawyer?</h3>
                      <p>Be found. Register with us and get access to new leads every day.</p>
                      <div class="btn-group mt-3 hov-zoom" role="group" aria-label="Basic example">
                        <a class="btn btn-208C84" href="{{route('lawyer.register-page')}}">Register</a>
                        <a class="btn btn-3cc7a0"><i class="fa-solid fa-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <div class="are-you-back">
                      <div class="row">
                        <div class="col-6">
                          <div class="cards">
                            <img src="/new-design/assets/images/Group.png" alt="Group">
                            <p class="name-uaser">Arundhati</p>
                            <p class="short-mes">UAE, Abu Dhabi</p>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="cards">
                            <img src="/new-design/assets/images/onetwo.png" alt="Group">
                            <p class="name-uaser">Arundhati</p>
                            <p class="short-mes">UAE, Abu Dhabi</p>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-3"><img src="/new-design/assets/images/pro-2.png" alt="pro-2" class="pro-2-card"></div>
                        <div class="col-6">
                          <div class="cards">
                            <img src="/new-design/assets/images/one.png" alt="Group">
                            <p class="name-uaser">Arundhati</p>
                            <p class="short-mes">UAE, Abu Dhabi</p>
                          </div>
                        </div>
                        <div class="col-3"><img src="/new-design/assets/images/thum.png" alt="thum" class="thum"></div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-5 col-md-12 m-p-0">
              <div class="form">
                <h4>Get Started</h4>
                <p class="alredy">Alredy have an account? <a href="{{route('user.login')}}">Sign in</a></p>
                <form class="s9-form" action="{{route('user.register')}}" method="post">
                    @csrf()
                    <div class="form-part">
                        <label>Name</label><br>
                        <input type="text" name="name" placeholder="Enter your name">                        
                        @error('name')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror  
                        <br>
                        <label>Email Address</label><br>
                        <input type="text" name="email" placeholder="email@domain.com">                        
                        @error('email')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror  
                        <br>
                        <label>Password</label><br>
                        <input type="password" name="password"> <i class="fa-solid fa-eye eye-pp"></i>                        
                        @error('password')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror       
                        <br> 
                    </div>
                    <!-- <p class="text-right forget"><a href="#">Forgot password?</a></p> -->
                    <button class="sign-up" type="submit">Sign Up</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>