<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / <a href="/enquiries/all">Enquiries</a> / View
        </h2>
    </x-slot>

    <div class="mt-6 ml-6 md:ml-14"><a href="/enquiries/all/0">&lt; <u>Back to enquiries</u></a></div>

    <div class="pt-6 pb-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="text-gray-900 text-lg md:flex gap-6 justify-evenly">
                    <div class="p-6 md:w-1/2 bg-white shadow-sm sm:rounded-lg">

                        <h3 class="text-2xl mb-4 font-semibold">Enquiry details</h3>

                        <!-- <div class="flex gap-2"> -->
                            <div class="py-2 border-b border-gray-300">Enquirer Name: <b>{{$enquiry['first_name']}} {{$enquiry['surname']}}</b></div>
                            <div class="py-2 border-b border-gray-300">Mobile: <b>{{$enquiry['mobile']}}</b></div>
                            <div class="py-2 border-b border-gray-300">Email: <b>{{$enquiry['email']}}</b></div>
                        <!-- </div> -->

                        @if ($broker)
                        <!-- <div class="flex w-1/2"> -->
                            <div class="py-2 border-b border-gray-300 w-full">Broker: <b>{{$broker['name']}} {{$broker['surname']}}</b></div>
                            <div class="py-2 border-b border-gray-300 w-full">Broker Status: <b>{{$broker['status']}}</b></div>
                        <!-- </div> -->
                        @else
                        <!-- <div class="flex w-1/2"> -->
                            <div class="py-2 border-b border-gray-300 w-full">Broker: <b>Not assigned</b></div>
                        <!-- </div> -->
                        @endif

                        <div class="py-2 border-b border-gray-300 w-full">Other info: <b>{{$enquiry['other_info']}}</b></div>
                        <div class="py-2 border-b border-gray-300 w-full">Purpose: <b>{{$enquiry['purpose']}}</b></div>
                        <div class="py-2 border-b border-gray-300 w-full">Price/value of property: <b>£{{$enquiry['value']}}</b></div>
                        <div class="py-2 border-b border-gray-300 w-full">Would like to borrow: <b>£{{$enquiry['borrow']}}</b></div>
                        <!-- <div class="flex gap-2"> -->
                        <div class="py-2 border-b border-gray-300 w-full">Bankruptcy or IVA: <b>{{$enquiry['bankruptcy']}}</b></div>
                        <div class="py-2 border-b border-gray-300 w-full">Debt management plan: <b>{{$enquiry['debt']}}</b></div>
                        <div class="py-2 border-b border-gray-300 w-full">CCJ - defaults: <b>{{$enquiry['ccj']}}</b></div>
                        <div class="py-2 border-b border-gray-300 w-full">Missed mortgage payments: <b>{{$enquiry['missed']}}</b></div>
                        <!-- </div> -->
                        <div class="py-2 border-b border-gray-300 w-full">Employment status: <b>{{$enquiry['status']}}</b></div>
                        <div class="py-2 border-b border-gray-300 w-full">Trading in the last 12 months: <b>{{$enquiry['trading_12_months']}}</b></div>
                        <div class="py-2 border-b border-gray-300 w-full">Income: <b>£{{$enquiry['income']}}</b></div>
                        <div class="py-2 border-b border-gray-300 w-full">Call back requested: <b>{{$enquiry['callback']}}</b></div>
                    </div>
                    <div class="p-6 md:w-1/2 bg-white shadow-sm sm:rounded-lg">
                                                
                        <h3 class="text-2xl mb-4 font-semibold">Broker notes</h3>
                        <livewire:broker-notes :enquiry='$enquiry' />

                        <h3 class="text-2xl mt-8 mb-4 font-semibold">Status</h3>
                        <div id="status_error" class="text-red-400 my-4"></div>
                        <livewire:enquiry-status-select :enquiry="$enquiry" :statuses="$statuses" />
                        
                        @if ($is_admin || $is_super_admin)
                            <h3 class="text-2xl mt-8 mb-4 font-semibold">Re-Assign Broker</h3>
                            <form action="/reAssignBroker" method="POST">
                                @csrf
                                <select name="broker_id">
                                    <option value="">Select</option>
                                    @foreach ($brokers_select as $broker_select)
                                        @if ($broker_select->id!=$broker['id'])
                                            <option value="{{$broker_select->id}}">{{$broker_select->name}} {{$broker_select->surname}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <input class="py-2 px-4 text-lg text-white bg-black rounded-md" type="submit" />
                                <input name="enquiry_id" value="{{$enquiry->id}}" type="hidden" />
                            </form>
                        @endif
                    </div>
                </div>

                <div class="">

                
                </div>
            </div>
        </div>
    </div>

    <script>
    window.addEventListener('Exception', event => {
        //alert('An error occurred: ' + event.detail.message);
        var status_error = document.getElementById("status_error");
        // console.log('status_error = '+status_error);
        status_error.innerHTML = event.detail.message;
    })
    </script>
</x-app-layout>