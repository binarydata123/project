<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index() {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function approve(Request $request, $testimonialId) {
        $approveTestimonial = Testimonial::whereId($testimonialId)->first();
        $approveTestimonial->approved = $approveTestimonial->approved == 1 ? 0 : 1;
        $approveTestimonial->save();

        return "Success";
    }

    public function delete($id) {
        $delete = Testimonial::find($id);
        $delete->delete();
        return redirect()->route('admin.testimonials')->with('success','Testimonial deleted successfully!');
    }
}
