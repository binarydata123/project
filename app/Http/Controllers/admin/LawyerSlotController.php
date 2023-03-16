<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DaysSlot;
use App\Models\SchduledMeeting;
use App\Models\Slot;
use App\Models\SlotFees;
use Illuminate\Http\Request;

class LawyerSlotController extends Controller
{
    public function lawyers() {
        $lawyersScheduled = Slot::select('lawyer_id')->get();
        return view('admin.lawyer-slots.lawyers', compact('lawyersScheduled'));
    }

    public function slots($lawyerId) {
        $slotData = Slot::whereLawyerId($lawyerId)->first();
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
        return view('admin.lawyer-slots.slots', compact('data', 'slotData'));
    }

    public function updateSlots(Request $request, $lawyerId) {
        $isExisting = SlotFees::whereLawyerId($lawyerId)->first();
        if($isExisting) {
            $isExisting->fifteen = $request->fifteen;
            $isExisting->thirty = $request->thirty;
            $isExisting->save();
        }else {
            SlotFees::create([
                'lawyer_id' => $lawyerId,
                'fifteen'   => $request->fifteen,
                'thirty'   => $request->thirty,
            ]);
        }

        return redirect()->route('admin.lawyer-slots')->with('success','Added fees successfully');
    }
}
