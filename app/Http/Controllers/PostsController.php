<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;

class PostsController extends Controller
{
    public function add() {
        $data = Post::all();
        return view('cms/add-post',['posts'=>$data]);
    }
    public function list() {
        $data = Post::all();
        return view('cms/posts',['posts'=>$data]);
    }
    public function blog_list() {
        $posts = Post::where('published','Yes')->get();
        foreach ($posts as $post) {
            $post->content = substr($post->content,0,500) . "...";
            $post->content = str_replace('<h1>','<h1 class="text-4xl">',$post->content);
            $post->content = str_replace('<h1 class="ql-align-justify">','<h1 class="font-bold text-4xl ql-align-justify">',$post->content);
            $post->content = str_replace('<h2>','<h2 class="font-bold text-2xl">',$post->content);
            $post->content = str_replace('<h2 class="ql-align-justify">','<h2 class="font-bold text-2xl ql-align-justify">',$post->content);
            $post->content = str_replace('<h3>','<h3 class="font-bold text-1xl">',$post->content);
            $post->content = str_replace('<h3 class="ql-align-justify">','<h3 class="font-bold text-1xl ql-align-justify">',$post->content);
            //echo 'id = '.$post->id;
            $post_image = PostImage::where('post_id', $post->id)->first();
            //echo ', post_image = '.$post_image;
            $post["post_image_filename"] = '';
            if ($post_image) {
                //echo ', post_image filename = '.$post_image->filename;
                $post["post_image_filename"] = $post_image->filename;
            }
        }
        return view('blog',['posts'=>$posts]);
    }
    public function view(Request $request, Post $post = null) {
        $post = $post ?? Post::query()->find($request->route()->getAction()['post']);
        $post->content = str_replace('<h1>','<h1 class="text-4xl">',$post->content);
        $post->content = str_replace('<h1 class="ql-align-justify">','<h1 class="font-bold text-4xl ql-align-justify">',$post->content);
        $post->content = str_replace('<h2>','<h2 class="font-bold text-2xl">',$post->content);
        $post->content = str_replace('<h2 class="ql-align-justify">','<h2 class="font-bold text-2xl ql-align-justify">',$post->content);
        $post->content = str_replace('<h3>','<h3 class="font-bold text-1xl">',$post->content);
        $post->content = str_replace('<h3 class="ql-align-justify">','<h3 class="font-bold text-1xl ql-align-justify">',$post->content);
        $post_images = PostImage::where('post_id',$post->id)->get();
        return view('post',['post_details'=>$post, 'post_images'=>$post_images]);
    }
    public function edit($post_id) {
        $data = Post::where('id', $post_id)->first();
        //$post_id = $data->id;
        $data_all = Post::all();
        $data_images = PostImage::where('post_id', $post_id)->get();
        return view('cms/edit-post',['post_details'=>$data,'posts'=>$data_all, 'post_images'=>$data_images]);
    }
    public function delete($id) {
        $data = Post::find($id);
        $data->delete();
        return redirect('posts');
    }
    public function deletePostImage($id,$slug) {
      $data = PostImage::find($id);
      $data->delete();
      return redirect('/edit-post/'.$slug);
    }
}
