<!DOCTYPE html>
<html lang="en">
<head>
    @include('common.home.layouts.header')
</head>
<body>
    @include('common.home.layouts.sidenav')
<!-- login popup -->
    @include('common.home.layouts.login-modals')
    <header>
        @include('common.home.layouts.nav') 
    </header>
    <section class="main">
        <div class="section1-content">
            <div class="section1-content-item1">
                <div class="section1-content-item1-img"><img src="/images/basicImages/CL-logo1.png" alt=""/></div>
                <div class="section1-content-item1-h">
                    <span style="color: #fff">Get </span>
                    <span style="color: rgba(61, 201, 161, 1)">Online Legal Support</span>
                    <span style="color: #fff"> Services</span>
                </div>
                <p class="section1-content-item1-p white">This Platform Provides an opportunity to Connect Lawyers or Legal Consultants with those who are seeking for Legal Advice in UAE</p>
                <button class="contactnow white">Contact now <div class="h-100 bg-green"><i class="fas fa-arrow-right"></i></div></button>
            </div>
            <div class="section1-content-item2">
                <div class="section1-content-item2-box bg-l-green boxShadow-green green">
                    <div class="section1-content-item2-box-img">
                        <img src="/images/basicImages/find_lawyer.png" alt=""/>
                    </div>
                    <div class="section1-content-item2-box-content">
                        <h4>Find a Lawyer</h4>
                        <p>This is a lorem ipsum and will be remplaced for another text.</p>
                    </div>
                </div>
                <div class="section1-content-item2-box bg-l-blue boxShadow-blue d-blue">
                    <div class="section1-content-item2-box-img">
                        <img src="/images/basicImages/hire_lawyer.png" alt=""/>
                    </div>
                    <div class="section1-content-item2-box-content">
                        <h4>Hire a Lawyer</h4>
                        <p>This is a lorem ipsum and will be remplaced for another text.</p>
                    </div>
                </div>                
                <div class="section1-content-item2-box bg-yellow boxShadow-brown brown">
                    <div class="section1-content-item2-box-img">
                        <img src="/images/basicImages/lawyers_services.png" alt=""/>
                    </div>
                    <div class="section1-content-item2-box-content">
                        <h4>Lawyers Services</h4>
                        <p>This is a lorem ipsum and will be remplaced for another text.</p>
                    </div>
                </div>                
                <div class="section1-content-item2-box bg-green boxShadow-m-green white">
                    <div class="section1-content-item2-box-img">
                        <img src="/images/basicImages/legal_blogs.png" alt=""/>
                    </div>
                    <div class="section1-content-item2-box-content">
                        <h4>Legal blogs & articles</h4>
                        <p>This is a lorem ipsum and will be remplaced for another text.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-stat">
            <div class="main-stat-board">
                <div class="main-stat-grid">
                    <div class="main-stat-grid-item">
                        <h2 class='main-stat-text'>257</h2>
                        <p class='main-stat-p'>Lawyers</p>
                    </div>
                    <div class="main-stat-grid-item">
                        <h2 class='main-stat-text'>22</h2>
                        <p class='main-stat-p'>Law Firm Partner</p>
                    </div>
                    <div class="main-stat-grid-item">
                        <h2 class='main-stat-text'>4,700</h2>
                        <p class='main-stat-p'>Solved cases</p>
                    </div>
                    <div class="main-stat-grid-item">
                        <h2 class='main-stat-text'>2,014</h2>
                        <p class='main-stat-p'>Since</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-2 section">
        <div class="section-2-container">
            <div class="section-2-content section-2-item">
                <h2 class="title-text">
                    <span style="color: #208C84">We connect clients and Legal Consultants </span>
                    <span>in one platform.</span>
                </h2>
                <p class="p-text">Make an appointment with Advocates and Legal consultancy, Today! or chat with a lawyer online for free in Dubai and across UAE now. We provide legal Services by connecting you with the Legal Consultants, Or you can even hire a Lawyer for your Legal issues. You can also read our blogs which provides some of the vital informations.</p>
                <button class="contactnow white">Contact now <div class="h-100 bg-green"><i class="fas fa-arrow-right"></i></div></button>
            </div>
            <div class="section-2-item">
                <img class="section-2-img" src="/images/basicImages/home-section2.png" alt=""/>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="slideshow-container">
            <div class="bg-l-green p-1">
                <div class="mySlides">
                    <div class="letsee">
                        <div><img src="/images/basicImages/s3.png" style="width: 100%"/></div>
                        <div class="myccontent">
                            <p class='home-section3-features'>FEATURES</p>
                            <span class='green title-text'>Ask & Book Appointments </span>
                            <span class='title-text'>with Multiple Lawyers</span>
                            <p class='p-text' style='padding-bottom: 2rem'>Make an appointment with Advocates and Legal consultancy, Today! or chat with a lawyer online for free in Dubai and across UAE now, We work on a wide range of legal matters. Our legal Services.</p>
                            <button class="contactnow white">Contact now <div class="h-100 bg-green"><i class="fas fa-arrow-right"></i></div></button>
                        </div>
                    </div>
                </div>
            </div>        
        </div>            
    </section>
    <section class="section" id="home-section4">
        <div class="home-section4-container">
            <p class='home-section3-features'>PROCESS</p>
            <div class="home-section4-title">
              <span class="s4-t">3 STEPS FOR Appointment </span>
              <span class="green s4-t">Process for Legal Services</span>
            </div>
            <div class="s4-grid-container">
                <div class="s4-grid-1">
                    <div class="s4-box green2">
                        <div class="s4-grid-container-container">
                            <div>
                                <p class="s4-index green1">1</p>
                            </div>
                            <div>
                                <img src="/images/basicImages/Frame-small.png" alt="" class="s4-img-1"></img>
                            </div>
                            <div>
                                <div class='s4-p green1'>
                                    <p>Search Best Lawyer for Online Consultation</p>
                                </div>
                                <button class="seemore green1 bg-green3">
                                    See more >
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="s4-grid-2">
                    <div class='s4-box blue2'>
                        <div class="s4-grid-container-container">
                            <div>
                                <p class="s4-index d-blue">2</p>
                            </div>
                            <div>
                                <img src="/images/basicImages/Frame2.png" alt="" class="s4-img-1"/>
                            </div>
                            <div>
                                <div class='s4-p d-blue'>
                                    <p>View Lawyer Profile</p>
                                </div>
                                <button class="seemore d-blue bg-blue3">
                                    See more >
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="s4-grid-3">
                    <div class='s4-box yellow2'>
                        <div class="s4-grid-container-container">
                            <div>
                                <p class="s4-index brown1">3</p>
                            </div>
                            <div>
                                <img src="/images/basicImages/Frame3.png" alt="" class="s4-img-1"/>
                            </div>
                            <div>
                                <div class='s4-p brown1'>
                                    <p>Get Instant Lawyer Appointment</p>
                                </div>
                                <button class="seemore brown bg-yellow3">
                                    See more >
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="home-section5">
        <div class="home-section5-grid">
            <div class="home-section-5-img">
                <img class="home-section-5-img" src="/images/basicImages/s5-img.png" alt=""/>
            </div>
            <div class="home-section-5-content">
                <p class='home-section3-features'>BEST LAWYERS IN UAE FOR LEGAL SERVICES ONLINE</p>
                <span class='green title-text'>Find legal Services </span>
                <span class='title-text'>with one click and get your Legal Advice.</span>
                <p style="padding: 2rem 0">Make an appointment with Advocates and Legal consultancy, Today! or chat with a lawyer online for free in Dubai and across UAE now, We work on a wide range of legal matters. Our legal Services from the Legal staff is here to assist you with proper guidance...
                <a href="#">(read more)</a></p>

                <div class="home-section-5-content-container">
                    <button class="seemore1 bg-transparent">
                        <img src="/images/basicImages/FreeIcon.png" alt=""/> &nbsp;&nbsp;Get Free Legal Advice Services
                    </button>                                
                    <button class="seemore1 bg-transparent">
                        <img src="/images/basicImages/OnlineIcon.png" alt=""/> &nbsp;&nbsp;Free online legal consultation
                    </button>                                
                    <button class="seemore1 bg-transparent">
                        <img src="/images/basicImages/ChatIcon.png" alt=""/> &nbsp;&nbsp;Free 24 hour legal advice chat
                    </button>
                    <button class="seemore1 bg-transparent">
                        <img src="/images/basicImages/GroupIcon.png" alt=""/> &nbsp;&nbsp;Hire a lawyer
                    </button>
                </div>
                <button class="contactnow white">Contact now <div class="h-100 bg-green"><i class="fas fa-arrow-right"></i></div></button>
            </div>
        </div>
    </section>
    <section class="section home-section-6">
        <div class="home-section-6-container">
            <div class="home-section-6-container-item1">
                <h1 class="s6-boxItem-1">PRO Services</h1>
                <p class="">Make an appointment with <strong>Advocates and Legal</strong> consultancy, Today! </p>
                <ul>
                    <li><span class="material-symbols-rounded">check_circle</span> Make an appointment with Advocates.</li>
                    <li><span class="material-symbols-rounded">check_circle</span> Make an appointment with Advocates.</li>
                    <li><span class="material-symbols-rounded">check_circle</span> Make an appointment with Advocates.</li>
                    <li><span class="material-symbols-rounded">check_circle</span> Make an appointment with Advocates.</li>
                </ul>
                <button class="contactnow1">Contact now <i class="fas fa-arrow-right bg-green" id="h-100"></i></button>
            </div>
            <div class="home-section-6-container-item2">
                <h1 class="s6-boxItem-2">Legal Translation Services</h1>
                <p class="">Make an appointment with <strong>Advocates and Legal</strong> consultancy, Today! </p>
                <ul>
                    <li><span class="material-symbols-rounded">check_circle</span> Make an appointment with Advocates.</li>
                    <li><span class="material-symbols-rounded">check_circle</span> Make an appointment with Advocates.</li>
                    <li><span class="material-symbols-rounded">check_circle</span> Make an appointment with Advocates.</li>
                    <li><span class="material-symbols-rounded">check_circle</span> Make an appointment with Advocates.</li>
                </ul>
                <button class="contactnow1">Contact now <i class="fas fa-arrow-right bg-green" id="h-100"></i></button>
            </div>
        </div>
        
    </section>
    <section class="section home-section7">
        <div class="home-section7-grid-container">
            <div class="home-section7-grid-item1">
                <div class="s7-testimonials">
                    <p class='home-section3-features'>TESTIMONIALS</p>
                    <img src="/images/basicImages/Quote.png" alt="" class="s7-quote"/>
                    <p class='green title-text s7-title'>What client's say?</p>
                    <p class='s7-p'>"We quickly had to get legal counsel, and luckily for us, we found the Connect Legal platform. The rapport and guidance was outstanding at all times, prompt, timely, and open for calls and quick updates".
                    </p>
                    <a href="#" class="green">See more ></a>
                </div>
            </div>
            <div class="home-section7-grid-item2">
                <div class="home-section7-grid-item2-container">
                    <div class="home-section7-grid-item2-container-item1">
                        <div class="home-section7-grid-item2-container-item1-container">
                            <div class="home-section7-grid-item2-container-item1-container-div" style="background-color: #3DC9A1; opacity: 0.2; border-radius: 2rem; height: 15rem;"></div>
                            <div class="home-section7-grid-item2-container-item1-container-div" style="border-radius: 2rem 2rem 2rem 0">
                                <div class="s7-qoutes">
                                    <p class="s7-qoutes-p">"We quickly had to get legal counsel, and luckily for us, we found the Connect Legal platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                                    <div class="s7-qoutes-rating">
                                      <div class="s7-qoutes-rating-user">
                                        <div class="s7-qoutes-rating-user-img"><img src="/images/basicImages/s7-userProfile1.png" alt=""/></div>
                                        <div class="s7-qoutes-rating-user-p">
                                          <strong>Kiran Khatun</strong>
                                          <p>CEO Company</p>
                                        </div>
                                      </div> 
                                      <div class="s7-qoutes-ratings">
                                        <div class="ratings">
                                          <!-- <Rating name="read-only" value={testimonials[0].stars} readOnly icon={<StarRateRoundedIcon/>} emptyIcon={<StarRateRoundedIcon/>}/> -->
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                        </div>
                                        <p class="s7-qoutes-rating-user-span">Since 2 months</p>
                                      </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="home-section7-grid-item2-container-item1-container-div" style="border-radius: 2rem 2rem 2rem 0">
                                <div class="s7-qoutes">
                                    <p class="s7-qoutes-p">"We quickly had to get legal counsel, and luckily for us, we found the Connect Legal platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                                    <div class="s7-qoutes-rating">
                                      <div class="s7-qoutes-rating-user">
                                        <div class="s7-qoutes-rating-user-img"><img src="/images/basicImages/s7-userProfile2.png" alt=""/></div>
                                        <div class="s7-qoutes-rating-user-p">
                                          <strong>Devdan Sharma</strong>
                                          <p>CEO Company</p>
                                        </div>
                                      </div> 
                                      <div class="s7-qoutes-ratings">
                                        <div class="ratings">
                                          <!-- <Rating name="read-only" value={testimonials[0].stars} readOnly icon={<StarRateRoundedIcon/>} emptyIcon={<StarRateRoundedIcon/>}/> -->
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                        </div>
                                        <p class="s7-qoutes-rating-user-span">Since 2 months</p>
                                      </div>
                                    </div>  
                                </div>
                            </div>                            
                            <div class="home-section7-grid-item2-container-item1-container-div" style="border-radius: 2rem 2rem 2rem 0">
                                <div class="s7-qoutes">
                                    <p class="s7-qoutes-p">"We quickly had to get legal counsel, and luckily for us, we found the Connect Legal platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                                    <div class="s7-qoutes-rating">
                                      <div class="s7-qoutes-rating-user">
                                        <div class="s7-qoutes-rating-user-img"><img src="/images/basicImages/s7-userProfile3.png" alt=""/></div>
                                        <div class="s7-qoutes-rating-user-p">
                                          <strong>Liam Brown</strong>
                                          <p>CEO Company</p>
                                        </div>
                                      </div> 
                                      <div class="s7-qoutes-ratings">
                                        <div class="ratings">
                                          <!-- <Rating name="read-only" value={testimonials[0].stars} readOnly icon={<StarRateRoundedIcon/>} emptyIcon={<StarRateRoundedIcon/>}/> -->
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                        </div>
                                        <p class="s7-qoutes-rating-user-span">Since 2 months</p>
                                      </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="home-section7-grid-item2-container-item1-container-div" style="background-color: #3DC9A1; opacity: 0.2; border-radius: 2rem; height: 15rem;"></div>
                        </div>
                    </div>
                    <div class="home-section7-grid-item2-container-item2">
                        <div class="home-section7-grid-item2-container-item1-container">
                            <div class="home-section7-grid-item2-container-item1-container-div" style="background-color: #3DC9A1; opacity: 0.2; border-radius: 2rem; height: 15rem;"></div>
                            <div class="home-section7-grid-item2-container-item1-container-div" style="border-radius: 2rem 2rem 2rem 0">
                                <div class="s7-qoutes">
                                    <p class="s7-qoutes-p">"We quickly had to get legal counsel, and luckily for us, we found the Connect Legal platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                                    <div class="s7-qoutes-rating">
                                      <div class="s7-qoutes-rating-user">
                                        <div class="s7-qoutes-rating-user-img"><img src="/images/basicImages/s7-userProfile4.png" alt=""/></div>
                                        <div class="s7-qoutes-rating-user-p">
                                          <strong>Ranji Khan</strong>
                                          <p>CEO Company</p>
                                        </div>
                                      </div> 
                                      <div class="s7-qoutes-ratings">
                                        <div class="ratings">
                                          <!-- <Rating name="read-only" value={testimonials[0].stars} readOnly icon={<StarRateRoundedIcon/>} emptyIcon={<StarRateRoundedIcon/>}/> -->
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                        </div>
                                        <p class="s7-qoutes-rating-user-span">Since 2 months</p>
                                      </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="home-section7-grid-item2-container-item1-container-div" style="border-radius: 2rem 2rem 2rem 0">
                                <div class="s7-qoutes">
                                    <p class="s7-qoutes-p">"We quickly had to get legal counsel, and luckily for us, we found the Connect Legal platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                                    <div class="s7-qoutes-rating">
                                      <div class="s7-qoutes-rating-user">
                                        <div class="s7-qoutes-rating-user-img"><img src="/images/basicImages/s7-userProfile5.png" alt=""/></div>
                                        <div class="s7-qoutes-rating-user-p">
                                          <strong>Richard Evans</strong>
                                          <p>CEO Company</p>
                                        </div>
                                      </div> 
                                      <div class="s7-qoutes-ratings">
                                        <div class="ratings">
                                          <!-- <Rating name="read-only" value={testimonials[0].stars} readOnly icon={<StarRateRoundedIcon/>} emptyIcon={<StarRateRoundedIcon/>}/> -->
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                            <span class="fa fa-star" style="color: orange"></span>
                                        </div>
                                        <p class="s7-qoutes-rating-user-span">Since 2 months</p>
                                      </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="home-section7-grid-item2-container-item1-container-div" style="background-color: #3DC9A1; opacity: 0.2; border-radius: 2rem; height: 15rem;"></div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="letsee">
            <div><img src="/images/basicImages/s8.png" style="width: 100%"/></div>
            <div class="myccontent">
                <p class='home-section3-features'>HOW IT WORKS</p>
                <span class='title-text'>Looking for a </span>
                <span class='green title-text'>lawyer?</span>
                <p class='p-text' style='padding-bottom: 2rem'>Find duly licensed practicing lawyers or law firms in our unique lawyer directory. Select the one right for you by office location, practice area or language. Compare lawyers by their expertise and rating.</p>
                <button class="contactnow white">Contact now <div class="h-100 bg-green"><i class="fas fa-arrow-right"></i></div></button>
            </div>
        </div>
    </section>
    <section class="section home-section9">
        <div class="home-section-9-grid">
            <div class="home-section-9-item1">
                <div class="s9-block">
                    <p class="s9-block-h d-blue">Why Register?</p>
                    <p class="s9-block-p">Keep the history of all your chats, questions and callback requests. Adding a lorem ipsum here.</p>
                    <a href="#"><span class="material-symbols-rounded d-blue" id="s9-block-h">arrow_circle_right</span></a>
                </div>
            </div>
            <div class="home-section-9-item2">
                <div class="s9-block">
                    <div class="s9-flex">
                      <span class="material-symbols-rounded s9-flex-icon green green2">chat</span>
                      <p class="s9-flex-p">Keep the history of all your chats, questions and callback requests</p>
                    </div>
                    <div class="s9-flex">
                        <span class="material-symbols-rounded s9-flex-icon d-blue bg-l-blue">notifications</span>
                      <p class="s9-flex-p">Track your interactions with lawyers and receive notifications</p>
                    </div>
                    <div class="s9-flex">
                        <span class="material-symbols-rounded s9-flex-icon brown bg-yellow">back_hand</span>
                      <p class="s9-flex-p">Ask lawyers follow-up questions if something is not clear from their answers</p>
                    </div>
                  </div>
            </div>
            <div class="home-section-9-item3">
                <div class="s9-grid">
                    <div class="s9-grid-item1">
                        <div class="s9-grid-s1-logo">
                            <img src="/images/basicImages/s9-logo.png" alt=""/>
                        </div>
                        <div class="s9-grid-s1-body">
                        <div class="s9-grid-s1-group">
                            <p class="s9-grid-s1-h">Are you a lawyer?</p>
                            <p class="s9-grid-s1-p">Be found. Register with us and get new leads every day. Adding more lorem ipsum and will be remplaced for the final text.</p>
                            <div class="s9-grid-s1-button">
                                <button class="registernow white">Register <div class="h-100 bg-green"><i class="fas fa-arrow-right"></i></div></button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="s9-grid-item2">
                        <p class="s9-grid-s2-t">
                            Get Started
                        </p>
                        <p class="s9-grid-s2-st">
                            Already have account? <a class='linkStyle w-700'>Sign in</a>
                        </p>
                        <!-- <form class="s9-form" action="/register" method="post"> -->
                        <form class="s9-form">
                            <div><label for="name">Name</label></div>
                            <input
                                name="name"
                                id="standard-name"
                                label="Name"
                                placeholder="Enter your name"
                            />
                            <div><label for="email">Email Address</label></div>
                            <input
                                name="email"
                                id="standard-email"
                                label="Email Address"
                                placeholder="email@domain.com"
                            />
                            <div><label for="password">Password</label></div>
                            <input
                                name="password"
                                id="standard-password-input"
                                label="Password"
                                placeholder="........."
                                type="password"
                            />
                            
                            <button class="s9-signup" type='submit'>Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-container">
            <div class="footer-container-item1">
                <img src="/images/basicImages/cl_logo_6.png" alt=""/>
            </div>
            <div class="footer-container-item">
                <h4 class="footer-container-item-h">About company</h4>
                <div class="footer-container-item-a"><a href="#" class=" link white">About company</a></div>
                <div class="footer-container-item-a"><a href="#" class=" link white">Our services</a></div>
                <div class="footer-container-item-a"><a href="#" class=" link white">Job opportunities</a></div>
                <div class="footer-container-item-a"><a href="#" class=" link white">Contact us</a></div>
            </div>
            <div class="footer-container-item">
                <h4 class="footer-container-item-h">Customer desk</h4>
                <div class="footer-container-item-a"><a href="#" class=" link white">Client support</a></div>
                <div class="footer-container-item-a"><a href="#" class=" link white">Pricing packages</a></div>
                <div class="footer-container-item-a"><a href="#" class=" link white">Company story</a></div>
                <div class="footer-container-item-a"><a href="#" class=" link white">Latest news</a></div>
            </div>
            <div class="footer-container-item">
                <h4 class="footer-container-item-h">Client resources</h4>
                <div class="footer-container-item-a"><a href="#" class="link white">Theme guide</a></div>
                <div class="footer-container-item-a"><a href="#" class="link white">Support desk</a></div>
                <div class="footer-container-item-a"><a href="#" class="link white">What we offer</a></div>
                <div class="footer-container-item-a"><a href="#" class="link white">Company history</a></div>
            </div>
            <div class="footer-container-item">
                <h4 class="footer-container-item-h">Our services</h4>
                <div class="footer-container-item-a"><a href="#" class="link white">Brand experience</a></div>
                <div class="footer-container-item-a"><a href="#" class="link white">E-commerce website</a></div>
                <div class="footer-container-item-a"><a href="#" class="link white">Content writing</a></div>
                <div class="footer-container-item-a"><a href="#" class="link white">Marketing strategy</a></div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="footer-copyright-item1">
                <img src="/images/basicImages/cl_logo_5.png" alt=""/>
            </div>
            <div class="footer-copyright-item2">
                <p class="footer-copyright-text">
                <i class="far fa-copyright"></i> 2021 Litho is Proudly Powered by ThemeZaa</p>
            </div>
            <div class="footer-copyright-item3">
                <div><a href="#" class="socialIcons white"><i class="fab fa-instagram"></i></a></div>
                <div><a href="#" class="socialIcons white"><i class="fab fa-facebook-f"></i></a></div>
                <div><a href="#" class="socialIcons white"><i class="fab fa-linkedin-in"></i></a></div>
            </div>
        </div>
    </footer>

    <script>
        const handleClickOutside = (e) => {
            if (!e.target.closest('.sidebar')) {
                document.getElementById("mySidebar").style.left = '-100%';
            }
      };
        document.addEventListener('click', handleClickOutside, true);
        

        function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

        function openLogin(){
            document.getElementById("myForm").innerHTML = `
            <div class="loginPopup-btns">
                <div><button class="loginPopup-loginbtn bg-green" onclick="openLogin()">Login</button></div>
                <div><button class="loginPopup-registerbtn" onclick="openRegister()">Register</button></div>
                <div><button class="loginPopup-closebtn" onclick="closeForm()">X</button></div>
            </div>
            <div class="loginPopup-content">
                <div class="s9-grid">
                    <div class="loginPopup-item1">
                        <div class="s9-grid-s1-logo">
                            <img src="/images/basicImages/s9-logo.png" alt=""/>
                        </div>
                        <div class="s9-grid-s1-body">
                        <div class="s9-grid-s1-group">
                            <p class="s9-grid-s1-h">The best Legal 
                                Portal in UAE</p>
                            <p class="s9-grid-s1-p">Be found. Register with us and get new leads every day. Adding more lorem ipsum and will be remplaced for the final text.</p>
                        </div>
                        </div>
                    </div>
                    <div class="s9-grid-item2">
                        <p class="s9-grid-s2-t">
                            Log In
                        </p>
                        <p class="s9-grid-s2-st">
                            Don't have an account? <a class='linkStyle w-700'>Register now</a>
                        </p>
                        <form class="s9-form">
                            <div><label for="email">Email Address</label></div>
                            <input
                                name="email"
                                id="standard-email"
                                label="Email Address"
                                placeholder="email@domain.com"
                            />
                            <div><label for="password">Password</label></div>
                            <input
                                name="password"
                                id="standard-password-input"
                                label="Password"
                                placeholder="........."
                                type="password"
                            />
                            
                            <button class="s9-signup" type='submit'>Log in</button>
                        </form>
                    </div>
                </div>
            </div>`
        }

        function openRegister(){
            document.getElementById("myForm").innerHTML = `
            <div class="loginPopup-btns">
                <div><button class="loginPopup-loginbtn" onclick="openLogin()">Login</button></div>
                <div><button class="loginPopup-registerbtn bg-green" onclick="openRegister()">Register</button></div>
                <div><button class="loginPopup-closebtn" onclick="closeForm()">X</button></div>
            </div>
            <div class="loginPopup-content">
                <div class="register-container">
                    <div class="register-container-item1">
                        <h1 class="s6-boxItem-1">Register like a Lawyer</h1>
                        <p class="">Join us like a bigger buffet of lawyers in the Middle East</p>
                        <button class="registerpopup-btn">Register like a Lawyer</button>
                    </div>
                    <div class="register-container-item2">
                        <h1 class="s6-boxItem-2">Register like user</h1>
                        <p class="">Are you looking to hire a lawyer or make one consultant? Register now! </p>
                        <button class="registerpopup-btn">Register like a user</button>
                    </div>
                </div>
            </div>`
        }

        function closeForm() {
            document.getElementById("myForm").innerHTML = `
            <div class="loginPopup-btns">
                <div><button class="loginPopup-loginbtn bg-green" onclick="openLogin()">Login</button></div>
                <div><button class="loginPopup-registerbtn" onclick="openRegister()">Register</button></div>
                <div><button class="loginPopup-closebtn" onclick="closeForm()">X</button></div>
            </div>
            <div class="loginPopup-content">
                <div class="s9-grid">
                    <div class="loginPopup-item1">
                        <div class="s9-grid-s1-logo">
                            <img src="/images/basicImages/s9-logo.png" alt=""/>
                        </div>
                        <div class="s9-grid-s1-body">
                        <div class="s9-grid-s1-group">
                            <p class="s9-grid-s1-h">The best Legal 
                                Portal in UAE</p>
                            <p class="s9-grid-s1-p">Be found. Register with us and get new leads every day. Adding more lorem ipsum and will be remplaced for the final text.</p>
                        </div>
                        </div>
                    </div>
                    <div class="s9-grid-item2">
                        <p class="s9-grid-s2-t">
                            Log In
                        </p>
                        <p class="s9-grid-s2-st">
                            Don't have an account? <a class='linkStyle w-700'>Register now</a>
                        </p>
                        <form class="s9-form">
                            <div><label for="email">Email Address</label></div>
                            <input
                                name="email"
                                id="standard-email"
                                label="Email Address"
                                placeholder="email@domain.com"
                            />
                            <div><label for="password">Password</label></div>
                            <input
                                name="password"
                                id="standard-password-input"
                                label="Password"
                                placeholder="........."
                                type="password"
                            />
                            
                            <button class="s9-signup" type='submit'>Log in</button>
                        </form>
                    </div>
                </div>
            </div>`
        document.getElementById("myForm").style.display = "none";
        }
        
        function w3_open() {
            document.getElementById("mySidebar").style.left = 0;
        }
        
        function w3_close() {
            document.getElementById("mySidebar").style.left = '-100%';
        }

        function showContent1() {
          document.getElementById("content").innerHTML = `
          <ul>
            <li class=""><a href="#" class="nav-link-item link black"><span class="material-symbols-rounded nav-link-icon">home</span> Home</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><span class="material-symbols-rounded nav-link-icon">assured_workload</span> How it works</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><span class="material-symbols-rounded nav-link-icon">groups</span> For lawyers</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><span class="material-symbols-rounded nav-link-icon">live_help</span> Q & A</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><span class="material-symbols-rounded nav-link-icon">workspace_premium</span> Testimonials</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><span class="material-symbols-rounded nav-link-icon">work</span> Our lawyers</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><i class="fas fa-user-tie fa-lg nav-link-icon"></i> Lawyers</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><span class="material-symbols-rounded nav-link-icon">balance</span> Practice Area</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><i class="far fa-newspaper fa-lg nav-link-icon"></i> Blogs & Articles</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><i class="far fa-id-card fa-lg nav-link-icon"></i> Hire Lawyer</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><i class="fas fa-gavel fa-lg nav-link-icon"></i> Legal Articles</a></li>
            <li class=""><a href="#" class="nav-link-item link black"><span class="material-symbols-rounded nav-link-icon">login</span> Login</a></li>
        </ul>`;

        document.getElementById("sidebar-menu-btn1").style.color= '#208C84';
        document.getElementById("sidebar-menu-btn2").style.color= 'black';
        }
        
        function showContent2() {
          document.getElementById("content").innerHTML = `
          <ul>
            <li class="">
                <a href="#" class="nav-link-item link black">
                    <img src="/images/basicImages/s7-userProfile1.png" alt=""/>
                    <div class="s7-qoutes-rating-user-p">
                        <strong>Kiran Khatun</strong>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="#" class="nav-link-item link black">
                    <img src="/images/basicImages/s7-userProfile1.png" alt=""/>
                    <div class="s7-qoutes-rating-user-p">
                        <strong>Kiran Khatun</strong>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="#" class="nav-link-item link black">
                    <img src="/images/basicImages/s7-userProfile1.png" alt=""/>
                    <div class="s7-qoutes-rating-user-p">
                        <strong>Kiran Khatun</strong>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="#" class="nav-link-item link black">
                    <img src="/images/basicImages/s7-userProfile1.png" alt=""/>
                    <div class="s7-qoutes-rating-user-p">
                        <strong>Kiran Khatun</strong>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="#" class="nav-link-item link black">
                    <img src="/images/basicImages/s7-userProfile1.png" alt=""/>
                    <div class="s7-qoutes-rating-user-p">
                        <strong>Kiran Khatun</strong>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </a>
            </li>
        </ul>
        <div class="sidebar-menu-green">
            <button class="sidebar-menu-green-btn btn green"  id="sidebar-menu-green-btn1">Lawyers offline</button>
        </div>
        <ul>
            <li class="">
                <a href="#" class="nav-link-item link black">
                    <img src="/images/basicImages/s7-userProfile1.png" alt=""/>
                    <div class="s7-qoutes-rating-user-p">
                        <strong>Kiran Khatun</strong>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="#" class="nav-link-item link black">
                    <img src="/images/basicImages/s7-userProfile1.png" alt=""/>
                    <div class="s7-qoutes-rating-user-p">
                        <strong>Kiran Khatun</strong>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="#" class="nav-link-item link black">
                    <img src="/images/basicImages/s7-userProfile1.png" alt=""/>
                    <div class="s7-qoutes-rating-user-p">
                        <strong>Kiran Khatun</strong>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="#" class="nav-link-item link black">
                    <img src="/images/basicImages/s7-userProfile1.png" alt=""/>
                    <div class="s7-qoutes-rating-user-p">
                        <strong>Kiran Khatun</strong>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="#" class="nav-link-item link black">
                    <img src="/images/basicImages/s7-userProfile1.png" alt=""/>
                    <div class="s7-qoutes-rating-user-p">
                        <strong>Kiran Khatun</strong>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </a>
            </li>
        </ul>
        `;

          document.getElementById("sidebar-menu-btn2").style.color= '#208C84';
          document.getElementById("sidebar-menu-btn1").style.color= 'black';
        }

    </script>
    
</body>
</html>