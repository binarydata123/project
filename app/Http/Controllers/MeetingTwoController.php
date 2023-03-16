<?php

namespace App\Http\Controllers;

use App\Models\ZoomMeeting;
use App\Traits\ZoomMeetingTwoTrait;
use Illuminate\Http\Request;

class MeetingTwoController extends Controller
{
    use ZoomMeetingTwoTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function show($id)
    {
        $meeting = $this->get($id);

        return view('meetings.index', compact('meeting'));
    }

    public function store(Request $request)
    {
        $data = [];
        $data['topic']      = "Testing Topic";
        $data['start_time'] = "2022-10-25 10:30";
        $data['duration'] = 30;
        $data['agenda'] = "Testing Agenda";
        $data['host_video'] = 1;
        $data['participant_video'] = 1;
        $this->create($data);
        // $this->create($request->all());

        // return redirect()->route('meetings.index');
        return redirect()->route('home');
    }

    public function update($meeting, Request $request)
    {
        $this->update($meeting->zoom_meeting_id, $request->all());

        return redirect()->route('meetings.index');
    }

    public function destroy(ZoomMeeting $meeting)
    {
        $this->delete($meeting->id);

        return $this->sendSuccess('Meeting deleted successfully.');
    }
}