<header class="fixed top-0 left-0 w-full z-50" x-data="{ open: false }">
    <div class="backdrop-blur-[12px] bg-[rgba(254,249,239,0.1)] border-b border-white/10 w-full">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-4 flex items-center justify-between">
            <!-- Brand -->
            <a href="/" class="font-cursive text-brand-dark text-3xl md:text-4xl hover:opacity-80 transition-opacity">
                Christine Team
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-8 font-medium text-brand-dark text-base">
                <a href="/" class="@if(request()->is('/')) underline @else hover:underline @endif">Home</a>
                <a href="/about" class="@if(request()->is('about')) underline @else hover:underline @endif">About Us</a>
                <a href="/gallery" class="@if(request()->is('gallery')) underline @else hover:underline @endif">Gallery</a>
                <a href="/blog" class="@if(request()->is('blog') || request()->is('blog/*')) underline @else hover:underline @endif">Blog</a>
                <a href="/contact" class="@if(request()->is('contact')) underline @else hover:underline @endif">Contact Us</a>
            </nav>

            <!-- Desktop CTA -->
            @auth
                <div class="hidden md:flex items-center gap-4">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="w-10 h-10 rounded-full bg-brand-yellow text-brand-dark font-semibold flex items-center justify-center hover:bg-yellow-400 transition-colors" title="{{ auth()->user()->name }}">
                                {{ auth()->user()->initials() }}
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            @if(auth()->user()->is_admin)
                                <x-dropdown-link href="{{ url('/dashboard') }}" wire:navigate>
                                    {{ __('Admin Dashboard') }}
                                </x-dropdown-link>
                                <hr class="border-gray-100">
                                <x-dropdown-link href="{{ route('gallery-editor') }}" wire:navigate>
                                    {{ __('My Gallery') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('blog-editor') }}" wire:navigate>
                                    {{ __('My Blog') }}
                                </x-dropdown-link>
                            @else
                                <x-dropdown-link href="{{ route('user.gallery-editor') }}" wire:navigate>
                                    {{ __('My Gallery') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('user.blog-editor') }}" wire:navigate>
                                    {{ __('My Blog') }}
                                </x-dropdown-link>
                            @endif
                            <x-dropdown-link href="{{ route('profile') }}" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <hr class="border-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <x-ui.button href="{{ route('login') }}" class="hidden md:inline-flex px-6 md:px-8 py-2 md:py-3">
                    Login
                </x-ui.button>
            @endauth

            <!-- Mobile Hamburger Button -->
            <button
                @click="open = !open"
                class="md:hidden relative w-10 h-10 flex items-center justify-center text-brand-dark focus:outline-none"
                aria-label="Toggle menu"
            >
                <span class="sr-only">Menu</span>
                <div class="w-6 flex flex-col items-center justify-center gap-[5px]">
                    <span
                        class="block h-[2px] w-6 bg-brand-dark rounded transition-all duration-300 origin-center"
                        :class="open ? 'rotate-45 translate-y-[7px]' : ''"
                    ></span>
                    <span
                        class="block h-[2px] w-6 bg-brand-dark rounded transition-all duration-300"
                        :class="open ? 'opacity-0 scale-x-0' : ''"
                    ></span>
                    <span
                        class="block h-[2px] w-6 bg-brand-dark rounded transition-all duration-300 origin-center"
                        :class="open ? '-rotate-45 -translate-y-[7px]' : ''"
                    ></span>
                </div>
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        x-cloak
        @click.outside="open = false"
        class="md:hidden backdrop-blur-[12px] bg-[rgba(254,249,239,0.1)] border-b border-white/10 w-full"
    >
        <nav class="max-w-7xl mx-auto px-6 py-4 flex flex-col gap-4 font-medium text-brand-dark text-base">
            <a href="/" class="py-2 @if(request()->is('/')) underline @else hover:underline @endif">Home</a>
            <a href="/about" class="py-2 @if(request()->is('about')) underline @else hover:underline @endif">About Us</a>
            <a href="/gallery" class="py-2 @if(request()->is('gallery')) underline @else hover:underline @endif">Gallery</a>
            <a href="/blog" class="py-2 @if(request()->is('blog') || request()->is('blog/*')) underline @else hover:underline @endif">Blog</a>
            <a href="/contact" class="py-2 @if(request()->is('contact')) underline @else hover:underline @endif">Contact Us</a>
            <hr class="border-brand-dark/10">
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center bg-brand-yellow text-brand-dark font-medium rounded-full px-6 py-3 hover:bg-yellow-400 transition-colors">
                        Admin Dashboard
                    </a>
                @endif
                <a href="{{ route('user.gallery-editor') }}" wire:navigate class="inline-flex items-center justify-center bg-brand-yellow text-brand-dark font-medium rounded-full px-6 py-3 hover:bg-yellow-400 transition-colors">
                    My Gallery
                </a>
                <a href="{{ route('user.blog-editor') }}" wire:navigate class="inline-flex items-center justify-center bg-brand-yellow text-brand-dark font-medium rounded-full px-6 py-3 hover:bg-yellow-400 transition-colors">
                    My Blog
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full inline-flex items-center justify-center bg-gray-200 text-brand-dark font-medium rounded-full px-6 py-3 hover:bg-gray-300 transition-colors">
                        Log Out
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center bg-brand-yellow text-brand-dark font-medium rounded-full px-6 py-3 hover:bg-yellow-400 transition-colors">
                    Login
                </a>
            @endauth
        </nav>
    </div>
</header>