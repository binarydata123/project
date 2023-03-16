<form action="{{route('lawyer.service.update', $service->id)}}" method="POST">
    @csrf()
    <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">  
        <select class="form-control" placeholder="Arbitration Area" name="area" style="border-radius: 15px;">
            <option value="">Arbitration Area</option>
            @foreach($areas as $k => $area)
                <option value="{{$k}}" {{$service->arbitration_area_id == $k ? 'selected' : ''}}>{{$area}}</option>
            @endforeach
        </select>
        @error('area')
            <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
        @enderror  
    </div>
    <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">
    <input type="text" class="form-control" id="title" placeholder="Title of the service" name="title" value="{{$service->title}}" style="border-radius: 15px;">
        @error('title')
            <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
        @enderror  
    </div>
    <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">  
        <textarea name="short_descr" cols="10" rows="3" class="form-control" placeholder="Short Description" style="border-radius: 15px;">{{$service->short_descr}}</textarea>
        @error('short_descr')
            <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
        @enderror  
    </div>
    <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">  
        <textarea name="description" id="mytextarea" cols="10" rows="3" class="form-control" placeholder="Description" style="border-radius: 15px;">{{$service->description}}</textarea>
        @error('description')
            <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
        @enderror  
    </div>
    <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">  
        <span class="my-fee">MY FEE:</span>
        <input type="text" class="my-fee-input" placeholder="10 AED" name="fee" value="{{$service->getLawyerFee($service->id)}}">
        @error('fee')
            <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
        @enderror 
    </div>
    <div>
        <button type="submit" class="btn btn-danger create-service" data-bs-dismiss="modal">Update Service</button>
    </div>
</form>

<script>
    tinymce.init({
        selector: '#mytextarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>