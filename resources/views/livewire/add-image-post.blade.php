<div>
<form wire:submit.prevent="save">
    @csrf
    <div class="col-span-3 py-4">

    <h2 class="text-2xl py-4">Add an image</h2>
    <input type="file" wire:model="photo" id="main_image" class="pt-2 pb-6">
    
    @if ($photo)
        <br>Photo Preview:<br>
        <img src="{{ $photo->temporaryUrl() }}" class="pb-4">
    @endif
    @error('photo') <span class="error">{{ $message }}</span> @enderror

    <div wire:loading wire:target="photo">Uploading...</div>

    <div x-data="{ isUploading: false, progress: 0 }"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false"
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">

        <!-- Progress Bar -->
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress"></progress>
        </div>
    </div>

    <div class="flex" x-data="{ submit: 'Save', preloader: false }">
        <div x-init="$watch('submit', value => console.log(value))">
            <button type="submit" class="py-2 px-4 text-lg text-white bg-black rounded-md" 
            x-show="submit" x-on:click="submit = !submit, preloader = ! preloader, setTimeout(() => {submit = !submit, preloader = ! preloader}, 1000)">Save Image</button>
        </div>
        
        <div x-show="preloader">
            <x-preloader /></div>
        </div>
        <div>
            <div class="p-2" x-data="{ title: '' }" @set-saved.window="title = $event.detail, submit=true">
                <h1 x-text="title" x-init="setTimeout(() => {show = false;}, 4000)"></h1>
            </div>
        </div>
    </div>

    </div>

</form>