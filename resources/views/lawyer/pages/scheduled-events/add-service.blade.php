<div class="col-12 col-md-6">
    <div class="card slot-service-card">
        <div class="card-body slot-service-card-body">
            <div class="row p-3">
                <span class="fs-4 fw-bolder slot-title">Service</span>
                <div class="row">
                    <form action="{{route('lawyer.add-slot-service')}}" method="POST">
                        @csrf()
                        <div class="form-group row slot-form-group" style="margin-top: 15px;margin-bottom: 15px;">
                            <input type="text" class="form-control slot-service-input" id="title" placeholder="Lawyer service" name="title" value="{{old('title') ?? (isset($slot) ? $slot->title : '')}}" style="border-radius: 15px;">
                            @error('title')
                                <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                            @enderror  
                        </div>
                        <div class="form-group row slot-form-group" style="margin-top: 15px;margin-bottom: 15px;">
                            <textarea name="description" class="form-control slot-service-input" id="" cols="30" rows="10" placeholder="Description of the lawyer service">{{old('description') ?? (isset($slot) ? $slot->description : '')}}</textarea>
                            @error('description')
                                <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                            @enderror  
                        </div>
                        <button type="submit" class="btn btn-primary slot-submit-btn float-end slot-service-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>