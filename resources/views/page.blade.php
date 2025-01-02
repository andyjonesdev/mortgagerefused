@extends('layout_home')
@section('title',$page_details['meta_title'])
@section('meta_description',$page_details['meta_description'])

@section('content')

<div class="bg-gray-900 md:pt-12">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-2 xl:px-0 pb-6 md:pb-24">

        @if ($page_details['name']=='Mortgages')
        <div class="items-center pt-32 px-2 text-white">
                    <h1 class="text-3xl md:text-5xl md:text-6xl uppercase font-bold">{{$page_details['name']}}</h1>
                    <h3 class="md:w-1/2 mt-4 text-lg md:text-xl">{{ $page_details['header_para'] }}</h3>
            <div class="flex gap-4 mt-12 flex-wrap">
                @foreach ($children as $child)
                    <a href="{{$child->slug}}" class=""><div class="rounded-xl p-2 md:p-16 text-white border-2 border-orange-600 hover:bg-orange-600 text-md md:text-xl inline-block align-middle text-center">{{$child->name}}</div></a>
                @endforeach
            </div>
            </div>
        @elseif ($page_details['name']=='Adverse Credit' || $page_details['name']=='Remortgages' || $page_details['name']=='Other')
            <div class="items-center pt-32 px-2 text-white">
                    <h1 class="text-3xl md:text-5xl md:text-6xl uppercase font-bold">{{$page_details['name']}}</h1>
                    <!-- <h3 class="md:w-1/2 mt-4 text-lg md:text-xl">{{ $page_details['header_para'] }}</h3> -->
            <div class="flex gap-4 mt-12 flex-wrap">
                @foreach ($children as $child)
                    <a href="{{$child->slug}}" class=""><div class="rounded-xl p-2 md:p-16 text-white border-2 border-orange-600 hover:bg-orange-600 text-md md:text-xl inline-block align-middle text-center">{{$child->name}}</div></a>
                @endforeach
            </div>
            </div>
        @else

        <div class="md:flex items-center pt-24">

                <div class="md:w-1/2 md:py-10 px-2 text-white">
                    <h1 class="text-3xl md:text-5xl md:text-6xl uppercase font-bold">{{$page_details['name']}}</h1>
                    <h3 class="mt-4 text-lg md:text-xl">{{ $page_details['header_para'] }}</h3>
    
                    @if ($page_details['slug']!='terms-and-conditions' && $page_details['slug']!='privacy-policy' && $page_details['slug']!='complaints-procedure' && $page_details['slug']!='cookie-policy')
                        <div class="my-10"><a href="/get-started" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl">Find Out More</a></div>
                    @endif
                </div>
                
                @if ($page_details['slug']=='about-us')
                    <div class="md:w-1/2 mx-auto md:-mb-12"><x-about /></div>
                @endif
                @if ($page_details['slug']=='defaults')
                    <div class="md:mb-12 md:w-2/5 mx-auto"><x-carry /></div>
                @endif
                @if ($page_details['slug']=='remortgage')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-flattened /></div>
                @endif
                @if ($page_details['slug']=='mortgages-with-a-ccj')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-rejected /></div>
                @endif
                @if ($page_details['slug']=='debt-management-plan')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-jigsaw /></div>
                @endif
                @if ($page_details['slug']=='bankruptcy')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-slippery-slope /></div>
                @endif
                @if ($page_details['slug']=='low-credit-score')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-brick-wall /></div>
                @endif
                @if ($page_details['slug']=='late-payments')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-alarm /></div>
                @endif
                @if ($page_details['slug']=='missed-mortgage-payment')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-missed /></div>
                @endif
                @if ($page_details['slug']=='self-employed')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-lifeline /></div>
                @endif
                @if ($page_details['slug']=='first-time-buyer-bad-credit')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-two-doors /></div>
                @endif
                @if ($page_details['slug']=='deposit')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-money-bags /></div>
                @endif
                @if ($page_details['slug']=='debt-consolidation')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-jenga /></div>
                @endif
                @if ($page_details['slug']=='credit-reports')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-laptop /></div>
                @endif
                @if ($page_details['slug']=='secured-loans')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-loan-padlock /></div>
                @endif
                @if ($page_details['slug']=='remortgaging-for-additional-borrowing' || $page_details['slug']=='remortgaging-for-additional-borrowing-')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-arrow-house /></div>
                @endif
                @if ($page_details['slug']=='buy-to-let-mortgages-with-bad-credit')
                    <div class="md:mb-12 md:w-1/3 mx-auto"><x-buy-to-let /></div>
                @endif
        </div>
        @if ($page_details['slug']=='get-started')
            <div class="px-2 text-white">
                <livewire:get-started x-lean::console-log :environment="['local', 'live']" />
            </div>
        @endif

        @endif

    </div>
