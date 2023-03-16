@extends('lawyer.home.layouts.app')
@section('content')

<div class="working-box">
                <section class="lawyers-part-2 p-0">
                    <div class="" id="border-full">
                        <div class="row align-items-center" id="service-pages">
                            <div class="col-md-6 col-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <ul class="d-flex1">
                                    <li>
                                        <h4>Consultation</h4>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-8 text-right">
                            </div>
                        </div>
                        
                        <div class="table-responsive table-wdes">
                            <table class="table mt-5 ">
                                <thead class="thead-th">
                                    <tr style="border-bottom: 2px solid #C2DDE4;">
                                        <th scope="col">Name </th>
                                        <th scope="col">Email</th>
                                        <th scope="col"> Mobile </th>
                                        <th scope="col">Message </th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach($consultations as $k => $consultation)
                                        <tr>
                                            <th scope="row">{{$consultation->name}}</th>
                                            <th scope="row">{{$consultation->email}}</th>
                                            <th scope="row">{{$consultation->mobile}}</th>
                                            <th scope="row">{{$consultation->message}}</th>
                                        </tr>
                                    @endforeach                                
                                </tbody>
                            </table>

                        </div>
                        <div class="  was-validated" id="pagination-class">
                            {{$consultations->links()}}
                        </div>
                    </div>
                </section>


                


        </div>

@endsection

@push('script')



@endpush