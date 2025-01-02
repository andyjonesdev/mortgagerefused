<div>
    <form wire:submit.prevent="save">
        @csrf
        <div class="md:grid grid-cols-3 gap-4" x-data="{ name: '{{$page_details['name']}}' }">
            <div class="col-span-3">
                <div class="py-4">
                    <label for="name">Page name/heading:</label><br>
                    <input x-model="name" class="w-full text-md md:text-3xl border-slate-200 py-3" wire:model.defer="page.name" type="text" name="name" id="name" placeholder="enter name" value="" />
                    <span class="text-red-600">@error('page.name'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-span-2">
                <div class="py-4">
                    <label for="header_para">Header para:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="page.header_para" id="header_para" name="header_para" rows="10">{{$page['header_para']}}</textarea>
                    <span class="text-red-600">@error('page.header_para'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="sub_heading">Sub heading:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="page.sub_heading" name="sub_heading" id="sub_heading" placeholder="" value="{{$page['sub_heading']}}" />
                    <span class="text-red-600">@error('page.sub_heading'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="content">Content *:</label><br>
                    <div class="mt-2 bg-white " wire:ignore>
                        <div x-data x-ref="quillEditor" x-init="
                                quill = new Quill($refs.quillEditor, {theme: 'snow'});
                                quill.on('text-change', function () {
                                $dispatch('input', quill.root.innerHTML);
                                }); " wire:model="page.content">
                                {!! $page_details['content'] !!}
                        </div>
                    </div>
                    <span class="text-red-600">@error('page.content'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="sub_heading2">Sub heading 2:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="page.sub_heading2" name="sub_heading2" id="sub_heading2" placeholder="" value="{{$page['sub_heading2']}}" />
                    <span class="text-red-600">@error('page.sub_heading2'){{$message}}@enderror</span>
                </div>
                
                <div class="py-4">
                    <label for="content2">Content 2:</label><br>
                    <div class="mt-2 bg-white " wire:ignore>
                        <div x-data x-ref="quillEditor" x-init="
                                quill2 = new Quill($refs.quillEditor, {theme: 'snow'});
                                quill2.on('text-change', function () {
                                $dispatch('input', quill2.root.innerHTML);
                                }); " wire:model="page.content2">
                                {!! $page_details['content2'] !!}
                        </div>
                    </div>
                    <span class="text-red-600">@error('page.content2'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="sub_heading3">Sub heading 3:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="page.sub_heading3" name="sub_heading3" id="sub_heading3" placeholder="" value="{{$page['sub_heading3']}}" />
                    <span class="text-red-600">@error('page.sub_heading3'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="content3">Content 3:</label><br>
                    <div class="mt-2 bg-white " wire:ignore>
                        <div x-data x-ref="quillEditor" x-init="
                                quill3 = new Quill($refs.quillEditor, {theme: 'snow'});
                                quill3.on('text-change', function () {
                                $dispatch('input', quill3.root.innerHTML);
                                }); " wire:model="page.content3">
                                {!! $page_details['content3'] !!}
                        </div>
                    </div>
                    <span class="text-red-600">@error('page.content3'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="sub_heading4">Sub heading 4:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="page.sub_heading4" name="sub_heading4" id="sub_heading4" placeholder="" value="{{$page['sub_heading4']}}" />
                    <span class="text-red-600">@error('page.sub_heading4'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="content4">Content 4:</label><br>
                    <div class="mt-2 bg-white " wire:ignore>
                        <div x-data x-ref="quillEditor" x-init="
                                quill4 = new Quill($refs.quillEditor, {theme: 'snow'});
                                quill4.on('text-change', function () {
                                $dispatch('input', quill4.root.innerHTML);
                                }); " wire:model="page.content4">
                                {!! $page_details['content4'] !!}
                        </div>
                    </div>
                    <span class="text-red-600">@error('page.content4'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="sub_heading5">Sub heading 5:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="page.sub_heading5" name="sub_heading5" id="sub_heading5" placeholder="" value="{{$page['sub_heading5']}}" />
                    <span class="text-red-600">@error('page.sub_heading5'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="content5">Content 5:</label><br>
                    <div class="mt-2 bg-white " wire:ignore>
                        <div x-data x-ref="quillEditor" x-init="
                                quill5 = new Quill($refs.quillEditor, {theme: 'snow'});
                                quill5.on('text-change', function () {
                                $dispatch('input', quill5.root.innerHTML);
                                }); " wire:model="page.content5">
                                {!! $page_details['content5'] !!}
                        </div>
                    </div>
                    <span class="text-red-600">@error('page.content5'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="sub_heading6">Sub heading 6:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="page.sub_heading6" name="sub_heading6" id="sub_heading6" placeholder="" value="{{$page['sub_heading6']}}" />
                    <span class="text-red-600">@error('page.sub_heading6'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="content6">Content 6:</label><br>
                    <div class="mt-2 bg-white " wire:ignore>
                        <div x-data x-ref="quillEditor" x-init="
                                quill6 = new Quill($refs.quillEditor, {theme: 'snow'});
                                quill6.on('text-change', function () {
                                $dispatch('input', quill6.root.innerHTML);
                                }); " wire:model="page.content6">
                                {!! $page_details['content6'] !!}
                        </div>
                    </div>
                    <span class="text-red-600">@error('page.content6'){{$message}}@enderror</span>
                </div>

            </div>
            <div class="">
                <input type="hidden" name="rand_id" id="rand_id" value="{{$page_details['rand_id']}}" />

                <div class="mt-8">
                    <a href="/{{$page_details['slug']}}" target="_blank" class="py-2 px-4 text-lg text-white bg-black rounded-md">View page in new tab</a>
                </div>

                <div class="mt-4 py-4">
                    <label for="slug">Page slug:</label><br>
                    <div class="w-full border-slate-200">/{{$page_details['slug']}}</div>
                </div>

                <div class="py-4">
                    <label for="meta_title">Meta title:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" name="meta_title" wire:model.defer="page.meta_title" id="meta_title" placeholder="enter meta title" value="{{$page_details['meta_title']}}" />
                </div>

                <div class="py-4">
                    <label for="meta_description">Meta description:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="page.meta_description" name="meta_description" id="meta_description" placeholder="enter meta description" value="{{$page_details['meta_description']}}" />
                </div>

                <div class="py-4">
                    <label for="parent">Parent:</label><br>
                    <select class="w-1/2 border-slate-200" wire:model.defer="page.parent" name="parent" id="parent">
                    <option value="None">None</option>
                    @foreach ($pages as $page)
                        @if ($page['name']==$page_details['parent'])
                        <option value="{{$page['name']}}" selected>{{$page['name']}}</option>
                        @else
                        <option value="{{$page['name']}}">{{$page['name']}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
                
                <div class="py-4">
                    <label for="menu">Menu:</label><br>
                    <select name="menu" id="menu" wire:model.defer="page.menu" class="border-slate-200">
                    <option value="">Select:</option>
                    <option value="Header">Header</option>
                    <option value="Footer">Footer</option>
                    </select>
                </div>
                
                <div class="py-4">
                    <label for="published">Published:</label><br>
                    <select name="published" id="published" wire:model.defer="page.published" class="border-slate-200">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    </select>
                </div>

                <div class="flex">
                    <div>
                        <button type="submit" class="py-2 px-4 text-lg text-white bg-black rounded-md">Save</button>
                    </div>
                </div>

                <div class="my-2">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                
            </div>

        </div>
        
    </form>

</div>
