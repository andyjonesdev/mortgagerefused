<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQsController extends Controller
{
    public function add(Request $req) {
        $faq = new FAQ;
        $faq->title = $req->title;
        $faq->content = $req->content;
        $faq->save();
        return redirect('edit-faqs');
    }
    public function edit(Request $req) {
      $faq = FAQ::where('id', $req->id)->first();
      return view('cms/edit-faq',['faq_details'=>$faq]);
    }
    public function update(Request $req) {
      $faq = FAQ::where('id', $req->id)->first();
      $faq->title = $req->title;
      $faq->content = $req->content;
      $faq->save();
      return redirect('edit-faqs');
    }
    public function list() {
        $data = FAQ::all();
        return view('cms/faqs',['faqs'=>$data]);
    }
    public function faqs_list() {
        $faqs = FAQ::all();
        return view('/faqs',['faqs'=>$faqs]);
    }
    public function delete($id) {
        $data = FAQ::find($id);
        $data->delete();
        return redirect('edit-faqs');
    }
}
