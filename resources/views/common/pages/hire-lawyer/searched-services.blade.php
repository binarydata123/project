<div class="row g-4">
    @foreach($services as $k => $service)            
        <div class="col-md-6" id="hover">
            <div class="question-text bg-two">
                <div class="row">
                    <div class="col-md-6">
                        <div class="category">{{$service->arbitration->area}}</div>
                    </div>
                </div>
                <h3>{{$service->title}}</h3>
                <p>{{$service->description}}</p>
                <div class="row align-items-center">
                    <div class="col-md-6 col-6">
                        <h1 class="aed-class">AED {{$service->getLawyerFee($service->id) + $service->getPlatformFee($service->id)}}</h1>
                    </div>
                    <div class="col-md-6 col-6 text-end">
                        <a href="{{route('service.step-one', $service->id)}}" class="seebtn  bg-change">see more</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $services->links() }}