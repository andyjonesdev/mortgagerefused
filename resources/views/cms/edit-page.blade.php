<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md md:text-3xl text-gray-800 leading-tight">
        <a href="/dashboard">Dashboard</a> / <a href="/pages">Pages</a> / Edit page
        </h2>
    </x-slot>

    <div class="py-2 md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <livewire:post-page :page_details='$page_details' :pages='$pages' />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
