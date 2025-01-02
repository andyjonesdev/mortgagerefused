<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / Testimonials
        </h2>
    </x-slot>

    <script>
        function handleClick(testimonial_id) {
            var r = confirm('Are you sure you want to delete this testimonial?');
            if (r) {
                console.log("testimonial id = "+testimonial_id);
                window.location.href = "/delete-testimonial/"+testimonial_id;
            }
        }
    </script>

    <div class="py-2 md:py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="addTestimonial" method="POST">
                        @csrf
                        <div class="py-4">
                            <label for="quote_maker">Quote maker *:</label><br>
                            <input class="w-full text-3xl border-slate-200 py-3" type="text" name="quote_maker" id="quote_maker" value="" />
                        </div>
                
                        <div class="py-4">
                            <label for="quote">Quote *:</label><br>
                            <textarea class="w-full h-20px border-slate-200" id="quote" name="quote" rows="5"></textarea>
                        </div>
                        * required
                        <p class="my-6"><button type="submit" class="py-2 px-4 text-white rounded-md bg-black text-center">Add testimonial</button></p>

                    </form>

                    <h3 class="pt-10 py-4 text-2xl">List of testimonials</h3>
                    @if (count($testimonials)==0)
                        <h3 class="py-4">Sorry, no testimonials found</h3>
                    @else
                        <div class="hidden md:grid grid-cols-6 gap-4 font-bold">
                            <div class="mt-1 col-span-2 text-lg text-gray-700">Quote Maker</div>
                            <div class="mt-1 col-span-3 text-lg text-gray-700">Quote</div>
                            <div class="mt-1 text-lg text-gray-700"></div>
                        </div>
                        @foreach ($testimonials as $testimonial)
                            <div class="md:grid grid-cols-6 gap-4 pb-4 border-b">
                                <div class="mt-2 col-span-2 text-lg"><b>{{$testimonial['quote_maker']}}</b></div>
                                <div class="mt-2 col-span-3 text-lg">{{$testimonial['quote']}}</div>
                                <div class="text-lg flex gap-2">
                                    <a class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center" href="{{"edit-testimonial/".$testimonial['id']}}">edit</a> 
                                    <a onclick="handleClick({{$testimonial['id']}})" class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center cursor-pointer">delete</a>
                                </div>
                            </div>
                        @endforeach

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
