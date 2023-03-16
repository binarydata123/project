<input type="text" class="form-control to_mon_timepicker_0" name="monday[]" id="monday_0" placeholder="Ex: 9 - 9.30 AM" />
<input type="hidden" id="miniTime" value="{{$timeData['miniTime']}}">
<input type="hidden" id="maxiTime" value="{{$timeData['maxiTime']}}">
<input type="hidden" id="defTime" value="{{$timeData['defTime']}}">
<input type="hidden" id="strtTime" value="{{$timeData['strtTime']}}">

@push('script')
    <script>
        $(document).ready(function() {
            debugger
            var miniTime = $("#miniTime").val();
            var maxiTime = $("#maxiTime").val();
            var defTime = $("#defTime").val();
            var strtTime = $("#strtTime").val();
            $('.to_mon_timepicker_0').timepicker({
                timeFormat: 'h:mm p',
                interval: 15,
                minTime: miniTime,
                maxTime: maxiTime,
                defaultTime: defTime,
                startTime: strtTime,
                dynamic: true,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>
@endpush