<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostImage;
use Livewire\WithFileUploads;

/*
* Livewire component to upload an image to a blog post
*/

class AddImagePost extends Component
{
    use WithFileUploads;

    public Post $post;
    public $post_details;
    public $post_images;
    public $photo;

    public function mount($post_details,$post_images)
    {
        $this->post_details = $post_details;
        $this->post_images = $post_images;
        $this->post = Post::where('rand_id', $post_details->rand_id)->first();
    }

    protected $rules = [
        'photo' => 'image|max:1024', // 1MB Max
        //'photo.alt' => 'required|string|min:10',
    ];
 
    public function save()
    {
        $this->validate();
        // foreach ($this->photos as $photo) {
        //     $photo->storeAs('photos');
        // }
        //$this->photo->storeAs('photos', $filename);
        $filename = $this->photo->store('public');
        $post_image = new PostImage;
        $post_image->post_id = $this->post->id;
        $filename = str_replace("public/","",$filename);
        $post_image->filename = $filename;
        $post_image->save();
        redirect()->to('/edit-post/'.$this->post->slug);
        //session()->flash('message', 'Image successfully updated.');
    }
    public function render()
    {
        return view('livewire.add-image-post');
    }
}
