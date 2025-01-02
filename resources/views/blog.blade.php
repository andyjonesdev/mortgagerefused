@extends('layout_home')
@section('title','Blog')
@section('meta_description','Expertly crafted articles from our experienced mortgage advisors.')

@section('content')
    
  <div class="bg-white">
    <div class="mx-auto max-w-2xl py-6 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 w-full md:w-2/3">

      @if (count($posts)==0)
          <h3 class="py-4 text-2xl">Sorry, no posts found.</h3>
      @else
          @foreach ($posts as $post)
            @if ($post['published'])
              <div class="border-b-2 pt-10 pb-14 border-gray-400 border-dotted">
                <div class="text-center my-4">
                  <h2 class="text-4xl md:text-5xl mt-2 text-black underline underline-pink-600 text-left -rotate-1 w-fit py-2"><a href="{{"/".$post['slug']}}">{{$post['name']}}</a></h2>
                </div>

                <div class="pt-2 pb-6">
                    @if ($post['post_image_filename'])
                        <div class="overflow-hidden lg:block col-span-2">
                            <img class="w-full lg:w-1/2" src="{{ asset("storage/{$post['post_image_filename']}") }}">
                        </div>
                    @endif
                </div>
                <div class="mb-6">{!! $post['content'] !!}</div>
                <p><a class="my-6 py-2 px-4 text-white rounded-md bg-black text-center" href="{{"/".$post['slug']}}">view</a></p>
              </div>
            @endif
          @endforeach
      @endif

    </div>
  </div>

@endsection

@section('footer')
@parent
@endsection