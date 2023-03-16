@extends('lawyer.layouts.navbar_content')
@section('title', 'Add Slots')
@section('page-style')
<style>
    .app-time {
  border: 1px solid #fff;
  padding: 20px 30px;
  box-shadow: 2px 4px 10px 0px #c7cacce3;
}

.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 5px;
  right: 0;
  bottom: 0;
  left: 40px;
  height: 20px;
  width: 20px;
  transition: all 0.15s ease-out 0s;
  background: #fff;
  border: 1px solid #999;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 10001;
}
.option-input:hover {
  background: #e5e7eb;
}
.option-input:checked {
  border: 1px solid #fff;
}
.option-input:checked::before {
  color: #d9486d;
  height: 40px;
  width: 40px;
  position: absolute;
  content: "✔";
  display: inline-block;
  font-size: 12px;
  left: 4px;
  line-height: 20px;
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: "";
  display: block;
  position: relative;
  z-index: 100;
}

.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
}
.app-check {
  display: flex;
}
.app-border {
  border: 1px solid #ece9e9;
  border-radius: 7px;
  padding: 5px 7px 5px 9px;
  padding-left: 40px;
  min-height: 30px;
}

.option-input.radio:checked + .app-border {
  background: #d9486d;
}
.option-input.radio:disabled,
.option-input.radio:disabled + .app-border {
  cursor: not-allowed;
  opacity: 0.6;
}
.app-label {
  position: relative;
  top: 5px;
  margin-right: 10px;
}

