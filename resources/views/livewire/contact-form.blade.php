<div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-12">
    @if($submitted)
        {{-- Success State --}}
        <div class="flex flex-col items-center justify-center gap-4 py-16 text-center">
            <div class="w-16 h-16 bg-brand-green rounded-full flex items-center justify-center">
                <i class="fa-solid fa-check text-white text-3xl"></i>
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
                    <i class="fa-regular fa-user absolute left-3 top-1/2 -translate-y-1/2 text-brand-muted text-lg"></i>
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
                    <i class="fa-regular fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-brand-muted text-lg"></i>
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
                    <i class="fa-regular fa-comment absolute left-3 top-[14px] text-brand-muted text-lg"></i>
                    <textarea
                        wire:model.live="message"
                        rows="6"
                        placeholder="Tell us about your project or inquiry..."
                        class="w-full bg-[#f3f3f5] border border-gray-200 rounded-lg pl-11 pr-3 py-3 text-sm text-brand-dark placeholder-brand-muted focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition resize-none"
                    ></textarea>
                </div>
                <span class="text-xs text-brand-muted">{{ mb_strlen($message ?? '') }} characters</span>
                @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full flex items-center justify-center gap-2 bg-brand-green hover:bg-brand-green/90 text-white font-medium text-lg py-3 rounded-lg transition"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-75 cursor-not-allowed"
            >
                <i wire:loading.remove class="fa-regular fa-paper-plane text-lg"></i>
                <i wire:loading class="fa-solid fa-circle-notch fa-spin text-lg"></i>
                Send Message
            </button>
        </form>
    @endif
</div>
