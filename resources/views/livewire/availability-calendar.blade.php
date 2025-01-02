<div class="flex gap-2">
    
    <x-lean::console-log />

    <form wire:submit.prevent="save" class="w-full">
        @csrf
        <div class="mt-4 md:mt-0" x-data="{current_year: @entangle('current_year'), current_month: @entangle('current_month'), 
            available_days: @entangle('available_days'), show_back_arrow: @entangle('show_back_arrow'), show_forward_arrow: @entangle('show_forward_arrow'),
            broker_name: @entangle('broker_name')}">

                <div class="flex justify-between">
                    <div>
                        @if ($read_only)
                            <p class="pt-2 pb-6">Broker: {{$broker_name}}</p>
                        @endif
                    </div>
                    <div class="hidden md:flex gap-2 mb-4">
                        <div class="pt-2">Key:</div>
                        <div class="p-2 text-center border-gray-300 hover:bg-sky-700 hover:text-white; bg-green-200 w-fit">Available</div>
                        <div class="p-2 text-center border-gray-300 hover:bg-sky-700 hover:text-white; bg-red-300 w-fit">Unavailable</div>
                    </div>
                </div>

                <!-- {{$available_days}} -->
                <input type="hidden" x-model="current_month" value="current_month" class="text-black" />
                
                <template x-for="month in available_days">
                    <div x-show="current_month==month[0].month && current_year==month[0].year">
                        <div class="flex justify-between">
                            <a href="" @click.prevent="$wire.decreaseMonth()" x-show="show_back_arrow"><div class="rounded-xl w-6 h-6 border-blue-200 pl-1.5" :class="{ 'bg-blue-200': current_month >= '0'}">&lt;</div></a>
                            <div class="rounded-xl w-6 h-6 bg-gray-200 pl-1.5" x-show="!show_back_arrow"></div>
                            <div class="flex">
                                <div x-text="month[0].month_name" class="text-center pb-2"></div>
                                <div>, {{$current_year}}</div>
                            </div>
                            <a href="" @click.prevent="$wire.increaseMonth()" x-show="show_forward_arrow"><div class="rounded-xl w-6 h-6 border-blue-200 pl-1.5" :class="{ 'bg-blue-200': current_month >= '1'}">&gt;</div></a>
                            <div class="rounded-xl w-6 h-6 bg-gray-200 pl-1.5" x-show="!show_forward_arrow"></div>
                        </div>
                        <!-- <div x-text="month[0].days_to_add"></div> -->
                        <!-- <div x-text="month[0].last_day"></div> -->
                        <!-- <div x-text="month[0].day_of_week_end"></div> -->
                        <!-- <div x-text="month[0].extra_days"></div> -->
                        <!-- <div x-text="month[0].extra_days_end"></div> -->

                        <div class="grid grid-cols-7 gap-2 w-full text-center">
                            <div class="">Mon</div>
                            <div class="">Tue</div>
                            <div class="">Wed</div>
                            <div class="">Thu</div>
                            <div class="">Fri</div>
                            <div class="">Sat</div>
                            <div class="">Sun</div>
                        </div>

                        <div x-init="" class="grid grid-cols-7 gap-2 w-full">
                            
                            <template x-data="{day:1}" x-for="extra_day in month[0].extra_days">
                                <div class="p-2 text-center bg-gray-100"></div>  
                            </template>

                            <template x-data="{day:1}" x-for="day in month">
                                <div x-data="{year:day.year, month:day.month, date:day.day, clicked:false, date_display:day.date_display}">

                                    <!-- @if ($read_only)
                                        <div class="px-0 py-2 md:p-2 text-center border-gray-300 hover:bg-sky-700 hover:text-white text-xs md:text-lg" :class="{ 
                                        'bg-green-200' : available === 1,
                                        'bg-red-300' : available === 0,
                                        'bg-red-500' : clicked,}" x-text="day.date_display" x-data="{available: day.available}"></div>
                                    @else
                                        <a href="" x-on:click.prevent="$wire.updateAvailability(day.year,day.month,day.day), clicked = ! clicked"
                                        x-data="{available: day.available}" wire:key="day.year_day.month_day.day">
                                        <div class="px-0 py-2 md:p-2 text-center border-gray-300 hover:bg-sky-700 hover:text-white text-xs md:text-lg" :class="{ 
                                        'bg-green-200' : available === 1,
                                        'bg-red-300' : available === 0,
                                        'bg-red-500' : clicked,}" x-text="day.date_display"></div></a>
                                    @endif  -->

                                    <a href="" x-on:click.prevent="$wire.updateAvailability(day.year,day.month,day.day), clicked = ! clicked"
                                        x-data="{available: day.available}" wire:key="day.year_day.month_day.day">
                                        <div class="px-0 py-2 md:p-2 text-center border-gray-300 hover:bg-sky-700 hover:text-white text-xs md:text-lg" :class="{ 
                                        'bg-green-200' : available === 1,
                                        'bg-red-300' : available === 0,
                                        'bg-orange-400' : clicked,}" x-text="day.date_display"></div></a>
                                </div>
                            </template>

                            <template x-data="{day:1}" x-for="extra_day in month[0].extra_days_end">
                                <div class="p-2 text-center bg-gray-100"></div>  
                            </template>

                        </div>
                    </div>
                </template>

        </div>

    </form>

</div>
