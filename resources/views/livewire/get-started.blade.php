<div class="flex gap-2">
    <style>
        .swiper { width: 800px; height: auto; }

        @media only screen and (max-width: 768px) {
            .swiper { width: auto; height: auto; }
        }
    </style>
    <x-lean::console-log />
    <form wire:submit.prevent="save" class="w-full md:w-auto">
        @csrf
        <div class="mt-4 md:mt-0" 
            x-data="{stage: @entangle('stage'), stages_complete: @entangle('stages_complete'), purpose: @entangle('enquiry.purpose'), value: @entangle('enquiry.value'), borrow: @entangle('enquiry.borrow'), borrow_max_fraction: 0.95, borrow_percentage: @entangle('enquiry.borrow_percentage'), bankruptcy: @entangle('enquiry.bankruptcy'), 
                debt: @entangle('enquiry.debt'), ccj: @entangle('enquiry.ccj'), missed: @entangle('enquiry.missed'), elsewhere: @entangle('enquiry.elsewhere'), other: @entangle('enquiry.other'), last_6_years: @entangle('last_6_years'), employment_status: @entangle('enquiry.employment_status'), income: @entangle('enquiry.income'), income_min: 0, 
                status_chosen: @entangle('status_chosen'), trading: @entangle('enquiry.trading'), trading_12_months: @entangle('enquiry.trading_12_months'), callback: @entangle('enquiry.callback'), notready: @entangle('notready'), sure: @entangle('sure'), 
                first_name: @entangle('enquiry.first_name'), surname: @entangle('enquiry.surname'), mobile: @entangle('enquiry.mobile'), email: @entangle('enquiry.email'), 
                other_info: @entangle('enquiry.other_info'), privacy: @entangle('enquiry.privacy'), privacy_message: @entangle('privacy_message'), question: @entangle('question') }">

                <a href="" @click.prevent="showStage(0), stage = 0"><div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" :class="{ 'bg-orange-600': stage >= '0'}"></div></a>
                <div class="hidden md:inline-block w-12 h-1 mb-4 align-middle inline-block bg-red-300" :class="{'border-y-2 border-solid border-orange-600' : stage >= '1'}"></div>

                <a href="" @click.prevent="showStage(1), stage = 1" x-show="stage>0"><div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" :class="{ 'bg-orange-600': stage >= '1'}"></div></a>
                <div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" x-show="stage<1"></div>
                <div class="hidden md:inline-block w-12 h-1 mb-4 align-middle inline-block bg-red-300" :class="{'border-y-2 border-solid border-orange-600' : stage >= '2'}"></div>

                <a href="" @click.prevent="showStage(2), stage = 2" x-show="stage>1"><div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" :class="{ 'bg-orange-600': stage >= '2'}"></div></a>
                <div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" x-show="stage<2"></div>
                <div class="hidden md:inline-block w-12 h-1 mb-4 align-middle inline-block bg-red-300" :class="{'border-y-2 border-solid border-orange-600' : stage >= '3'}"></div>

                <a href="" @click.prevent="showStage(3), stage = 3" x-show="stage>2"><div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" :class="{ 'bg-orange-600': stage >= '3'}"></div></a>
                <div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" x-show="stage<3"></div>
                <div class="hidden md:inline-block w-12 h-1 mb-4 align-middle inline-block bg-red-300" :class="{'border-y-2 border-solid border-orange-600' : stage >= '4'}"></div>

                <a href="" @click.prevent="showStage(4), stage = 4" x-show="stage>3"><div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" :class="{ 'bg-orange-600': stage >= '4'}"></div></a>
                <div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" x-show="stage<4"></div>
                <div class="hidden md:inline-block w-12 h-1 mb-4 align-middle inline-block bg-red-300" :class="{'border-y-2 border-solid border-orange-600' : stage >= '5'}"></div>

                <a href="" @click.prevent="showStage(5), stage = 5" x-show="stage>4"><div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" :class="{ 'bg-orange-600': stage >= '5'}"></div></a>
                <div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" x-show="stage<5"></div>
                <div class="hidden md:inline-block w-12 h-1 mb-4 align-middle inline-block bg-red-300" :class="{'border-y-2 border-solid border-orange-600' : stage >= '6'}"></div>

                <a href="" @click.prevent="showStage(6), stage = 6" x-show="stage>5"><div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" :class="{ 'bg-orange-600': stage >= '6'}"></div></a>
                <div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" x-show="stage<6"></div>
                <div class="hidden md:inline-block w-12 h-1 mb-4 align-middle inline-block bg-red-300" :class="{'border-y-2 border-solid border-orange-600' : stage >= '7'}"></div>

                <a href="" @click.prevent="showStage(7), stage = 7" x-show="stage>6"><div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" :class="{ 'bg-orange-600': stage >= '7'}"></div></a>
                <div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" x-show="stage<7"></div>
                <div class="hidden md:inline-block w-12 h-1 mb-4 align-middle inline-block bg-red-300" :class="{'border-y-2 border-solid border-orange-600' : stage >= '8'}"></div>

                <a href="" @click.prevent="showStage(7), stage = 8" x-show="stage==8"><div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" :class="{ 'bg-orange-600': stage >= '8'}"></div></a>
                <div class="rounded-xl w-6 h-6 border-orange-600 border-2 border-solid inline-block" x-show="stage<8"></div>

                <input type="hidden" x-model="stage" value="stage" class="text-black" />
                    <!-- Slider main container -->
                    <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide" x-show="stage === 0" x-transition.duration.300ms>
                            <h2 class="text-2xl py-4">What would you like to do?</h2>
                            <div class="md:flex gap-2" id="continue_1">
                                <a href="" @click.prevent="purpose = 'Remortgage', borrow_max_fraction=0.95"><div class="mb-2 rounded-lg text-center p-2 md:p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': purpose == 'Remortgage'}">Remortgage</div></a>
                                <a href="" @click.prevent="purpose = 'Buy My First Home', borrow_max_fraction=0.95"><div class="mb-2 rounded-lg text-center p-2 md:p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': purpose == 'Buy My First Home'}">Buy My First Home</div></a>
                                <a href="" @click.prevent="purpose = 'Move Home', borrow_max_fraction=0.95"><div class="mb-2 rounded-lg text-center p-2 md:p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': purpose == 'Move Home'}">Move Home</div></a> <!-- add to @click.prevent to auto scroll to continue button: , document.getElementById('continue_1').scrollIntoView({behavior: 'smooth'}) -->
                                <a href="" @click.prevent="purpose = 'Buy to Let', borrow_max_fraction=0.75"><div class="mb-2 rounded-lg text-center p-2 md:p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': purpose == 'Buy to Let'}">Buy to Let</div></a>
                                <input type="hidden" x-model="purpose" value="purpose" class="text-black" />
                            </div>
                            <div class="text-red-500 mt-4 text-lg">@error('enquiry.purpose'){{$message}}@enderror</div>
                        </div>
                        <div class="swiper-slide" x-show="stage === 1, stages_complete => 0" x-transition.duration.300ms>
                            <h2 class="text-2xl py-4">What is the price/value of the property to <span :class="{hidden : purpose=='Remortgage'}">buy?</span><span :class="{hidden : purpose!='Remortgage'}">remortgage?</span></h2>
                            <div class="max-w-screen-xl mx-auto md:flex">
                                <div class="text-center md:text-left md:w-1/2">
                                    <input id="value_with_commas_range" class="w-2/3 md:w-5/6 h-4 mt-4 bg-gray-400 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" type="range" x-model="value" min="80000" max="2000000" step="1000" x-on:input.change="addCommas($event)" />
                                </div>
                                <div class="flex">
                                    <div class="border border-gray-500 w-fit px-4 mt-4 md:mt-0 md:flex">
                                        <span class="w-4 mt-2 mx:ml-4 text-2xl">£</span>
                                        <!-- <input class="w-14 py-2 bg-gray-200 text-2xl text-right" type="input" x-model="value" /><span class="mt-2 text-2xl">,000</span> -->
                                        <input id="value_with_commas" class="w-32 py-2 text-2xl text-right bg-gray-900"" x-model="value" x-on:input.change="addCommasInput($event)" />
                                    </div>
                                    <div class="mx-4 mt-8 md:mt-3">&lt; type here</div>
                                </div>
                            </div>
                            <div class="text-red-500 mt-4 text-lg">@error('enquiry.value'){{$message}}@enderror</div>
                        </div>
                        <div class="swiper-slide" x-show="stage === 2" x-transition.duration.300ms>
                            <h2 class="text-2xl py-4">How much would you like to borrow?</h2>
                            <div class="max-w-screen-xl mx-auto md:flex">
                                <div class="text-center md:text-left md:w-1/2">
                                    <input class="w-2/3 md:w-5/6 h-4 mt-4 bg-gray-400 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" type="range" x-model="borrow" min="1000" :max="value*borrow_max_fraction" step="1000" id="range_borrow" x-on:input.change="addCommasBorrow($event)" />
                                </div>

                                <div class="flex">
                                    <div class="border border-gray-500 w-fit px-4 mt-4 md:mt-0 md:flex">
                                        <span class="w-4 mt-2 mx:ml-4 text-2xl">£</span>
                                        <!-- <input class="w-14 py-2 bg-gray-200 text-2xl text-right" type="input" x-model="value" /><span class="mt-2 text-2xl">,000</span> -->
                                        <input id="borrow_with_commas" class="w-32 py-2 text-2xl text-right bg-gray-900" x-model="borrow" />
                                    </div>
                                    <div class="mx-4 mt-8 md:mt-3 hidden md:block">&lt; type here</div>
                                    <input id="borrow_value" class="w-32 py-2 text-2xl text-right bg-gray-900 md:mt-3" x-model="value" type="hidden" />
                                    <input id="borrow_percentage" class="w-24 py-2 text-2xl text-right bg-gray-900 text-gray-400 pt-7 md:pt-0" />
                                </div>
                                
                            </div>
                            <div class="text-red-500 mt-4 text-lg">@error('enquiry.borrow'){{$message}}@enderror</div>
                        </div>
                        <div class="swiper-slide" x-show="stage === 3" x-transition.duration.300ms>
                            <h2 class="text-2xl pt-4 pb-2">In the last 6 years have you had?</h2>
                            <h2 class="text-lg pb-4">(tick all that apply)</h2>
                            <div class="md:flex gap-2">
                                <a href="" @click.prevent="bankruptcy = ! bankruptcy" class="w-96 flex gap-2 mb-2">
                                    <div class="border-2 border-orange-600 w-8 h-8 pt-1 pl-1 flex gap-4 rounded" :class="{ 'bg-orange-600': bankruptcy==true}"}>
                                        <div x-show="!bankruptcy" class=""><img src="/storage/untick.png" class="" /></div>
                                        <div x-show="bankruptcy" class=""><img src="/storage/tick.png" class="" /></div>
                                    </div>
                                    <div class="pt-1.5">Bankruptcy or IVA</div>
                                </a>
                                <a href="" @click.prevent="debt = ! debt" class="w-96 flex gap-2 mb-2">
                                    <div class="border-2 border-orange-600 w-8 h-8 pt-1 pl-1 flex gap-4 rounded" :class="{ 'bg-orange-600': debt==true}"}>
                                        <div x-show="!debt" class=""><img src="/storage/untick.png" class="" /></div>
                                        <div x-show="debt" class=""><img src="/storage/tick.png" class="" /></div>
                                    </div>
                                    <div class="pt-1.5">Debt Management Plan</div>
                                </a>
                                <a href="" @click.prevent="ccj = ! ccj" class="w-96 flex gap-2 mb-2">
                                    <div class="border-2 border-orange-600 w-8 h-8 pt-1 pl-1 flex gap-4 rounded" :class="{ 'bg-orange-600': ccj==true}"}>
                                        <div x-show="!ccj" class=""><img src="/storage/untick.png" class="" /></div>
                                        <div x-show="ccj" class=""><img src="/storage/tick.png" class="" /></div>
                                    </div>
                                    <div class="pt-1.5">CCJ - Defaults</div>
                                </a>
                                </div>
                                <div class="md:flex gap-2">
                                <a href="" @click.prevent="missed = ! missed" class="w-96 flex gap-2 mb-2">
                                    <div class="border-2 border-orange-600 w-8 h-8 pt-1 pl-1 flex gap-4 rounded" :class="{ 'bg-orange-600': missed==true}"}>
                                        <div x-show="!missed" class=""><img src="/storage/untick.png" class="" /></div>
                                        <div x-show="missed" class=""><img src="/storage/tick.png" class="" /></div>
                                    </div>
                                    <div class="pt-1.5">Missed mortgage payments</div>
                                </a>
                                <a href="" @click.prevent="elsewhere = ! elsewhere" class="w-96 flex gap-2 mb-2">
                                    <div class="border-2 border-orange-600 w-8 h-8 pt-1 pl-1 flex gap-4 rounded" :class="{ 'bg-orange-600': elsewhere==true}"}>
                                        <div x-show="!elsewhere" class=""><img src="/storage/untick.png" class="" /></div>
                                        <div x-show="elsewhere" class=""><img src="/storage/tick.png" class="" /></div>
                                    </div>
                                    <div class="pt-1.5">Declined Elsewhere</div>
                                </a>
                                <a href="" @click.prevent="other = ! other" class="w-96 flex gap-2 mb-2">
                                    <div class="border-2 border-orange-600 w-8 h-8 pt-1 pl-1 flex gap-4 rounded" :class="{ 'bg-orange-600': other==true}"}>
                                        <div x-show="!other" class=""><img src="/storage/untick.png" class="" /></div>
                                        <div x-show="other" class=""><img src="/storage/tick.png" class="" /></div>
                                    </div>
                                    <div class="pt-1.5">Other</div>
                                </a>
                            </div>
                            <div class="text-red-500 mt-4 text-lg" x-show="last_6_years">Please tick at least one box</div>
                        </div>
                        <div class="swiper-slide" x-show="stage === 4" x-transition.duration.300ms>
                            <h2 class="text-2xl py-4">What is your employment status?</h2>
                            <div class="flex gap-2">
                                <a href="" @click.prevent="employment_status = 'Self-Employed', trading = true, status_chosen = true, income_min = 0, income = 0" x-on:click="changeMinIncome($event)"><div class="rounded-lg text-center p-2 md:p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': employment_status == 'Self-Employed'}">Self-Employed</div></a>
                                <a href="" @click.prevent="employment_status = 'Employed', trading = false, status_chosen = true, income_min = 15000, income = 15000" x-on:click="changeMinIncome($event)"><div class="rounded-lg text-center p-2 md:p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': employment_status == 'Employed'}">Employed</div></a>
                            </div>
                            <div class="text-red-500 mt-4 text-lg" x-show="status_chosen === false">@error('enquiry.employment_status'){{$message}}@enderror</div>
                            <div x-show="trading">
                                <h2 class="text-2xl py-4">Have you been trading for 12 months or More?</h2>
                                <div class="flex gap-2">
                                    <a href="" @click.prevent="trading_12_months = 'Yes'"><div class="rounded-lg text-center p-2 md:p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': trading_12_months == 'Yes'}">Yes</div></a>
                                    <a href="" @click.prevent="trading_12_months = 'No'"><div class="rounded-lg text-center p-2 md:p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': trading_12_months == 'No'}">No</div></a>
                                </div>
                            </div>
                            <div class="text-red-500 mt-4 text-lg">@error('enquiry.trading_12_months'){{$message}}@enderror</div>
                        </div>
                        <div class="swiper-slide" x-show="stage === 5" x-transition.duration.300ms>
                            <h2 class="text-2xl py-4">What is your income?</h2>
                            <p>Please include all applicants income.</p>
                            <div class="max-w-screen-xl mx-auto flex">
                                <input type="hidden" x-model="income_min" value="" id="income_min" />
                                <input class="w-3/4 h-4 mt-4 bg-gray-400 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" type="range" x-model="income" :min="income_min" :max="300000" step="1000" x-on:input.change="addCommasIncome($event)" />
                                <span class="w-4 mt-2 ml-4 text-2xl">£</span>
                                <input id="income_with_commas" class="w-32 py-2 text-2xl text-right bg-gray-900" x-model="income" />
                            </div>
                            <p>You can also manually type in an income.</p>
                            <div class="text-red-500 mt-4 text-lg">@error('enquiry.income'){{$message}}@enderror</div>
                        </div>
                        <div class="swiper-slide" x-show="stage === 6" x-transition.duration.300ms>
                            <h2 class="text-2xl py-4">Would you like a Free no obligation call back with a specialist advisor to discuss your options?</h2>
                            <div class="flex gap-2">
                                <a href="" @click.prevent="callback = 'Yes', notready = false"><div class="rounded-lg text-center p-2 md:p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': callback == 'Yes'}">Yes</div></a>
                                <a href="" @click.prevent="callback = 'No', notready = true"><div class="rounded-lg text-center p-2 md:p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': callback == 'No'}">No</div></a>
                            </div>
                            <div class="text-red-500 mt-4 text-lg">@error('enquiry.callback'){{$message}}@enderror</div>
                            <!-- <div class="" x-show="notready">
                                <h3 class="text-xl py-4">Are you sure?</h3>
                                <p class="pb-4">In order for for us to help you, a qualified broker will need to speak with you to establish how they can give any advice.</p>
                                <div class="flex gap-2">
                                    <a href="" @click.prevent="sure = 'Yes'"><div class="rounded-lg text-center p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': sure == 'Yes'}">Yes</div></a>
                                    <a href="" @click.prevent="sure = 'No'"><div class="rounded-lg text-center p-8 border-white border-2 text-lg" :class="{ 'bg-orange-600 text-white': sure == 'No'}">No</div></a>
                                </div>
                            </div> -->
                        </div>
                        <div class="swiper-slide" x-show="stage === 7" x-transition.duration.300ms>
                                <h2 class="text-2xl py-4">Please complete the following</h2>
                                <div class="md:flex my-2">
                                    <div class="md:flex my-2">
                                        <label for="first_name" class="w-24 pt-3">First name: </label><br class="md:hidden">
                                        <input class="w-64 bg-gray-100 text-black rounded-md" type="text" x-model.lazy="first_name" id="first_name" />
                                    </div>
                                    <div class="md:flex my-2 md:ml-4">
                                        <label for="surname" class="w-24 pt-3">Surname: </label><br class="md:hidden">
                                        <input class="w-64 bg-gray-100 text-black rounded-md" type="text" x-model.lazy="surname" id="surname" />
                                    </div>
                                </div>
                                <div class="text-red-500 mt-4 text-lg">@error('enquiry.first_name'){{$message}}@enderror</div>
                                <div class="text-red-500 mt-4 text-lg">@error('enquiry.surname'){{$message}}@enderror</div>
                                
                                <div class="md:flex my-2">
                                    <div class="md:flex my-2">
                                        <label for="mobile" class="w-24 pt-3">Mobile: </label><br class="md:hidden">
                                        <input class="w-64 bg-gray-100 text-black rounded-md" type="text" x-model.lazy="mobile" id="mobile" />
                                    </div>
                                    <div class="md:flex my-2 md:ml-4">
                                        <label for="email" class="w-24 pt-3">Email: </label><br class="md:hidden">
                                        <input class="w-64 bg-gray-100 text-black rounded-md" type="text" x-model.lazy="email" id="email" />
                                    </div>
                                </div>
                                <div class="text-red-500 mt-4 text-lg">@error('enquiry.mobile'){{$message}}@enderror</div>
                                <div class="text-red-500 mt-4 text-lg">@error('enquiry.email'){{$message}}@enderror</div>
                                
                                <div class="my-2">
                                    <div class="py-2"><label for="other_info">Other information you feel is relevant: </label></div>
                                    <textarea class="w-full md:w-1/2 h-32 bg-gray-100 text-black rounded-md" x-model.lazy="other_info" id="other_info"></textarea><br>
                                    <span class="text-red-500 mt-4 text-lg">@error('enquiry.other_info'){{$message}}@enderror</span>
                                </div>

                                <div class="my-2">
                                    <label for="question">What comes first, G or S?:</label><br>
                                    <input class="w-1/2 border-slate-200 text-black" type="text" x-model.lazy="question" id="question" value="" /><br>
                                    <span class="text-red-500 mt-4 text-lg">@error('question'){{$message}}@enderror</span>
                                </div>

                                <a href="" @click.prevent="privacy = ! privacy" class="md:flex gap-2">
                                    <div class="border-2 border-orange-600 w-8 h-8 pt-1 pl-1 flex gap-4 rounded" :class="{ 'bg-orange-600': privacy==true}"}>
                                        <div x-show="!privacy" class=""><img src="/storage/untick.png" class="" /></div>
                                        <div x-show="privacy" class=""><img src="/storage/tick.png" class="" /></div>
                                    </div>
                                    <input type="hidden" x-model="privacy" id="privacy" value="" />
                                    <div class="pt-1.5" >Please tick this box to consent to our privacy policy and an advisor to contact you.</div>
                                </a>

                                <div class="text-red-500 mt-4 text-lg" x-show="privacy_message">Please tick the privacy box</div>
                        </div>

                        <div class="swiper-slide" x-show="stage === 8" x-transition.duration.300ms>
                            <h2 class="text-2xl py-4">Please resubmit an enquiry when you are ready to find out more <b>and discuss your potential options</b>. Thank you.</h2>
                        </div>

                        <div class="swiper-slide" x-show="stage === 9" x-transition.duration.300ms>
                            <h2 class="text-2xl py-4">Thank you for making an enquiry, an advisor will be in touch with you shortly.</h2>
                            <p class="pt-1.5">All advisors we work with are authorised and regulated by the Financial Conduct Authority.</p>
                        </div>

                    </div>
                    <!-- If we need pagination -->
                    <!-- <div class="swiper-pagination"></div> -->

                    <!-- If we need navigation buttons -->
                    <!-- <div class="swiper-button-prev">Prev</div> -->
                    <!-- <div class="swiper-button-next">Next</div> -->

                    <!-- If we need scrollbar -->
                    <!-- <div class="swiper-scrollbar"></div> -->
                    </div>


                <div class="md:mt-10 mb-4">
                    <!-- <a href="/" class="rounded-xl py-3 px-20 text-white bg-gray-600 text-xl cursor-not-allowed" @click.prevent="" x-text="button" x-show="section_incomplete">Continue</a>     -->
                    <!-- <a href="/" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl" @click.prevent="stage++, showStage(stage)" x-text="button" x-show="section_complete">Continue</a> -->
                    <button type="submit" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl">Continue</button>
                </div>
                <p><a href="" @click.prevent="stage--" class="text-orange-600 text-xl">&lt; Back</a></p>

            </div>

      
    </form>
</div>