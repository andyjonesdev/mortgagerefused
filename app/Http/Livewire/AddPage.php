<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;
// use Illuminate\Support\Str;

class AddPage extends Component
{
    public Page $page;
    public $pages;
    public $showDiv = false;

    public function mount($pages)
    {
        $this->pages = $pages;
        $this->page = new Page();
    }
 
    protected $rules = [
        'page.name' => 'required|string|min:3',
        'page.header_para' => 'required|string|max:1000',
        'page.content' => 'required|string|max:20000',
        'page.meta_title' => 'required|max:200',
        'page.meta_description' => 'required|max:200',
    ];
 
    public function save()
    {
        $this->showDiv = true;
        $this->validate();
        $str = rand();
        $rand_id = hash('sha256', $str);
        $slug = strtolower(str_replace(' ','-',$this->page->name));
        $last_page = Page::where('order','>',0)->orderBy('order','DESC')->first();
        $this->page->rand_id = $rand_id;
        $this->page->slug = $slug;
        $this->page->published = 'No';
        $this->page->order = $last_page->order + 1;
        $this->page->save();
        redirect()->to('/edit-page/'.$this->page->slug);
    }

    public function render()
    {
        return view('livewire.add-page');
    }
}
