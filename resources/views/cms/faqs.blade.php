<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / Enquiries
        </h2>
    </x-slot>

<script>
    function handleClick(faq_id) {
        var r = confirm('Are you sure you want to delete this FAQ?');
        if (r) {
            console.log("faq id = "+faq_id);
            window.location.href = "/delete-faq/"+faq_id;
        }
    }
</script>

<div class="py-2 md:py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                
                <h1 class="text-4xl">FAQs</h1>

                <form action="addFAQ" method="POST">
                    @csrf
                    <div class="py-4">
                        <label for="name">Title *:</label><br>
                        <input class="w-full text-3xl border-slate-200 py-3" type="text" name="title" id="title" value="" />
                    </div>
            
                    <div class="py-4">
                        <label for="content">Content *:</label><br>
                        <!-- <div class="mt-2 bg-white " wire:ignore>
                            <div x-data x-ref="quillEditor" x-init="
                                    quill = new Quill($refs.quillEditor, {theme: 'snow'});
                                    quill.on('text-change', function () {
                                    $dispatch('input', quill.root.innerHTML);
                                    }); ">
                            </div>
                        </div> -->
                        <textarea class="w-full h-20px border-slate-200" id="content" name="content" rows="5"></textarea>
                    </div>
                    * required
                    <p class="my-6"><button type="submit" class="py-2 px-4 text-white rounded-md bg-black text-center">Add FAQ</button></p>

                </form>

                <h3 class="pt-10 text-2xl">List of FAQs</h3>
                @if (count($faqs)==0)
                    <h3 class="py-4">Sorry, no faqs found</h3>
                @else
                    <div class="hidden md:grid grid-cols-6 gap-4 font-bold">
                        <div class="mt-1 col-span-2 text-lg text-gray-700">Title</div>
                        <div class="mt-1 col-span-3 text-lg text-gray-700">Content</div>
                        <div class="mt-1 text-lg text-gray-700"></div>
                    </div>
                    @foreach ($faqs as $faq)
                        <div class="md:grid grid-cols-6 gap-4 py-4 border-b">
                            <div class="mt-2 col-span-2 text-lg"><b>{{$faq['title']}}</b></div>
                            <div class="mt-2 col-span-3 text-lg">{{$faq['content']}}</div>
                            <div class="text-lg flex gap-2">
                                <a class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center" href="{{"edit-faq/".$faq['id']}}">edit</a> 
                                <a onclick="handleClick({{$faq['id']}})" class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center cursor-pointer">delete</a>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </div>
</div>

</x-app-layout>