</div>

@if ($page_details['name']!='Mortgages' && $page_details['name']!='Adverse Credit' && $page_details['name']!='Remortgages' && $page_details['name']!='Other' 
&& $page_details['name']!='Get Started' && $page_details['slug']!='contact-us')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0" id="{{strtolower(str_replace(' ','-',$page_details['sub_heading']))}}">
        <div class="md:flex items-center pt-12 md:py-12 relative">
            
            <div class="md:w-1/2 md:py-10 px-2">
                @if ($page_details['sub_heading'])
                    <h2 class="text-3xl md:text-4xl uppercase font-bold">{{$page_details['sub_heading']}}</h2>
                @endif
                <div class="mt-4 text-gray-900 text-md md:text-lg">
                    {!! $page_details['content'] !!}
                </div>
                
                @if ($page_details['slug']!='terms-and-conditions' && $page_details['slug']!='privacy-policy' && $page_details['slug']!='complaints-procedure' && $page_details['slug']!='cookie-policy')
                    <div class="my-10"><a href="/get-started" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl">Enquire Now</a></div>
                @endif
            </div>
            <div class="md:mb-12 md:w-1/2">
                <div class="md:w-1/2 float-right">
                    @if ($page_details['slug']=='defaults')
                        <x-line-houses-tall />
                    @endif
                </div>
                <div class="w-full md:py-24">

                    @if ($page_details['slug']=='about-us')
                        <x-advisors />
                    @endif
                    @if ($page_details['slug']=='low-credit-score')
                        <x-line-houses />
                    @endif
                    @if ($page_details['slug']=='remortgage')
                        <x-line-houses2 />
                    @endif
                    @if ($page_details['slug']=='mortgages-with-a-ccj')
                        <x-line-houses3 />
                    @endif
                    @if ($page_details['slug']=='deposit-levels-required-for-adverse-credit')
                        <x-line-houses4 />
                    @endif
                    @if ($page_details['slug']=='missed-mortgage-payment')
                        <x-missed2 />
                    @endif
                    @if ($page_details['slug']=='self-employed')
                        <div class="mb-12 w-1/2 mx-auto"><x-sole-trader /></div>
                    @endif
                    @if ($page_details['slug']=='remortgaging-for-additional-borrowing' || $page_details['slug']=='remortgaging-for-additional-borrowing-')
                        <div class="mb-12 w-1/2 mx-auto"><x-scrabble /></div>
                    @endif
                    @if ($page_details['slug']=='secured-loans')
                        <x-loan-keys />
                    @endif
                    @if ($page_details['slug']=='deposit')
                        <x-money-shoots />
                    @endif
                </div>
                <div class="w-1/2 mx-auto">
                    @if ($page_details['slug']=='mortgages-with-a-ccj')
                        <x-accepted />
                    @endif
                    @if ($page_details['slug']=='late-payments')
                        <x-late-payment />
                    @endif
                    @if ($page_details['slug']=='bankruptcy')
                        <x-slippery-slope2 />
                    @endif
                    @if ($page_details['slug']=='debt-management-plan')
                        <x-jigsaw2 />
                    @endif
                    @if ($page_details['slug']=='first-time-buyer-bad-credit')
                        <x-door-mat />
                    @endif
                    @if ($page_details['slug']=='debt-consolidation')
                        <x-jigsaw-debt />
                    @endif
                    @if ($page_details['slug']=='credit-reports')
                       <x-calculator />
                    @endif
                    @if ($page_details['slug']=='buy-to-let-mortgages-with-bad-credit')
                        <x-to-let />
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0" id="{{strtolower(str_replace(' ','-',$page_details['sub_heading2']))}}">
        <div class="md:flex items-center py-12">  
            <div class="hidden md:block mb-12 w-1/3 px-4 mx-auto">

                    @if ($page_details['slug']=='about-us')
                        <div class="mb-12 w-2/3 mx-auto"><x-advisor /></div>
                    @endif
                    @if ($page_details['slug']=='low-credit-score')
                            <x-two-doors />
                    @endif
                    @if ($page_details['slug']=='defaults')
                            <x-houses />
                    @endif
                    @if ($page_details['slug']=='remortgage')
                            <x-confused />
                    @endif
                    @if ($page_details['slug']=='mortgages-with-a-ccj')
                            <x-ccj />
                    @endif
                    @if ($page_details['slug']=='bankruptcy')
                            <x-slippery-slope3 />
                    @endif
                    @if ($page_details['slug']=='debt-management-plan')
                            <x-jigsaw3 />
                    @endif
                    @if ($page_details['slug']=='missed-mortgage-payment')
                            <x-missed3 />
                    @endif
                    @if ($page_details['slug']=='self-employed')
                        <div class="mb-12 w-2/3 mx-auto"><x-spreadsheet /></div>
                    @endif
                    @if ($page_details['slug']=='first-time-buyer-bad-credit')
                        <x-couple-umbrella />
                    @endif
                    @if ($page_details['slug']=='remortgaging-for-additional-borrowing' || $page_details['slug']=='remortgaging-for-additional-borrowing-')
                        <x-man-moving-house />
                    @endif
                    @if ($page_details['slug']=='debt-consolidation')
                        <x-money-pit />
                    @endif
                    @if ($page_details['slug']=='secured-loans')
                        <x-safe />
                    @endif
                    @if ($page_details['slug']=='credit-reports')
                       <x-credit-report />
                    @endif
                    @if ($page_details['slug']=='buy-to-let-mortgages-with-bad-credit')
                        <x-swag-bag />
                    @endif
            </div>
            <div class="md:w-1/2 md:py-10 px-2">
                <h1 class="text-gray-900 text-3xl md:text-4xl uppercase font-bold">{{$page_details['sub_heading2']}}</h1>
                <div class="mt-4 text-gray-900 text-md md:text-lg">{!! $page_details['content2'] !!}</div>
                @if ($page_details['slug']!='terms-and-conditions' && $page_details['slug']!='privacy-policy' && $page_details['slug']!='complaints-procedure' && $page_details['slug']!='cookie-policy')
                    <div class="my-10"><a href="/get-started" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl">Start A Survey</a></div>
                @endif
            </div>
        </div
    </div>

    @if ($page_details['sub_heading3'] && $page_details['content3'])
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0" id="{{strtolower(str_replace(' ','-',$page_details['sub_heading3']))}}">
        <div class="md:flex items-center py-12 relative">
            
            <div class="md:w-1/2 md:py-10 px-2">
                <!-- <div class="my-10"><a href="/get-started" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl">Get Started</a></div> -->
                @if ($page_details['sub_heading3'])
                    <h2 class="text-3xl md:text-4xl uppercase font-bold">{{$page_details['sub_heading3']}}</h2>
                @endif
                <div class="mt-4 text-gray-900 text-md md:text-lg">
                    {!! $page_details['content3'] !!}
                </div>
                <div class="my-10"><a href="/get-started" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl">Get Started</a></div>
            </div>
            <div class="mb-12 w-1/2">
                @if ($page_details['slug']=='self-employed')
                    <div class="mb-12 w-1/3 mx-auto"><x-director /></div>
                @endif
            </div>
        </div>
    </div>
    @endif

    @if ($page_details['sub_heading4'] && $page_details['content4'])
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0" id="{{strtolower(str_replace(' ','-',$page_details['sub_heading4']))}}">
        <div class="md:flex items-center py-12">  
            <div class="mb-12 w-1/3 px-4 mx-auto">
                @if ($page_details['slug']=='self-employed')
                    <div class="mb-12 w-2/3 mx-auto"><x-partnership /></div>
                @endif
            </div>
            <div class="md:w-1/2 md:py-10 px-2">
                <h1 class="text-gray-900 text-3xl md:text-4xl uppercase font-bold">{{$page_details['sub_heading4']}}</h1>
                <div class="mt-4 text-gray-900 text-md md:text-lg">{!! $page_details['content4'] !!}</div>
            </div>
        </div
    </div>
    @endif

    @if ($page_details['sub_heading5'] && $page_details['content5'])
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0" id="{{strtolower(str_replace(' ','-',$page_details['sub_heading5']))}}">
        <div class="md:flex items-center py-12 relative">
            
            <div class="md:w-1/2 md:py-10 px-2">
                @if ($page_details['sub_heading5'])
                    <h2 class="text-3xl md:text-4xl uppercase font-bold">{{$page_details['sub_heading5']}}</h2>
                @endif
                <div class="mt-4 text-gray-900 text-md md:text-lg">
                    {!! $page_details['content5'] !!}
                </div>
            </div>
            <div class="mb-12 w-1/2">
                @if ($page_details['slug']=='self-employed')
                    <div class="mb-12 w-1/3 mx-auto"><x-cis-workers /></div>
                @endif
            </div>
        </div>
    </div>
    @endif

    @if ($page_details['sub_heading6'] && $page_details['content6'])
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0" id="{{strtolower(str_replace(' ','-',$page_details['sub_heading6']))}}">
        <div class="md:flex items-center py-12">  
            <div class="mb-12 w-1/3 px-4 mx-auto">
                   
            </div>
            <div class="md:w-1/2 md:py-10 px-2">
                <h1 class="text-gray-900 text-3xl md:text-4xl uppercase font-bold">{{$page_details['sub_heading6']}}</h1>
                <div class="mt-4 text-gray-900 text-md md:text-lg">{!! $page_details['content6'] !!}</div>
            </div>
        </div
    </div>
    @endif

