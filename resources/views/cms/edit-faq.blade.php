<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / Enquiries
        </h2>
    </x-slot>

<div class="py-2 md:py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                
                <h1 class="text-4xl">Edit FAQ</h1>

                <form action="editFAQ" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$faq_details['id']}}" />
                    <div class="py-4">
                        <label for="name">Title:</label><br>
                        <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="text" name="title" id="title" value="{{$faq_details['title']}}" />
                    </div>
            
                    <div class="py-4">
                        <label for="content">Content:</label><br>
                        <textarea class="w-full h-20px border-slate-200" id="content" name="content" rows="10">{{$faq_details['content']}}</textarea>
                    </div>
                    
                    <p class="my-6"><button type="submit" class="py-2 px-4 text-white rounded-md bg-black text-center">Save</button></p>

                </form>
                
            </div>
        </div>
    </div>
</div>
    
</x-app-layout>