</style>
@endsection
@section('content')
  @include('admin.layouts.flash-message') 
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Create Slots</h5>
      <div class="card-body">
        <ul class="nav nav-tabs nav-fill" role="tablist">
          <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#monday" aria-controls="monday" aria-selected="true"><i class="tf-icons bx bx-calendar"></i> Monday </button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tuesday" aria-controls="tuesday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Tuesday</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#wednesday" aria-controls="wednesday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Wednesday</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#thursday" aria-controls="thursday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Thursday</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#friday" aria-controls="friday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Friday</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#saturday" aria-controls="saturday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Saturday</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#sunday" aria-controls="sunday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Sunday</button>
          </li>
        </ul>
        <form action="{{route('lawyer.store-slots')}}" method="POST">
          @csrf()
          <div class="tab-content">
            <p>
              <b><span style="color:red;">Note</span>
                <ul>
                  <li> Max meeting duration: 30 minutes</li>
                  <li> Default session amount: AED 20</li>
                </ul>
              </b>
            </p>
            <!-- MONDAY -->
            <div class="tab-pane fade show active" id="monday" role="tabpanel">
              <div class="app-time">
                <div id="appended-monday">
                  <div class="form-check form-switch mb-2" style="float: right;">
                    <label for="">Available Status</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  onchange="availableStatus('Monday')">
                  </div>
                  <div class="app-check col-md-6" id="monday_div_0">
                    <div class="col-md-12 row">
                      <div>
                        <p id="monTimeOnlyExample_0" style="display: flex;">
                          <input type="text" class="form-control time start" name="mon_strt_time[]" id="mon_start_time_0" placeholder="Start time" style="margin-right: 5%;" /> to
                          <input type="text" class="form-control time end" name="mon_end_time[]" id="mon_end_time_0" onchange="endTime('#mon_start_time_0', '#mon_end_time_0', 0)" placeholder="End time" style="margin-left: 5%;"/> 
                          <input type="text" class="form-control" name="mon_amt[]" id="mon_amt_0" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                        </p>
                      </div>
                    </div>    
                    <button type="button" class="btn btn-primary" style="margin-left: 2%;height: fit-content;" onclick="appendField('Monday')">+</button>
                    <input type="hidden" name="monday_dynamic" id="monday_dynamic" value="0">
                  </div>
                </div>                
              </div>
            </div>

            <!-- TUESDAY -->
            <div class="tab-pane fade" id="tuesday" role="tabpanel">
              <div class="app-time">
                <div id="appended-tuesday">
                  <div class="form-check form-switch mb-2" style="float: right;">
                    <label for="">Available Status</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  onchange="availableStatus('Tuesday')">
                  </div>
                  <div class="app-check col-md-6" id="tuesday_div_0">
                    <div class="col-md-12 row">
                      <div>
                        <p id="tueTimeOnlyExample_0" style="display: flex;">
                          <input type="text" class="form-control time start" name="tue_strt_time[]" id="tue_start_time_0" placeholder="Start time" style="margin-right: 5%;" /> to
                          <input type="text" class="form-control time end" name="tue_end_time[]" id="tue_end_time_0" onchange="endTime('#tue_start_time_0', '#tue_end_time_0', 0)" placeholder="End time" style="margin-left: 5%;"/> 
                          <input type="text" class="form-control" name="tue_amt[]" id="tue_amt_0" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                        </p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary" style="margin-left: 2%;height: fit-content;" onclick="appendField('Tuesday')">+</button>  
                    <input type="hidden" name="tuesday_dynamic" id="tuesday_dynamic" value="0">
                  </div>
                </div>
              </div>
            </div>

            <!-- WEDNESDAY -->
            <div class="tab-pane fade" id="wednesday" role="tabpanel">
              <div class="app-time">
                <div id="appended-wednesday">
                  <div class="form-check form-switch mb-2" style="float: right;">
                    <label for="">Available Status</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  onchange="availableStatus('Wednesday')">
                  </div>
                  <div class="app-check col-md-6" id="wednesday_div_0">
                    <div class="col-md-12 row">
                      <div>
                        <p id="wedTimeOnlyExample_0" style="display: flex;">
                          <input type="text" class="form-control time start" name="wed_strt_time[]" id="wed_start_time_0" placeholder="Start time" style="margin-right: 5%;" /> to
                          <input type="text" class="form-control time end" name="wed_end_time[]" id="wed_end_time_0" onchange="endTime('#wed_start_time_0', '#wed_end_time_0', 0)" placeholder="End time" style="margin-left: 5%;"/> 
                          <input type="text" class="form-control" name="wed_amt[]" id="wed_amt_0" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                        </p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary" style="margin-left: 2%;height: fit-content;" onclick="appendField('Wednesday')">+</button>
                    <input type="hidden" name="wednesday_dynamic" id="wednesday_dynamic" value="0">  
                  </div>
                </div>
              </div>
            </div>

            <!-- THURSDAY -->
            <div class="tab-pane fade" id="thursday" role="tabpanel">
              <div class="app-time">
                <div id="appended-thursday">
                  <div class="form-check form-switch mb-2" style="float: right;">
                    <label for="">Available Status</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  onchange="availableStatus('Thursday')">
                  </div>
                  <div class="app-check col-md-6" id="thursday_div_0">
                    <div class="col-md-12 row">
                      <div>
                        <p id="thurTimeOnlyExample_0" style="display: flex;">
                          <input type="text" class="form-control time start" name="thur_strt_time[]" id="thur_start_time_0" placeholder="Start time" style="margin-right: 5%;" /> to
                          <input type="text" class="form-control time end" name="thur_end_time[]" id="thur_end_time_0" onchange="endTime('#thur_start_time_0', '#thur_end_time_0', 0)" placeholder="End time" style="margin-left: 5%;"/> 
                          <input type="text" class="form-control" name="thur_amt[]" id="thur_amt_0" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                        </p>
                      </div>
                    </div> 
                    <button type="button" class="btn btn-primary" style="margin-left: 2%;height: fit-content;" onclick="appendField('Thursday')">+</button>
                    <input type="hidden" name="thursday_dynamic" id="thursday_dynamic" value="0">  
                  </div>
                </div>
              </div>
            </div>

            <!-- FRIDAY -->
            <div class="tab-pane fade" id="friday" role="tabpanel">
              <div class="app-time">
                <div id="appended-friday">
                  <div class="form-check form-switch mb-2" style="float: right;">
                    <label for="">Available Status</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  onchange="availableStatus('Friday')">
                  </div>
                  <div class="app-check col-md-6" id="friday_div_0">
                    <div class="col-md-12 row">
                      <div>
                        <p id="friTimeOnlyExample_0" style="display: flex;">
                          <input type="text" class="form-control time start" name="fri_strt_time[]" id="fri_start_time_0" placeholder="Start time" style="margin-right: 5%;" /> to
                          <input type="text" class="form-control time end" name="fri_end_time[]" id="fri_end_time_0" onchange="endTime('#fri_start_time_0', '#fri_end_time_0', 0)" placeholder="End time" style="margin-left: 5%;"/> 
                          <input type="text" class="form-control" name="fri_amt[]" id="fri_amt_0" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                        </p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary" style="margin-left: 2%;height: fit-content;" onclick="appendField('Friday')">+</button>
                    <input type="hidden" name="friday_dynamic" id="friday_dynamic" value="0">  
                  </div>
                </div>
              </div>
            </div>

            <!-- SATURDAY -->
            <div class="tab-pane fade" id="saturday" role="tabpanel">
              <div class="app-time">
                <div id="appended-saturday">
                  <div class="form-check form-switch mb-2" style="float: right;">
                    <label for="">Available Status</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  onchange="availableStatus('Saturday')">
                  </div>
                  <div class="app-check col-md-6" id="saturday_div_0">
                    <div class="col-md-12 row">
                      <div>
                        <p id="satTimeOnlyExample_0" style="display: flex;">
                          <input type="text" class="form-control time start" name="sat_strt_time[]" id="sat_start_time_0" placeholder="Start time" style="margin-right: 5%;" /> to
                          <input type="text" class="form-control time end" name="sat_end_time[]" id="sat_end_time_0" onchange="endTime('#sat_start_time_0', '#sat_end_time_0', 0)" placeholder="End time" style="margin-left: 5%;"/> 
                          <input type="text" class="form-control" name="sat_amt[]" id="sat_amt_0" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                        </p>
                      </div>
                    </div>  
                    <button type="button" class="btn btn-primary" style="margin-left: 2%;height: fit-content;" onclick="appendField('Saturday')">+</button>
                    <input type="hidden" name="saturday_dynamic" id="saturday_dynamic" value="0">  
                  </div>
                </div>
              </div>
            </div>

            <!-- SUNDAY -->
            <div class="tab-pane fade" id="sunday" role="tabpanel">
              <div class="app-time">
                <div id="appended-sunday">
                  <div class="form-check form-switch mb-2" style="float: right;">
                    <label for="">Available Status</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  onchange="availableStatus('Sunday')">
                  </div>
                  <div class="app-check col-md-6" id="sunday_div_0">
                    <div class="col-md-12 row">
                      <div>
                        <p id="sunTimeOnlyExample_0" style="display: flex;">
                          <input type="text" class="form-control time start" name="sun_strt_time[]" id="sun_start_time_0" placeholder="Start time" style="margin-right: 5%;" /> to
                          <input type="text" class="form-control time end" name="sun_end_time[]" id="sun_end_time_0" onchange="endTime('#sun_start_time_0', '#sun_end_time_0', 0)" placeholder="End time" style="margin-left: 5%;"/> 
                          <input type="text" class="form-control" name="sun_amt[]" id="sun_amt_0" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                        </p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary" style="margin-left: 2%;height: fit-content;" onclick="appendField('Sunday')">+</button>
                    <input type="hidden" name="sunday_dynamic" id="sunday_dynamic" value="0">  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 pt-2">
              <input type="text" placeholder="Title" required class="form-control" name="title" style="margin-bottom:2%;">
              <textarea name="description" required placeholder="About your services" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
          </div>
          <button class="btn btn-primary" style="float:right;">Submit</button>
        </form>
      </div>
    </div>
  </div> 
  
