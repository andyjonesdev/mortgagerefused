<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Home;

class EditPageHome extends Component
{
    public Home $home;
    public $showDiv = false;

    public function mount($home)
    {
        $this->home = $home;
    }
 
    protected $rules = [
        'home.name' => 'required|string|min:3',
        'home.title' => 'required|string|min:3',
        'home.sub_title' => 'required|string|min:3',
        'home.content_1' => '',
        'home.content_2' => '',
        'home.content_3' => '',
        'home.content_4' => '',
        'home.content_5' => '',
        'home.content_6' => '',
        'home.content_7' => '',
        'home.content_8' => '',
        'home.content_9' => '',
        'home.content_10' => '',
        'home.content_11' => '',
        'home.content_12' => '',
        'home.content_13' => '',
        'home.content_14' => '',
        'home.content_15' => '',
        'home.content_16' => '',
        'home.content_17' => '',
        'home.content_18' => '',
        'home.content_19' => '',
        'home.content_20' => '',
        'home.content_21' => '',
        'home.content_22' => '',
        'home.content_23' => '',
        'home.content_24' => '',
        'home.meta_title' => 'required|max:200',
        'home.meta_description' => 'max:200',
    ];
 
    public function save()
    {
        session()->flash('message', 'Updating...');
        $this->validate();
        $this->home->slug = strtolower(str_replace(' ','-',$this->home->name));
        $this->home->save();
        redirect()->to('/edit-page-home/'.$this->home->slug);
        session()->flash('message', 'home successfully updated.');
    }

    public function render()
    {
        return view('livewire.edit-page-home');
    }
}
