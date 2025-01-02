<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
            <a href="/dashboard">Dashboard</a> / Permissions
        </h2>
    </x-slot>

    <script>
        function handleClick(permission_id) {
            var r = confirm('Are you sure you want to delete this permission?');
            if (r) {
                console.log("permission id = "+permission_id);
                window.location.href = "/delete-permission/"+permission_id;
            }
        }
    </script>

    <div class="py-2 md:py-12">
        <div class="mx-auto sm:px-6 lg:px-8">

            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="addRole" method="POST">
                        @csrf
                        <div class="py-4 bold text-2xl">
                            Add a new role
                        </div>

                        <div class="py-4">
                            <label for="name">Name:</label><br>
                            <input class="w-full text-3xl border-slate-200 py-3" type="text" name="name" id="name" value="" />
                        </div>
                           
                        <p class="my-6"><button type="submit" class="py-2 px-4 text-white rounded-md bg-black text-center">Add role</button></p>

                    </form>

                </div>
            </div> -->

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h3 class="pt-10 py-4 text-2xl">List of roles</h3>
                    @if (count($roles)==0)
                        <h3 class="py-4">Sorry, no roles found</h3>
                    @else
                        <div class="hidden md:grid grid-cols-5 gap-4 font-bold text-lg text-gray-700">
                            <!-- <div class="mt-1">Date</div> -->
                            <div class="mt-1">Name</div>
                            <!-- <div class="mt-1">Guard name</div> -->
                            <div class="mt-1">Permissions</div>
                            <div class="mt-1 col-span-4"></div>
                        </div>
                        @foreach ($roles as $role)
                            <div class="grid grid-cols-5 gap-5 pb-4 border-b text-lg">
                                <div class="mt-4 py-2">{{$role['name']}}</div>
                                <!-- <div class="mt-4">{{$role['guard_name']}}</div> -->
                                <div class="mt-4 md:flex gap-2 col-span-4">
                                @foreach ($role->permissions as $role_permission)
                                    <div class="bg-gray-700 p-2 md:pl-4 mb-2 text-white rounded-md">{{$role_permission['name']}} <a href="/delete-permission/{{$role->id}}/{{$role_permission->id}}" class="pl-4 pr-2 text-gray-300">X</a></div>
                                @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                <h3 class="pt-10 py-4 text-2xl">List of permissions</h3>
                    @if (count($permissions)==0)
                        <h3 class="py-4">Sorry, no permissions found</h3>
                    @else
                        <div class="hidden md:grid grid-cols-5 gap-4 font-bold text-lg text-gray-700">
                            <!-- <div class="mt-1">Date</div> -->
                            <div class="mt-1">Name</div>
                            <!-- <div class="mt-1">Guard name</div> -->
                            <div class="mt-1">Assign to</div>
                            <div class="mt-1"></div>
                        </div>
                        @foreach ($permissions as $permission)
                            <div class="md:grid grid-cols-5 gap-5 pb-4 border-b text-lg">
                                <div class="mt-4">{{$permission['name']}}</div>
                                <!-- <div class="mt-4">{{$permission['guard_name']}}</div> -->
                                <livewire:role-select :permission="$permission" :roles="$roles" />
                                <div class="mt-4 text-lg">
                                    <a onclick="handleClick({{$permission['id']}})" class="py-2 px-4 max-h-11 text-white rounded-md bg-black text-center cursor-pointer">delete</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">

                    <form action="addPermission" method="POST">
                        @csrf
                        <div class="py-4 bold text-2xl">
                            Add a new permission
                        </div>

                        <div class="py-4">
                            <label for="name">Name:</label><br>
                            <input class="w-full text-md md:text-3xl border-slate-200 py-3" type="text" name="name" id="name" value="" />
                        </div>
                           
                        <p class="my-6"><button type="submit" class="py-2 px-4 text-white rounded-md bg-black text-center">Add permission</button></p>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
