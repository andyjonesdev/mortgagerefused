<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / <a href="/brokers/0">brokers</a> / <a href="/calendar">Calendar</a>
        </h2>
    </x-slot>

    @if (!$is_broker)
        <div class="mt-6 ml-6 md:ml-14"><a href="/brokers/0">&lt; <u>Back to brokers</u></a></div>
    @endif

    <div class="pt-6 pb-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="text-gray-900 text-lg px-6">
                    <div class="bg-white p-6">

                        <h3 class="text-2xl mb-4 font-semibold">Availability Calendar</h3>

                        <!-- <div class="py-2">Broker id: <b>{{$broker_id}}</b></div> -->
                        
                        <livewire:availability-calendar x-lean::console-log :broker_id="$broker_id" :read_only="$read_only" />

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>