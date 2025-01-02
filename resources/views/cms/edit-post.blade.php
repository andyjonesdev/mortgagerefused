<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/posts">Posts</a> > Edit post
        </h2>
    </x-slot>
    
<div class="py-2 md:py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            <livewire:post-editor :post_details='$post_details' :posts='$posts' x-lean::console-log />

            <!-- Only allow one image for a post -->

            @if (count($post_images)>0)
                <hr class="my-10">
                <livewire:post-images :post_details='$post_details' :post_images='$post_images' />
            @endif
            
            @if (count($post_images)==0)
                <hr class="my-10">
                <livewire:add-image-post :post_details='$post_details' :post_images='$post_images' />
            @endif
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>