@extends('common.home.layouts.app')
@section('content')
  <section class="practice-area bg-grad-2">
    <div class="container">    
      <div class="step-box">
        <ul class="step-ul">
          <li>
            <a href="#" class="done-step">
              <i class="fa-solid fa-circle-check"></i> Service <i class="fa-solid fa-angles-right"></i>
            </a>
          </li>

          <li>
            <a href="#" class="activ-step">
              <i class="fa-solid fa-circle-check"></i> Terms <i class="fa-solid fa-angles-right"></i>
            </a>
          </li>

          <li>
            <a href="#" class="next-step">
              <i class="fa-solid fa-circle-check"></i> Contact <i class="fa-solid fa-angles-right"></i>
            </a>
          </li>

          <li>
            <a href="#" class="next-step">
              <i class="fa-solid fa-circle-check"></i> Payment <i class="fa-solid fa-angles-right"></i>
            </a>
          </li>

          <li class="pr-0">
            <a href="#" class="next-step pr-0">
              <i class="fa-solid fa-circle-check"></i> Order Done 
            </a>
          </li>
        </ul>
      </div>

      <div class="terms-step">
        <div class="row">
          <div class="col-lg-8 col-md-12">
            <div class="box-redi">
              <h3>Terms of Service</h3>
              <div class="the-above">
                The following Terms constitute a binding agreement between you as the Client and the Service Provider with regard to the provision of the Service as described hereinafter.
                Service
                <h4>Two-hour Intellectual Property counselling session exclusive for you</h4>
                <p>Service Provider</p>
                <p>Laila Hamza Al Mulla Advocates and Legal Consultantsrepresented byMr. Khaled Ebid</p>
                <p>Service Standards</p>
                <p>The Service Provider confirms that they are duly registered and licensed to provide the Service to the Client.</p>
                The Service Provider will perform, provide and execute the Service with diligence and exercise reasonable care and skill.</p>
                <p>All work which the Service Provider carries out for the Client will be in accordance with the current professional guidance and practice, and based on the interpretation of the existing legislation relevant to the Service.</p>
                <p>Understanding the importance of the due and timely delivery of the Service, the Service Provider will use reasonable efforts to ensure the due and satisfactory execution and completion of the Service in accordance with the time-limit set for the same.</p>
                <p>Deliverables</p>
                <p>The deliverables including but not limited to any documents, research, consultations, advice or any other communication, will be prepared by the Service Provider solely for the use of those to whom they are addressed and only for the purpose set out in the Service Description. The Service Provider accepts no liability or responsibility to any third party to whom the deliverables are shown or into whose hands they may come.</p>
                <p>The Service Provider owns all rights in the deliverables including, without limitation, any copyright. The Client may make copies of the deliverables for own internal use but the Client must not provide the deliverables, or copies of them, to any third party, including Client’s probable other advisors without first obtaining the Service Provider’s written consent so that the Service Provider has an opportunity to consider the context in which their advice is being used.</p>
                <p> Whether or not the Service Provider has given their consent, the Service Provider will not accept any liability or responsibility to any third party who may gain access to the deliverables.</p>
                <p>Client’s Responsibility</p>
                <p>The Client confirms his/her legal capacity to enter into an agreement regarding the Service with the Service Provider under this Terms of Service.</p>
                <p>Prior to commencing the Service, the Service Provider will require certain information and documents from the Client. The actual commencement of the Service will be once all the required information and documents are provided by the Client and duly received by the Service Provider.</p>
              </div>
              <div class="i-accept">
                <div class="row">
                  <form id="my-form" action="{{route('service.step-three', $service->id)}}" method="get" class="d-flex">
                    <div class="col-sm-9 col-12">
                      <label>
                        <input type="checkbox" name="acceptTerms"> I accept the above Terms of Service
                      </label>
                    </div>
                    <div class="col-sm-3 col-12 text-right m-center">
                      <p>
                        <a href="#" onclick="submitForm()" class="next-step-btn">Next Step</a>
                      </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          


          <div class="col-lg-4 col-md-12">
            <div class="box-redi card-summary">
              <h3>Summary Service</h3>
              <div class="p-3">
              <img src="/new-design/assets/images/Rectangle-m.png" alt="Rectangle-m" class="Rectangle-m mb-3">
              <p>{{$service->title}}</p>

              <div class="law-box" id="summary-law">
              <div class="row">
                <div class="col-3 text-center m-p-0 over-n">
                  <img src="/storage/{{$service->addedBy->getProfilePic($service->added_by)}}" alt="Group"> 
                  <!-- <i class="fa-solid fa-crown crown-p"></i> -->
                </div>
                <div class="col-7">
                  <h5>{{$service->addedBy->name}}</h5>
                  <div class="row">
                    <div class="col-6 p-0">
                      <ul class="star-part-2">
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>  
                      </ul>
                    </div>
                    <div class="col-6 p-0">                    
                      <span class="rev-35">(35 Reviews)</span>
                    </div>
                  </div>                                                 

                </div>
                <div class="col-2 p-0">
                  <p class="aed">AED <br> <span>{{$service->getLawyerFee($service->id) + $service->getPlatformFee($service->id)}}</span></p>
                </div>
              </div>
            </div>

              </div>
            </div>
          </div>



        </div>
      </div>
    </div>
  </section>
 

@endsection
@push('script')
  <script>
    function submitForm() {
      document.getElementById("my-form").submit();
    }
  </script>
@endpush