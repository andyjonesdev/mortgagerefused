<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / Admin Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
           
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    
                <h3 class="pt-10 py-4 text-2xl">List of super admin users</h3>
                    @if (count($super_admin_users)==0)
                        <h3 class="py-4">Sorry, no admin users found</h3>
                    @else
                        <div class="hidden md:grid grid-cols-5 gap-4 font-bold text-lg text-gray-700">
                            <div class="mt-1">Name</div>
                            <div class="mt-1">Email</div>
                        </div>
                        @foreach ($super_admin_users as $super_admin_user)
                            <div class="md:grid grid-cols-5 gap-5 pb-4 border-b text-lg">
                                <div class="mt-4">{{$super_admin_user['name']}} {{$super_admin_user['surname']}}</div>
                                <div class="mt-4">{{$super_admin_user['email']}}</div>
                            </div>
                        @endforeach
                    @endif
                    
                    <h3 class="pt-10 py-4 text-2xl">List of admin users</h3>
                    @if (count($admin_users)==0)
                        <h3 class="py-4">Sorry, no admin users found</h3>
                    @else
                        <div class="hidden md:grid grid-cols-5 gap-4 font-bold text-lg text-gray-700">
                            <div class="mt-1">Name</div>
                            <div class="mt-1">Email</div>
                        </div>
                        @foreach ($admin_users as $admin_user)
                            <div class="md:grid grid-cols-5 gap-5 pb-4 border-b text-lg">
                                <div class="mt-4">{{$admin_user['name']}} {{$admin_user['surname']}}</div>
                                <div class="mt-4">{{$admin_user['email']}}</div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