@endsection
@push('script')
  <script>
    function appendField(day) {
      if(day === "Monday") {
        monDyn = $("#monday_dynamic").val()
        monDyn++
        $("#monday_dynamic").val(monDyn)
        strtId = "#mon_start_time_"+monDyn;
        endId = "#mon_end_time_"+monDyn;
        $("#appended-monday").append('<div class="app-check col-md-6" id="monday_div_'+monDyn+'" style="margin-top: 2%;"><div class="col-md-12 row"><div><p id="monTimeOnlyExample_'+monDyn+'" style="display: flex;"><input type="text" class="form-control time start" id="mon_start_time_'+monDyn+'" name="mon_strt_time[]" placeholder="Start time" style="margin-right: 5%;" /> to <input type="text" class="form-control time end" id="mon_end_time_'+monDyn+'" name="mon_end_time[]" onchange="endTime(\''+strtId+'\', \''+endId+'\', '+monDyn+')" placeholder="End time" style="margin-left: 5%;"/><input type="text" class="form-control" name="mon_amt[]" id="mon_amt_'+monDyn+'" placeholder="Ex: AED 50" style="margin-left: 5%;" /></p></div></div><button type="button" class="btn btn-danger" style="margin-left: 2%;height: fit-content;" onclick="removeField(\'Monday\', '+monDyn+')">-</button></div>')
        var pid = "#monTimeOnlyExample_"+monDyn+" .time";
        var id = "monTimeOnlyExample_"+monDyn;
        appendedTimepicker(pid, id, monDyn)
      }
      else if(day === "Tuesday") {
        tueDyn = $("#tuesday_dynamic").val()
        tueDyn++
        $("#tuesday_dynamic").val(tueDyn)
        strtId = "#tue_start_time_"+tueDyn;
        endId = "#tue_end_time_"+tueDyn;
        $("#appended-tuesday").append('<div class="app-check col-md-6" id="tuesday_div_'+tueDyn+'" style="margin-top: 2%;"><div class="col-md-12 row"><div><p id="tueTimeOnlyExample_'+tueDyn+'" style="display: flex;"><input type="text" class="form-control time start" name="tue_strt_time[]" id="tue_start_time_'+tueDyn+'" placeholder="Start time" style="margin-right: 5%;" /> to <input type="text" class="form-control time end" name="tue_end_time[]" id="tue_end_time_'+tueDyn+'" onchange="endTime(\''+strtId+'\', \''+endId+'\', '+tueDyn+')" placeholder="End time" style="margin-left: 5%;"/><input type="text" class="form-control" name="tue_amt[]" id="tue_amt_'+tueDyn+'" placeholder="Ex: AED 50" style="margin-left: 5%;" /></p></div></div><button type="button" class="btn btn-danger" style="margin-left: 2%;height: fit-content;" onclick="removeField(\'Tuesday\', '+tueDyn+')">-</button></div>')
        var pid = "#tueTimeOnlyExample_"+tueDyn+" .time";
        var id = "tueTimeOnlyExample_"+tueDyn;
        appendedTimepicker(pid, id, tueDyn)
      }
      else if(day === "Wednesday") {
        wedDyn = $("#wednesday_dynamic").val()
        wedDyn++
        $("#wednesday_dynamic").val(wedDyn)
        strtId = "#wed_start_time_"+wedDyn;
        endId = "#wed_end_time_"+wedDyn;
        $("#appended-wednesday").append('<div class="app-check col-md-6" id="wednesday_div_'+wedDyn+'" style="margin-top: 2%;"><div class="col-md-12 row"><div><p id="wedTimeOnlyExample_'+wedDyn+'" style="display: flex;"><input type="text" class="form-control time start" name="wed_start_time[]" id="wed_start_time_'+wedDyn+'" placeholder="Start time" style="margin-right: 5%;" /> to <input type="text" class="form-control time end" name="wed_end_time[]" id="wed_end_time_'+wedDyn+'" onchange="endTime(\''+strtId+'\', \''+endId+'\', '+wedDyn+')" placeholder="End time" style="margin-left: 5%;"/><input type="text" class="form-control" name="wed_amt[]" id="wed_amt_'+wedDyn+'" placeholder="Ex: AED 50" style="margin-left: 5%;" /></p></div></div><button type="button" class="btn btn-danger" style="margin-left: 2%;height: fit-content;" onclick="removeField(\'Wednesday\', '+wedDyn+')">-</button></div>')
        var pid = "#wedTimeOnlyExample_"+wedDyn+" .time";
        var id = "wedTimeOnlyExample_"+wedDyn;
        appendedTimepicker(pid, id, wedDyn)
      }
      else if(day === "Thursday") {
        thurDyn = $("#thursday_dynamic").val()
        thurDyn++
        $("#thursday_dynamic").val(thurDyn)
        strtId = "#thur_start_time_"+thurDyn;
        endId = "#thur_end_time_"+thurDyn;
        $("#appended-thursday").append('<div class="app-check col-md-6" id="thursday_div_'+thurDyn+'" style="margin-top: 2%;"><div class="col-md-12 row"><div><p id="thurTimeOnlyExample_'+thurDyn+'" style="display: flex;"><input type="text" class="form-control time start" name="thur_start_time[]" id="thur_start_time_'+thurDyn+'" placeholder="Start time" style="margin-right: 5%;" /> to <input type="text" class="form-control time end" name="thur_end_time[]" id="thur_end_time_'+thurDyn+'" onchange="endTime(\''+strtId+'\', \''+endId+'\', '+thurDyn+')" placeholder="End time" style="margin-left: 5%;"/><input type="text" class="form-control" name="thur_amt[]" id="thur_amt_'+thurDyn+'" placeholder="Ex: AED 50" style="margin-left: 5%;" /></p></div></div><button type="button" class="btn btn-danger" style="margin-left: 2%;height: fit-content;" onclick="removeField(\'Thursday\', '+thurDyn+')">-</button></div>')
        var pid = "#thurTimeOnlyExample_"+thurDyn+" .time";
        var id = "thurTimeOnlyExample_"+thurDyn;
        appendedTimepicker(pid, id, thurDyn)
      }
      else if(day === "Friday") {
        friDyn = $("#friday_dynamic").val()
        friDyn++
        $("#friday_dynamic").val(friDyn)
        strtId = "#fri_start_time_"+friDyn;
        endId = "#fri_end_time_"+friDyn;
        $("#appended-friday").append('<div class="app-check col-md-6" id="friday_div_'+friDyn+'" style="margin-top: 2%;"><div class="col-md-12 row"><div><p id="friTimeOnlyExample_'+friDyn+'" style="display: flex;"><input type="text" class="form-control time start" name="fri_start_time[]" id="fri_start_time_'+friDyn+'" placeholder="Start time" style="margin-right: 5%;" /> to <input type="text" class="form-control time end" name="fri_end_time[]" id="fir_end_time_'+friDyn+'" onchange="endTime(\''+strtId+'\', \''+endId+'\', '+friDyn+')" placeholder="End time" style="margin-left: 5%;"/><input type="text" class="form-control" name="fri_amt[]" id="fri_amt_'+friDyn+'" placeholder="Ex: AED 50" style="margin-left: 5%;" /></p></div></div><button type="button" class="btn btn-danger" style="margin-left: 2%;height: fit-content;" onclick="removeField(\'Friday\', '+friDyn+')">-</button></div>')
        var pid = "#friTimeOnlyExample_"+friDyn+" .time";
        var id = "friTimeOnlyExample_"+friDyn;
        appendedTimepicker(pid, id, friDyn)
      }
      else if(day === "Saturday") {
        satDyn = $("#saturday_dynamic").val()
        satDyn++
        $("#saturday_dynamic").val(satDyn)
        strtId = "#sat_start_time_"+satDyn;
        endId = "#sat_end_time_"+satDyn;
        $("#appended-saturday").append('<div class="app-check col-md-6" id="saturday_div_'+satDyn+'" style="margin-top: 2%;"><div class="col-md-12 row"><div><p id="satTimeOnlyExample_'+satDyn+'" style="display: flex;"><input type="text" class="form-control time start" name="sat_start_time[]" id="sat_start_time_'+satDyn+'" placeholder="Start time" style="margin-right: 5%;" /> to <input type="text" class="form-control time end" name="sat_end_time[]" id="sat_end_time_'+satDyn+'" onchange="endTime(\''+strtId+'\', \''+endId+'\', '+satDyn+')" placeholder="End time" style="margin-left: 5%;"/><input type="text" class="form-control" name="sat_amt[]" id="sat_amt_'+satDyn+'" placeholder="Ex: AED 50" style="margin-left: 5%;" /></p></div></div><button type="button" class="btn btn-danger" style="margin-left: 2%;height: fit-content;" onclick="removeField(\'Saturday\', '+satDyn+')">-</button></div>')
        var pid = "#satTimeOnlyExample_"+satDyn+" .time";
        var id = "satTimeOnlyExample_"+satDyn;
        appendedTimepicker(pid, id, satDyn)
      }
      else if(day === "Sunday") {
        sunDyn = $("#sunday_dynamic").val()
        sunDyn++
        $("#sunday_dynamic").val(sunDyn)
        strtId = "#sun_start_time_"+sunDyn;
        endId = "#sun_end_time_"+sunDyn;
        $("#appended-sunday").append('<div class="app-check col-md-6" id="sunday_div_'+sunDyn+'" style="margin-top: 2%;"><div class="col-md-12 row"><div><p id="sunTimeOnlyExample_'+sunDyn+'" style="display: flex;"><input type="text" class="form-control time start" name="sun_start_time[]" id="sun_start_time_'+sunDyn+'" placeholder="Start time" style="margin-right: 5%;" /> to <input type="text" class="form-control time end" name="sun_end_time[]" id="sun_end_time_'+sunDyn+'" onchange="endTime(\''+strtId+'\', \''+endId+'\', '+sunDyn+')" placeholder="End time" style="margin-left: 5%;"/><input type="text" class="form-control" name="sun_amt[]" id="sun_amt_'+sunDyn+'" placeholder="Ex: AED 50" style="margin-left: 5%;" /></p></div></div><button type="button" class="btn btn-danger" style="margin-left: 2%;height: fit-content;" onclick="removeField(\'Sunday\', '+sunDyn+')">-</button></div>')
        var pid = "#sunTimeOnlyExample_"+sunDyn+" .time";
        var id = "sunTimeOnlyExample_"+sunDyn;
        appendedTimepicker(pid, id, sunDyn)
      }
    }

    function appendedTimepicker(pId, id, monDyn) {
      debugger
      $(pId).timepicker({
        'timeFormat': 'g:ia',
        "step": 15,
        "minTime": '07:00:00',
        "startTime": '07:00:00', 
      });

      var timeOnlyExampleEl = document.getElementById(id);
      console.log(timeOnlyExampleEl)
      var timeOnlyDatepair = new Datepair(timeOnlyExampleEl, {
        'defaultTimeDelta': 15*60*1000, // milliseconds
      });
    }

    function removeField(day, count) {
      if(day === "Monday") {
        $("#monday_div_"+count).remove();
      }
      if(day === "Tuesday") {
        $("#tuesday_div_"+count).remove();
      }
      if(day === "Wednesday") {
        $("#wednesday_div_"+count).remove();
      }
      if(day === "Thursday") {
        $("#thursday_div_"+count).remove();
      }
      if(day === "Friday") {
        $("#friday_div_"+count).remove();
      }
      if(day === "Saturday") {
        $("#saturday_div_"+count).remove();
      }
      if(day === "Sunday") {
        $("#sunday_div_"+count).remove();
      }
    }

    function availableStatus(day) {
      $.ajax({
        method:"post",
        url: "{{route('lawyer.slot.available-day')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            "day" : day
        },
        success: function(res){
          Swal.fire({
              icon: 'success',
              title: "Updated",
              text: 'Success'
          })
          // setTimeout(window.location.reload.bind(window.location), 1000);
        }
      });
    }

    

    function endTime(strtId, endId, lenVal) {
      var strt = $(strtId).val()
      var end = $(endId).val()
      console.log(strt)
      var amPm = null;
      if(strt.includes("am")) {
        var tmpStartTime = strt.replace('am',':00');
        amPm = "am"
        var startTime = strt.replace('am','');
      }else {
        var tmpStartTime = strt.replace('pm',':00');
        amPm = "pm"
        var startTime = strt.replace('pm','');
      }
      if(strt === "11:45am") {
        amPm = "pm"
      } 
      if(end.includes("am")) {
        var endTime = end.replace('am','');
      }else {
        var endTime = end.replace('pm','');
      }

      var strtTimeArr = startTime.split(":");
      var endTimeArr = endTime.split(":");

      var strtTimeInMinutes = Math.floor(strtTimeArr[0] * 60);
      strtTimeInMinutes = parseInt(strtTimeInMinutes) + parseInt(strtTimeArr[1]);

      var endTimeInMinutes = Math.floor(endTimeArr[0] * 60);
      endTimeInMinutes = parseInt(endTimeInMinutes) + parseInt(endTimeArr[1]);
      var timeDiff = strtTimeInMinutes - endTimeInMinutes;
      if(Math.abs(timeDiff) > 30) {
        var maxTime = addMinutes(tmpStartTime, '15');
        $(endId).val(maxTime+amPm)
        alert("Please choose max 30 minutes session")
        return;
      }else if(Math.abs(timeDiff) == 0) {
        var maxTime = addMinutes(tmpStartTime, '15');
        $(endId).val(maxTime+amPm)
        alert("Please choose atleast 15 minutes session")
        return;
      }
    }

    const timepickerIds = ["monTimeOnlyExample_0", "tueTimeOnlyExample_0", "wedTimeOnlyExample_0", "thurTimeOnlyExample_0", "friTimeOnlyExample_0", "satTimeOnlyExample_0", "sunTimeOnlyExample_0"];
    timepickerIds.forEach(timepickerFunc);


    function timepickerFunc(id, index) {
      var idWithClass = '#'+id+" .time";
      $(idWithClass).timepicker({
          // 'showDuration': true,
          'timeFormat': 'g:ia',
          "step": 15,
          "minTime": '07:00:00',
          // "maxTime": '10:00:00',
          "startTime": '07:00:00',
      });
  
      var timeOnlyExampleEl = document.getElementById(id);
      debugger
      var timeOnlyDatepair = new Datepair(timeOnlyExampleEl, {
        'defaultTimeDelta': 15*60*1000, // milliseconds
      });
    }

    function timeConvert(n) {
      var num = n;
      var hours = (num / 60);
      var rhours = Math.floor(hours);
      var minutes = (hours - rhours) * 60;
      var rminutes = Math.round(minutes);
      return rhours;
    }

    function addMinutes(time, minsToAdd) {
      function D(J) 
        { 
          return (J<10? '0':'') + J;
        };
      var piece = time.split(':');
      var mins = piece[0]*60 + +piece[1] + +minsToAdd;

      return D(mins%(24*60)/60 | 0) + ':' + D(mins%60);  
    }  
  </script>
@endpush