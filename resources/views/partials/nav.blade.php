<nav class="md:flex md:justify-between md:items-center">
    <div class="flex flex-col justify-center items-center">
        <a href="/">
            <img class="mr-1" src="{{asset('images/logo_test.png')}}" alt="Lara learn logo" width="135" height="10">
        </a>
        <h4 class="font-bold">Job Board</h4>
    </div>

    <div class="mt-8 md:mt-0 flex items-center">
        @auth
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
                </x-slot>

                @admin
                    <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Dashboard
                    </x-dropdown-item>
                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post
                    </x-dropdown-item>
                @endadmin
                <x-dropdown-item href="#" x-data="{}"
                                 @click.prevent="document.querySelector('#logout-form').submit()">Log Out
                </x-dropdown-item>

                <form id="logout-form" method="POST" action="/logout" class="hidden">
                    @csrf
                </form>
            </x-dropdown>
        @else
            <a href="/register"
               class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">Register</a>
            <a href="/login"
               class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">Log
                In</a>
        @endauth
        <a href="#newsletter"
           class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>
