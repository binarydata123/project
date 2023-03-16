<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ArbitrationArea;
use App\Models\Lawyer;
use App\Traits\VerifyMailTrait;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    use VerifyMailTrait;

    public function index() {
        $lawyers = Lawyer::all();
        $arbitration = ArbitrationArea::pluck('area', 'id');
        return view('admin.lawyers.index', compact('lawyers', 'arbitration'));
    }

    public function view($id) {

    }

    public function delete($id) {
        $delete = Lawyer::find($id);
        $delete->delete();
        return redirect()->route('admin.lawyer_list')->with('success','Lawyer deleted successfully!');
    }

    public function verify(Request $request, $lawyerId) {
        $verifyLawyer = Lawyer::whereUserId($lawyerId)->first();
        $verifyLawyer->is_verified = $verifyLawyer->is_verified == 1 ? 0 : 1;
        $verifyLawyer->save();

        if($verifyLawyer->is_verified) {
            $this->verifyLawyerMail($verifyLawyer->user->email, 'Your account has been verified');
        }else {
            $this->verifyLawyerMail($verifyLawyer->user->email, 'Your account has been unverified');
        }

        return "Success";
    }

    public function update(Request $request, $id) {
        // print_r($request->all());exit;
        Lawyer::updateOrCreate(
        ['id' => $id],
        [
            'law_firm_name'                 => $request->lawfirm_name,
            'law_firm_website'              => $request->lawfirm_website,
            'emirates'                      => $request->emirate,
            'office_address'                => $request->office_address,            
            'contact_number'                => $request->contact_number,
            'landline_number'               => $request->landline_number,
            'position'                      => $request->position,
            'linkedin_profile'              => $request->linkedin,
            'moj_reg_no'                    => $request->moj_reg_no,
            // 'calendly_link'                 => $request->calendly_link,
            'language'                      => $request->language,
            'arbitration_area_id'           => $request->arbitration,
            'education'                     => $request->education,
            'honors_and_awards'             => $request->honors_and_awards,
            'assosiation_and_membership'    => $request->assosiation_and_membership,
            'disclaimer'                    => $request->disclaimer,
            'summary'                       => $request->summary,
        ]);

        return redirect()->route('admin.lawyer_list')->with('success','Updated lawyer details successfully!');
    }

    public function verifyLawyer($lawyerId) {
        $verifyLawyer = Lawyer::whereUserId($lawyerId)->first();
        $verifyLawyer->is_verified = 1;
        $verifyLawyer->save();

        $this->verifyLawyer($verifyLawyer->user->email, 'Your account is verified');

        return redirect()->route('admin.lawyer_list')->with('success','Lawyer verified successfully!');
    }
}
