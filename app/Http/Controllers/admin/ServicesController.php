<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ArbitrationArea;
use App\Models\Lawyer;
use App\Models\LawyerService;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index() {
        $services = Services::all();
        $arbitration = ArbitrationArea::pluck('area', 'id');
        return view('admin.services.index', compact('services', 'arbitration'));
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'title'         => 'required',           
            'short_descr'   => 'required',           
            'description'   => 'required',           
        ]);

        Services::create([
            'arbitration_area_id'   => $request->area,
            'title'                 => $request->title,
            'short_descr'           => $request->short_descr,
            'description'           => $request->description,
        ]);

        return redirect()->route('admin.services')->with('success','Service added successfully');
    }

    public function update(Request $request, $id) {
        $this->validate(request(), [
            'title'         => 'required',       
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

        return redirect()->route('admin.services')->with('success','Service updated successfully');
    }

    public function delete($id) {
        Services::findOrFail($id)->delete();

        return redirect()->route('admin.services')->with('success','Service deleted successfully');
    }

    public function serviceLawyers($serviceId) {
        $getServiceDetails = Services::whereId($serviceId)->first();
        $lawyers = Lawyer::whereArbitrationAreaId($getServiceDetails->arbitration_area_id)->get();  
        return view('admin.services.lawyers', compact('lawyers', 'getServiceDetails'));
    }

    public function addPlatformFee(Request $request, $userId) {
        $this->validate(request(), [
            'title'             => 'required',
            'description'       => 'required',
            'lawyer_fee'        => 'required',
            'platform_fee'      => 'required',
        ]);

        $getLawyerServiceDetails = LawyerService::whereServiceId($request->service_id)->first();
        Services::updateOrCreate(['id' => $request->service_id],[
            'title'         => $request->title,
            'description'   => $request->description,
        ]);
        LawyerService::updateOrCreate(
            ['id' => $getLawyerServiceDetails->id],
            [
                'service_id'    => $request->service_id,
                'lawyer_id'     => $userId,                
                'lawyer_fee'    => $request->lawyer_fee,
                'platform_fee'  => $request->platform_fee,
            ]
        );

        return redirect()->route('admin.services')->with('success','Added platform fee successfully');
    }

    public function approve(Request $request, $testimonialId) {
        $approveService = Services::whereId($testimonialId)->first();
        $approveService->approved = $approveService->approved == 1 ? 0 : 1;
        $approveService->save();

        return "Success";
    }
}
