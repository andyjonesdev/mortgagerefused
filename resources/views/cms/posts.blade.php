<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / Posts
        </h2>
    </x-slot>

<script>
    function handleClick(post_id) {
        var r = confirm('Are you sure you want to delete this post?');
        if (r) {
            console.log("post id = "+post_id);
            window.location.href = "/delete-post/"+post_id;
        }
    }
</script>

<div class="py-2 md:py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                
                <h1 class="text-4xl">Posts</h1>
                <p class="my-6"><a class="py-2 px-4 text-white rounded-md bg-black text-center" href="/add-post">Add post</a></p>

                @if (count($posts)==0)
                    <h3 class="py-4">Sorry, no posts found</h3>
                @else
                    <div class="hidden md:grid grid-cols-8 gap-4 font-bold">
                        <div class="mt-1 col-span-3 text-lg text-gray-700">Name</div>
                        <div class="mt-1 col-span-2 text-lg text-gray-700">Slug</div>
                        <div class="mt-1 text-lg text-gray-700">Published</div> 
                        <div class="mt-1 text-lg text-gray-700"></div>
                    </div>
                    @foreach ($posts as $post)
                        <div class="md:grid grid-cols-8 gap-4 py-4 border-b">
                            <div class="mt-2 col-span-3 text-lg">{{$post['name']}}</div>
                            <div class="hidden md:block mt-2 col-span-2 text-lg">/{{$post['slug']}}</div>
                            <div class="hidden md:block mt-2 text-lg">{{$post['published']}}</div>
                            <div class="text-lg flex gap-2">
                                <a class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center" href="{{"/".$post['slug']}}" target="_blank">view</a> 
                                <a class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center" href="{{"edit-post/".$post['id']}}">edit</a> 
                                <a onclick="handleClick({{$post['id']}})" class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center cursor-pointer">delete</a>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </div>
</div>
    
</x-app-layout>