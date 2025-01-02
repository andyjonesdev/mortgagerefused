<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a>
        </h2>
    </x-slot>

    <div class="py-2 md:py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($is_super_admin)
                        <div class="pb-4 text-2xl">Super Admin Dashboard</div>
                        <p class="mb-4 text-blue-400"><a href="/admin-users">View admin users</a></p>
                    @elseif ($is_admin)
                        <div class="pb-4 text-2xl">Admin Dashboard</div>
                        <p class="mb-4 text-blue-400"><a href="/admin-users">View admin users</a></p>
                    @elseif ($is_broker)
                        <div class="pb-4 text-2xl">Broker Dashboard</div>
                    @endif
                    <div class="flex gap-4 flex-wrap">
                        @if ($is_broker)
                            <a href="/calendar" class="px-10 py-6 text-xl bg-black text-white font-bold rounded-md">Calendar</a>
                        @endif
                        @foreach ($role_permisssions as $role_permisssion)
                            @if ($role_permisssion->name=='manage enquiries')
                                <a href="/enquiries/all/0" class="px-10 py-6 text-xl bg-black text-white font-bold rounded-md">Enquiries</a>
                            @endif
                            @if ($role_permisssion->name=='manage brokers')
                                <a href="/brokers/0" class="px-10 py-6 text-xl bg-black text-white font-bold rounded-md">Brokers</a>
                            @endif
                            @if ($role_permisssion->name=='manage pages')
                                <a href="/pages" class="px-10 py-6 text-xl bg-black text-white font-bold rounded-md">Pages</a>
                            @endif
                            @if ($role_permisssion->name=='manage posts')
                                <a href="/posts" class="px-10 py-6 text-xl bg-black text-white font-bold rounded-md">Posts</a>
                            @endif
                            @if ($role_permisssion->name=='manage faqs')
                                <a href="/edit-faqs" class="px-10 py-6 text-xl bg-black text-white font-bold rounded-md">FAQs</a>
                            @endif
                            @if ($role_permisssion->name=='manage testimonials')
                                <a href="/testimonials" class="px-10 py-6 text-xl bg-black text-white font-bold rounded-md">Testimionials</a>
                            @endif
                            @if ($role_permisssion->name=='manage permissions')
                                <a href="/permissions" class="px-10 py-6 text-xl bg-black text-white font-bold rounded-md">Permissions</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
