<div>
    <form wire:submit.prevent="save">
        @csrf
        <div class="grid grid-cols-3 gap-4" x-data="{ name: '' }">
            <div class="col-span-3">
                <div class="py-4">
                    <label for="name">Post name/heading *:</label><br>
                    <input x-model="name" class="w-full text-3xl border-slate-200 py-3" wire:model="post.name" type="text" name="name" id="name" placeholder="enter name" value="" />
                    <span class="text-red-600">@error('post.name'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-span-2">
                <div class="py-4">
                    <label for="sub_title">Sub title *:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model="post.sub_title" name="sub_title" id="sub_title" placeholder="enter sub title" value="" />
                    <span class="text-red-600">@error('post.sub_title'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content">Content *:</label><br>
                    <div class="mt-2 bg-white " wire:ignore>
                        <div x-data x-ref="quillEditor" x-init="
                                quill = new Quill($refs.quillEditor, {theme: 'snow'});
                                quill.on('text-change', function () {
                                $dispatch('input', quill.root.innerHTML);
                                }); " wire:model="post.content">
                        </div>
                    </div>
                    <!-- <textarea class="w-full h-20px border-slate-200" wire:model="post.content" id="content" name="content" rows="10"></textarea> -->
                    <span class="text-red-600">@error('post.content'){{$message}}@enderror</span>
                </div>
                * required
            </div>
            <div class="">
                <input type="hidden" name="rand_id" id="rand_id" value="" />

                <div class="py-4">
                    <label for="meta_title">Meta title *:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model="post.meta_title" name="meta_title" id="meta_title" placeholder="enter meta title" value="" />
                    <br><span class="text-red-600">@error('post.meta_title'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="meta_description">Meta description *:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model="post.meta_description" name="meta_description" id="meta_description" placeholder="enter meta description" value="" />
                    <br><span class="text-red-600">@error('post.meta_description'){{$message}}@enderror</span>
                </div>
                
                <div class="py-4">
                    <label for="published">Published:</label><br>
                    <select name="published" id="published" wire:model="post.published" class="border-slate-200">
                    <option value="Yes">Yes</option>
                    <option value="No" selected>No</option>
                    </select>
                </div>

                <div class="flex">
                    <div>
                        <button type="submit" class="py-2 px-4 text-lg text-white bg-black rounded-md">Save</button>
                    </div>
                    <div>
                        <div class="p-2" x-data="{ title: '' }" @set-saved.window="title = $event.detail" x-init="setTimeout(() => {show = false;}, 4000)">
                            <h1 x-text="title"></h1>
                        </div>
                        @if ($showDiv)
                            <div class="p-2" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => {show = false;$dispatch('set-saved', 'Saved!')}, 1000)"><x-preloader /></div>
                        @endif
                    </div>
                </div>

                <div class="m-2">
                    @if (session()->has('message'))
                        <div class="alert alert-success" x-data="{ show2: true }" x-init="setTimeout(() => { show2 = false },3000)" x-show="show2">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                
            </div>

        </div>
        
    </form>
</div>
