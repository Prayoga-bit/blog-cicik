<footer class="bg-brand-dark text-white pt-20 pb-8 px-6 md:px-12 lg:px-24 w-full">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start gap-12 md:gap-8">
        
        <!-- Brand & Description -->
        <div class="flex flex-col gap-6 w-full md:w-1/4">
            <h2 class="font-cursive text-brand-light text-4xl">Christine Team</h2>
            <p class="text-brand-muted text-base leading-relaxed">
                Your trusted partner in financial growth and asset management. We help you navigate the complexities of the market.
            </p>
            <div class="flex items-center gap-4">
                <!-- Social Links Placeholder -->
                <a href="#" class="w-10 h-10 bg-brand-green rounded-full flex items-center justify-center hover:bg-green-800 transition-colors">
                    <span class="sr-only">Facebook</span>
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg>
                </a>
                <a href="#" class="w-10 h-10 bg-brand-green rounded-full flex items-center justify-center hover:bg-green-800 transition-colors">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path></svg>
                </a>
                <a href="#" class="w-10 h-10 bg-brand-green rounded-full flex items-center justify-center hover:bg-green-800 transition-colors">
                    <span class="sr-only">Instagram</span>
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                </a>
                <a href="#" class="w-10 h-10 bg-brand-green rounded-full flex items-center justify-center hover:bg-green-800 transition-colors">
                    <span class="sr-only">LinkedIn</span>
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path><circle cx="4" cy="4" r="2"></circle></svg>
                </a>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="flex flex-col w-full md:w-1/6">
            <h4 class="font-bold text-brand-yellow text-xl mb-6">Quick Links</h4>
            <ul class="flex flex-col gap-4 text-brand-muted">
                <li><a href="#" class="hover:text-white transition-colors">Home</a></li>
                <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Services</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
            </ul>
        </div>

        <!-- Services Links -->
        <div class="flex flex-col w-full md:w-1/6">
            <h4 class="font-bold text-brand-yellow text-xl mb-6">Services</h4>
            <ul class="flex flex-col gap-4 text-brand-muted">
                <li><a href="#" class="hover:text-white transition-colors">Gold Investment</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Forex Trading</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Risk Management</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Strategic Consulting</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Financial Planning</a></li>
            </ul>
        </div>

        <!-- Newsletter -->
        <div class="flex flex-col w-full md:w-1/4">
            <h4 class="font-bold text-brand-yellow text-xl mb-4">Newsletter</h4>
            <p class="text-brand-muted text-base mb-6">
                Subscribe to our newsletter for the latest updates and financial insights.
            </p>
            <livewire:subscription-form />
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="max-w-7xl mx-auto border-t border-gray-800 mt-16 pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-brand-muted">
        <p>&copy; {{ date('Y') }} Christine Team. All rights reserved.</p>
        <div class="flex items-center gap-6">
            <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
            <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
        </div>
    </div>
</footer>