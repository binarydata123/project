<?php

namespace App\Http\Controllers\Lawyer;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\ArbitrationArea;
use App\Models\Lawyer;
use App\Models\LawyerService;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LawyerServiceController extends Controller
{
    public function index() {
        $services = LawyerService::whereLawyerId(auth()->user()->id)->paginate(10);
        $areas = ArbitrationArea::pluck('area', 'id');
        $arbitrationArea = Lawyer::whereUserId(auth()->user()->id)->first();
        if(!$arbitrationArea->arbitration_area_id) {
            return redirect()->route('lawyer.profile')->with('error', 'Please add your arbitration area');
        }else {
            // return view('lawyer.services.index', compact('services', 'arbitrationArea'));
            return view('lawyer.pages.services.list', compact('services', 'arbitrationArea', 'areas'));
        }
    }

    public function create() {
        return view('lawyer.services.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'area'          => 'required',
            'title'         => 'required:unique:services',           
            'description'   => 'required',     
            'short_descr'   => 'required',  
            'fee'           => 'required'      
        ]);
        if($validator->fails()) {
            Alert::error('Error', 'Please go back to the form to view the errors');
            return redirect()->route('lawyer.services')->withErrors($validator)->withInput();
        }else {
            $service = Services::create([
                'arbitration_area_id'   => $request->area,
                'title'                 => $request->title,
                'short_descr'           => $request->short_descr,  
                'description'           => $request->description,
                'added_by'              => auth()->user()->id
            ]);

            LawyerService::create([
                'service_id' => $service->id,
                'lawyer_id'  => auth()->user()->id,
                'lawyer_fee' => $request->fee
            ]);
            Alert::success('success', "Service added successfully");
            return redirect()->route('lawyer.services');
        }
    }
    
    public function edit($id) {
        $areas = ArbitrationArea::pluck('area', 'id');
        $service = Services::whereId($id)->first();
        return (string) view('lawyer.pages.services.edit', compact('service', 'areas'));
    }

    public function update(Request $request, $id) { 
        $this->validate(request(), [
            'title'         => 'required:unique:services,title,'.$id,           
            'short_descr'   => 'required',           
            'description'   => 'required',           
        ]);

        Services::updateOrCreate(['id' => $id],
        [
            'arbitration_area_id'   => $request->area,
            'title'                 => $request->title,
            'short_descr'           => $request->short_descr,  
            'description'           => $request->description,   
        ]
        );
        
        $updateFee = LawyerService::whereServiceId($id)->first();
        $updateFee->lawyer_fee = $request->fee;
        $updateFee->save();

        Alert::success('success', "Service updated successfully");
        return redirect()->route('lawyer.services');
    }

    public function delete($id) {
        Services::findOrFail($id)->delete();
        Alert::success('success', "Service deleted successfully");
        return redirect()->route('lawyer.services');
    }

    public function addFee(Request $request, $id) {
        $this->validate(request(), [
            'fee' => 'required',       
        ]);
        LawyerService::updateOrCreate(['id' => $id],
            [
            'lawyer_fee'  => $request->fee,
            ]
        );
        Alert::success('success', "Added service fee successfully");
        return redirect()->route('lawyer.services', $request->service_id);
    }
}
