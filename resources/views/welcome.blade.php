@extends('layout_home')
@section('title',$home['meta_title'])
@section('meta_description',$home['meta_description'])

@section('content')

<style>
@keyframes bottomright {
  0% {
    width: 0;
    height: 0;
    padding-top: 0;
    visibility: visible;
  }
  5% {
    width: 100%;
    height: 0;
    padding-top: 0;
    visibility: visible;
  }
  10% {
    height: 100%;
    width: 100%;
    visibility: visible;
  }
  15% {
    visibility: visible;
  }
  20% {
    visibility: visible;
  }
  50% {
    border-color: #c0451f;
  }
}

@keyframes revbottomright {
  0% {
    width: 100%;
    height: 100%;
    visibility: visible;
  }
  5% {
    width: 100%;
    height: 100%;
    visibility: visible;
  }
  10% {
    width: 100%;
    height: 100%;
    visibility: visible;
  }
  15% {
    width: 100%;
    height: 0;
    padding-top: 0;
    visibility: visible;
  }
  20% {
    width: 0;
    height: 0;
    padding-top: 0;
    visibility: hidden;
  }
  50% {
    border-color: #c0451f;
  }
}

@keyframes topleft {
  0% {
    width: 0;
    height: 0;
    padding-bottom: 0;
    visibility: hidden;
  }
  5% {
    width: 0;
    height: 0;
    padding-bottom: 0;
    visibility: hidden;
  }
  10% {
    width: 0;
    height: 0;
    padding-bottom: 0;
    visibility: hidden;
  }
  15% {
    width: 100%;
    height: 0;
    padding-bottom: 0;
    visibility: visible;
  }
  20% {
    width: 100%;
    height: 100%;
    opacity: 1;
    visibility: visible;
  }
  50% {
    border-color: #c0451f;
  }
}

@keyframes revtopleft {
  0% {
    width: 100%;
    height: 100%;
    opacity: 1;
    visibility: visible;
  }
  5% {
    width: 100%;
    height: 0;
    padding-bottom: 0;
    visibility: visible;
  }
  10% {
    width: 0;
    height: 0;
    padding-bottom: 0;
    visibility: hidden;
  }
  15% {
    width: 0;
    height: 0;
    padding-bottom: 0;
    visibility: hidden;
  }
  20% {
    width: 0;
    height: 0;
    padding-bottom: 0;
    visibility: hidden;
  }
  50% {
    border-color: #c0451f;
  }
}

#angled_box_1, #angled_box_2, #angled_box_3, #angled_box_4 {
  color: #333;
  transition: color 0.75s ease-in-out;
}

#angled_box_1:after, #angled_box_2:after, #angled_box_3:after, #angled_box_4:after {
  content: "";
  position: absolute;
  bottom: 0;
  padding-right: 5px;
  left: 0;
  width: 100%;
  height: 100%;
  border-bottom: 8px solid #333;
  border-right: 8px solid #333;
  visibility: hidden;
}

#angled_box_1:before, #angled_box_2:before, #angled_box_3:before, #angled_box_4:before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  padding-left: 5px;
  width: 100%;
  height: 100%;
  border-top: 8px solid #333;
  border-left: 8px solid #333;
  visibility: hidden;
}

#angled_box_1:before {
  animation: topleft 7s ease-in-out infinite forwards;
}
#angled_box_1:after {
  animation: bottomright 7s ease-in-out infinite forwards;
}
#angled_box_1.active:before {
  animation: revtopleft 7s ease-in-out infinite forwards;
}
#angled_box_1.active:after {
  animation: revbottomright 7s ease-in-out infinite forwards;
}

#angled_box_2:before {
  animation: topleft 7s ease-in-out 1s infinite forwards;
}
#angled_box_2:after {
  animation: bottomright 7s ease-in-out 1s infinite forwards;
}
#angled_box_2.active:before {
  animation: revtopleft 7s ease-in-out 1s infinite forwards;
}
#angled_box_2.active:after {
  animation: revbottomright 7s ease-in-out 1s infinite forwards;
}

