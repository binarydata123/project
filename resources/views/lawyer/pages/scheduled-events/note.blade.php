<div class="row mt-4 slot-mobile-view" id="slot-mobile-view">
    <div class="col-12 col-md-12 col-xl-5 mt-md-auto text-end slot-status">
        @if(isset($slotData))
            <span class="fs-5 slot-status-section">Slot Status: <span class="badge text-bg-success rounded-pill" style="background-color: {{$slotData->isActive() ? '#3DC9A1!important' : 'red!important'}};">{{$slotData->isActive() ? 'Active' : 'Inactive'}}</span></span>
        @lse
            <span class="fs-5 slot-status-section">Slot Status: <span class="badge text-bg-success rounded-pill" style="background-color: red!important;">Inactive</span></span>
        @endif
    </div>
    <div class="col-12 col-md-12 col-xl-5 mt-3 slot-note-section">
        <p class="day-slot">Note:</p>
        <ul class="px-2">
            <li class="day-slot mb-2">1. Max meeting duration: 30 minutes</li>
            <li class="day-slot">2. Default session amount: 20 AED</li>
        </ul>
    </div>
</div>
<div class="row slot-desktop-view" id="slot-desktop-view">
    <div class="col-4 col-md-7 note-section">
        <p class="day-slot">Note:</p>
        <ul class="px-2">
            <li class="day-slot mb-2">1. Max meeting duration: 30 minutes</li>
            <li class="day-slot">2. Default session amount: 20 AED</li>
        </ul>
    </div>
    <div class="col-4 col-md-5 mt-md-auto text-end">
        @if(isset($slotData))
            <span class="fs-6 slot-status-section">Slot Status: <span class="badge text-bg-success rounded-pill" style="background-color: {{$slotData->isActive() ? '#3DC9A1!important' : 'red!important'}};">{{$slotData->isActive() ? 'Active' : 'Inactive'}}</span></span>
        @else 
            <span class="fs-6 slot-status-section">Slot Status: <span class="badge text-bg-success rounded-pill" style="background-color: red!important;">Inactive</span></span>
        @endif
    </div>
</div>