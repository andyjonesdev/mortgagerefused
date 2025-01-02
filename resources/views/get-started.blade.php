@extends('layout_home')
@section('title',$page_details['meta_title'])
@section('meta_description',$page_details['meta_description'])

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
    <div class="pt-4 h-18 px-4 xl:px-0">
        <!-- <div class="flex justify-between "> -->

            <!-- <div class="md:flex items-center py-24 gap-4"> -->
                <div class="md:w-1/2 md:py-10 px-2">
                    <h1 class="text-gray-900 text-5xl md:text-6xl uppercase font-bold">{{$page_details['name']}}</h1>
                    <h3 class="mt-4 text-gray-900 text-lg md:text-xl">{{ $page_details['header_para'] }}</h3>
                </div>  

                <div class="mb-12 mx-auto">
                   <x-enquiry-wizard />
                </div>
            <!-- </div> -->
            
        <!-- </div> -->
    </div>
</div>


<!--
<div class="bg-gray-900">
    <div class="justify-center mx-auto sm:w-full md:w-1/2">
        <div class="py-24 text-white"> 
            <h2 class="text-3xl md:text-4xl uppercase font-bold">{{$page_details['sub_heading']}}</h2>
            <p class="text-lg py-2 whitespace-pre-wrap">{!! $page_details['content'] !!}</p>
        </div>
    </div>
</div>


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
    <div class="pt-4 h-18 px-4 xl:px-0">
        <div class="flex justify-between ">

            <div class="md:flex items-center py-24">  

                <div class="mb-12 w-72 mx-auto">
                </div>

                <div class="md:w-1/2 md:py-10 px-2">
                    <h1 class="text-gray-900 text-3xl md:text-4xl uppercase font-bold">{{$page_details['sub_heading2']}}</h1>
                    <div class="mt-4 text-gray-900 text-md md:text-lg">{!! $page_details['content2'] !!}</div>
                    <div class="my-10"><a href="/" class="rounded-xl py-3 px-20 text-white bg-orange-600 text-xl">Get started</a></div>
                </div>
            </div>
            
        </div>
    </div>
</div>
-->


<script src="/node_modules/flowbite/dist/flowbite.min.js"></script>

@endsection

@section('footer')
@parent
@endsection
