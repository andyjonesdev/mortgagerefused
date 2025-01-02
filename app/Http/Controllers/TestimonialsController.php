<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialsController extends Controller
{
    public function add(Request $req) {
        $testimonial = new Testimonial;
        $testimonial->quote_maker = $req->quote_maker;
        $testimonial->quote = $req->quote;
        $testimonial->save();
        return redirect('edit-testimonials');
    }
    public function edit(Request $req) {
      $testimonial = Testimonial::where('id', $req->id)->first();
      return view('cms/edit-testimonial',['testimonial_details'=>$testimonial]);
    }
    public function update(Request $req) {
      $testimonial = Testimonial::where('id', $req->id)->first();
      $testimonial->quote_maker = $req->quote_maker;
      $testimonial->quote = $req->quote;
      $testimonial->save();
      return redirect('/testimonials');
    }
    public function list() {
        $data = Testimonial::all();
        return view('cms/testimonials',['testimonials'=>$data]);
    }
    public function testimonials_list() {
        $testimonials = Testimonial::all();
        return view('/cms/testimonials',['testimonials'=>$testimonials]);
    }
    public function delete($id) {
        $data = Testimonial::find($id);
        $data->delete();
        return redirect('/testimonials');
    }
}
