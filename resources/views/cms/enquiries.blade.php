<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / Enquiries
        </h2>
    </x-slot>

    <div class="mt-6 ml-4 md:ml-14"><a href="/dashboard">&lt; <u>Back to dashboard</u></a></div>

    <script>
        var status = '<?php echo $filter_status; ?>';
        var broker = <?php echo $filter_broker; ?>;
        function handleClick(enquiry_id) {
            var r = confirm('Are you sure you want to delete this enquiry?');
            if (r) {
                console.log("enquiry id = "+enquiry_id);
                window.location.href = "/delete-enquiry/"+enquiry_id;
            }
        }
        function filterOnStatus(new_status) {
            console.log("new_status = "+new_status);
            status = new_status.toLowerCase();
            status = status.replace(/ /g,'-');
            window.location.href = "/enquiries/"+status+"/"+broker;
        }
        function filterOnBroker(new_broker) {
            console.log("new_broker = "+new_broker);
            broker = new_broker;
            window.location.href = "/enquiries/"+status+"/"+broker;
        }
    </script>

    <div class="py-2 md:py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="py-4 text-2xl font-semibold">List of enquiries</h3>

                    @if(!$is_broker)
                        <p><b>Export</b></p>
                        <form action="{{ route('exportData') }}" method="POST">
                            @csrf
                            <div date-rangepicker class="flex items-center mb-8">
                                <div class="relative">
                                    <input type="date" name="start" placeholder="Start date" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative mr-4">
                                    <input type="date" name="end" placeholder="End date" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                </div>
                                <input type="submit" value="Export CSV" class="px-4 py text-lg text-white rounded-md bg-black text-center">
                            </div>
                        </form>
                    @endif

                    <div class="flex gap-8">
                        <div class="pb-6">Filter by status: 
                            <select name="" class="mt-2" onchange="filterOnStatus(this.value)"">
                                <option value="all" <?php if ($filter_status=='all') { ?>selected<?php } ?>>All</option>
                                @foreach ($statuses as $status)
                                    <option value="{{$status}}" <?php if ($filter_status==$status) { ?>selected<?php } ?>>{{$status}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="pb-6">Filter by broker: 
                            <select name="" class="mt-2" onchange="filterOnBroker(this.value)">
                                <option value="0" <?php if ($filter_broker==0) { ?>selected<?php } ?>>All</option>
                                @foreach ($brokers_select as $broker_select)
                                    <option value="{{$broker_select->id}}" <?php if ($filter_broker==$broker_select->id) { ?>selected<?php } ?>>{{$broker_select->name}} {{$broker_select->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if (count($enquiries)==0)
                        <h3 class="py-4">Sorry, no enquiries found</h3>
                    @else
                        <div class="hidden md:grid grid-cols-12 gap-8 font-bold text-sm text-gray-700">
                            <div class="mt-1">Date</div>
                            <div class="mt-1 col-span-2">Name</div>
                            <div class="mt-1 col-span-2">Email</div>
                            <div class="mt-1 col-span-2">Mobile</div>
                            <div class="mt-1 col-span-2">Broker</div>
                            <div class="mt-1 col-span-2">Status</div>
                            <div class="mt-1"></div>
                        </div>
                        @php
                            $i = 0;
                            foreach ($enquiries as $enquiry) {
                                @endphp
                                <div class="md:grid grid-cols-12 gap-8 pb-4 border-b text-sm">
                                    <div class="mt-4"><span class="md:hidden font-bold">Date: </span>{{$enquiry['date']}}</div>
                                    <div class="mt-4 col-span-2"><span class="md:hidden font-bold">Name: </span>{{$enquiry['first_name']}} {{$enquiry['surname']}}</div>
                                    <div class="mt-4 col-span-2"><span class="md:hidden font-bold">Email: </span>{{$enquiry['email']}}</div>
                                    <div class="mt-4 col-span-2"><span class="md:hidden font-bold">Mobile: </span>{{$enquiry['mobile']}}</div>
                                    <div class="mt-4 col-span-2"><span class="md:hidden font-bold">Mobile: </span>{{$enquiry['broker_name']}}</div>
                                    <div class="mt-4 col-span-2"><span class="md:hidden font-bold">Status: </span>{{$enquiry['status']}}</div>
                                    <div class="mt-4 text-lg">
                                        <a href="/enquiry/{{$enquiry['id']}}" class="text-black underline">view</a>
                                        <!-- <a onclick="handleClick({{$enquiry['id']}})" class="text-black underline">delete</a> -->
                                    </div>
                                </div>
                                @php $i++;
                            }
                        @endphp
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
