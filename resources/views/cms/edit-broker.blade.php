<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
        <a href="/dashboard">Dashboard</a> / <a href="/brokers/0">Brokers</a> / Edit
        </h2>
    </x-slot>

    <div class="py-2 md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <form action="editBroker" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$broker_details['id']}}" />
                  
                    <div class="py-4">
                        <label for="quote_maker">First Name *:</label><br>
                        <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="text" name="first_name" id="first_name" value="{{$broker_details['name']}}" />
                    </div>
                    <div class="py-4">
                        <label for="quote_maker">Surname *:</label><br>
                        <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="text" name="surname" id="surname" value="{{$broker_details['surname']}}" />
                    </div>
                    <div class="py-4">
                        <label for="quote_maker">Email *:</label><br>
                        <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="text" name="email" id="email" value="{{$broker_details['email']}}" />
                    </div>
                    <div class="py-4">
                        <label for="quote_maker">Mobile *:</label><br>
                        <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="text" name="mobile" id="mobile" value="{{$broker_details['mobile']}}" />
                    </div>
            
                    <!-- <div class="py-4">
                        <label for="quote">Status *:</label><br>
                        <select name="status" class="mt-2">
                            @foreach ($statuses as $status)
                                <option value="{{$status}}">{{$status}}</option></div>
                            @endforeach
                        </select>
                    </div> -->
                    
                    <p class="my-6"><button type="submit" class="py-2 px-4 text-white rounded-md bg-black text-center">Save</button></p>

                </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>