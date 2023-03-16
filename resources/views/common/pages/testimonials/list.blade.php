@extends('common.home.layouts.app')
@section('content')
    <div class="p-80">
        <div class="bg-f4fefa">
           <div class="container" id="content-flex">
               <div class="row py-md-3">
                   <div class="col-md-6 postn-icn">
                       <h1 class="moni br-dask">Client <br> <span class="span-color-dark">Testimonials</span></h1>
                       <p class="moni-app">Make an appointment with Advocates and Legal consultancy, Today! or chat with a
                           lawyer online for free in Dubai and across UAE now.</p>
                   </div>
                   <div class="col-md-6 text-end">
                       <img src="/new-design/assets/images/client/Vector.png" class="vctr"><br>
                       <div class="dt-tm"id="d-none">
                             <div class="col-md-12 text-md-end">
                               <div class="btn-group drop">
                                 <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> 
                                   Relevant <i class="fa-solid fa-sort"></i>
                                 </button>
                                 <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">Name </a></li> 
                                   <li><a class="dropdown-item" href="#">Name 2</a></li> 
                                 </ul>
                               </div>
                               <div class="btn-group drop">
                                 <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> 
                                  Date <i class="fa-solid fa-sort"></i>
                                 </button>
                                 <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">Name </a></li> 
                                   <li><a class="dropdown-item" href="#">Name 2</a></li> 
                                 </ul>
                               </div>
                             </div>
                         </div>
                   </div>
               </div>
               <div class="row align-items-center" id="none">
              <div class="col-md-6 col-6">
               <div class="plus-icn">
                 <img src="/new-design/assets/images/client/plus.png" class="plus">
                 <h1 class="addtst">Add Testimonials</h1>
             </div>
              </div>
               <div class="col-md-6 text-end col-6">
                 <div class="dt-tm">
                       <div class="col-md-12 text-md-end">
                         <div class="btn-group drop">
                           <button type="button" class="btn dropdown-toggle  btn-ope" data-bs-toggle="dropdown" aria-expanded="false"> 
                             Relevant <i class="fa-solid fa-sort"></i>
                           </button>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="#">Name </a></li> 
                             <li><a class="dropdown-item" href="#">Name 2</a></li> 
                           </ul>
                         </div>
                         <div class="btn-group drop">
                           <button type="button" class="btn dropdown-toggle btn-ope"  data-bs-toggle="dropdown" aria-expanded="false"> 
                            Date <i class="fa-solid fa-sort"></i>
                           </button>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="#">Name </a></li> 
                             <li><a class="dropdown-item" href="#">Name 2</a></li> 
                           </ul>
                         </div>
                       </div>
                   </div>
             </div>
               </div>
               <div class="row">
                   <div class="col-lg-4 col-md-6">
                       <div class="plus-icn" id="d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                           <img src="/new-design/assets/images/client/plus.png" class="plus">
                           <h1 class="addtst">Add Testimonials</h1>
                       </div>
                       <div class="modal fade modal-popups" id="staticBackdrop5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered" id="modal-login">
                                <div class="modal-content"> 
                                    <div class="modal-header text-right"> 
                                        <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                <div class="modal-body">
                                <div class="form-popup-des rounded" id="pills-tabContent">

                                    <h4 class="give-rating"> Add Testimonial</h4>
                                    <form action="{{route('store.testimonials')}}" method="post" onsubmit="return validateTestimonialsForm(event)">
                                        @csrf()
                                        <div class="eles group-invite area"> 
                                            <input type="text" placeholder="Name" name="name" id="t_name">
                                            <input type="text" placeholder="Emirate" name="emirate" id="t_emirate"  class="mt-3">
                                            <div class="links-icons">
                                                <textarea placeholder="Message" name="message" id="t_msg" class="description"></textarea> 
                                            </div>
                                        </div> 
                                        <div class="text-right mb-3">
                                            <button type="submit" class="btn-lgn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                </div> 
                                </div>
                            </div>
                        </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 172.png">
                                   </div>
                               </div>
                               <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 82.png">
                                   </div>
                               </div>
                                <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 172.png">
                                   </div>
                               </div>
                                <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 149.png">
                                   </div>
                               </div>
                                <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="btm-bx d-none d-lg-block"></div>
                   </div>
                   <div class="col-lg-4 col-md-6">
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 148.png">
                                   </div>
                               </div>
                               <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 76.png">
                                   </div>
                               </div>
                                <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 172.png">
                                   </div>
                               </div>
                                <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 73.png">
                                   </div>
                               </div>
                                <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 79.png">
                                   </div>
                               </div>
                                <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                   
                   </div>
                   <div class="col-lg-4 col-6 d-none d-lg-block">
                       <div class="fill-box">
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 147.png">
                                   </div>
                               </div>
                               <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 172.png">
                                   </div>
                               </div>
                                <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 172.png">
                                   </div>
                               </div>
                               <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="box hover-bx">
                           <p class="mon-txt">"We quickly had to get legal counsel, and luckily for us, we found the Connect
                               Legal
                               platform. The rapport and guidance was outstanding at all times, prompt”.</p>
                           <div class="row mt-4">
                               <div class="col-sm-2 col-2">
                                   <div class="img-class">
                                       <img src="/new-design/assets/images/client/Group 172.png">
                                   </div>
                               </div>
                                <div class="col-sm-5 col-6">
                                   <h5 class="mon-txt-cvr">Rahmman Abdal</h5>
                                   <h6 class="mon-cvr">CEO Company</h6>
                               </div>
                               <div class="col-sm-4 col-3">
                                   <ul class="star">
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                       <li><i class="fa-solid fa-star"></i></li>
                                   </ul>
                                   <p class="font-15">Since 2 months</p>
                               </div>
                           </div>
                       </div>
                       <div class="btm-bx d-none d-lg-block"></div>
                   </div>
                   <p class="btn-lst mt-3 mb-5">Load more Testimonials</p>
               </div>
           </div>
        </div>
    </div>
@endsection

@push('script')

    <script>
        function validateTestimonialsForm(e) {
            var valid = true;
            $(".testimonial-errors").empty()
            var name = $("#t_name").val()
            var emirate = $("#t_emirate").val()
            var msg = $("#t_msg").val()

            if(!name) {
                valid = false;
                $("#t_name").after('<span class="testimonial-errors" style="color:red;">This field is required</span>')
            }
            if(!emirate) {
                valid = false;
                $("#t_emirate").after('<span class="testimonial-errors" style="color:red;">This field is required</span>')
            }
            if(!msg) {
                valid = false;
                $("#t_msg").after('<span class="testimonial-errors" style="color:red;">This field is required</span>')
            }

            if(!valid) {
                e.preventDefault()
            }
        }
    </script>

@endpush