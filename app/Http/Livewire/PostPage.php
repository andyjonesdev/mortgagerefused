<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;

class PostPage extends Component
{
    public Page $page;
    public $page_details;
    public $pages;
    public $preloader_test = 'preloader';
    public $showDiv = false;

    public function mount($page_details,$pages)
    {
        $this->page_details = $page_details;
        $this->pages = $pages;
        $this->page = Page::where('slug', $page_details->slug)->first();
    }
 
    protected $rules = [
        'page.name' => 'required|string|min:3',
        'page.header_para' => '',
        'page.sub_heading' => '',
        'page.content' => 'required|string|max:20000',
        'page.sub_heading2' => '',
        'page.content2' => '',
        'page.sub_heading3' => '',
        'page.content3' => '',
        'page.sub_heading4' => '',
        'page.content4' => '',
        'page.sub_heading5' => '',
        'page.content5' => '',
        'page.sub_heading6' => '',
        'page.content6' => '',
        'page.meta_title' => 'required|max:200',
        'page.meta_description' => 'max:200',
        'page.menu' => '',
        'page.parent' => '',
        'page.published' => '',
    ];
 
    public function save()
    {
        session()->flash('message', 'Updating...');
        $this->validate();
        $this->page->slug = strtolower(str_replace(' ','-',$this->page->name));
        $this->page->save();
        redirect()->to('/edit-page/'.$this->page->slug);
        session()->flash('message', 'Page successfully updated.');
    }

    public function render()
    {
        return view('livewire.post-page');
    }
}
