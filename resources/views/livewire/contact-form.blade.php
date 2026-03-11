<div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-12">
    @if($submitted)
        {{-- Success State --}}
        <div class="flex flex-col items-center justify-center gap-4 py-16 text-center">
            <div class="w-16 h-16 bg-brand-green rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-brand-dark">Message Sent!</h3>
            <p class="text-brand-gray max-w-sm">Thank you for reaching out. We'll get back to you within 24 hours.</p>
            <button wire:click="$set('submitted', false)" class="mt-4 text-brand-green font-medium hover:underline">
                Send another message
            </button>
        </div>
    @else
        <h2 class="text-3xl font-bold text-brand-dark mb-2">Send Us a Message</h2>
        <p class="text-brand-gray mb-8">Fill out the form below and we'll get back to you as soon as possible.</p>

        <form wire:submit.prevent="submit" class="flex flex-col gap-6">
            {{-- Name --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-medium text-[#364153]">
                    Name <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-brand-muted" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                    <input
                        wire:model="name"
                        type="text"
                        placeholder="Your full name"
                        class="w-full bg-[#f3f3f5] border border-gray-200 rounded-lg pl-11 pr-3 py-3 text-sm text-brand-dark placeholder-brand-muted focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition"
                    />
                </div>
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Email --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-medium text-[#364153]">
                    Email <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-brand-muted" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                    </svg>
                    <input
                        wire:model="email"
                        type="email"
                        placeholder="your.email@example.com"
                        class="w-full bg-[#f3f3f5] border border-gray-200 rounded-lg pl-11 pr-3 py-3 text-sm text-brand-dark placeholder-brand-muted focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition"
                    />
                </div>
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Message --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-medium text-[#364153]">
                    Message <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <svg class="absolute left-3 top-3 w-5 h-5 text-brand-muted" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>
                    </svg>
                    <textarea
                        wire:model="message"
                        rows="6"
                        placeholder="Tell us about your project or inquiry..."
                        class="w-full bg-[#f3f3f5] border border-gray-200 rounded-lg pl-11 pr-3 py-3 text-sm text-brand-dark placeholder-brand-muted focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition resize-none"
                    ></textarea>
                </div>
                <span class="text-xs text-brand-muted">{{ strlen($message) }} characters</span>
                @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full flex items-center justify-center gap-2 bg-brand-green hover:bg-brand-green/90 text-white font-medium text-lg py-3 rounded-lg transition"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-75 cursor-not-allowed"
            >
                <svg wire:loading.remove class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                </svg>
                <svg wire:loading class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                </svg>
                Send Message
            </button>
        </form>
    @endif
</div>
