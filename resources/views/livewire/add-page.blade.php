<div>
    <form wire:submit.prevent="save">
        @csrf
        <div class="grid grid-cols-3 gap-4" x-data="{ name: '' }">
            <div class="col-span-3">
                <div class="py-4">
                    <label for="name">Page name/heading *:</label><br>
                    <input x-model="name" class="w-full text-3xl border-slate-200 py-3" wire:model.defer="page.name" type="text" name="name" id="name" placeholder="enter name" value="" />
                    <span class="text-red-600">@error('page.name'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-span-2">
            <div class="py-4">
                    <label for="header_para">Header para:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="page.header_para" name="header_para" id="header_para" placeholder="" value="{{$page['header_para']}}" />
                    <span class="text-red-600">@error('page.header_para'){{$message}}@enderror</span>
                </div>
            <div class="py-4">
                    <label for="content">Content *:</label><br>
                    <div class="mt-2 bg-white " wire:ignore>
                        <div x-data x-ref="quillEditor" x-init="
                                quill = new Quill($refs.quillEditor, {theme: 'snow'});
                                quill.on('text-change', function () {
                                $dispatch('input', quill.root.innerHTML);
                                }); " wire:model="page.content">
                        </div>
                    </div>
                    <span class="text-red-600">@error('page.content'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="">
                <input type="hidden" name="rand_id" id="rand_id" value="" />

                <div class="py-4">
                    <label for="meta_title">Meta title *:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="page.meta_title" name="meta_title" id="meta_title" placeholder="enter meta title" value="" />
                    <br><span class="text-red-600">@error('page.meta_title'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="meta_description">Meta description *:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="page.meta_description" name="meta_description" id="meta_description" placeholder="enter meta description" value="" />
                    <br><span class="text-red-600">@error('page.meta_description'){{$message}}@enderror</span>
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
                
            </div>

        </div>
        
    </form>
</div>
