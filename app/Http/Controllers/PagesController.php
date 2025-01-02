<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Home;
use App\Models\PageImage;
use App\Models\Testimonial;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    public function add() {
      $data = Page::all();
      return view('cms/add-page',['pages'=>$data]);
    }
    public function addData(Request $req) {
        $page = new Page;
        $page->name = $req->name;
        $page->meta_title = $req->meta_title;
        $page->meta_description = $req->meta_description;
        $page->parent = $req->parent;
        $page->published = $req->published;
        $page->content = $req->content;
        $page->slug = $req->slug;
        $str = rand();
        $page->rand_id = hash('sha256', $str);
        $page->save();
        return redirect('pages');
    }
    public function editData(Request $req) {
      $page = Page::where('rand_id', $req->rand_id)->first();
      $page->name = $req->name;
      $page->meta_title = $req->meta_title;
      $page->meta_description = $req->meta_description;
      $page->parent = $req->parent;
      $page->published = $req->published;
      $page->content = $req->content;
      $page->slug = $req->slug;
      $page->save();
      return redirect('pages');
    }
    public function list() { //($admin = false) {
       $data = Page::where('id','>',0)->orderBy('parent')->orderBy('order')->get();
      // if ($admin)
      //   return view('products',['products'=>$data]);
      // else
        return view('cms/pages',['pages'=>$data]);
    }
    public function view(Request $request, Page $page = null) {
      $page = $page ?? Page::query()->find($request->route()->getAction()['page']);
      $home = Home::where('id', 1)->first();
      $children = Page::where('parent','=',$page->name)->orderBy('order')->get();
      return view('page',['page_details'=>$page, 'home'=>$home, 'children'=>$children]);
    }
    public function welcome() {
      $home = Home::where('id', 1)->first();
      $testimonials = Testimonial::all();
      return view('welcome',['home'=>$home,'testimonials'=>$testimonials]);
    }
    // public function getStarted() {
    //   $page = Page::where('slug', 'get-started')->first();
    //   return view('/get-started',['page_details'=>$page]);
    // }
    public function edit($slug) {
      $data = Page::where('slug', $slug)->first();
      $page_id = $data->id;
      $data_all = Page::all();
      //$data_images = PageImage::where('page_id', $page_id)->get();
      return view('cms/edit-page',['page_details'=>$data,'pages'=>$data_all]);
    }
    public function editText($slug) {
      $data = Page::where('slug', $slug)->first();
      $page_id = $data->id;
      $data_all = Page::all();
      return view('cms/edit-page-text',['page_details'=>$data,'pages'=>$data_all]);
    }
    public function editHome($slug) {
      $home = Home::where('id', 1)->first();
      return view('cms/edit-page-home',['home'=>$home]);
    }
    public function moveup($id) {
      $page_moved = Page::where('id', $id)->first();
      $page_replaced = Page::where('order', ($page_moved->order-1))->first();
      
      $page_moved->order--;
      $page_moved->save();

      $page_replaced->order++;
      $page_replaced->save();

      return redirect('/pages');
    }
    public function movedown($id) {
      $page_moved = Page::where('id', $id)->first();
      $page_replaced = Page::where('order', ($page_moved->order+1))->first();

      $page_moved->order++;
      $page_moved->save();

      $page_replaced->order--;
      $page_replaced->save();

      return redirect('/pages');
    }
    public function delete($id) {
      $data = Page::find($id);
      $page_order_deleted = $data->order;
      //Change order of pages
      $pages = Page::all();
      foreach ($pages as $page) {
        if($page->order>$page_order_deleted) {
          $page->order--;
          $page->save();
        }
      }
      $data->delete();
      return redirect('pages');
    }
    public function getImage($image)
    {
        // Check if the visitor/user is allowed to view the image.
        $image = Storage::get('storage/app/public/images/'.$image);
        return $image;
        //Image::make(storage_path('/images/profiles/') . $image_path)->response('jpg');
    }
    public function deletePageImage($id,$rand_id) {
      $data = ProductImage::find($id);
      $data->delete();
      return redirect('/edit-product/'.$rand_id);
    }
}
