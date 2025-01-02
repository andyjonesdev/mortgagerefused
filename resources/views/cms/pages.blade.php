<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / Pages
        </h2>
    </x-slot>

    <div class="py-2 md:py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <p class="mt-4 mb-10"><a class="px-10 py-4 bg-black text-white text-center font-bold rounded-md" href="/add-page">Create a new page &gt;</a></p>
                
                @if (count($pages)==0)
                    <h3 class="py-4">Sorry, no pages found</h3>
                @else
                    <div class="hidden md:grid grid-cols-11 gap-4 font-bold">
                        <div class="mt-1 text-lg text-gray-700"></div>
                        <div class="mt-1 col-span-2 text-lg text-gray-700">Name</div>
                        <div class="mt-1 col-span-2 text-lg text-gray-700">Slug</div>
                        <div class="mt-1 text-lg text-gray-700">Published</div> 
                        <div class="mt-1 text-lg text-gray-700">Parent</div>
                        <div class="mt-1 text-lg text-gray-700">Menu</div>
                        <!-- <div class="mt-1 text-lg text-gray-700">Order</div> -->
                        <div class="mt-1 text-lg text-gray-700"></div>
                    </div>
                    @foreach ($pages as $page)
                        <div class="md:grid grid-cols-11 gap-4 py-4 border-b">
                            
                            <!-- <div class="mt-1 text-lg text-gray-700">
                                @if ($page['order']>1)    
                                    <a href="/moveup/{{$page['id']}}">&#8593;</a>
                                @endif
                                @if ($page['order']<count($pages))    
                                    <a href="/movedown/{{$page['id']}}"> &#8595;</a>
                                @endif
                            </div> -->
                            <div class="mt-2 col-span-2 text-lg"><span class="md:hidden font-bold">Name: </span>{{$page['name']}}</div>
                            <div class="mt-2 col-span-2 text-lg"><span class="md:hidden font-bold">Slug: </span>{{$page['slug']}}</div>

                            @if ($page['name']=='Home')
                            <div class="mt-2 text-lg"><span class="md:hidden font-bold">Published: </span>Yes</div>
                            @else
                            <div class="mt-2 text-lg"><span class="md:hidden font-bold">Published: </span>{{$page['published']}}</div>
                            @endif

                            <div class="mt-2 text-lg"><span class="md:hidden font-bold">Parent: </span>{{$page['parent']}}</div>

                            @if ($page['name']=='Home')
                            <div class="mt-2 text-lg"><span class="md:hidden font-bold">Menu: </span>Header</div>
                            @else
                            <div class="mt-2 text-lg"><span class="md:hidden font-bold">Menu: </span>{{$page['menu']}}</div>
                            @endif

                            <!-- <div class="mt-2 text-lg">{{$page['order']}}</div> -->
                            
                            <div class="text-lg flex gap-2">
                                @if ($page['name']=='Home')
                                <a class="py-2 px-4 text-white rounded-md bg-black text-center" href="/" target="_blank">view</a>
                                <a class="py-2 px-4 text-white rounded-md bg-black text-center" href="{{"edit-page-home/".$page['slug']}}">edit</a> 
                                @else
                                <a class="py-2 px-4 text-white rounded-md bg-black text-center" href="{{"/".$page['slug']}}" target="_blank">view</a>
                                <a class="py-2 px-4 text-white rounded-md bg-black text-center" href="{{"edit-page/".$page['slug']}}">edit</a> 
                                @endif
                                <a onclick="handleClick({{$page['id']}})" class="py-2 px-4 text-white rounded-md bg-black text-center cursor-pointer">delete</a>
                            </div>
                        </div>
                    @endforeach

                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function handleClick(page_id) {
        var r = confirm('Are you sure you want to delete this page?');
        if (r) {
            console.log("page_id id = "+page_id);
            window.location.href = "/delete-page/"+page_id;
        }
    }
</script>
