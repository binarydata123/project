@extends('common.home.layouts.app')
@section('content')

    <section class="practice-area bg-grad-2">
        <div class="container">
            <div class="step-box">
                <ul class="step-ul">
                    <li><a href="#" class="done-step">
                            <i class="fa-solid fa-circle-check"></i> Service <i class="fa-solid fa-angles-right"></i>
                        </a></li>

                    <li><a href="#" class="done-step">
                            <i class="fa-solid fa-circle-check"></i> Terms <i class="fa-solid fa-angles-right"></i>
                        </a></li>

                    <li><a href="#" class="done-step">
                            <i class="fa-solid fa-circle-check"></i> Contact <i class="fa-solid fa-angles-right"></i>
                        </a></li>

                    <li><a href="#" class="done-step">
                            <i class="fa-solid fa-circle-check"></i> Payment <i class="fa-solid fa-angles-right"></i>
                        </a></li>

                    <li class="pr-0"><a href="#" class="next-step pr-0 activ-step">
                            <i class="fa-solid fa-circle-check"></i> Order Done
                        </a></li>
                </ul>
            </div>

            <div class="terms-step" id="colver-ehitr">
                <div class="row border-0">
                    <div class="col-lg-12 col-md-12  border-0">
                        <div class="box-redi border-0" id="id-hide">
                            <div class="text-center" id="id-center">
                                <img src="/new-design/assets/images/Screenshot1.png" alt="">
                                <p>Thanks for your purchase</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center" id="h3">
                    <h3 class="h3">Order # {{$data['orderId']}}</h3>
                </div>
                <div class="row d-none d-md-flex">
                    <div class="col-md-2">
                        <div class="left-1">
                            <ul class="li-list">
                                <li>Service:</li>
                                <li>Lawyer:</li>
                                <li>Custommer:</li>
                                <li>Phone: </li>
                                <li>Message:</li>
                                <li>Payment:</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="left">
                            <ul class="li-list">
                                <li class="font-16"><strong>{{$data['title']}}</strong></li>
                                <li class="font-16">{{$data['lawyer']}}
                                </li>
                                <li class="font-16">{{$data['customer']}}
                                </li>
                                <li>{{$data['mobile']}}</li>
                                <li class="l-tag"><i>{{$data['message']}}</i></li>
                                <li class="bold-class">AED {{$data['amount']}}</li>
                            </ul>
                        </div>
                        <div class="mt-5 mb-5" id="twobtn">
                            <a href="{{route('generate-invoice', $data['orderId'])}}" class="Generatebtn">Generate Invoice</a>
                            <a href="#" class="Generatebtn">Download Invoice</a>
                        </div>
                    </div>
                </div>
                <div class="row d-block d-md-none">
                    <div class="left-1">
                        <ul class="li-list">
                            <div class="row">
                                <div class="col-md-3">
                                    <li>Service:</li>
                                </div>
                                <div class="col-md-9">
                                    <span>Alejandro Ruiz Rodríguez</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <li>Lawyer:</li>
                                </div>
                                <div class="col-md-9">
                                    <span>Alejandro Ruiz Rodríguez</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <li>Phone: </li>
                                </div>
                                <div class="col-md-9">
                                    <span>+52 000 0000</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <li>Message:</li>
                                </div>
                                <div class="col-md-9">
                                    <span>“Hello this is sample comment for the lawyer and will be readed”</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <li>Payment:</li>
                                </div>
                                <div class="col-md-9">
                                    <span>AED 450</span>
                                </div>
                            </div>
                        </ul>
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