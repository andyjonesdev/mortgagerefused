<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed bg-white border-b-2 border-gray-900 w-full z-50">
    <!-- Primary Navigation Menu -->

        @if (Route::has('login'))
            @auth
                <div class="mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex sm:items-center sm:ml-6 mt-3 sm:h-mobile2 md:h-desktop lg:h-desktop">

                        <!-- Logo -->
                        <div class="">
                            <a href="/">
                                <x-application-logo />
                            </a>
                        </div>

                        <div class="top-14 md:top-12 right-0 md:right-10 absolute">
                            <x-dropdown align="right" width="64">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div>Admin</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
            @else
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
                    <div class="pt-4 h-mobile sm:h-mobile2 md:h-tablet lg:h-desktop px-2 md:px-4 xl:px-0">
                        <div class="flex sm:block lg:flex justify-between">
                            <!-- Logo -->
                            <div class="shrink-0 items-center mx:auto text-center">
                                <a href="/">
                                    <x-application-logo />
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 md:flex pt-3 justify-between">
                            
                                @foreach ($navbars_header as $navbarItem)
                                    @if ($navbarItem['parent']=='None' || !$navbarItem['parent'])
                                        @if ($navbarItem['slug']!='home')
                                            <div class="pt-2  text-center" x-data="{sub:false}" @mouseleave="sub = false">
                                                <x-nav-link :href="route($navbarItem->slug)" :active="request()->routeIs($navbarItem->slug)" @mouseover="sub = true">
                                                    {{ __($navbarItem->name) }}
                                                </x-nav-link>
                                                
                                                @php
                                                $top_margin = 2;
                                                $sub_menu = false;

                                                foreach ($navbars_header as $navbarItemSub) {
                                                    if ($navbarItemSub['parent']==$navbarItem['name']) {
                                                        $sub_menu = true;
                                                    }
                                                }
                                                if ($sub_menu) {
                                                    @endphp
                                                        <div class="absolute mb-4 z-50 top-22 left-0 w-screen" x-show="sub">
                                                            <div class="lg:flex justify-around bg-gray-100 p-4 shadow-lg">
                                                                @php
                                                                foreach ($navbars_header as $navbarItemSub) {
                                                                    if ($navbarItemSub['parent']==$navbarItem['name']) {
                                                                        @endphp
                                                                        <div class="py-2 text-left " x-show="sub">
                                                                            <!-- <x-nav-link-sub :href="route($navbarItemSub->slug)" :active="request()->routeIs($navbarItemSub->name)"> -->
                                                                                <b>{{ __($navbarItemSub->name) }}</b>
                                                                            <!-- </x-nav-link> -->

                                                                            @php

                                                                            if ($navbarItemSub->name=='Self-Employed') {
                                                                                @endphp
                                                                                <div class="my-2 py-2 bg-orange-600 w-32 md:w-full lg:w-5/6 xl:w-full text-left mb-1.5" x-show="sub">
                                                                                    <a href="/self-employed#sole-traders" class="inline-flex items-center px-2 lg:pl-4 font-medium w-64 text-white text-md hover:text-white focus:outline-none focus:text-white transition duration-150 ease-in-out">
                                                                                        Sole Traders
                                                                                    </a>
                                                                                </div>
                                                                                <div class="my-2 py-2 bg-orange-600 w-32 md:w-full lg:w-5/6 xl:w-full text-left mb-1.5" x-show="sub">
                                                                                    <a href="/self-employed#limited-company-directors" class="inline-flex items-center px-2 lg:pl-4 font-medium w-64 text-white text-md hover:text-white focus:outline-none focus:text-white transition duration-150 ease-in-out">
                                                                                        Limited Company Directors
                                                                                    </a>
                                                                                </div>
                                                                                <div class="my-2 py-2 bg-orange-600 w-32 md:w-full lg:w-5/6 xl:w-full text-left mb-1.5" x-show="sub">
                                                                                    <a href="/self-employed#partnerships" class="inline-flex items-center px-2 lg:pl-4 font-medium w-64 text-white text-md hover:text-white focus:outline-none focus:text-white transition duration-150 ease-in-out">
                                                                                        Partnerships
                                                                                    </a>
                                                                                </div>
                                                                                <div class="my-2 py-2 bg-orange-600 w-32 md:w-full lg:w-5/6 xl:w-full text-left mb-1.5" x-show="sub">
                                                                                    <a href="/self-employed#cis-workers" class="inline-flex items-center px-2 lg:pl-4 font-medium w-64 text-white text-md hover:text-white focus:outline-none focus:text-white transition duration-150 ease-in-out">
                                                                                        CIS Workers
                                                                                    </a>
                                                                                </div>
                                                                                @php
                                                                            }

                                                                            foreach ($navbars_header as $navbarItemSubSub) {
                                                                                if ($navbarItemSubSub['parent']==$navbarItemSub['name']) {
                                                                                    
                                                                                        @endphp
                                                                                        <div class="my-2 py-2 bg-orange-600 w-32 md:w-full lg:w-5/6 xl:w-full text-left mb-1.5" x-show="sub">
                                                                                            <x-nav-link-sub :href="route($navbarItemSubSub->slug)" :active="request()->routeIs($navbarItemSubSub->name)">
                                                                                                {{ __($navbarItemSubSub->name) }}
                                                                                            </x-nav-link>
                                                                                        </div>
                                                                                        @php
                                                                                    }
                                                                                
                                                                            }
                                                                            @endphp

                                                                        </div>
                                                                        @php
                                                                    }    
                                                                }
                                                                @endphp
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                                @endphp
                                            </div>
                                        @else
                                        <div class="pt-2  text-center">
                                            <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                                                {{ __('Home') }}
                                            </x-nav-link>  
                                        </div>

                                        @endif 
                                    @endif
                                @endforeach

                                <div class="pt-2  text-center">
                                    <x-nav-link :href="route('faqs')" :active="request()->routeIs('faqs')">
                                        {{ __('FAQs') }}
                                    </x-nav-link>
                                </div>
                                <div class="pt-2  text-center">
                                    <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                                        {{ __('Blog') }}
                                    </x-nav-link>
                                </div>

                            </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center md:hidden mt-2">
                            <button @click="open = ! open" class="inline-flex items-center justify-center mb-2 md:p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>
            @endauth
        @endif


    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden h-96 overflow-scroll">
        <div class="pt-2 pb-3 space-y-1">
            <div class="pt-2 px-4">Email: info@mortgagerefused.com</div>

            @foreach ($navbars_header as $navbarItem)
                @if ($navbarItem['parent']=='None' || !$navbarItem['parent'])
                    @if ($navbarItem['slug']!='home')
                            <x-responsive-nav-link :href="route($navbarItem->slug)" :active="request()->routeIs($navbarItem->slug)">
                                {{ __($navbarItem->name) }}
                            </x-responsive-nav-link>
                            @foreach ($navbars_header as $navbarItemSub)
                                @if ($navbarItemSub['parent']==$navbarItem['name'])
                                <div class="text-left">
                                    <x-responsive-nav-link :href="route($navbarItemSub->slug)" :active="request()->routeIs($navbarItemSub->slug)">
                                        {{ __($navbarItemSub->name) }}
                                    </x-responsive-nav-link>

                                    @php

                                    if ($navbarItemSub->name=='Self-Employed') {
                                        @endphp
                                        <!-- <a href="/self-employed#sole-traders" class="block w-full pl-8 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                                        Sole Traders
                                        </a>
                                        <a href="/self-employed#limited-company-directors" class="block w-full pl-8 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                                        Limited Company Directors
                                        </a>
                                        <a href="/self-employed#partnerships" class="block w-full pl-8 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                                        Partnerships
                                        </a>
                                        <a href="/self-employed#cis-workers" class="block w-full pl-8 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                                        CIS Workers
                                        </a> -->
                                        @php
                                    }
                                    @endphp


                                    @foreach ($navbars_header as $navbarItemSubSub)
                                        @if ($navbarItemSubSub['parent']==$navbarItemSub['name'])
                                            <!-- <x-responsive-nav-link-sub :href="route($navbarItemSub->slug)" :active="request()->routeIs($navbarItemSub->name)">
                                                {{ __($navbarItemSubSub->name) }}
                                            </x-responsive-nav-link-sub> -->
                                        @endif  
                                    @endforeach

                                </div>
                                @endif
                            @endforeach
                    @else
                        <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                            {{ __('Home') }}
                        </x-responsive-nav-link>
                    @endif 
                @endif
            @endforeach


            @if (Route::has('login'))
                @auth
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @endauth
            @endif

        </div>

        <!-- Responsive Settings Options -->
        @if (Route::has('login'))
            @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            
        </div>
            @endauth
        @endif
    </div>
</nav>
