<?php

namespace App\Http\Controllers\lawyer;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\DaysSlot;
use App\Models\SchduledMeeting;
use App\Models\ScheduleMeeting;
use App\Models\LawyerConsultation;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SlotController extends Controller
{
    public function scheduledEvents() {
        $scheduledMeetings = SchduledMeeting::whereLawyerId(auth()->user()->id)->get();
        // return view('lawyer.meeting-slot.scheduled-events', compact('scheduledMeetings'));
        return view('lawyer.pages.scheduled-events.list', compact('scheduledMeetings'));
    }

    public function slots() {
        return view('lawyer.meeting-slot.slots');
    }

    public function addSlots() {
        $slotData = Slot::whereLawyerId(auth()->user()->id)->first();
        if($slotData) {
            $data['monSlot'] = DaysSlot::where([
                'slot_id' => $slotData->id,
                'day'     => 'Monday'
            ])->get();
            $data['tueSlot'] = DaysSlot::where([
                'slot_id' => $slotData->id,
                'day'     => 'Tuesday'
            ])->get();
            $data['wedSlot'] = DaysSlot::where([
                'slot_id' => $slotData->id,
                'day'     => 'Wednesday'
            ])->get();
            $data['thurSlot'] = DaysSlot::where([
                'slot_id' => $slotData->id,
                'day'     => 'Thursday'
            ])->get();
            $data['friSlot'] = DaysSlot::where([
                'slot_id' => $slotData->id,
                'day'     => 'Friday'
            ])->get();
            $data['satSlot'] = DaysSlot::where([
                'slot_id' => $slotData->id,
                'day'     => 'Saturday'
            ])->get();
            $data['sunSlot'] = DaysSlot::where([
                'slot_id' => $slotData->id,
                'day'     => 'Sunday'
            ])->get();
            // return view('lawyer.meeting-slot.edit-slot', compact('data', 'slotData'));
            return view('lawyer.pages.scheduled-events.edit-slot', compact('data', 'slotData'));
        }else {
            // return view('lawyer.meeting-slot.add-slot');
            return view('lawyer.pages.scheduled-events.add-slot');
        }
    }

    public function storeSlots(Request $request) {
        // print_r($request->all());exit;
        $data = $request->all();
        $this->deleteSlots($request->day); //only when the slots existing //this is just for updating old data
        $slotId = $this->slotStore(null, null, 'slot');
        if(!empty($data['mon_strt_time'][0])) {                
            $this->storeDaysSlot(array_combine($data['mon_strt_time'], $data['mon_end_time']), $data['mon_amt'], $slotId,  "Monday");
        }
        if(!empty($data['tue_strt_time'][0])) {    
            $this->storeDaysSlot(array_combine($data['tue_strt_time'], $data['tue_end_time']), $data['tue_amt'], $slotId, "Tuesday");
        }
        if(!empty($data['wed_strt_time'][0])) {    
            $this->storeDaysSlot(array_combine($data['wed_strt_time'], $data['wed_end_time']), $data['wed_amt'], $slotId, "Wednesday");
        }
        if(!empty($data['thur_strt_time'][0])) {
            $this->storeDaysSlot(array_combine($data['thur_strt_time'], $data['thur_end_time']), $data['thur_amt'], $slotId, "Thursday");
        }
        if(!empty($data['fri_strt_time'][0])) {    
            $this->storeDaysSlot(array_combine($data['fri_strt_time'], $data['fri_end_time']), $data['fri_amt'], $slotId, "Friday");
        }
        if(!empty($data['sat_strt_time'][0])) {    
            $this->storeDaysSlot(array_combine($data['sat_strt_time'], $data['sat_end_time']), $data['sat_amt'], $slotId, "Saturday");
        }
        if(!empty($data['sun_strt_time'][0])) {    
            $this->storeDaysSlot(array_combine($data['sun_strt_time'], $data['sun_end_time']), $data['sun_amt'], $slotId, "Sunday");
        }
        Alert::success('Success', 'Successfully added the slots');
        return redirect()->route('lawyer.slots');
    }

    public function storeDaysSlot($data, $amounts, $slotId, $day) {
        $i = 0;
        foreach($data as $k => $v) {
            DaysSlot::create([
                'slot_id'               => $slotId,
                'day'                   => $day,
                'slot_start_time'       => $k,
                'slot_end_time'         => $v,
                'amount'                => $amounts[$i] ? (str_contains($amounts[$i], 'AED') ? $amounts[$i] : $amounts[$i].' AED') : '20 AED'
            ]);
        }
    }

    public function addSlotService(Request $request) {
        $request->validate([
            'title'            => ['required', 'string','max:255'],
            'description'      => ['required', 'string'],
        ]);

        $data = $request->all();
        $this->slotStore($data['description'], $data['title'], 'service');
        Alert::success('Success', 'Successfully added the slot service');
        return redirect()->route('lawyer.slots');
    }

    public function deleteSlots($day) {
        $slot = Slot::whereLawyerId(auth()->user()->id)->first();
        if($slot) {
            $deleteSlots = DaysSlot::where([
                'slot_id' => $slot->id,
                'day'     => $day
            ])->get();
            foreach($deleteSlots as $k => $slot) {
                $slot->delete();
            }
        }

        return true;
    }

    public function slotStore($descr, $title, $from) {
        $isExisting = Slot::whereLawyerId(auth()->user()->id)->first();
        if(!$isExisting) {
            $slot = Slot::create([
                'lawyer_id'     => auth()->user()->id,
                'title'         => $title,
                'description'   => $descr,
            ]);
            return $slot->id;
        }
        if($from != 'slot') {
            $isExisting->description = $descr;
            $isExisting->title       = $title;
            $isExisting->save(); 
        }
        
        return $isExisting->id;
    }

    public function slotDays($day) {
        switch($day) {
            case("Monday"):
               return "monday_slot";
                break;            
            case("Tuesday"):
               return "tuesday_slot";
                break;            
            case("Wednesday"):
               return "wednesday_slot";
                break;            
            case("Thursday"):
               return "thursday_slot";
                break;            
            case("Friday"):
               return "friday_slot";
                break;            
            case("Saturday"):
               return "saturday_slot";
                break;            
            case("Sunday"):
               return "sunday_slot";
                break;            
            default:
                $msg = 'Something went wrong.';
        }
    }

    public function availableDay(Request $request) {
        $day = $request->day;
        $colName = $this->slotDays($day);
        $available = Slot::whereLawyerId(auth()->user()->id)->first();
        if(!$available) {
            $available = Slot::create([
                'lawyer_id' => auth()->user()->id
            ]);
        }
        $available->$colName = $available->$colName == 1 ? 0 : 1;
        $available->save(); 

        return true;
    }

    public function timepicker(Request $request) {
        $timeData = $request->timeData;
        // print_r($timeData['miniTime']);exit;
        return (string) view('lawyer.meeting-slot.timepicker', compact('timeData'));
    }

    public function consultationRqsts() {
        $consultations = LawyerConsultation::whereLawyerId(auth()->user()->id)->paginate(10);
        return view('lawyer.consultation.index', compact('consultations'));
    }
}

