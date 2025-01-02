<div>
    <form wire:submit.prevent="save">
        @csrf
        <div class="md:grid grid-cols-3 gap-4">
            <div class="col-span-3">
                <div class="py-4">
                    <label for="name">Page name/heading:</label><br>
                    <input class="w-full text-md md:text-3xl border-slate-200 py-3" wire:model.defer="home.name" type="text" name="name" id="name" placeholder="enter name" value="{{$home['name']}}" />
                    <span class="text-red-600">@error('home.name'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-span-2">
                <div class="py-4">
                    <label for="title">Title:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.title" name="title" id="title" placeholder="enter title" value="{{$home['title']}}" />
                    <span class="text-red-600">@error('home.title'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="sub_title">Sub title:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.sub_title" name="sub_title" id="sub_title" placeholder="enter sub title" value="{{$home['sub_title']}}" />
                    <span class="text-red-600">@error('home.sub_title'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="content_1">Header para:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="home.content_1" name="content_1" id="content_1" placeholder="" value="{{$home['content_1']}}" />
                    <span class="text-red-600">@error('home.content_1'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_2">Sub heading:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="home.content_2" name="content_2" id="content_2" placeholder="" value="{{$home['content_2']}}" />
                    <span class="text-red-600">@error('home.content_2'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_3">Sub content:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_3" id="content_3" name="content_3" rows="10">{{$home['content_3']}}</textarea>
                    <span class="text-red-600">@error('home.content_3'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_4">Step 1 heading:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_4" name="content_4" id="content_4" placeholder="" value="{{$home['content_4']}}" />
                    <span class="text-red-600">@error('home.content_4'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_5">Step 1 content:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_5" id="content_5" name="content_5" rows="10">{{$home['content_5']}}</textarea>
                    <span class="text-red-600">@error('home.content_5'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_6">Step 2 heading:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_6" name="content_6" id="content_6" placeholder="" value="{{$home['content_6']}}" />
                    <span class="text-red-600">@error('home.content_6'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_7">Step 2 content:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_7" id="content_7" name="content_7" rows="10">{{$home['content_7']}}</textarea>
                    <span class="text-red-600">@error('home.content_7'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_8">Step 3 heading:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_8" name="content_8" id="content_8" placeholder="" value="{{$home['content_8']}}" />
                    <span class="text-red-600">@error('home.content_8'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_9">Step 3 content:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_9" id="content_9" name="content_9" rows="10">{{$home['content_9']}}</textarea>
                    <span class="text-red-600">@error('home.content_9'){{$message}}@enderror</span>
                </div>

                <div class="py-4">
                    <label for="content_10">Step 4 heading:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_10" name="content_10" id="content_10" placeholder="" value="{{$home['content_10']}}" />
                    <span class="text-red-600">@error('home.content_10'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_11">Step 4 content:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_11" id="content_11" name="content_11" rows="10">{{$home['content_11']}}</textarea>
                    <span class="text-red-600">@error('home.content_11'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_12">Sub heading 2:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_12" name="content_12" id="content_12" placeholder="" value="{{$home['content_12']}}" />
                    <span class="text-red-600">@error('home.content_12'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_13">Sub content 2:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_13" id="content_13" name="content_13" rows="10">{{$home['content_13']}}</textarea>
                    <span class="text-red-600">@error('home.content_13'){{$message}}@enderror</span>
                </div>


                <div class="py-4">
                    <label for="content_14">Customers heading 1:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_14" name="content_14" id="content_14" placeholder="" value="{{$home['content_14']}}" />
                    <span class="text-red-600">@error('home.content_14'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_15">Customers content 1:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_15" id="content_15" name="content_15" rows="10">{{$home['content_15']}}</textarea>
                    <span class="text-red-600">@error('home.content_15'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_16">Customers heading 2:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_16" name="content_16" id="content_16" placeholder="" value="{{$home['content_16']}}" />
                    <span class="text-red-600">@error('home.content_16'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_17">Customers content 2:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_17" id="content_17" name="content_17" rows="10">{{$home['content_17']}}</textarea>
                    <span class="text-red-600">@error('home.content_17'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_18">Customers heading 3:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_18" name="content_18" id="content_18" placeholder="" value="{{$home['content_18']}}" />
                    <span class="text-red-600">@error('home.content_18'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_19">Customers content 3:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_19" id="content_19" name="content_19" rows="10">{{$home['content_19']}}</textarea>
                    <span class="text-red-600">@error('home.content_19'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_20">Customers heading 4:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_20" name="content_20" id="content_20" placeholder="" value="{{$home['content_20']}}" />
                    <span class="text-red-600">@error('home.content_20'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_21">Customers content 4:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_21" id="content_21" name="content_21" rows="10">{{$home['content_21']}}</textarea>
                    <span class="text-red-600">@error('home.content_21'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_22">Sub heading 3:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_22" name="content_22" id="content_22" placeholder="" value="{{$home['content_22']}}" />
                    <span class="text-red-600">@error('home.content_22'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_23">Sub sub heading 3:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" wire:model.defer="home.content_23" name="content_23" id="content_23" placeholder="" value="{{$home['content_23']}}" />
                    <span class="text-red-600">@error('home.content_23'){{$message}}@enderror</span>
                </div>
                <div class="py-4">
                    <label for="content_24">Sub content 3:</label><br>
                    <textarea class="ckeditor w-full h-20 border-slate-200" wire:model.defer="home.content_24" id="content_24" name="content_24" rows="10">{{$home['content_24']}}</textarea>
                    <span class="text-red-600">@error('home.content_24'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="">
                <input type="hidden" name="rand_id" id="rand_id" value="{{$home['rand_id']}}" />

                <div class="mt-8">
                    <a href="/" target="_blank" class="py-2 px-4 text-lg text-white bg-black rounded-md">View home in new tab</a>
                </div>

                <div class="py-4">
                    <label for="meta_title">Meta title:</label><br>
                    <input class="w-1/2 border-slate-200" type="text" name="meta_title" wire:model.defer="home.meta_title" id="meta_title" placeholder="enter meta title" value="{{$home['meta_title']}}" />
                </div>

                <div class="py-4">
                    <label for="meta_description">Meta description:</label><br>
                    <input class="w-full border-slate-200" type="text" wire:model.defer="home.meta_description" name="meta_description" id="meta_description" placeholder="enter meta description" value="{{$home['meta_description']}}" />
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
