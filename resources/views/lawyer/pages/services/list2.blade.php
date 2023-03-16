@extends('lawyer.home.layouts.app')
@section('content')
    <section #dashboard >
        <div id="dashboard" class="px-3 py-5 dashboard font-Poppins-regular">
            <div class="row">
                <div class="col-12">
                    <div class="card card-list">
                        <div class="row" style="display: flex;">
                            <div class="col-12" id="feed">
                                <span class="list-header">Services</span>                
                                <div class="col-1 create-service-btn-card" id="create-service-btn-card-id" style="float:right;margin: 1% 0 6%;">
                                    <button class="create-service-button" data-bs-toggle="modal" data-bs-target="#createService"><span style="vertical-align: text-bottom;" class="add-plus-btn">+ </span> <span style="font: 24px 'Poppins-Bold';" class="add-service-txt"> Add Service</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="row-border">
                                <thead>
                                    <tr style="color:#156075;font-size: 18px;" class="service-list-table-header">
                                        <th style="text-align: center;">ARBITRATION AREA</th>
                                        <th style="text-align: center;">TITLE</th>
                                        <th style="text-align: center;">DESCRIPTION</th>
                                        <th style="text-align: center;">MY FEE</th>
                                        <th style="text-align: center;">PLATFORM FEE</th>
                                        <th style="text-align: center;">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach($services as $k => $service)
                                        <tr style="text-align: center;">
                                            <td>{{$service->services->arbitration->area}}</td>
                                            <td>{{$service->services->title}}</td>
                                            <td>{!! \Illuminate\Support\Str::words($service->services->description, 10,'....')  !!}</td>
                                            <td>{{$service->lawyer_fee}}</td>
                                            <td>{{$service->platform_fee ?? '-'}}</td>
                                            <td>
                                                <a href="" data-bs-toggle="modal" data-bs-target="#editService" onclick="editService('{{$service->service_id}}')" style="width: 30px;height: 30px;background: #C2DDE4;vertical-align:middle;">
                                                    <img src="/new-design/lawyer/assets/image/edit.png" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="auto-load text-center">
                                <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                    <path fill="#000"
                                        d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                        <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                            from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="modal" id="createService" style="top: 25%;">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                    <div class="modal-body row" style="margin:5px">   
                        <h5><img src="/new-design/lawyer/assets/image/bag.png" alt="" class="service-popup-header"><span class="service-popup-title"> Service</span></h5>    
                        <form action="{{route('lawyer.service.store')}}" method="POST">
                            @csrf()
                            <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">  
                                <select class="form-control" placeholder="Arbitration Area" name="area" style="border-radius: 15px;">
                                    <option value="">Arbitration Area</option>
                                    @foreach($areas as $k => $area)
                                        <option value="{{$k}}" {{old('area') == $k ? 'selected' : ''}}>{{$area}}</option>
                                    @endforeach
                                </select>
                                @error('area')
                                    <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                @enderror  
                            </div>
                            <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">
                            <input type="text" class="form-control" id="title" placeholder="Title of the service" name="title" value="{{old('title')}}" style="border-radius: 15px;">
                                @error('title')
                                    <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                @enderror  
                            </div>
                            <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">  
                                <textarea name="short_descr" cols="10" rows="3" class="form-control" placeholder="Short Description" style="border-radius: 15px;">{{old('short_descr')}}</textarea>
                                @error('short_descr')
                                    <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                @enderror  
                            </div>
                            <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">  
                                <textarea name="description" id="richText" cols="10" rows="3" class="form-control" placeholder="Description" style="border-radius: 15px;">{{old('description')}}</textarea>
                                @error('description')
                                    <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                @enderror  
                            </div>
                            <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">  
                                <span class="my-fee">MY FEE:</span>
                                <input type="text" class="my-fee-input" placeholder="10 AED" name="fee" value="{{old('fee')}}">
                                @error('fee')
                                    <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div>
                                <button type="submit" class="btn btn-danger create-service" data-bs-dismiss="modal">Post Service</button>
                            </div>
                        </form>
                    </div>            
                </div>
            </div>
        </div>
        <div class="modal" id="editService">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                    <div class="modal-body row" style="margin:5px">   
                        <h5><img src="/new-design/lawyer/assets/image/bag.png" alt="" class="service-popup-header"><span class="service-popup-title"> Service</span></h5>    
                        <div id="edit-poup-here">
                        </div>                        
                    </div>            
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $('.auto-load').hide();
        function editService(id) {
            $.ajax({
                method:"get",
                url: "edit/service/" +id,
                beforeSend: function () {
                    $('.auto-load').show();
                },
                success: function(data){                                
                    $('.auto-load').hide();
                    $("#edit-poup-here").empty();
                    $("#edit-poup-here").append(data);
                }
            });
        }
    </script>
@endpush