<x-layouts.main>

    <!-- Hero Section - About Us -->
    <section class="relative w-full min-h-[600px] flex items-center bg-brand-light pt-28 pb-16 px-6 md:px-12 lg:px-24 overflow-hidden">
        <div class="max-w-7xl mx-auto w-full flex flex-col lg:flex-row items-center gap-12">
            <!-- Left Content -->
            <div class="flex flex-col gap-6 w-full lg:w-1/2">
                <div class="inline-block bg-brand-yellow rounded-full px-4 py-1 text-sm font-bold text-brand-dark w-max">
                    WHO WE ARE
                </div>
                <h1 class="font-bold text-5xl md:text-6xl text-brand-dark leading-tight">
                    ABOUT US
                </h1>
                <div class="w-16 h-1 bg-brand-green"></div>
                <p class="font-normal text-brand-gray text-lg leading-relaxed max-w-[480px]">
                    We are a team of dedicated professionals committed to providing expert financial advice and strategies. Our mission is to empower your financial future through innovative solutions and personalized care. With years of experience and a passion for excellence, we help our clients navigate the complexities of financial markets.
                </p>
                <div class="mt-2">
                    <x-ui.button variant="secondary" href="#vision">
                        More Info
                    </x-ui.button>
                </div>
            </div>

            <!-- Right Image -->
            <div class="w-full lg:w-1/2 relative">
                <div class="relative w-full h-[400px] rounded-2xl overflow-clip shadow-2xl">
                    <img alt="Modern corporate building" loading="lazy" class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1000&auto=format&fit=crop" />
                </div>
                <!-- 95% Client Success Badge -->
                <div class="absolute top-4 right-4 bg-brand-light px-4 py-3 rounded-xl shadow-lg flex items-center gap-3">
                    <div class="w-10 h-10 bg-brand-green rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="font-bold text-brand-dark text-lg leading-tight">95%</p>
                        <p class="text-brand-muted text-xs">Client Success</p>
                    </div>
                </div>
                <!-- 10+ Years Badge -->
                <div class="absolute -bottom-6 right-8 bg-white px-6 py-4 rounded-xl shadow-lg">
                    <p class="font-bold text-brand-dark text-3xl leading-tight">10+</p>
                    <p class="text-brand-muted text-sm">Years of Experience</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <x-ui.section bg="white" id="vision">
        <div class="flex flex-col items-center gap-6 mb-16">
            <div class="inline-block bg-brand-yellow rounded-full px-4 py-1 text-sm font-bold text-brand-dark w-max">
                OUR PURPOSE
            </div>
            <h2 class="font-bold text-4xl md:text-5xl text-brand-dark text-center">Vision & Mission</h2>
        </div>

        <div class="flex flex-col lg:flex-row items-start gap-16 w-full">
            <!-- Image -->
            <div class="w-full lg:w-5/12 relative h-[500px] rounded-2xl overflow-clip shadow-xl">
                <img alt="Business meeting" loading="lazy" class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=1000&auto=format&fit=crop" />
            </div>

            <!-- Content -->
            <div class="w-full lg:w-7/12 flex flex-col gap-10">
                <!-- Our Vision -->
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-brand-yellow rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-brand-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <h3 class="font-bold text-2xl text-brand-dark">Our Vision</h3>
                    </div>
                    <p class="font-normal text-brand-gray text-base leading-relaxed">
                        To be the leading financial consultancy firm, recognized for our integrity, innovation, and unwavering commitment to client success. We envision a world where financial freedom is accessible to all through smart strategies and expert guidance.
                    </p>
                </div>

                <!-- Our Mission -->
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-brand-yellow rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-brand-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="font-bold text-2xl text-brand-dark">Our Mission</h3>
                    </div>
                    <div class="flex flex-col gap-3 mt-1">
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-brand-green shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-brand-gray text-base leading-relaxed">Provide expert financial guidance tailored to individual needs.</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-brand-green shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-brand-gray text-base leading-relaxed">Ensure transparency and trust in all our dealings.</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-brand-green shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-brand-gray text-base leading-relaxed">Innovate constantly to stay ahead of market trends.</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-brand-green shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-brand-gray text-base leading-relaxed">Empower clients with knowledge and tools for lasting success.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-ui.section>

    <!-- Divider -->
    <div class="w-full border-t border-gray-200"></div>

    <!-- Our Expertise Section -->
    <x-ui.section bg="white">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
            <div class="flex flex-col gap-3">
                <span class="text-brand-muted text-sm font-semibold tracking-widest uppercase">Project Areas</span>
                <h2 class="font-bold text-4xl text-brand-dark">Our Expertise</h2>
            </div>
            <p class="font-normal text-brand-gray text-lg max-w-md">
                We specialize in diverse financial sectors to ensure your portfolio is robust and resilient.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Expertise 1 - Gold Investment -->
            <div class="relative h-[400px] w-full rounded-2xl overflow-clip shadow-md group">
                <img alt="Gold Investment" loading="lazy" class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop" />
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/80 via-brand-dark/40 to-transparent"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-between">
                    <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-white mb-2">Gold Investment</h3>
                        <p class="font-normal text-gray-200 text-sm leading-relaxed">Secure your wealth with precious metal strategies. Our expertise ensures maximum returns and portfolio stability through strategic precious metal investments.</p>
                    </div>
                </div>
            </div>

            <!-- Expertise 2 - Forex Trading -->
            <div class="relative h-[400px] w-full rounded-2xl overflow-clip shadow-md group">
                <img alt="Forex Trading" loading="lazy" class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop" />
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/80 via-brand-dark/40 to-transparent"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-between">
                    <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-white mb-2">Forex Trading</h3>
                        <p class="font-normal text-gray-200 text-sm leading-relaxed">Navigate the global currency market with professional guidance and cutting-edge trading strategies for consistent growth.</p>
                    </div>
                </div>
            </div>

            <!-- Expertise 3 - Risk Management -->
            <div class="relative h-[400px] w-full rounded-2xl overflow-clip shadow-md group">
                <img alt="Risk Management" loading="lazy" class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop" />
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/80 via-brand-dark/40 to-transparent"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-between">
                    <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-white mb-2">Risk Management</h3>
                        <p class="font-normal text-gray-200 text-sm leading-relaxed">Comprehensive risk assessment and mitigation strategies to protect your assets and ensure long-term financial stability.</p>
                    </div>
                </div>
            </div>

            <!-- Expertise 4 - Strategic Consulting -->
            <div class="relative h-[400px] w-full rounded-2xl overflow-clip shadow-md group">
                <img alt="Strategic Consulting" loading="lazy" class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=800&auto=format&fit=crop" />
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/80 via-brand-dark/40 to-transparent"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-between">
                    <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-white mb-2">Strategic Consulting</h3>
                        <p class="font-normal text-gray-200 text-sm leading-relaxed">Tailored business and financial consulting to achieve your corporate goals forward with clarity and precision.</p>
                    </div>
                </div>
            </div>
        </div>
    </x-ui.section>

    <!-- Divider -->
    <div class="w-full border-t border-gray-200"></div>

    <!-- Meet The Team Section -->
    <x-ui.section bg="white">
        <div class="flex flex-col items-center gap-4 mb-16 text-center">
            <span class="text-brand-muted text-sm font-semibold tracking-widest uppercase">Meet The Team</span>
            <h2 class="font-cursive text-5xl md:text-6xl text-brand-dark">The Experts Behind Your Success</h2>
            <p class="font-normal text-brand-gray text-lg max-w-xl mt-2">
                Our team of experienced professionals brings diverse expertise and a shared passion for helping clients achieve financial success.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Team Member 1 -->
            <div class="flex flex-col items-center gap-4">
                <div class="w-48 h-48 rounded-2xl overflow-clip bg-gray-200">
                    <img alt="James Anderson" loading="lazy" class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=400&auto=format&fit=crop" />
                </div>
                <div class="text-center">
                    <h3 class="font-bold text-brand-dark text-lg">James Anderson</h3>
                    <p class="text-brand-muted text-sm">CEO & Founder</p>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="flex flex-col items-center gap-4">
                <div class="w-48 h-48 rounded-2xl overflow-clip bg-gray-200">
                    <img alt="Sarah Mitchell" loading="lazy" class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=400&auto=format&fit=crop" />
                </div>
                <div class="text-center">
                    <h3 class="font-bold text-brand-dark text-lg">Sarah Mitchell</h3>
                    <p class="text-brand-muted text-sm">Head of Strategy</p>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="flex flex-col items-center gap-4">
                <div class="w-48 h-48 rounded-2xl overflow-clip bg-gray-200">
                    <img alt="Michael Chen" loading="lazy" class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" />
                </div>
                <div class="text-center">
                    <h3 class="font-bold text-brand-dark text-lg">Michael Chen</h3>
                    <p class="text-brand-muted text-sm">Senior Analyst</p>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="flex flex-col items-center gap-4">
                <div class="w-48 h-48 rounded-2xl overflow-clip bg-gray-200">
                    <img alt="Emily Rodriguez" loading="lazy" class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=400&auto=format&fit=crop" />
                </div>
                <div class="text-center">
                    <h3 class="font-bold text-brand-dark text-lg">Emily Rodriguez</h3>
                    <p class="text-brand-muted text-sm">Risk Manager</p>
                </div>
            </div>
        </div>
    </x-ui.section>

</x-layouts.main>
