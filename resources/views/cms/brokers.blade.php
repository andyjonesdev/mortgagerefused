<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / Brokers
        </h2>
    </x-slot>

    <script>
        function handleClick(broker_id) {
            var r = confirm('Are you sure you want to delete this broker?');
            if (r) {
                console.log("broker id = "+broker_id);
                window.location.href = "/delete-broker/"+broker_id;
            }
        }
    </script>

    <div class="py-2 md:py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($duplicate)
                        <h3 class="py-4 text-red-600">Sorry, a broker or admin user with that email address already exists</h3>
                    @endif

                    <form action="/addBroker" method="POST">
                        @csrf
                        <div class="py-4 bold text-2xl">
                            Add a new broker
                        </div>
                        <div class="md:flex gap-2">
                            <div class="py-4">
                                <label for="first_name">First Name *:</label><br>
                                <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="text" name="first_name" id="first_name" value="" />
                            </div>
                            <div class="py-4">
                                <label for="surname">Surname *:</label><br>
                                <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="text" name="surname" id="surname" value="" />
                            </div>
                        </div>
                        <div class="md:flex gap-2">
                            <div class="py-4">
                                <label for="email">Email *:</label><br>
                                <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="email" name="email" id="email" value="" />
                            </div>
                            <div class="py-4">
                                <label for="mobile">Mobile *:</label><br>
                                <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="tel" name="mobile" id="mobile" value="" />
                            </div>
                        </div>

                        <!-- <div class="py-4">
                            <label for="quote">Status *:</label><br>
                            <select name="status" class="mt-2">
                                <option value="">Select:</option>
                                @foreach ($statuses as $status)
                                    <option value="{{$status}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div> -->
                        * required
                        <p class="my-6"><button type="submit" class="py-2 px-4 text-white rounded-md bg-black text-center">Add broker</button></p>

                    </form>

                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                <h3 class="pt-10 py-4 text-2xl">List of brokers</h3>
                    @if (count($brokers)==0)
                        <h3 class="py-4">Sorry, no brokers found</h3>
                    @else
                        <div class="hidden md:grid grid-cols-9 gap-4 font-bold text-sm text-gray-700">
                            <!-- <div class="mt-1">Date</div> -->
                            <div class="mt-1">Name</div>
                            <div class="mt-1 col-span-2">Email</div>
                            <div class="mt-1">Mobile</div>
                            <div class="mt-1">Num Jobs</div>
                            <div class="mt-1">Status</div>
                            <div class="mt-1">Next Broker</div>
                            <div class="mt-1 col-span-2"></div>
                        </div>
                        @foreach ($brokers as $broker)
                            <div class="md:grid grid-cols-9 gap-5 pb-4 border-b text-sm">
                                <!-- <div class="mt-4">{{$broker['date']}}</div> -->
                                <div class="mt-4"><span class="md:hidden font-bold">Name: </span>{{$broker['name']}} {{$broker['surname']}}</div>
                                <div class="mt-4 col-span-2"><span class="md:hidden font-bold">Email: </span>{{$broker['email']}}</div>
                                <div class="mt-4"><span class="md:hidden font-bold">Tel: </span>{{$broker['mobile']}}</div>
                                <div class="mt-4"><span class="md:hidden font-bold">Num Jobs: </span>{{$broker['num_jobs']}}</div>
                                <div class="mt-4"><span class="md:hidden font-bold">Status: </span>{{$broker['available_today']}}</div>
                                <div class="mt-4"><span class="md:hidden font-bold">Next Broker: </span>
                                    @if ($broker['next_broker'])
                                        Yes
                                    @endif
                                </div>
                                <!-- <select name="" class="mt-2">
                                    @foreach ($statuses as $status)
                                        <option value="{{$status}}" <?php if ($broker['status']==$status) { ?>selected<?php } ?>>{{$status}}</option></div>
                                    @endforeach
                                </select> -->
                                <div class="mt-4 col-span-2 text-lg">
                                    <a href="/edit-broker/{{$broker['id']}}" class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center cursor-pointer">edit</a>
                                    <a href="/calendar/{{$broker['id']}}" class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center cursor-pointer">calendar</a>
                                    <a onclick="handleClick({{$broker['id']}})" class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center cursor-pointer">delete</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
