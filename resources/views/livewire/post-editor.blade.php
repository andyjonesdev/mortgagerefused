<div>
    <x-lean::console-log />
    <form wire:submit.prevent="save">
        @csrf
        <div class="md:grid grid-cols-3 gap-4" x-data="{ name: '{{$post_details['name']}}' }">
            <div class="col-span-3">
                <div class="py-4">
                    <label for="name">Post name/heading:</label><br>
                    <input x-model="name" class="w-full text-md md:text-3xl border-slate-200 py-3" wire:model="post.name" type="text" name="name" id="name" placeholder="enter name" value="" />
                    <span class="text-red-600">@error('post.name'){{$message}}@enderror</span>
                </div>
                
            </div>
            <div class="col-span-2">
                <div class="py-4">
                    <label for="sub_title">Sub title:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model="post.sub_title" name="sub_title" id="sub_title" placeholder="enter sub title" value="{{$post_details['sub_title']}}" />
                    <span class="text-red-600">@error('post.sub_title'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                
                    <label for="content">Content:</label><br>

                    <div class="mt-2 bg-white" wire:ignore>
                        <div x-data x-ref="quillEditor" x-init="
                                quill = new Quill($refs.quillEditor, {theme: 'snow'});
                                quill.on('text-change', function () {
                                $dispatch('input', quill.root.innerHTML);
                                }); " wire:model="post.content">
                            {!! $post_details['content'] !!}
                        </div>
                    </div>

                     <span class="text-red-600">@error('post.content'){{$message}}@enderror</span>

                </div>
                
            </div>
            <div class="">
                <input type="hidden" name="rand_id" id="rand_id" value="{{$post_details['rand_id']}}" />
                
                <div class="mt-8">
                    <a href="/{{$post_details['slug']}}" target="_blank" class="py-2 px-4 text-lg text-white bg-black rounded-md">View post in new tab</a>
                </div>

                <div class="mt-4 py-4">
                    <label for="slug">Post slug:</label><br>
                    <div class="w-full border-slate-200">/{{$post_details['slug']}}</div>
                </div>

                <div class="py-4">
                    <label for="meta_title">Meta title:</label><br>
                    <input class="w-full border-slate-200" type="text" name="meta_title" wire:model="post.meta_title" id="meta_title" placeholder="enter meta title" value="{{$post_details['meta_title']}}" />
                </div>

                <div class="py-4">
                    <label for="meta_description">Meta description:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model="post.meta_description" name="meta_description" id="meta_description" placeholder="enter meta description" value="{{$post_details['meta_description']}}" />
                </div>

                <div class="py-4">
                    <label for="published">Published:</label><br>
                    <select name="published" id="published" wire:model="post.published" class="border-slate-200">
                    @if ($post_details['published']=='Yes')
                    <option value="Yes" selected>Yes</option>
                    <option value="No">No</option>
                    @else
                    <option value="Yes">Yes</option>
                    <option value="No" selected>No</option>
                    @endif
                    </select>
                </div>

                <div class="py-4">
                    <label for="meta_description">Published date:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model="post.meta_description" name="meta_description" id="meta_description" placeholder="enter meta description" value="{{$post_details['meta_description']}}" />
                </div>

                <div class="flex">

                    <div>
                        <button type="submit" class="py-2 px-4 text-lg text-white bg-black rounded-md">Save</button>
                    </div>
                    <!-- <div>
                        <div class="p-2" x-data="{ title: '' }" @set-saved.window="title = $event.detail" x-init="setTimeout(() => {show = false;}, 4000)">
                            <h1 x-text="title"></h1>
                        </div>
                        @if ($showDiv)
                            <div class="p-2" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => {show = false;$dispatch('set-saved', 'Saved!')}, 1000)"><x-preloader /></div>
                        @endif
                    </div> -->
                </div>

                <div class="m-2">
                    @if (session()->has('message'))
                        <div class="alert alert-success" x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                
            </div>

        </div>
        
    </form>

</div>
