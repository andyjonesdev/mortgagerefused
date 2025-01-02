@extends('layout_home')
@section('title','Thank you')
@section('meta_description','Thank you for your enquiry')

@section('content')

<div class="bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0 pb-12">
        <div class="pt-48">
            <div class="px-2 text-white">
                <h1 class="text-5xl md:text-6xl uppercase font-bold">Thank you!</h1>
                <h3 class="mt-4 text-lg md:text-xl">Thank you for making an enquiry, an advisor will be in touch with you shortly.</h3>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
@parent
@endsection
