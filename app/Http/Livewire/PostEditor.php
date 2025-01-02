<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostEditor extends Component
{
    public Post $post;
    public $post_details;
    public $posts;
    public $preloader_test = 'preloader';
    public $showDiv = false;

    public function mount($post_details,$posts)
    {
        $this->post_details = $post_details;
        $this->posts = $posts;
        $this->post = Post::where('slug', $post_details->slug)->first();
    }
 
    protected $rules = [
        'post.name' => 'required|string|min:3',
        'post.sub_title' => '',
        'post.content' => 'required|string|max:20000',
        'post.slug' => 'required|max:200',
        'post.meta_title' => 'required|max:200',
        'post.meta_description' => 'required|max:200',
        'post.published' => '',
    ];
 
    public function save()
    {
        session()->flash('message', 'Updating...');
        $this->consoleLog('content = '.$this->post->content);
        $this->showDiv = false;
        $this->validate();
        $this->post->slug = strtolower(str_replace(' ','-',$this->post->name));
        $this->post->slug = str_replace('?','',$this->post->slug);
        $this->showDiv = true;
        $this->post->save();
        redirect()->to('/edit-post/'.$this->post->id);
        session()->flash('message', 'Post successfully updated.');
    }
    public function render()
    {
        return view('livewire.post-editor');
    }
}
