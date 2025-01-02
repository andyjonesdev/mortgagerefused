<div>
    <script>
        function handleClick(e) {
            e.preventDefault;
            var r = confirm('Are you sure you want to delete this image?');
            if (r) {
                window.location.href = this.href;
            }
        }
    </script>
    
    <form wire:submit.prevent="save">
        @csrf
        <h2 class="text-3xl py-4">Post image</h2>
        <div class="grid grid-cols-4 gap-4" x-data="{ content_2: '' }"> 
         
            @foreach ($post_images as $index => $post_image)
                <div wire:key="images-field-{{ $post_image->id }}">
                    <div class="py-4">
                        <img class="py-4" src="{{ asset("storage/{$post_image->filename}") }}">
                        <label for="alt">Alt description:</label><br>
                        <input class="w-full border-slate-200" wire:model.defer="images.{{ $index }}.alt" type="text" value="{{$post_image->alt}}" />
                        <br><br>
                        <a @click="handleClick" href="/delete-image-post/{{ $post_image->id }}/{{ $post->slug }}" class="py-1 px-2 text-sm text-white bg-gray-500 rounded-md">Delete</a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="flex" x-data="{ submit: 'Save', preloader: false }">
            <div x-init="$watch('submit', value => console.log(value))">
                <button type="submit" class="py-2 px-4 text-lg text-white bg-black rounded-md" 
                x-show="submit" x-on:click="submit = !submit, preloader = ! preloader, setTimeout(() => {submit = !submit, preloader = ! preloader}, 1000)">Save Image Details</button>
            </div>
            
            <div x-show="preloader">
                <x-preloader />
            </div>
            
            <div>
                <div class="p-2" x-data="{ title: '' }" @set-saved.window="title = $event.detail, submit=true">
                    <h1 x-text="title" x-init="setTimeout(() => {show = false;}, 4000)"></h1>
                </div>
            </div>
        </div>

        <div class="my-2">
            @if (session()->has('message_images'))
                <div class="alert alert-success" x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">
                    {{ session('message_images') }}
                </div>
            @endif
        </div>

    </form>
</div>