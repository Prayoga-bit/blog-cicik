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
                    <i class="fa-brands fa-facebook-f text-white text-lg"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-brand-green rounded-full flex items-center justify-center hover:bg-green-800 transition-colors">
                    <span class="sr-only">Twitter</span>
                    <i class="fa-brands fa-twitter text-white text-lg"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-brand-green rounded-full flex items-center justify-center hover:bg-green-800 transition-colors">
                    <span class="sr-only">Instagram</span>
                    <i class="fa-brands fa-instagram text-white text-lg"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-brand-green rounded-full flex items-center justify-center hover:bg-green-800 transition-colors">
                    <span class="sr-only">LinkedIn</span>
                    <i class="fa-brands fa-linkedin-in text-white text-lg"></i>
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