#angled_box_3:before {
  animation: topleft 7s ease-in-out 2s infinite forwards;
}
#angled_box_3:after {
  animation: bottomright 7s ease-in-out 2s infinite forwards;
}
#angled_box_3.active:before {
  animation: revtopleft 7s ease-in-out 2s infinite forwards;
}
#angled_box_3.active:after {
  animation: revbottomright 7s ease-in-out 2s infinite forwards;
}

#angled_box_4:before {
  animation: topleft 7s ease-in-out 3s infinite forwards;
}
#angled_box_4:after {
  animation: bottomright 7s ease-in-out 3s infinite forwards;
}
#angled_box_4.active:before {
  animation: revtopleft 7s ease-in-out 3s infinite forwards;
}
#angled_box_4.active:after {
  animation: revbottomright 7s ease-in-out 3s infinite forwards;
}
</style>

        <div class="relative sm:flex sm:justify-center sm:items-center bg-center bg-gray-900 selection:text-white md:py-10 pt-24 sm:pt-32 md:pt-48 lg:pt-24">
            <div class="mx-auto p-6 sm:px-6 lg:p-8">
                <div class="md:flex justify-around text-center md:text-left">
                    <div class="hidden md:block mb-12">
                        <x-frustrated-man2 />
                    </div>
                    <div class="md:w-1/2 md:py-10">
                        <h1 class="text-white text-5xl lg:text-7xl uppercase font-bold">{{ $home['title'] }}</h1>
                        <h2 class="text-orange-600 text-3xl lg:text-5xl uppercase font-bold my-6">{{ $home['sub_title'] }}</h2>
                        <h3 class="text-white text-1xl lg:text-2xl">{{ $home['content_1'] }}</h3>
                        <div class="my-10"><a href="/get-started" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl">Get Started</a></div>
                    </div>
                    <div class="md:hidden">
                        <x-frustrated-man />
                    </div>
                </div>
            </div>
        </div>

        <div class="my-10 mx-auto p-10 lg:p-16">

                <h3 class="text-4xl uppercase font-bold text-center text-gray-900">{{ $home['content_2'] }}</h3>
                <p class="text-center md:w-1/2 mx-auto py-4 text-gray-900">{{ $home['content_3'] }}</p>
        
                <div class="lg:flex sm:justify-center sm:items-center justify-around gap-8 text-gray-900">
                    <div class="py-12 px-6 text-center rotate-2 border-8 mt-10 border-white" id="angled_box_1">
                        <h3 class="text-3xl uppercase font-bold -rotate-2">{{ $home['content_4'] }}</h3>
                        <p class="-rotate-2">{{ $home['content_5'] }}</p>
                    </div>
                    <div class="py-12 px-6 text-center rotate-2 border-b-8 border-8 mt-10 border-white" id="angled_box_2">
                        <h3 class="text-3xl uppercase font-bold -rotate-2">{{ $home['content_6'] }}</h3>
                        <p class=" -rotate-2">{{ $home['content_7'] }}</p>
                    </div>
                    <div class="py-12 px-6 text-center rotate-2 border-b-8 border-8 mt-10 border-white" id="angled_box_3">
                        <h3 class="text-3xl uppercase font-bold -rotate-2">{{ $home['content_8'] }}</h3>
                        <p class=" -rotate-2">{{ $home['content_9'] }}</p>
                    </div>
                    <div class="py-12 px-6 text-center rotate-2 border-b-8 border-8 border-white mt-10" id="angled_box_4">
                        <h3 class="text-3xl uppercase font-bold -rotate-2">{{ $home['content_10'] }}</h3>
                        <p class=" -rotate-2">{{ $home['content_11'] }}</p>
                    </div>
                </div>

            <div class="mt-20 mx-auto w-full text-center"><a href="/get-started" class="rounded-xl pt-4 pb-3 px-20 text-white bg-orange-600 text-xl">Get Started</a></div>

        </div>



        <div class="my-10 x-auto p-10 lg:p-20 bg-dots-darker bg-center bg-gray-900">

                <h3 class="text-4xl uppercase font-bold text-center text-white">{{ $home['content_12'] }}</h3>
                <p class="text-center md:w-1/2 mx-auto py-4 text-white mb-6">{{ $home['content_13'] }}</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 text-center">
                        <div class="scale-100 p-8 bg-gray-800/50 via-transparent shadow-2xl motion-safe:hover:scale-[1.01] transition-all duration-250">
                            <div class="mx-auto w-1/3">
                                <x-icon-bad-credit />
                            </div>
                            <div class="mx-auto w-full">
                                <h2 class="mt-2 text-xl font-semibold text-white uppercase">{{ $home['content_14'] }}</h2>
                                <p class="mt-4 text-white leading-relaxed">
                                {{ $home['content_15'] }}
                                </p>
                            </div>
                        </div>

                        <div class=" scale-100 p-8 bg-gray-800/50 via-transparent shadow-2xl motion-safe:hover:scale-[1.01] transition-all duration-250">
                            <div class="mx-auto w-1/3">
                                <x-icon-self-employed />
                            </div>
                            <div class="mx-auto w-full">
                                <h2 class="mt-2 text-xl font-semibold text-white uppercase">{{ $home['content_16'] }}</h2>
                                <p class="mt-4 text-white leading-relaxed">
                                {{ $home['content_17'] }}
                                </p>
                            </div>
                        </div>

                        <div class=" scale-100 p-8 bg-gray-800/50 via-transparent shadow-2xl motion-safe:hover:scale-[1.01] transition-all duration-250">
                            <div class="mx-auto w-1/3">
                                <x-icon-remortgage />
                            </div>
                            <div class="mx-auto w-full">
                                <h2 class="mt-2 text-xl font-semibold text-white uppercase">{{ $home['content_18'] }}</h2>
                                <p class="mt-4 text-white leading-relaxed">
                                {{ $home['content_19'] }}
                                </p>
                            </div>
                        </div>

                        <div class=" scale-100 p-8 bg-gray-800/50 via-transparent shadow-2xl motion-safe:hover:scale-[1.01] transition-all duration-250">
                            <div class="mx-auto w-1/3">
                                <x-icon-complex />
                            </div>
                            <div class="mx-auto w-full">
                                <h2 class="mt-2 text-xl font-semibold text-white uppercase">{{ $home['content_20'] }}</h2>
                                <p class="mt-4 text-white leading-relaxed">
                                {{ $home['content_21'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="my-10 mx-auto w-full text-center"><a href="/get-started" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl">Get Started</a></div> -->
                </div>

        </div>


        <div class="relative sm:flex sm:justify-center sm:items-center">

            <div class="mx-auto p-6 lg:p-8">
                <div class="md:flex justify-around">
                    <div class="text-center md:text-left md:w-1/2 md:py-10 text-gray-900">
                        <h2 class="text-2xl md:text-4xl uppercase font-bold text-gray-900">{{ $home['content_22'] }}</h1>
                        <h2 class="text-4xl md:text-5xl uppercase font-bold my-6 text-gray-900">{{ $home['content_23'] }}</h2>
                        <h3 class="text-xl md:text-2xl text-gray-900">{{ $home['content_24'] }}</h3>
                        <div class="my-10"><a href="/about-us" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl">Read our story</a></div>
                    </div>
                    <div class="mt-6">
                        <x-barbed-house />
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-16 text-4xl uppercase font-bold text-center text-gray-900">What Our Customers Say</h3>


        <div class="mb-4 md:p-6 md:flex justify-evenly text-center gap-8">
            @foreach ($testimonials as $testimonial)

            <div class="px-6 py-4 my-4">
                <h4 class="text-xl py-2 text-gray-900 text-center">"{{$testimonial['quote']}}"</h4>

                <div class="flex justify-center">
                    <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                </div>
                
                <h2 class="text-1xl py-2 text-gray-900 text-center"><b>{{$testimonial['quote_maker']}}</b></h2>  
                <div class="flex items-center"> 
                    <p class="sr-only">5 out of 5 stars</p>
                </div>
            </div>

            @endforeach 

            </div>
            
        </div>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
@endsection

@section('footer')
@parent
@endsection