@endif

@if ($page_details['name']=='Mortgages' || $page_details['name']=='Get Started' || $page_details['name']=='Adverse Credit' || $page_details['name']=='Remortgages' || $page_details['name']=='Other')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
        <div class="w-full">  
            <x-line-houses-long />
        </div
    </div>
@endif
@if ($page_details['slug']=='contact-us')
    <div class="md:flex max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-0">
        <div class="md:w-1/2">
            <livewire:contact-form />
        </div>
        <div class="pt-12">
            {!! $page_details['content'] !!}
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2409.2914340790276!2d-1.5701335427415763!3d52.85315173992917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4879f8252b31ae87%3A0xa074d1fe8d332e03!2s2%20The%20Grn%2C%20Willington%2C%20Derby%20DE65%206BP!5e0!3m2!1sen!2suk!4v1697039719664!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endif

@if ($page_details['parent']=='Mortgages' || $page_details['parent']=='Self employed' || $page_details['parent']=='Self-employed' || $page_details['parent']=='Adverse Credit' || $page_details['parent']=='Remortgages' || $page_details['parent']=='Other')
    <p class="pb-8 md:text-center">As a mortgage is secured against your property, it could be repossessed if you do not keep up mortgage repayments.</p>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
@endsection

@section('footer')
@parent
@endsection
