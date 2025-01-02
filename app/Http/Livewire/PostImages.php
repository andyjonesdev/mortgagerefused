<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostImage;

class PostImages extends Component
{
    public Post $post;
    public $post_details;
    public $images = [];

    public function mount($post_details,$post_images)
    {
        $this->post_details = $post_details;
        $this->post_images = $post_images;
        $this->post = Post::where('rand_id', $post_details->rand_id)->first();
        $this->images = PostImage::where('post_id', $this->post['id'])->get();
        //echo 'post id = '.$this->post['id'];
        //echo '<br>post images = '.$this->images;
    }
    
    protected $rules = [
        'images.*.alt' => 'string|min:10',
    ];
 
    public function save()
    {
        //$this->validate();
        foreach ($this->images as $image) {
            //echo $image->main;
            $image->save();
        }
        session()->flash('message_images', 'Images successfully updated.');
    }

    public function render()
    {
        return view('livewire.post-images');
    }
}
