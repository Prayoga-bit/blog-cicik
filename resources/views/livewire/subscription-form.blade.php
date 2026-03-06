<form wire:submit.prevent="subscribe" class="flex flex-col gap-3 w-full">
    @if ($successMessage)
        <div class="text-brand-yellow text-sm">{{ $successMessage }}</div>
    @endif
    
    <div class="bg-[#2a2a2a] border border-[#364153] rounded-[10px] flex items-center overflow-hidden px-4 py-3">
        <label for="email" class="sr-only">Your email address</label>
        <input 
            wire:model="email" 
            id="email"
            type="email" 
            placeholder="Your email address" 
            class="bg-transparent border-none text-white text-base outline-none w-full focus:ring-0 placeholder:text-white/50" 
            required 
        />
    </div>
    <button type="submit" class="bg-brand-yellow w-full rounded-[10px] py-3 font-bold text-brand-dark text-center hover:bg-yellow-400 transition-colors">
        <span wire:loading.remove>Subscribe</span>
        <span wire:loading>Processing...</span>
    </button>
</form>