<?php

namespace App\Http\Controllers;

Use Alert;
use App\Models\ArbitrationArea;
use App\Models\LawyerService;
use App\Models\Product;
use App\Models\HireLawyerContactInfo;
use App\Models\RequestQuote;
use App\Models\Lawyer;
use App\Models\Services;
use App\Models\SchduledMeeting;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use PDF;
use DB;
use Illuminate\Support\Facades\View;

class HireLawyerController extends Controller
{
    public function __construct() {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }

    public function hireALawyer(Request $request, $sort = null, $search = null, $area = null) {
        $sort = $sort ?? 'ASC';
        $areas = ArbitrationArea::pluck('area', 'id');
        $arbitrationArea = null;                
        // 
        if($search) {
            $tmpSearch = $search;
            $search = !is_numeric($search) ? $search : null;
            if(!$area && !$search) {
                $area = $tmpSearch;
            }
        }

        if($area) {
            $arbitrationArea = ArbitrationArea::whereId($area)->first();
            $arbitrationArea = $arbitrationArea->area;
        }

        if(!$search && !$area) {
            $services = $this->justSortedServices($sort);
        }elseif($search && !$area) {
            $services = $this->searchedServices($sort, $search);
        }elseif(!$search && $area) {
            $services = $this->servicesBasedonSelectedArea($sort, $area);
        }elseif($search && $area) {
            $services = $this->searchedAndSelectedAreaServices($sort, $search, $area);
        }
        // return view('common.hire-lawyer.service', compact('services'));
        return view('common.pages.hire-lawyer.services', compact('services', 'areas', 'arbitrationArea', 'sort', 'search', 'area'));
    }

    public function LawyerServicesToHire(Request $request, $lawyerId, $sort = null, $search = null, $area = null) {
        $sort = $sort ?? 'ASC';
        $areas = ArbitrationArea::pluck('area', 'id');
        $arbitrationArea = null;                
        // 
        if($search) {
            $tmpSearch = $search;
            $search = !is_numeric($search) ? $search : null;
            if(!$area && !$search) {
                $area = $tmpSearch;
            }
        }

        if($area) {
            $arbitrationArea = ArbitrationArea::whereId($area)->first();
            $arbitrationArea = $arbitrationArea->area;
        }

        if(!$search && !$area) {
            $services = $this->justSortedServices($sort, $lawyerId);
        }elseif($search && !$area) {
            $services = $this->searchedServices($sort, $search, $lawyerId);
        }elseif(!$search && $area) {
            $services = $this->servicesBasedonSelectedArea($sort, $area, $lawyerId);
        }elseif($search && $area) {
            $services = $this->searchedAndSelectedAreaServices($sort, $search, $area, $lawyerId);
        }
        // return view('common.hire-lawyer.service', compact('services'));
        return view('common.pages.hire-lawyer.lawyer-services', compact('services', 'areas', 'arbitrationArea', 'sort', 'search', 'area', 'lawyerId'));
    }

    public function justSortedServices($sort, $lawyerId = null) {
        if($lawyerId) {
            $sorted = Services::select('services.*', DB::raw('(select sum(lawyer_fee + platform_fee) from lawyer_services where service_id=services.id) as total_amount'))
            ->whereApproved(1)
            ->whereAddedBy($lawyerId)
            ->orderBy('total_amount', $sort)
            ->paginate(2);
        }else {
            $sorted = Services::select('services.*', DB::raw('(select sum(lawyer_fee + platform_fee) from lawyer_services where service_id=services.id) as total_amount'))
                ->whereApproved(1)
                ->orderBy('total_amount', $sort)
                ->paginate(2);
        }
        
        return $sorted;
    }

