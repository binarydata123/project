const handleClickOutside = (e) => {
    if (!e.target.closest('.sidebar')) {
        document.getElementById("mySidebar").style.left = '-300%';
    }
};
document.addEventListener('click', handleClickOutside, true);

function opencontactnow() {
    document.getElementById("contactnowPopup").style.display = "block";
}
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function w3_open() {
    document.getElementById("mySidebar").style.left = 0;
}

function w3_close() {
    document.getElementById("mySidebar").style.left = '-100%';
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
                    <img src="../images/basicImages/s9-logo.png" alt=""/>
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
                    <a class="linkStyle login-forgotpassword">Forgot password</a>
                    
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
                <button class="registerpopup-btn" onclick="openSignUpUser()">Register like a user</button>
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
                    <img src="../images/basicImages/s9-logo.png" alt=""/>
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
                    <a class="linkStyle login-forgotpassword">Forgot password</a>
                    <button class="s9-signup" type='submit'>Log in</button>
                </form>
            </div>
        </div>
    </div>`
document.getElementById("myForm").style.display = "none";
}

function closecontactnow(){
    document.getElementById("contactnowPopup").style.display = "none";
}
function w3_open() {
  document.getElementById("mySidebar").style.left = 0;
}

function w3_close() {
  document.getElementById("mySidebar").style.left = '-300%';
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
            <a onclick="myAccFunc()" class="nav-link-item link black">
                <img src="../images/basicImages/s7-userProfile1.png" alt=""/>
                <div class="lawyer-sidebar">
                    <strong>Kiran Khatun</strong>
                    <p>UAE, Abu Dhabi</p>
                </div>
            </a>
        </li>
        <div id="demoAcc" class="lawyer-options hidden-item">
            <a href="#" class="nav-link-item link black"><span class="material-symbols-rounded circle-grey">post_add</span>&nbsp;&nbsp; Post a question</a>
            <a href="#" class="nav-link-item link black"><span class="material-symbols-rounded circle-grey">chat</span>&nbsp;&nbsp; Chat Online</a>
            <a href="#" class="nav-link-item link black"><span class="material-symbols-rounded circle-grey">phone_callback</span>&nbsp;&nbsp; Request a Callback</a>
            <a href="#" class="nav-link-item link black"><span class="material-symbols-rounded circle-grey">meeting_room</span>&nbsp;&nbsp; Book a Meeting</a>
            <a href="#" class="nav-link-item link black"><span class="material-symbols-rounded circle-grey">business_center</span>&nbsp;&nbsp; Hire the Lawyer</a>
            <a href="#" class="nav-link-item link black"><span class="material-symbols-rounded circle-grey">person</span>&nbsp;&nbsp; Open Profile</a>
        </div>
        <li class="">
            <a class="nav-link-item link black">
                <img src="../images/basicImages/s7-userProfile1.png" alt=""/>
                <div class="lawyer-sidebar">
                    <strong>Kiran Khatun</strong>
                    <p>UAE, Abu Dhabi</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="#" class="nav-link-item link black">
                <img src="../images/basicImages/s7-userProfile1.png" alt=""/>
                <div class="lawyer-sidebar">
                    <strong>Kiran Khatun</strong>
                    <p>UAE, Abu Dhabi</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="#" class="nav-link-item link black">
                <img src="../images/basicImages/s7-userProfile1.png" alt=""/>
                <div class="lawyer-sidebar">
                    <strong>Kiran Khatun</strong>
                    <p>UAE, Abu Dhabi</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="#" class="nav-link-item link black">
                <img src="../images/basicImages/s7-userProfile1.png" alt=""/>
                <div class="lawyer-sidebar">
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
                <img src="../images/basicImages/s7-userProfile1.png" alt=""/>
                <div class="lawyer-sidebar">
                    <strong>Kiran Khatun</strong>
                    <p>UAE, Abu Dhabi</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="#" class="nav-link-item link black">
                <img src="../images/basicImages/s7-userProfile1.png" alt=""/>
                <div class="lawyer-sidebar">
                    <strong>Kiran Khatun</strong>
                    <p>UAE, Abu Dhabi</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="#" class="nav-link-item link black">
                <img src="../images/basicImages/s7-userProfile1.png" alt=""/>
                <div class="lawyer-sidebar">
                    <strong>Kiran Khatun</strong>
                    <p>UAE, Abu Dhabi</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="#" class="nav-link-item link black">
                <img src="../images/basicImages/s7-userProfile1.png" alt=""/>
                <div class="lawyer-sidebar">
                    <strong>Kiran Khatun</strong>
                    <p>UAE, Abu Dhabi</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="#" class="nav-link-item link black">
                <img src="../images/basicImages/s7-userProfile1.png" alt=""/>
                <div class="lawyer-sidebar">
                    <strong>Kiran Khatun</strong>
                    <p>UAE, Abu Dhabi</p>
                </div>
            </a>
        </li>
    </ul>`;

    document.getElementById("sidebar-menu-btn2").style.color= '#208C84';
    document.getElementById("sidebar-menu-btn1").style.color= 'black';
}

function openSignUpUser(){
    document.getElementById("myForm").innerHTML = `
    <div class="loginPopup-btns">
        <div><button class="loginPopup-loginbtn" onclick="openLogin()">Login</button></div>
        <div><button class="loginPopup-registerbtn bg-green" onclick="openRegister()">Register</button></div>
        <div><button class="loginPopup-closebtn" onclick="closeForm()">X</button></div>
    </div>
    <div class="loginPopup-content">
        <div class="s9-grid">
            <div class="signUpPopup-item1">
                <div class="s9-grid-s1-logo">
                    <img src="../images/basicImages/s9-logo.png" alt=""/>
                </div>
                <div class="s9-grid-s1-body">
                <div class="s9-grid-s1-group">
                    <p class="s9-grid-s1-h-signup">Find your lawyer or make your consultation</p>
                    <p class="s9-grid-s1-p">Be found. Register with us and get new leads every day. Adding more lorem ipsum and will be remplaced for the final text.</p>
                </div>
                </div>
            </div>
            <div class="s9-grid-item2">
                <p class="s9-grid-s2-t">
                    Sign Up
                </p>
                <p class="s9-grid-s2-st">
                    Already have an account? <a class='linkStyle w-700'>Log in</a>
                </p>
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
    </div>`
}

function myAccFunc(){
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("show-item") == -1) {
        x.className += "show-item";
        x.previousElementSibling.style.backgroundColor = '#E8F8F2';
    } else { 
        x.className = x.className.replace("show-item", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-green", "");
        x.previousElementSibling.style.backgroundColor = '#fff';
    }
}