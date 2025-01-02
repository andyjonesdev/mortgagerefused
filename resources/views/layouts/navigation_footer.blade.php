<div class="pt-2 pb-3 space-y-1">
    @foreach ($navbars_footer as $navbarItemFooter)
        <x-footer-link :href="route($navbarItemFooter->slug)" :active="request()->routeIs($navbarItemFooter->slug)">
            {{ __($navbarItemFooter->name) }}
        </x-footer-link><br>
    @endforeach
</div>