    public function searchedServices($sort, $search, $lawyerId = null) {
        if($lawyerId) {
            $searched = Services::query()
                ->select('services.*', DB::raw('(select sum(lawyer_fee + platform_fee) from lawyer_services where service_id=services.id) as total_amount'))
                ->whereApproved(1)
                ->whereAddedBy($lawyerId)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%$search%")
                        ->orWhereHas('arbitration', function ($query) use ($search) {
                            $query->where('area', 'like', "%$search%");
                        });
                })
                ->orderBy('total_amount', $sort)
                ->paginate(2);
        }else {
            $searched = Services::query()
                ->select('services.*', DB::raw('(select sum(lawyer_fee + platform_fee) from lawyer_services where service_id=services.id) as total_amount'))
                ->whereApproved(1)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%$search%")
                        ->orWhereHas('arbitration', function ($query) use ($search) {
                            $query->where('area', 'like', "%$search%");
                        });
                })
                ->orderBy('total_amount', $sort)
                ->paginate(2);
        }
        
        return $searched;
    }

    public function servicesBasedonSelectedArea($sort, $areaId, $lawyerId = null) {
        if($lawyerId) {
            $area = ArbitrationArea::whereId($areaId)->first();
                $selectedServices = Services::select('services.*', DB::raw('(select sum(lawyer_fee + platform_fee) from lawyer_services where service_id=services.id) as total_amount'))
                ->whereApproved(1)
                ->whereAddedBy($lawyerId)
                ->whereArbitrationAreaId($areaId)
                ->orderBy('total_amount', $sort)
                ->paginate(2);
        }else {
            $area = ArbitrationArea::whereId($areaId)->first();
                $selectedServices = Services::select('services.*', DB::raw('(select sum(lawyer_fee + platform_fee) from lawyer_services where service_id=services.id) as total_amount'))
                ->whereApproved(1)
                ->whereArbitrationAreaId($areaId)
                ->orderBy('total_amount', $sort)
                ->paginate(2);
        }
        
        $arbitrationArea = $area->area;
        // return view('common.hire-lawyer.service', compact('services'));
        return $selectedServices;
    }

    public function searchedAndSelectedAreaServices($sort, $search, $areaId, $lawyerId = null) {
        if($lawyerId) {
            $searched = Services::query()
                ->select('services.*', DB::raw('(select sum(lawyer_fee + platform_fee) from lawyer_services where service_id=services.id) as total_amount'))
                ->whereApproved(1)
                ->whereAddedBy($lawyerId)
                ->whereArbitrationAreaId($areaId)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%$search%")
                        ->orWhereHas('arbitration', function ($query) use ($search) {
                            $query->where('area', 'like', "%$search%");
                        });
                })
                ->orderBy('total_amount', $sort)
                ->paginate(2);
        }else {
            $searched = Services::query()
                ->select('services.*', DB::raw('(select sum(lawyer_fee + platform_fee) from lawyer_services where service_id=services.id) as total_amount'))
                ->whereApproved(1)
                ->whereArbitrationAreaId($areaId)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%$search%")
                        ->orWhereHas('arbitration', function ($query) use ($search) {
                            $query->where('area', 'like', "%$search%");
                        });
                })
                ->orderBy('total_amount', $sort)
                ->paginate(2);
        }
        
        return $searched;
    }

    public function serviceStepOne($serviceId) {
        $service = Services::whereId($serviceId)->first();
        $relatedServices = Services::whereArbitrationAreaId($service->arbitration_area_id)
            ->where('id', '!=', $serviceId)
            ->whereApproved(1)
            ->latest()
            ->limit(2)
            ->get();
        $relatedLawyers = Lawyer::whereArbitrationAreaId($service->arbitration_area_id)->paginate(10);
        return view('common.pages.hire-lawyer.service-one', compact('service', 'relatedServices', 'relatedLawyers'));
    }

    public function serviceStepTwo($serviceId) {
        $service = Services::whereId($serviceId)->first();
        return view('common.pages.hire-lawyer.service-two', compact('service'));
    }

    public function serviceStepThree(Request $request, $serviceId) {
        $isAccepted = $request->acceptTerms;
        $service = Services::whereId($serviceId)->first();
        if($isAccepted) {
            return view('common.pages.hire-lawyer.service-three', compact('service'));
        }else {
            Alert::error('Error', 'Please accept the terms of service'); 
            return view('common.pages.hire-lawyer.service-two', compact('service'));
        }
    }

    public function servicePayment(Request $request) {
        $this->validate(request(), [
            'first_name'        => 'required',       
            'last_name'         => 'required',       
            'email'             => 'required',       
            'mobile'            => 'required',       
        ]);

        $isAlreadyCreated = Product::whereProductName($request->product_name)->first();
        if(!$isAlreadyCreated) {
            $product = $this->stripe->products->create([
                'name' => $request->product_name,
            ]);
    
            $prodData = Product::create([
                'product_name' => $request->product_name,
                'product_id'   => $product->id
            ]);
            $amt = (int)filter_var($request->amount, FILTER_SANITIZE_NUMBER_INT);
            $price = $this->stripe->prices->create([
                'unit_amount' => $amt * 100,
                'currency' => 'aed',
                'product' => $product->id,
            ]);
              
            $priceData = Product::findOrFail($prodData->id);
            $priceData->price_id = $price->id;
            $priceData->save();
        }

        HireLawyerContactInfo::create([
            'service_id' => $request->serviceId,
            // 'user_id' => auth()->user()->id,
            'user_id' => 1,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'dob' => $request->day.'-'.$request->month.'-'.$request->year,
            'comments_for_lawyer' => $request->comments_for_lawyer,
        ]);

        // \Stripe\Stripe::setApiKey(env("STRIPE_SECRET"));
        $domain = 'http://127.0.0.1:8000';
        // $domain = 'https://dev.test.connectlegal.ae';

        $scheduleMeeting = SchduledMeeting::create([
            'scheduled_by'      => 1,
            // 'scheduled_by'      => auth()->user()->id,
            'service_id'        => $request->serviceId,
            'lawyer_id'         => $request->lawyerUserId,
        ]);

        $checkoutSession = $this->stripe->checkout->sessions->create([
            'line_items' => [[
              'price' => $isAlreadyCreated ? $isAlreadyCreated->price_id : $priceData->price_id,
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $domain . '/service-step-5/'.$scheduleMeeting->id,
            'cancel_url' => $domain . '/how-it-works',
        ]);

        $scheduleMeeting->checkout_id = $checkoutSession->id;
        $scheduleMeeting->save();

        session(['checkoutId' => $checkoutSession->id, 'date' => $request->date]);
        return Redirect::to($checkoutSession->url);
    }

    public function servicePaymentCompleted($scheduleMeetingId) {
        $scheduleMeetingData = SchduledMeeting::whereId($scheduleMeetingId)->first();
        $serviceData = Services::whereId($scheduleMeetingData->service_id)->first();
        $productData = HireLawyerContactInfo::whereServiceId($scheduleMeetingData->service_id)->first();
        $data['orderId'] = $scheduleMeetingId;
        $data['title'] = $serviceData->title;
        $data['lawyer'] = $serviceData->addedBy->name;
        $data['customer'] = $productData->first_name.' '.$productData->last_name;
        $data['mobile'] = $productData->mobile;
        $data['message'] = $productData->comments_for_lawyer;
        $data['amount'] = $serviceData->getLawyerFee($serviceData->id) + $serviceData->getPlatformFee($serviceData->id);

        return view('common.pages.hire-lawyer.service-completed', compact('data'));
    }

    public function generateInvoice($meetingId) {
        $scheduleMeetingData = SchduledMeeting::whereId($meetingId)->first();
        $serviceData = Services::whereId($scheduleMeetingData->service_id)->first();
        $productData = HireLawyerContactInfo::whereServiceId($scheduleMeetingData->service_id)->first();
        $data = [
            // data for the invoice goes here
            'orderId'           => $meetingId,
            'lawyer'            => $serviceData->addedBy->name,
            'email'             => $serviceData->addedBy->email,
            'address'           => $serviceData->getAddress($serviceData->added_by),
            'customer_name'     => $productData->first_name.' '.$productData->last_name,
            'customer_email'    => $productData->email,
            'title'             => $serviceData->title,
            'mobile'            => $productData->mobile,
            'message'           => $productData->comments_for_lawyer,
            'amount'            => $serviceData->getLawyerFee($serviceData->id) + $serviceData->getPlatformFee($serviceData->id),
        ];

        $html = view('common.pages.hire-lawyer.invoice', $data)->render();

        $pdf = PDF::loadHtml($html);

        // Render the PDF
        $pdf->setPaper('A2', 'landscape');
        // Output the PDF to the browser
        return $pdf->download('invoice.pdf');
    }

    public function serviceLawyers($id) {
        $serviceLawyers = LawyerService::whereServiceId($id)->get();
        return view('common.hire-lawyer.service-details', compact('serviceLawyers', 'id'));
    }

    public function lawyerServices($lawyerId) {
        $lawyerServices = LawyerService::whereHas('services', function ($query) {
            $query->where('approved', 1);
        })
        ->with('services')
        ->get();

        return view('common.hire-lawyer.lawyer-services', compact('lawyerServices'));
    }

    public function requestForQuotes(Request $request) {
        $lawyerServiceId = $request->id;
        $isExist = RequestQuote::where([
            'lawyer_service_id' => $lawyerServiceId,
            'requested_by' => auth()->user()->id,
        ])->first();
        if(!$isExist) {
            RequestQuote::create([
                'lawyer_service_id' => $lawyerServiceId,
                'requested_by' => auth()->user()->id,
            ]);
        }

        return true;
    }

    public function search(Request $request) {
        $searchTerm = $request->input('search');
        if(!$searchTerm) {
            $services = Services::
            select('services.*', DB::raw('(select sum(lawyer_fee + platform_fee) from lawyer_services where service_id=services.id) as total_amount'))
            ->whereApproved(1)
            ->orderBy('total_amount', 'ASC')
            ->paginate(2);
        }else {
            $services = Services::query()
                ->select('services.*', DB::raw('(select sum(lawyer_fee + platform_fee) from lawyer_services where service_id=services.id) as total_amount'))
                ->whereApproved(1)
                ->where(function ($query) use ($searchTerm) {
                    $query->where('title', 'like', "%$searchTerm%")
                        ->orWhereHas('arbitration', function ($query) use ($searchTerm) {
                            $query->where('area', 'like', "%$searchTerm%");
                        });
                })
                ->orderBy('total_amount', 'ASC')
                ->get();
        }

        return (string) view('common.pages.hire-lawyer.searched-services', compact('services'));
    }
}
