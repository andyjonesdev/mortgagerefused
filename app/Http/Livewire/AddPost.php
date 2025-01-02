<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class AddPost extends Component
{
    public Post $post;
    public $posts;
    public $showDiv = false;

    public function mount()
    {
        $this->post = new Post();
        $this->post->published = 'No';
    }
 
    protected $rules = [
        'post.name' => 'required|string|min:3',
        'post.sub_title' => '',
        'post.content' => 'required|string|max:20000',
        'post.meta_title' => 'required|max:200',
        'post.meta_description' => 'required|max:200',
        'post.published' => '',
    ];
 
    public function save()
    {
        session()->flash('message', 'Updating...');
        $this->showDiv = true;
        $this->validate();
        $str = rand();
        $rand_id = hash('sha256', $str);
        $slug = strtolower(str_replace(' ','-',$this->post->name));
        $this->post->rand_id = $rand_id;
        $this->post->slug = $slug;
        $this->post->save();
        redirect()->to('/edit-post/'.$this->post->id);
        //session()->flash('message', 'Post successfully updated.');
    }

    public function render()
    {
        return view('livewire.add-post');
    }
}
