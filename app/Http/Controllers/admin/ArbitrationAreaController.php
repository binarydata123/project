<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ArbitrationArea;
use Illuminate\Http\Request;

class ArbitrationAreaController extends Controller
{
    public function index() {
        $arbitrationArea = ArbitrationArea::all();
        return view('admin.arbitration-area.index', compact('arbitrationArea'));
    }

    public function create() {
        return view('admin.arbitration-area.create');
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'area'        => 'required|unique:arbitration_areas',           
        ]);

        $area = $request->area;
        ArbitrationArea::create([
            'area' => $area
        ]);

        return redirect()->route('admin.arbitration-area')->with('success','Area created successfully!');
    }

    public function edit($id) {
        $area = ArbitrationArea::whereId($id)->first();
        return view('admin.arbitration-area.edit', compact('area'));
    }

    public function update(Request $request, $id) {
        $this->validate(request(), [ 
            'area'   => 'required|unique:arbitration_areas,area,'.$id,         
        ]);
        $update = ArbitrationArea::find($id);
        $update->area = $request->area;
        $update->save();
        return redirect()->route('admin.arbitration-area')->with('success','Area updated successfully!');
    }

    public function delete($id) {
        $delete = ArbitrationArea::find($id);
        $delete->delete();
        return redirect()->route('admin.arbitration-area')->with('success','Area deleted successfully!');
    }
}
