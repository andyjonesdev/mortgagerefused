<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
        <a href="/dashboard">Dashboard</a> / <a href="/testimonials">Testimonials</a> / Edit
        </h2>
    </x-slot>

    <div class="py-2 md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <form action="editTestimonial" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$testimonial_details['id']}}" />
                    <div class="py-4">
                        <label for="name">Quote maker:</label><br>
                        <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="text" name="quote_maker" id="quote_maker" value="{{$testimonial_details['quote_maker']}}" />
                    </div>
            
                    <div class="py-4">
                        <label for="content">Quote:</label><br>
                        <textarea class="w-full h-20px border-slate-200" id="quote" name="quote" rows="10">{{$testimonial_details['quote']}}</textarea>
                    </div>
                    
                    <p class="my-6"><button type="submit" class="py-2 px-4 text-white rounded-md bg-black text-center">Save</button></p>

                </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>