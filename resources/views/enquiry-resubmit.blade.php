@extends('layout_home')
@section('title','Thank you')
@section('meta_description','Thank you for your enquiry')

@section('content')

<div class="bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0 pb-12">
        <div class="pt-32">
            <div class="px-2 text-white">
                <h1 class="text-5xl md:text-6xl uppercase font-bold">Thank you!</h1>
                <h2 class="text-2xl md:text-3xl font-bold">...but you're not quite ready</h2>
                <h3 class="mt-4 text-lg md:text-xl">Please resubmit an enquiry when you are ready to find out more <b>and discuss your potential options</b>. Thank you.</h3>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
@parent
@endsection
