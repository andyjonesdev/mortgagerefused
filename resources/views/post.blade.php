@extends('layout_home')
@section('title',$post_details['meta_title'])
@section('meta_description',$post_details['meta_description'])

@section('content')
  

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-2 xl:px-0 pb-6 md:pb-24">
    </div>

    <div class="md:p-6 gap-12 justify-center -mt-14 mx-auto w-full md:w-2/3">
            <h1 class="text-5xl md:text-7xl mt-24">{{$post_details['name']}}</h1>
    
            <div class="px-2 md:p-4">
                @foreach ($post_images as $post_image)
                   
                    <div class="overflow-hidden lg:block col-span-2">
                        <img class="w-full lg:w-2/3" src="{{ asset("storage/{$post_image->filename}") }}">
                    </div>
                   
                @endforeach 
            </div>

            <div class="p-4"> 
                @if ($post_details['sub_title'])
                    <h2 class="text-3xl md:text-6xl mt-6 mb-6 text-black underline underline-pink-600 text-left -rotate-1 w-fit py-2">{{$post_details['sub_title']}}</h2>
                @endif
                <p class="text-lg py-2 text-black text-left whitespace-pre-wrap">{!!$post_details['content']!!}</p>
            </div>
    </div>
@endsection

@section('footer')
@parent
@endsection