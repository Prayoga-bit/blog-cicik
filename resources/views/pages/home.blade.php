<x-layouts.main>
    
    <!-- Hero Section -->
    <section class="relative w-full min-h-screen flex items-center justify-start bg-brand-dark pt-20 px-6 md:px-12 lg:px-24 overflow-hidden">
        <!-- Abstract background graphics (representing subtracts from figma) -->
        <div class="absolute inset-0 z-0 opacity-40">
            <!-- Placeholders for background blobs -->
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-brand-green blur-[120px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-brand-yellow/20 blur-[150px] rounded-full"></div>
        </div>

        <div class="relative z-10 max-w-[700px] flex flex-col gap-6 mt-16 md:mt-0">
            <h1 class="font-bold text-5xl md:text-6xl text-white leading-tight">
                Smart Strategies for Managing Your Futures Assets
            </h1>
            <p class="font-medium text-xl text-white/90 leading-relaxed max-w-[550px]">
                Professional assistance for managing gold, forex, and other trading instruments
            </p>
            <div class="mt-6 flex">
                <a href="#explore" class="bg-brand-green group flex items-center gap-3 px-6 py-4 rounded-full font-medium text-white text-lg hover:bg-green-800 transition-colors">
                    Explore More
                    <span class="bg-brand-yellow text-brand-dark w-8 h-8 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- Who We Are Section -->
    <x-ui.section bg="light" id="explore" class="min-h-[700px]">
        <div class="flex flex-col lg:flex-row items-center gap-16 w-full h-full">
            <div class="flex flex-col gap-8 w-full lg:w-1/2">
                <div class="inline-block bg-brand-yellow rounded-full px-4 py-1 text-sm font-bold text-brand-dark w-max">
                    WHO WE ARE
                </div>
                
                <h2 class="font-bold leading-tight text-4xl md:text-5xl text-brand-dark">
                    Empowering Financial Future: <br>
                    <span class="text-brand-green">Investing in Success</span>
                </h2>
                
                <p class="font-normal text-brand-gray text-lg leading-relaxed max-w-[520px]">
                    We provide expert advice and assistance for managing your financial assets. Our team of dedicated professionals ensures that your investment portfolio is optimized for growth while minimizing risks.
                </p>
                
                <div class="flex flex-col gap-4 mt-2">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-brand-yellow" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="font-medium text-brand-dark text-lg">Top Financial Strategy</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-brand-yellow" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="font-medium text-brand-dark text-lg">Profit Max Solutions</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-brand-yellow" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="font-medium text-brand-dark text-lg">Guest to Advisory</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-brand-yellow" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="font-medium text-brand-dark text-lg">Risk Free Curve</span>
                    </div>
                </div>
            </div>
            
            <div class="w-full lg:w-1/2 relative h-[500px] mt-10 lg:mt-0">
                <div class="absolute -top-5 left-5 w-full h-full border-2 border-brand-yellow rounded-3xl z-0"></div>
                <div class="relative w-full h-full rounded-2xl overflow-clip shadow-2xl z-10 bg-gray-200">
                    <img alt="Corporate advisory meeting" loading="lazy" class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=1000&auto=format&fit=crop" />
                    
                    <!-- Floating Card -->
                    <div class="absolute bottom-8 left-8 bg-white p-6 rounded-2xl shadow-lg w-[320px]">
                        <h3 class="font-bold text-brand-green text-lg">Risk Management Plan</h3>
                        <p class="font-normal text-brand-muted text-sm mt-2">
                            Comprehensive strategies to protect your assets and ensure long-term stability.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-ui.section>

    <!-- Latest Insights Section -->
    <x-ui.section bg="white">
        <div class="flex justify-between items-end mb-12">
            <h2 class="font-bold text-brand-dark text-4xl">Latest Insights</h2>
            <a href="#" class="font-medium text-brand-green flex items-center gap-2 hover:underline">
                View All Posts
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <x-ui.card 
                image="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop"
                category="Market Analysis"
                date="March 15, 2026"
                title="Understanding Market Volatility in 2026"
                description="Discover the latest trends and strategies that can help elevate your financial portfolio to the next level."
            />
            <x-ui.card 
                image="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop"
                category="Investment Strategy"
                date="March 10, 2026"
                title="The Golden Rule of Asset Allocation"
                description="Discover the latest trends and strategies that can help elevate your financial portfolio to the next level."
            />
            <x-ui.card 
                image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                category="Business"
                date="March 5, 2026"
                title="Why Corporate Consulting Matters"
                description="Discover the latest trends and strategies that can help elevate your financial portfolio to the next level."
            />
        </div>
    </x-ui.section>

    <!-- Stats Section -->
    <section class="bg-brand-green py-16 w-full">
        <div class="max-w-7xl mx-auto px-6 md:px-12 w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-12">
            <x-ui.stat value="95%" label="Client Retention" />
            <x-ui.stat value="98%" label="Business Growth" />
            <x-ui.stat value="5.00" label="Average Rating" />
            <x-ui.stat value="10k+" label="Happy Clients" :borderRight="false" />
        </div>
    </section>

    <!-- Practice Areas Section -->
    <x-ui.section bg="light">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
            <div class="flex flex-col gap-4">
                <h2 class="font-bold text-4xl text-brand-dark">Our Practice Areas</h2>
                <p class="font-normal text-brand-gray text-lg">Specialized financial services designed to maximize your potential.</p>
            </div>
            <x-ui.button variant="outline" href="#">
                View All Services
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </x-ui.button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Area 1 -->
            <div class="relative h-[400px] w-full rounded-2xl overflow-clip shadow-md group border border-transparent">
                <img alt="Gold Investment" loading="lazy" class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop" />
                <div class="absolute inset-0 bg-brand-dark/60"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-between">
                    <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-white mb-2">Gold Investment</h3>
                        <p class="font-normal text-gray-200 text-sm leading-relaxed">Secure your future with tangible assets. We provide expert guidance on gold market trends and acquisition.</p>
                    </div>
                </div>
            </div>

            <!-- Area 2 -->
            <div class="relative h-[400px] w-full rounded-2xl overflow-clip shadow-md group">
                <img alt="Forex Trading" loading="lazy" class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop" />
                <div class="absolute inset-0 bg-brand-dark/60"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-between">
                    <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-white mb-2">Forex Trading</h3>
                        <p class="font-normal text-gray-200 text-sm leading-relaxed">Navigate the global currency markets with our professional trading strategies and risk management tools.</p>
                    </div>
                </div>
            </div>

            <!-- Area 3 -->
            <div class="relative h-[400px] w-full rounded-2xl overflow-clip shadow-md group">
                <img alt="Risk Management" loading="lazy" class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop" />
                <div class="absolute inset-0 bg-brand-dark/60"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-between">
                    <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-white mb-2">Risk Management</h3>
                        <p class="font-normal text-gray-200 text-sm leading-relaxed">Comprehensive insurance and protection plans to safeguard your wealth against unforeseen circumstances.</p>
                    </div>
                </div>
            </div>

            <!-- Area 4 -->
            <div class="relative h-[400px] w-full rounded-2xl overflow-clip shadow-md group">
                <img alt="Strategic Consulting" loading="lazy" class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=800&auto=format&fit=crop" />
                <div class="absolute inset-0 bg-brand-dark/60"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-between">
                    <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-white mb-2">Strategic Consulting</h3>
                        <p class="font-normal text-gray-200 text-sm leading-relaxed">Tailored business and financial advice to help you reach your corporate and personal goals.</p>
                    </div>
                </div>
            </div>
        </div>
    </x-ui.section>

</x-layouts.main>