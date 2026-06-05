<template>
    <main class="min-h-screen w-full bg-[#0B1320] font-sans antialiased text-slate-800 overflow-x-hidden">
        
        <!-- ========================================================================= -->
        <!-- VIEW: SELECTION & GUEST PORTALS (Split 50/50 Layout) -->
        <!-- ========================================================================= -->
        <div v-if="currentView === 'selection' || currentView === 'guest'" class="min-h-screen w-full flex flex-col lg:flex-row animate-fade-in">
            <!-- Left Side: Visual / Hero Section -->
            <section class="relative lg:w-1/2 min-h-[40vh] lg:min-h-screen flex flex-col justify-between p-8 md:p-12 lg:p-16 overflow-hidden">
                <!-- Background Image with Overlay -->
                <div 
                    class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-10000 ease-out scale-105" 
                    style="background-image: url('/images/staycation_hero.png');"
                ></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-slate-950/30"></div>

                <!-- Top Left Logo/Title -->
                <div class="relative z-10">
                    <span class="text-white/60 text-xs font-semibold tracking-[0.25em] uppercase">Private Sanctuary</span>
                </div>

                <!-- Main Tagline in Middle/Bottom -->
                <div class="relative z-10 mt-auto mb-10 max-w-xl">
                    <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-white font-bold leading-[1.1] tracking-tight">
                        Aruga Staycation
                    </h1>
                    <p class="mt-4 text-white/80 text-base md:text-lg lg:text-xl font-light leading-relaxed max-w-md">
                        Where architectural precision meets the raw, serene beauty of the Philippines.
                    </p>
                </div>

                <!-- Bottom Left Badge: Island Status -->
                <div class="relative z-10 self-start">
                    <div class="backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl p-4 flex items-center gap-4 transition-all duration-300 hover:bg-white/15">
                        <div class="h-10 w-10 rounded-xl bg-white/10 flex items-center justify-center text-white">
                            <!-- Waves SVG Icon -->
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-9-8v2m0 8v2" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 8c0 1.1.9 2 2 2h10a2 2 0 002-2M5 16c0 1.1.9 2 2 2h10a2 2 0 002-2" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-white/50 text-[10px] font-semibold uppercase tracking-wider">Island Status</p>
                            <p class="text-white text-sm font-medium">Perfect Clear & Serene</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Right Side: Action / Form Section -->
            <section class="lg:w-1/2 min-h-[60vh] lg:min-h-screen bg-[#FAF9F6] flex flex-col justify-between p-8 md:p-12 lg:p-16">
                <!-- Top Right spacer/navigation -->
                <div class="flex justify-end items-center">
                    <button 
                        v-if="currentView !== 'selection'" 
                        @click="setView('selection')"
                        class="flex items-center gap-2 text-slate-500 hover:text-[#0B1E3F] text-sm font-medium transition cursor-pointer"
                    >
                        <!-- Back Arrow SVG -->
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to portal
                    </button>
                </div>

                <!-- Central Content Area -->
                <div class="my-auto max-w-md w-full mx-auto py-8">
                    <!-- VIEW: ROLE SELECTION -->
                    <div v-if="currentView === 'selection'" class="space-y-8 animate-fade-in">
                        <div>
                            <h2 class="font-serif text-3xl md:text-4xl text-[#0B1E3F] font-bold tracking-tight">
                                Portal Entry
                            </h2>
                            <p class="mt-2 text-slate-500 text-sm md:text-base">
                                Choose your preferred way to experience your private sanctuary.
                            </p>
                        </div>

                        <div class="space-y-4">
                            <!-- Login as Guest Button -->
                            <button 
                                @click="setView('guest')"
                                class="w-full py-4.5 px-6 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] active:scale-[0.99] text-white font-semibold text-sm flex items-center justify-center gap-3 transition-all duration-200 shadow-md shadow-blue-950/10 cursor-pointer"
                            >
                                <span>Login as Guest</span>
                                <!-- Person SVG Icon -->
                                <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Login as Admin Button -->
                            <button 
                                @click="setView('admin')"
                                class="w-full py-4.5 px-6 rounded-xl bg-white border border-[#E2E8F0] hover:border-slate-400 active:scale-[0.99] text-[#0B1E3F] font-semibold text-sm flex items-center justify-center gap-3 transition-all duration-200 shadow-sm cursor-pointer"
                            >
                                <span>Login as Admin</span>
                                <!-- Key SVG Icon -->
                                <svg class="h-4.5 w-4.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m-2 4a5 5 0 01-10 0m10-4a5 5 0 11-10 0m10 0h3a2 2 0 012 2v3m-2-1H9" />
                                </svg>
                            </button>
                        </div>

                        <p class="text-slate-500 text-sm text-center mt-6">
                            First time visiting? 
                            <a href="#" class="text-[#0B1E3F] hover:underline font-semibold transition">Request access</a>
                        </p>
                    </div>

                    <!-- VIEW: GUEST PORTAL -->
                    <div v-else-if="currentView === 'guest'" class="space-y-6 animate-fade-in">
                        <div>
                            <h2 class="font-serif text-3xl text-[#0B1E3F] font-bold tracking-tight">
                                Guest Portal
                            </h2>
                            <p class="mt-2 text-slate-500 text-sm">
                                Enter your details to access your booking and stay preferences.
                            </p>
                        </div>

                        <form @submit.prevent="handleGuestLogin" class="space-y-6">
                            <div>
                                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Booking Reference</label>
                                <input 
                                    type="text" 
                                    v-model="guestForm.reference"
                                    placeholder="e.g. ARUGA-2024"
                                    class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition"
                                    required
                                />
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Last Name</label>
                                <input 
                                    type="text" 
                                    v-model="guestForm.lastName"
                                    placeholder="Enter your last name"
                                    class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition"
                                    required
                                />
                            </div>
                            <button 
                                type="submit"
                                class="w-full mt-2 py-4 px-6 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] active:scale-[0.99] text-white font-semibold text-sm transition-all cursor-pointer"
                            >
                                Verify Booking
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Bottom Copyright / Version Info -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-2 pt-6 border-t border-slate-100">
                    <span class="text-slate-400 text-xs">v1.0.0</span>
                    <span class="text-slate-400 text-xs">© 2024 Aruga Staycation. All rights reserved.</span>
                </div>
            </section>
        </div>

        <!-- ========================================================================= -->
        <!-- VIEW: ADMINISTRATIVE PORTAL (60/40 Split Layout with overlapping card) -->
        <!-- ========================================================================= -->
        <div v-else-if="currentView === 'admin'" class="min-h-screen w-full flex flex-col lg:flex-row bg-[#FAF9F6] relative animate-fade-in">
            
            <!-- Left Panel (50% Width on Desktop) -->
            <section class="w-full lg:w-1/2 min-h-[60vh] lg:min-h-screen flex flex-col justify-between p-8 md:p-12 lg:p-16 relative z-10">
                <!-- Top Section: Logo & Admin Branding (Mobile Only) -->
                <div class="flex flex-col items-center w-full lg:hidden">
                    <!-- Logo Image with fallback -->
                    <div class="h-16 w-16 rounded-full overflow-hidden flex items-center justify-center border-2 border-[#1B321F] bg-[#1B321F] shadow-md transition hover:scale-105 duration-300">
                        <img 
                            v-if="!logoError" 
                            :src="'/images/Aruga_logo.jpg'" 
                            @error="logoError = true" 
                            alt="Aruga Staycation Logo" 
                            class="h-full w-full object-cover"
                        />
                        <!-- Fallback Logo (Lotus Icon) -->
                        <div v-else class="flex flex-col items-center justify-center text-amber-400">
                            <svg class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m9-9H3M12 5.25a6.75 6.75 0 00-6.75 6.75H12V5.25zM12 18.75a6.75 6.75 0 006.75-6.75H12v6.75z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.25 0 4.5 1 4.5 3s-2.25 3-4.5 3-4.5-1-4.5-3 2.25-3 4.5-3z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Titles -->
                    <h1 class="font-serif text-[#0b1c3d] text-2xl lg:text-3xl font-bold mt-4 tracking-tight text-center">
                        Aruga Staycation
                    </h1>
                    <p class="text-amber-800 text-xs font-bold uppercase tracking-[0.2em] mt-1.5 text-center">
                        Administrative Portal
                    </p>
                </div>

                <!-- Spacer/Normal Flow Content for Mobile (Invisible on Desktop) -->
                <div class="lg:hidden my-8 w-full">
                    <!-- Floating card renders here on mobile in normal flow -->
                    <div class="bg-white border border-slate-100 rounded-3xl p-6 md:p-8 shadow-xl">
                        <h2 class="font-serif text-2xl text-[#0b1c3d] font-bold tracking-tight mb-2">
                            Staff & Manager Login
                        </h2>
                        <p class="text-slate-500 text-xs md:text-sm leading-relaxed mb-6">
                            Please enter your credentials to access the property management dashboard.
                        </p>
                        
                        <form @submit.prevent="handleAdminLogin" class="space-y-4">
                            <!-- Error Banner -->
                            <div v-if="loginError" class="p-3 text-xs text-rose-600 bg-rose-50 rounded-xl border border-rose-100 font-medium animate-fade-in">
                                {{ loginError }}
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Work Email Address</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                                        <!-- Envelope Icon -->
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                                        </svg>
                                    </span>
                                    <input 
                                        type="email" 
                                        v-model="adminForm.email"
                                        placeholder="manager@aruga.com"
                                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition"
                                        required
                                    />
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-1.5">
                                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Secure Password</label>
                                    <a href="#" class="text-xs text-slate-400 hover:text-[#0b1c3d] font-medium transition">Forgot Access?</a>
                                </div>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                                        <!-- Lock Icon -->
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </span>
                                    <input 
                                        :type="showPassword ? 'text' : 'password'" 
                                        v-model="adminForm.password"
                                        placeholder="••••••••"
                                        class="w-full pl-10 pr-10 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition"
                                        required
                                    />
                                    <button 
                                        type="button"
                                        @click="showPassword = !showPassword"
                                        class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition cursor-pointer"
                                    >
                                        <!-- Eye Icon -->
                                        <svg v-if="!showPassword" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <!-- Eye Off Icon -->
                                        <svg v-else class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <button 
                                type="submit"
                                :disabled="isSubmitting"
                                class="w-full mt-2 py-3.5 px-6 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] active:scale-[0.99] text-white font-semibold text-xs tracking-wider uppercase transition-all cursor-pointer shadow-lg shadow-blue-950/15 disabled:opacity-60 disabled:cursor-not-allowed"
                            >
                                <span v-if="isSubmitting">Authorizing...</span>
                                <span v-else>Authorize Entry</span>
                            </button>

                            <div class="flex items-center my-5 text-slate-300 text-xs font-semibold uppercase tracking-wider">
                                <div class="flex-grow border-t border-slate-200"></div>
                                <span class="px-3">or</span>
                                <div class="flex-grow border-t border-slate-200"></div>
                            </div>

                            <button 
                                type="button"
                                @click="setView('selection')"
                                class="w-full py-3 px-6 rounded-xl border border-slate-200 hover:bg-slate-50 active:scale-[0.99] text-[#0B1E3F] font-semibold text-xs flex items-center justify-center gap-2 transition-all cursor-pointer"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Switch to Guest Access
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Bottom Footer (Secure Staff Portal info) -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-3 pt-6 border-t border-slate-200/60 w-full text-slate-400 mt-auto">
                    <div class="flex items-center gap-1.5 text-xs">
                        <!-- Shield/Lock SVG -->
                        <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <span>Secure Staff Portal</span>
                    </div>
                    <div class="flex items-center gap-4 text-xs font-medium">
                        <a href="#" class="hover:text-slate-600 transition">IT Support</a>
                        <a href="#" class="hover:text-slate-600 transition">Privacy Policy</a>
                    </div>
                </div>
            </section>

            <!-- Right Panel (50% Width on Desktop) -->
            <section class="hidden lg:block lg:w-1/2 min-h-screen relative overflow-hidden">
                <!-- Background visual -->
                <div 
                    class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-10000 ease-out scale-100" 
                    style="background-image: url('/images/staycation_admin_hero.png');"
                ></div>
                <!-- Subtle right-side lighting vignette -->
                <div class="absolute inset-0 bg-gradient-to-l from-slate-900/10 via-transparent to-slate-950/40"></div>

                <!-- Slide indicators in bottom right -->
                <div class="absolute bottom-16 right-16 flex items-center gap-2 z-10">
                    <span class="h-2 w-2 rounded-full bg-white opacity-40"></span>
                    <span class="h-2 w-2 rounded-full bg-white"></span>
                </div>
            </section>

            <!-- FLOATING BRANDING & LOGIN CARD CONTAINER (Only visible on Desktop, positioned absolute across the 50/50 divide) -->
            <section class="hidden lg:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-20 flex-col items-center gap-6 w-[450px]">
                
                <!-- Logo & Admin Branding (Desktop Only) -->
                <div class="flex flex-col items-center w-full mb-2">
                    <!-- Logo Image with fallback -->
                    <div class="h-16 w-16 rounded-full overflow-hidden flex items-center justify-center border-2 border-[#1B321F] bg-[#1B321F] shadow-md transition hover:scale-105 duration-300">
                        <img 
                            v-if="!logoError" 
                            :src="'/images/Aruga_logo.jpg'" 
                            @error="logoError = true" 
                            alt="Aruga Staycation Logo" 
                            class="h-full w-full object-cover"
                        />
                        <!-- Fallback Logo (Lotus Icon) -->
                        <div v-else class="flex flex-col items-center justify-center text-amber-400">
                            <svg class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m9-9H3M12 5.25a6.75 6.75 0 00-6.75 6.75H12V5.25zM12 18.75a6.75 6.75 0 006.75-6.75H12v6.75z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.25 0 4.5 1 4.5 3s-2.25 3-4.5 3-4.5-1-4.5-3 2.25-3 4.5-3z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Titles -->
                    <h1 class="font-serif text-[#0b1c3d] text-2xl lg:text-3xl font-bold mt-4 tracking-tight text-center">
                        Aruga Staycation
                    </h1>
                    <p class="text-amber-800 text-xs font-bold uppercase tracking-[0.2em] mt-1.5 text-center">
                        Administrative Portal
                    </p>
                </div>

                <!-- Card -->
                <div class="bg-white/80 backdrop-blur-md border border-white/60 rounded-[32px] p-10 shadow-2xl shadow-slate-950/10 transition-all duration-300 hover:shadow-slate-950/15 w-full">
                    <h2 class="font-serif text-[#0b1c3d] text-3xl font-bold tracking-tight mb-2">
                        Staff & Manager Login
                    </h2>
                    <p class="text-slate-500 text-sm leading-relaxed mb-8">
                        Please enter your credentials to access the property management dashboard.
                    </p>

                    <form @submit.prevent="handleAdminLogin" class="space-y-5">
                        <!-- Error Banner -->
                        <div v-if="loginError" class="p-3 text-xs text-rose-600 bg-rose-50 rounded-xl border border-rose-100 font-medium animate-fade-in">
                            {{ loginError }}
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Work Email Address</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                                    <!-- Envelope Icon -->
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                                    </svg>
                                </span>
                                <input 
                                    type="email" 
                                    v-model="adminForm.email"
                                    placeholder="manager@aruga.com"
                                    class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white/90 text-sm transition"
                                    required
                                />
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-1.5">
                                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Secure Password</label>
                                <a href="#" class="text-xs text-slate-400 hover:text-[#0b1c3d] font-semibold transition">Forgot Access?</a>
                            </div>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                                    <!-- Lock Icon -->
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                                <input 
                                    :type="showPassword ? 'text' : 'password'" 
                                    v-model="adminForm.password"
                                    placeholder="••••••••"
                                    class="w-full pl-11 pr-11 py-3.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white/90 text-sm transition"
                                    required
                                />
                                <button 
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition cursor-pointer"
                                >
                                    <!-- Eye Icon -->
                                    <svg v-if="!showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <!-- Eye Off Icon -->
                                    <svg v-else class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <button 
                            type="submit"
                            :disabled="isSubmitting"
                            class="w-full mt-2 py-4 px-6 rounded-2xl bg-[#0B1E3F] hover:bg-[#152e59] active:scale-[0.99] text-white font-semibold text-xs tracking-wider uppercase transition-all duration-200 cursor-pointer shadow-lg shadow-blue-950/15 disabled:opacity-60 disabled:cursor-not-allowed"
                        >
                            <span v-if="isSubmitting">Authorizing...</span>
                            <span v-else>Authorize Entry</span>
                        </button>

                        <div class="flex items-center my-6 text-slate-300 text-xs font-semibold uppercase tracking-wider">
                            <div class="flex-grow border-t border-slate-200"></div>
                            <span class="px-4">or</span>
                            <div class="flex-grow border-t border-slate-200"></div>
                        </div>

                        <button 
                            type="button"
                            @click="setView('selection')"
                            class="w-full py-4 px-6 rounded-2xl border border-slate-200 hover:bg-slate-50 hover:border-slate-300 active:scale-[0.99] text-[#0B1E3F] font-semibold text-sm flex items-center justify-center gap-2 transition-all duration-200 cursor-pointer"
                        >
                            <svg class="h-4.5 w-4.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Switch to Guest Access
                        </button>
                    </form>
                </div>
            </section>
        </div>

        <!-- ========================================================================= -->
        <!-- VIEW: ADMIN DASHBOARD (Manager / Staff Portal) -->
        <!-- ========================================================================= -->
        <div v-else-if="currentView === 'dashboard' && currentUser" class="min-h-screen w-full flex bg-[#F8FAFC] dark:bg-slate-950 animate-fade-in text-slate-800 dark:text-slate-200 transition-colors duration-300">
            <!-- Sidebar -->
            <aside class="hidden md:flex flex-col w-64 bg-white dark:bg-slate-900 border-r border-slate-100 dark:border-slate-800 p-6 shrink-0 justify-between transition-colors duration-300">
                <div>
                    <!-- Logo / Portal Brand -->
                    <div class="flex items-center gap-3 pb-6 border-b border-slate-50 dark:border-slate-800 mb-6">
                        <div class="h-9 w-9 rounded-full overflow-hidden flex items-center justify-center border border-[#1B321F]/20 bg-[#1B321F]">
                            <img v-if="!logoError" :src="'/images/Aruga_logo.jpg'" @error="logoError = true" alt="Aruga Logo" class="h-full w-full object-cover"/>
                            <span v-else class="text-amber-400 text-xs font-serif font-bold">A</span>
                        </div>
                        <div>
                            <p class="font-serif text-slate-900 dark:text-slate-100 font-bold text-sm leading-none">Aruga Admin</p>
                            <span class="text-[9px] text-[#A27B5C] font-semibold uppercase tracking-wider">Staff Portal</span>
                        </div>
                    </div>



                    <!-- Navigation Links -->
                    <nav class="space-y-1.5">
                        <a 
                            href="#" 
                            @click.prevent="activeTab = 'dashboard_overview'"
                            :class="['flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-xs leading-none transition', 
                                     activeTab === 'dashboard_overview' ? 'bg-amber-500/10 text-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50 dark:text-slate-400 dark:hover:text-slate-200 dark:hover:bg-slate-800/50']"
                        >
                            <!-- Dashboard Icon SVG -->
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        <a 
                            href="#" 
                            @click.prevent="isManager() ? activeTab = 'user_management' : null"
                            :class="['flex items-center justify-between px-4 py-3 rounded-xl font-semibold text-xs leading-none transition', 
                                     !isManager() ? 'text-slate-300 dark:text-slate-700 cursor-not-allowed opacity-60 bg-slate-50/20 dark:bg-slate-800/10' : 
                                     (activeTab === 'user_management' ? 'bg-amber-500/10 text-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50 dark:text-slate-400 dark:hover:text-slate-200 dark:hover:bg-slate-800/50')]"
                        >
                            <div class="flex items-center gap-3">
                                <!-- User Mgmt Icon SVG -->
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span>User Management</span>
                            </div>
                            <!-- Lock badge for Staff -->
                            <svg v-if="!isManager()" class="h-3.5 w-3.5 text-slate-400 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </a>

                        <a 
                            href="#" 
                            @click.prevent="activeTab = 'pending'"
                            :class="['flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-xs leading-none transition', 
                                     activeTab === 'pending' ? 'bg-amber-500/10 text-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50 dark:text-slate-400 dark:hover:text-slate-200 dark:hover:bg-slate-800/50']"
                        >
                            <!-- Pending Icon SVG -->
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Pending</span>
                        </a>
 
                        <a 
                            href="#" 
                            @click.prevent="activeTab = 'approved'"
                            :class="['flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-xs leading-none transition', 
                                     activeTab === 'approved' ? 'bg-amber-500/10 text-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50 dark:text-slate-400 dark:hover:text-slate-200 dark:hover:bg-slate-800/50']"
                        >
                            <!-- Approved Icon SVG -->
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Approved</span>
                        </a>
 
                        <a 
                            href="#" 
                            @click.prevent="activeTab = 'rejected'"
                            :class="['flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-xs leading-none transition', 
                                     activeTab === 'rejected' ? 'bg-amber-500/10 text-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50 dark:text-slate-400 dark:hover:text-slate-200 dark:hover:bg-slate-800/50']"
                        >
                            <!-- Rejected Icon SVG -->
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Rejected</span>
                        </a>
 
                        <a 
                            href="#" 
                            @click.prevent="activeTab = 'payments'"
                            :class="['flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-xs leading-none transition', 
                                     activeTab === 'payments' ? 'bg-amber-500/10 text-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50 dark:text-slate-400 dark:hover:text-slate-200 dark:hover:bg-slate-800/50']"
                        >
                            <!-- Payments Icon SVG -->
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span>Payments</span>
                        </a>

                        <a 
                            href="#" 
                            @click.prevent="isManager() ? activeTab = 'sales' : null"
                            :class="['flex items-center justify-between px-4 py-3 rounded-xl font-semibold text-xs leading-none transition', 
                                     !isManager() ? 'text-slate-300 dark:text-slate-700 cursor-not-allowed opacity-60 bg-slate-50/20 dark:bg-slate-800/10' : 
                                     (activeTab === 'sales' ? 'bg-amber-500/10 text-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50 dark:text-slate-400 dark:hover:text-slate-200 dark:hover:bg-slate-800/50')]"
                        >
                            <div class="flex items-center gap-3">
                                <!-- Sales Icon SVG -->
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <span>Sales</span>
                            </div>
                            <!-- Lock badge for Staff -->
                            <svg v-if="!isManager()" class="h-3.5 w-3.5 text-slate-400 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </a>
                    </nav>
                </div>

                <!-- Bottom Links / Support & Logout -->
                <div class="space-y-4">
                    <div class="space-y-1">
                        <a 
                            href="#" 
                            @click.prevent="activeTab = 'settings'"
                            :class="['flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium text-xs transition', 
                                     activeTab === 'settings' ? 'bg-amber-500/10 text-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300' : 'text-slate-400 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800/50']"
                        >
                            <!-- Settings Icon -->
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Settings</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-slate-700 font-medium text-xs transition">
                            <!-- Help Icon -->
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span>Support</span>
                        </a>
                    </div>

                    <!-- Logout Button -->
                    <button @click="handleLogout" class="w-full py-3 px-4 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 font-semibold text-xs flex items-center justify-center gap-2 transition cursor-pointer">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sign Out
                    </button>
                </div>
            </aside>

            <!-- Main Area -->
            <div class="flex-grow flex flex-col min-w-0 overflow-y-auto">
                <!-- Header -->
                <header class="h-20 bg-white border-b border-slate-100 px-6 md:px-10 flex items-center justify-between shrink-0 sticky top-0 z-30">
                    <!-- Title/Mobile Toggle -->
                    <div class="flex items-center gap-4">
                        <button @click="handleLogout" class="md:hidden p-2 rounded-xl text-slate-500 hover:bg-slate-50">
                            <!-- Left arrow or exit for mobile -->
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </button>
                        <h2 class="font-serif text-[#0b1c3d] text-lg md:text-xl font-bold tracking-tight">Aruga Admin</h2>
                    </div>

                    <!-- Search Bar (Desktop) -->
                    <div class="hidden sm:block relative w-96 max-w-full">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input 
                            type="text" 
                            placeholder="Search reservations or guests..." 
                            class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-100 focus:outline-none focus:border-slate-200 focus:bg-white rounded-xl text-xs transition"
                        />
                    </div>

                    <!-- User Actions -->
                    <div class="flex items-center gap-4">
                        <!-- Notification icon -->
                        <button class="relative p-2 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-50 transition">
                            <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-rose-500 border-2 border-white"></span>
                        </button>

                        <!-- User Profile Info -->
                        <div class="flex items-center gap-3">
                            <div class="hidden md:block text-right">
                                <p class="text-xs font-semibold text-slate-800 leading-none">{{ currentUser.name }}</p>
                                <span class="text-[9px] font-bold uppercase tracking-wider text-[#A27B5C] mt-0.5 block">
                                    {{ currentUser.role === 'admin' || currentUser.role === 'manager' ? 'PROPERTY MANAGER' : 'PROPERTY STAFF' }}
                                </span>
                            </div>

                            <!-- USER IMAGE ICON (Avatar/Placeholder) -->
                            <div class="h-10 w-10 rounded-full bg-gradient-to-tr from-[#1B321F] to-[#2D5A27] flex items-center justify-center text-white font-bold text-sm tracking-wide shadow-md border-2 border-white relative overflow-hidden transition hover:scale-105 duration-200">
                                <!-- Initials dynamically rendered -->
                                <span>{{ currentUser.name.slice(0, 2).toUpperCase() }}</span>
                                <!-- A subtle overlay highlight ring -->
                                <div class="absolute inset-0 bg-white/5 pointer-events-none"></div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-grow p-6 md:p-10 space-y-8 max-w-[1600px] w-full mx-auto">
                    
                    <!-- TAB: DASHBOARD OVERVIEW -->
                    <div v-if="activeTab === 'dashboard_overview'" class="space-y-8 animate-fade-in">
                        <!-- Dashboard Title -->
                        <div>
                            <h1 class="font-serif text-[#0b1c3d] text-3xl font-bold tracking-tight">Dashboard Overview</h1>
                            <p class="text-slate-500 text-xs mt-1 leading-relaxed">
                                Welcome back, {{ currentUser.name }}. Here is the latest activity for the Aruga Staycation Estate today.
                            </p>
                        </div>

                        <!-- Grid Stats (5 Columns) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
                            
                            <!-- Total Reservations -->
                            <div class="bg-white border border-slate-50 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[120px]">
                                <div class="flex items-center justify-between">
                                    <span class="text-[10px] text-green-600 bg-green-50 px-2 py-0.5 rounded-full font-bold">+4% vs last week</span>
                                    <div class="text-slate-400">
                                        <!-- Phone/Booking SVG -->
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-400 text-[10px] font-semibold uppercase tracking-wider">Total Reservations</p>
                                    <p class="text-2xl font-bold text-slate-800 mt-1">42</p>
                                </div>
                            </div>

                            <!-- Pending -->
                            <div class="bg-white border border-slate-50 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[120px]">
                                <div class="flex items-center justify-between">
                                    <span class="text-[10px] text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full font-bold">Action Required</span>
                                    <div class="text-slate-400">
                                        <!-- Clock/Pending SVG -->
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-400 text-[10px] font-semibold uppercase tracking-wider">Pending</p>
                                    <p class="text-2xl font-bold text-slate-800 mt-1">12</p>
                                </div>
                            </div>

                            <!-- Approved -->
                            <div class="bg-white border border-slate-50 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[120px]">
                                <div class="flex items-center justify-between">
                                    <span class="text-[10px] text-[#2D5A27] bg-emerald-50 rounded-full font-bold">Approved</span>
                                    <div class="text-slate-400">
                                        <!-- Check Shield -->
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-400 text-[10px] font-semibold uppercase tracking-wider">Approved</p>
                                    <p class="text-2xl font-bold text-slate-800 mt-1">24</p>
                                </div>
                            </div>

                            <!-- Rejected -->
                            <div class="bg-white border border-slate-50 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[120px]">
                                <div class="flex items-center justify-between">
                                    <span class="text-[10px] text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full font-bold">Rejected</span>
                                    <div class="text-slate-400">
                                        <!-- Block SVG -->
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-400 text-[10px] font-semibold uppercase tracking-wider">Rejected</p>
                                    <p class="text-2xl font-bold text-slate-800 mt-1">6</p>
                                </div>
                            </div>

                            <!-- Total Sales (Dark/Premium card) -->
                            <div class="bg-[#0B1E3F] rounded-2xl p-5 shadow-lg flex flex-col justify-between min-h-[120px] text-white">
                                <div class="flex items-center justify-between">
                                    <span class="text-[10px] text-amber-300 font-bold bg-white/10 px-2 py-0.5 rounded-full">Total Revenue</span>
                                    <div class="text-slate-300">
                                        <!-- Dollar/Pesos Bill SVG -->
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-white/60 text-[10px] font-semibold uppercase tracking-wider">Total Sales</p>
                                    <p class="text-2xl font-serif font-bold text-white mt-1">₱1.2M</p>
                                </div>
                            </div>
                        </div>

                        <!-- Charts & Recent Activity Grid (2 Columns) -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            
                            <!-- Booking Trends Chart (SVG-based) -->
                            <div class="bg-white border border-slate-50 rounded-2xl p-6 shadow-sm lg:col-span-2 space-y-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-serif text-[#0b1c3d] text-base font-bold">Booking Trends</h3>
                                        <p class="text-slate-400 text-xs mt-0.5">Occupancy rate over the last 7 days</p>
                                    </div>
                                    <div class="bg-slate-100 p-0.5 rounded-lg flex items-center gap-1">
                                        <button class="bg-white text-slate-800 text-[10px] font-semibold px-2.5 py-1 rounded-md shadow-sm">Weekly</button>
                                        <button class="text-slate-500 text-[10px] font-semibold px-2.5 py-1">Monthly</button>
                                    </div>
                                </div>

                                <!-- SVG Bar Chart -->
                                <div class="relative pt-6">
                                    <div class="h-44 w-full flex items-end justify-between px-2 gap-2 md:gap-4 border-b border-slate-100 pb-2 relative">
                                        <!-- Background grid lines -->
                                        <div class="absolute inset-x-0 top-0 border-t border-slate-100/60 w-full pointer-events-none"></div>
                                        <div class="absolute inset-x-0 top-1/3 border-t border-slate-100/60 w-full pointer-events-none"></div>
                                        <div class="absolute inset-x-0 top-2/3 border-t border-slate-100/60 w-full pointer-events-none"></div>

                                        <!-- Mon -->
                                        <div class="flex-grow flex flex-col items-center group relative cursor-pointer h-full justify-end">
                                            <div class="w-full bg-[#1B321F]/10 group-hover:bg-[#1B321F]/20 rounded-t-md h-[40%] transition-all duration-300 relative">
                                                <div class="absolute -top-7 left-1/2 -translate-x-1/2 bg-[#0B1E3F] text-white text-[9px] font-bold py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition shadow-md pointer-events-none">40%</div>
                                            </div>
                                        </div>
                                        <!-- Tue -->
                                        <div class="flex-grow flex flex-col items-center group relative cursor-pointer h-full justify-end">
                                            <div class="w-full bg-[#1B321F]/10 group-hover:bg-[#1B321F]/20 rounded-t-md h-[55%] transition-all duration-300 relative">
                                                <div class="absolute -top-7 left-1/2 -translate-x-1/2 bg-[#0B1E3F] text-white text-[9px] font-bold py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition shadow-md pointer-events-none">55%</div>
                                            </div>
                                        </div>
                                        <!-- Wed -->
                                        <div class="flex-grow flex flex-col items-center group relative cursor-pointer h-full justify-end">
                                            <div class="w-full bg-[#1B321F]/10 group-hover:bg-[#1B321F]/20 rounded-t-md h-[30%] transition-all duration-300 relative">
                                                <div class="absolute -top-7 left-1/2 -translate-x-1/2 bg-[#0B1E3F] text-white text-[9px] font-bold py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition shadow-md pointer-events-none">30%</div>
                                            </div>
                                        </div>
                                        <!-- Thu -->
                                        <div class="flex-grow flex flex-col items-center group relative cursor-pointer h-full justify-end">
                                            <div class="w-full bg-[#1B321F]/10 group-hover:bg-[#1B321F]/20 rounded-t-md h-[70%] transition-all duration-300 relative">
                                                <div class="absolute -top-7 left-1/2 -translate-x-1/2 bg-[#0B1E3F] text-white text-[9px] font-bold py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition shadow-md pointer-events-none">70%</div>
                                            </div>
                                        </div>
                                        <!-- Fri -->
                                        <div class="flex-grow flex flex-col items-center group relative cursor-pointer h-full justify-end">
                                            <div class="w-full bg-[#1B321F]/10 group-hover:bg-[#1B321F]/20 rounded-t-md h-[85%] transition-all duration-300 relative">
                                                <div class="absolute -top-7 left-1/2 -translate-x-1/2 bg-[#0B1E3F] text-white text-[9px] font-bold py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition shadow-md pointer-events-none">85%</div>
                                            </div>
                                        </div>
                                        <!-- Sat -->
                                        <div class="flex-grow flex flex-col items-center group relative cursor-pointer h-full justify-end">
                                            <div class="w-full bg-[#0B1E3F] group-hover:bg-[#152e59] rounded-t-md h-[95%] transition-all duration-300 relative shadow-sm">
                                                <div class="absolute -top-7 left-1/2 -translate-x-1/2 bg-[#0B1E3F] text-white text-[9px] font-bold py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition shadow-md pointer-events-none">95%</div>
                                            </div>
                                        </div>
                                        <!-- Sun -->
                                        <div class="flex-grow flex flex-col items-center group relative cursor-pointer h-full justify-end">
                                            <div class="w-full bg-[#1B321F]/10 group-hover:bg-[#1B321F]/20 rounded-t-md h-[90%] transition-all duration-300 relative">
                                                <div class="absolute -top-7 left-1/2 -translate-x-1/2 bg-[#0B1E3F] text-white text-[9px] font-bold py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition shadow-md pointer-events-none">90%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Weekday labels -->
                                    <div class="flex justify-between text-[10px] text-slate-400 font-semibold px-2 pt-2">
                                        <span class="flex-grow text-center">Mon</span>
                                        <span class="flex-grow text-center">Tue</span>
                                        <span class="flex-grow text-center">Wed</span>
                                        <span class="flex-grow text-center">Thu</span>
                                        <span class="flex-grow text-center">Fri</span>
                                        <span class="flex-grow text-center">Sat</span>
                                        <span class="flex-grow text-center">Sun</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Activity -->
                            <div class="bg-white border border-slate-50 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
                                <div>
                                    <h3 class="font-serif text-[#0b1c3d] text-base font-bold mb-4">Recent Activity</h3>
                                    <div class="space-y-4">
                                        
                                        <!-- Activity Item 1 -->
                                        <div class="flex items-start gap-3">
                                            <span class="h-2 w-2 rounded-full bg-emerald-500 mt-2 shrink-0"></span>
                                            <div>
                                                <p class="text-xs text-slate-700 leading-normal">
                                                    <strong class="font-semibold text-slate-900">Maria Santos</strong>'s booking for Ocean Villa 2 was <span class="text-emerald-700 font-semibold px-1 py-0.2 bg-emerald-50 rounded text-[9px]">Approved</span>
                                                </p>
                                                <span class="text-[10px] text-slate-400 block mt-0.5">2 hours ago</span>
                                            </div>
                                        </div>

                                        <!-- Activity Item 2 -->
                                        <div class="flex items-start gap-3">
                                            <span class="h-2 w-2 rounded-full bg-amber-500 mt-2 shrink-0"></span>
                                            <div>
                                                <p class="text-xs text-slate-700 leading-normal">
                                                    New reservation request from <strong class="font-semibold text-slate-900">James Lim</strong> for 3 nights
                                                </p>
                                                <span class="text-[10px] text-slate-400 block mt-0.5">5 hours ago</span>
                                            </div>
                                        </div>

                                        <!-- Activity Item 3 -->
                                        <div class="flex items-start gap-3">
                                            <span class="h-2 w-2 rounded-full bg-rose-500 mt-2 shrink-0"></span>
                                            <div>
                                                <p class="text-xs text-slate-700 leading-normal">
                                                    Payment failed for booking <strong class="font-semibold text-slate-900">#ARUGA-2940</strong>
                                                </p>
                                                <span class="text-[10px] text-slate-400 block mt-0.5">Yesterday</span>
                                            </div>
                                        </div>

                                        <!-- Activity Item 4 -->
                                        <div class="flex items-start gap-3">
                                            <span class="h-2 w-2 rounded-full bg-slate-400 mt-2 shrink-0"></span>
                                            <div>
                                                <p class="text-xs text-slate-700 leading-normal">
                                                    Cleaning scheduled for <strong class="font-semibold text-slate-900">Suite 405</strong> at 11:00 AM
                                                </p>
                                                <span class="text-[10px] text-slate-400 block mt-0.5">Yesterday</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="w-full mt-6 py-2.5 rounded-xl border border-slate-100 hover:bg-slate-50 text-slate-500 text-xs font-semibold tracking-wide transition cursor-pointer">
                                    View All Activity
                                </button>
                            </div>
                        </div>

                        <!-- Guest Records Table -->
                        <div class="bg-white border border-slate-50 rounded-2xl p-6 shadow-sm space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="font-serif text-[#0b1c3d] text-lg font-bold">Guest Records</h3>
                                <div class="flex items-center gap-2">
                                    <button class="flex items-center gap-1.5 px-3 py-2 border border-slate-100 rounded-xl text-slate-500 hover:text-slate-800 text-xs font-semibold transition cursor-pointer">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                        </svg>
                                        Filter
                                    </button>
                                    <button class="flex items-center gap-1.5 px-3 py-2 border border-slate-100 rounded-xl text-slate-500 hover:text-slate-800 text-xs font-semibold transition cursor-pointer">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Export CSV
                                    </button>
                                </div>
                            </div>

                            <!-- Responsive Table wrapper -->
                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[700px] border-collapse text-left text-xs">
                                    <thead>
                                        <tr class="border-b border-slate-100 text-slate-400 font-semibold uppercase tracking-wider">
                                            <th class="py-4 font-semibold">Guest</th>
                                            <th class="py-4 font-semibold">Status</th>
                                            <th class="py-4 font-semibold">Check-In</th>
                                            <th class="py-4 font-semibold">Amount</th>
                                            <th class="py-4 text-right pr-4 font-semibold">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50">
                                        
                                        <!-- Row 1 -->
                                        <tr class="group hover:bg-slate-50/50 transition">
                                            <td class="py-4 flex items-center gap-3">
                                                <!-- Initials Icon for Maria Santos -->
                                                <div class="h-9 w-9 rounded-full bg-amber-100 text-[#A27B5C] font-semibold flex items-center justify-center text-xs tracking-wider">
                                                    MS
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-slate-800 group-hover:text-[#0b1c3d] transition">Maria Santos</p>
                                                    <span class="text-slate-400 text-[10px] mt-0.5 block">msantos.work@email.com</span>
                                                </div>
                                            </td>
                                            <td class="py-4">
                                                <span class="px-2.5 py-1 text-[10px] font-bold text-[#2D5A27] bg-emerald-50 rounded-full">Approved</span>
                                            </td>
                                            <td class="py-4 text-slate-500 font-medium">Oct 12, 2023</td>
                                            <td class="py-4 font-semibold text-slate-800">₱15,500</td>
                                            <td class="py-4 text-right pr-4">
                                                <button class="p-1 text-slate-400 hover:text-slate-700 transition cursor-pointer">
                                                    <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Row 2 -->
                                        <tr class="group hover:bg-slate-50/50 transition">
                                            <td class="py-4 flex items-center gap-3">
                                                <!-- Initials Icon for James Lim -->
                                                <div class="h-9 w-9 rounded-full bg-blue-100 text-blue-700 font-semibold flex items-center justify-center text-xs tracking-wider">
                                                    JL
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-slate-800 group-hover:text-[#0b1c3d] transition">James Lim</p>
                                                    <span class="text-slate-400 text-[10px] mt-0.5 block">james.lim@tech.io</span>
                                                </div>
                                            </td>
                                            <td class="py-4">
                                                <span class="px-2.5 py-1 text-[10px] font-bold text-amber-600 bg-amber-50 rounded-full">Pending</span>
                                            </td>
                                            <td class="py-4 text-slate-500 font-medium">Oct 15, 2023</td>
                                            <td class="py-4 font-semibold text-slate-800">₱28,200</td>
                                            <td class="py-4 text-right pr-4">
                                                <button class="p-1 text-slate-400 hover:text-slate-700 transition cursor-pointer">
                                                    <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Row 3 -->
                                        <tr class="group hover:bg-slate-50/50 transition">
                                            <td class="py-4 flex items-center gap-3">
                                                <!-- Initials Icon for Anna Lee -->
                                                <div class="h-9 w-9 rounded-full bg-rose-100 text-rose-700 font-semibold flex items-center justify-center text-xs tracking-wider">
                                                    AL
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-slate-800 group-hover:text-[#0b1c3d] transition">Anna Lee</p>
                                                    <span class="text-slate-400 text-[10px] mt-0.5 block">anna.lee@gmail.com</span>
                                                </div>
                                            </td>
                                            <td class="py-4">
                                                <span class="px-2.5 py-1 text-[10px] font-bold text-rose-600 bg-rose-50 rounded-full">Rejected</span>
                                            </td>
                                            <td class="py-4 text-slate-500 font-medium">Oct 09, 2023</td>
                                            <td class="py-4 font-semibold text-slate-800">₱12,000</td>
                                            <td class="py-4 text-right pr-4">
                                                <button class="p-1 text-slate-400 hover:text-slate-700 transition cursor-pointer">
                                                    <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table Footer -->
                            <button class="w-full py-3 text-slate-500 hover:text-slate-800 text-xs font-semibold tracking-wide border-t border-slate-50 transition cursor-pointer">
                                View All Reservations
                            </button>
                        </div>
                    </div>

                    <!-- TAB: PENDING RESERVATIONS -->
                    <div v-else-if="activeTab === 'pending'" class="space-y-8 animate-fade-in">
                        
                        <div v-if="!selectedPendingReservation" class="space-y-8 animate-fade-in">
                            <!-- Header with title, subtitle and action buttons -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h1 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-3xl font-bold tracking-tight">Pending Reservations</h1>
                                <p class="text-slate-500 dark:text-slate-400 text-xs mt-1 leading-relaxed">
                                    Review and manage guest bookings awaiting verification and approval. Ensure all payment details are consistent with resort policy.
                                </p>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex items-center gap-3 self-end sm:self-auto shrink-0">
                                <button class="flex items-center gap-2 px-4 py-2.5 border border-slate-100 dark:border-slate-800 rounded-xl text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800/50 text-xs font-semibold tracking-wide shadow-sm transition cursor-pointer">
                                    <!-- Filter Icon -->
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                    </svg>
                                    Filter
                                </button>
                                <button class="flex items-center gap-2 px-4 py-2.5 border border-slate-100 dark:border-slate-800 rounded-xl text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800/50 text-xs font-semibold tracking-wide shadow-sm transition cursor-pointer">
                                    <!-- Export CSV / Download Icon -->
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Export CSV
                                </button>
                            </div>
                        </div>

                        <!-- Table Card -->
                        <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm space-y-4">
                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[800px] border-collapse text-left text-xs">
                                    <thead>
                                        <tr class="border-b border-slate-100 dark:border-slate-800 text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">
                                            <th class="py-4 font-semibold w-[28%]">Guest Name</th>
                                            <th class="py-4 font-semibold w-[18%]">Room Type</th>
                                            <th class="py-4 font-semibold w-[18%]">Dates</th>
                                            <th class="py-4 font-semibold w-[16%]">Amount Due</th>
                                            <th class="py-4 font-semibold w-[14%]">Payment Status</th>
                                            <th class="py-4 text-right pr-6 font-semibold w-[6%]"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                                        <tr 
                                            v-for="reservation in pendingReservations" 
                                            :key="reservation.id" 
                                            class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition"
                                        >
                                            <!-- Guest Name & Initials -->
                                            <td class="py-5 flex items-center gap-3">
                                                <div class="h-9 w-9 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-semibold flex items-center justify-center text-xs tracking-wider border border-slate-200 dark:border-slate-700 uppercase">
                                                    {{ reservation.initials }}
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-slate-800 dark:text-slate-200 group-hover:text-[#0b1c3d] dark:group-hover:text-amber-300 transition">{{ reservation.name }}</p>
                                                    <span class="text-slate-400 dark:text-slate-500 text-[10px] mt-0.5 block">
                                                        {{ reservation.email }}
                                                    </span>
                                                </div>
                                            </td>

                                            <!-- Room Type Badge -->
                                            <td class="py-5">
                                                <span class="px-2.5 py-1 text-[10px] font-semibold bg-emerald-50 dark:bg-emerald-950/30 text-emerald-800 dark:text-emerald-300 rounded-full">
                                                    {{ reservation.roomType }}
                                                </span>
                                            </td>

                                            <!-- Dates details -->
                                            <td class="py-5">
                                                <div>
                                                    <p class="font-semibold text-slate-700 dark:text-slate-300">{{ reservation.startDate }} - {{ reservation.endDate }}</p>
                                                    <span class="text-slate-400 dark:text-slate-500 text-[10px] mt-0.5 block">
                                                        {{ reservation.nights }} Nights, {{ reservation.guests }}
                                                    </span>
                                                </div>
                                            </td>

                                            <!-- Amount Due -->
                                            <td class="py-5 font-semibold text-slate-850 dark:text-slate-100 text-sm">
                                                ₱{{ reservation.amount }}
                                            </td>

                                            <!-- Payment Status -->
                                            <td class="py-5">
                                                <span v-if="reservation.statusType === 'awaiting_verification'" class="text-slate-500 dark:text-slate-400 font-semibold">
                                                    DP Awaiting Verification
                                                </span>
                                                <span v-else-if="reservation.statusType === 'verified'" class="flex items-center gap-1.5 text-[#2D5A27] dark:text-emerald-400 font-semibold">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                    DP Verified
                                                </span>
                                                <span v-else-if="reservation.statusType === 'discrepancy'" class="text-rose-600 dark:text-rose-400 font-semibold">
                                                    Payment Discrepancy
                                                </span>
                                                <span v-else-if="reservation.statusType === 'receipt_uploaded'" class="flex items-center gap-1.5 text-[#2D5A27] dark:text-emerald-400 font-semibold">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                    Receipt Uploaded
                                                </span>
                                            </td>

                                            <!-- Eye Icon Action -->
                                            <td class="py-5 text-right pr-6">
                                                <button @click="selectedPendingReservation = reservation" class="text-slate-400 dark:text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 transition cursor-pointer">
                                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table Pagination Footer -->
                            <div class="flex justify-between items-center border-t border-slate-50 dark:border-slate-800 pt-4 text-[10px] text-slate-400 dark:text-slate-500 font-medium">
                                <span>Showing 4 of 28 reservations</span>
                                <div class="flex items-center gap-1.5">
                                    <button class="p-1 px-2 border border-slate-100 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800 disabled:opacity-50" disabled>&lt;</button>
                                    <span class="px-2.5 py-1 font-bold text-white bg-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300 rounded shadow-sm">1</span>
                                    <button class="px-2 py-1 border border-slate-100 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800 font-semibold text-slate-700 dark:text-slate-350 cursor-pointer">2</button>
                                    <button class="px-2 py-1 border border-slate-100 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800 font-semibold text-slate-700 dark:text-slate-350 cursor-pointer">3</button>
                                    <button class="p-1 px-2 border border-slate-100 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">&gt;</button>
                                </div>
                            </div>
                        </div>

                        <!-- Summary Cards Grid (3 Columns) -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
                            
                            <!-- Urgent Attention Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm flex items-center justify-between relative overflow-hidden group hover:shadow-md transition duration-250">
                                <div class="space-y-2.5 relative z-10">
                                    <p class="text-slate-400 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider">Urgent Attention</p>
                                    <p class="text-3xl font-bold text-slate-900 dark:text-slate-100">5 Bookings</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Bookings exceeding the 24h payment window.</p>
                                </div>
                                <div class="h-12 w-12 bg-rose-50 dark:bg-rose-950/30 rounded-2xl flex items-center justify-center text-rose-500 shrink-0">
                                    <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Projected Revenue Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm flex items-center justify-between relative overflow-hidden group hover:shadow-md transition duration-250">
                                <div class="space-y-2.5 relative z-10">
                                    <p class="text-slate-400 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider">Projected Revenue</p>
                                    <p class="text-3xl font-bold text-[#2D5A27] dark:text-emerald-400">₱142,800.00</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Total value of collected DPs and remaining balances.</p>
                                </div>
                                <div class="h-12 w-12 bg-emerald-50 dark:bg-emerald-950/30 rounded-2xl flex items-center justify-center text-emerald-600 dark:text-emerald-400 shrink-0">
                                    <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Next Check-in Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm flex items-center justify-between relative overflow-hidden group hover:shadow-md transition duration-250">
                                <div class="space-y-2.5 relative z-10">
                                    <p class="text-slate-400 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider">Next Check-In</p>
                                    <p class="text-3xl font-bold text-slate-900 dark:text-slate-100">Oct 12, 2:00 PM</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Julianne Smith (Ocean Villa) is expected next.</p>
                                </div>
                                <div class="h-12 w-12 bg-blue-50 dark:bg-blue-950/30 rounded-2xl flex items-center justify-center text-blue-500 shrink-0">
                                    <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        </div>

                        <!-- DETAILED VIEW -->
                        <div v-else class="space-y-8 animate-fade-in">
                            <!-- Back Button -->
                            <button 
                                @click="selectedPendingReservation = null" 
                                class="flex items-center gap-2 text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200 text-sm font-semibold transition cursor-pointer mb-2"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                <span>Back to Pending</span>
                            </button>

                            <!-- Reservation Detailed Header -->
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mt-2">
                                <div>
                                    <div class="flex flex-wrap items-center gap-3">
                                        <h1 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-3xl font-bold tracking-tight">
                                            Reservation <span class="text-slate-400 font-light">#AS-{{ 88200 + selectedPendingReservation.id }}</span>
                                        </h1>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 dark:bg-amber-950/20 text-[#A27B5C] dark:text-amber-300 border border-amber-100/10 dark:border-amber-900/30">
                                            Pending Verification
                                        </span>
                                        <span class="text-slate-400 dark:text-slate-500 text-xs font-semibold">
                                            Received Oct 24, 2023, 10:45 AM
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Details Content Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                                <!-- Left side: Guest Profile & Stay Info -->
                                <div class="lg:col-span-2 space-y-6">
                                    
                                    <!-- Guest Profile Card -->
                                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm space-y-6">
                                        <div class="flex items-center justify-between">
                                            <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">Guest Profile</h3>
                                            <button class="text-[#A27B5C] dark:text-amber-300 hover:text-slate-800 dark:hover:text-amber-400 text-xs font-semibold transition cursor-pointer">
                                                View History
                                            </button>
                                        </div>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div>
                                                <label class="block text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1">Full Name</label>
                                                <p class="font-bold text-slate-800 dark:text-slate-200 text-sm">{{ selectedPendingReservation.name }}</p>
                                            </div>
                                            <div>
                                                <label class="block text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1">Email Address</label>
                                                <p class="font-semibold text-slate-800 dark:text-slate-200 text-sm break-all">{{ selectedPendingReservation.email }}</p>
                                            </div>
                                            <div>
                                                <label class="block text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1">Phone Number</label>
                                                <p class="font-semibold text-slate-800 dark:text-slate-200 text-sm">+63 917 123 4567</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Stay Information Card -->
                                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm space-y-6">
                                        <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">Stay Information</h3>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            
                                            <!-- Check-in/out and Room Category -->
                                            <div class="space-y-4">
                                                <!-- Check-in Check-out Box -->
                                                <div class="bg-slate-50 dark:bg-slate-855 p-4.5 rounded-2xl flex items-start gap-4 border border-slate-100/50 dark:border-slate-800/40">
                                                    <div class="h-10 w-10 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400 rounded-xl flex items-center justify-center shrink-0 border border-slate-100 dark:border-slate-700/50">
                                                        <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider leading-none">Check-in — Check-out</p>
                                                        <p class="font-bold text-slate-800 dark:text-slate-200 text-sm mt-2">
                                                            {{ selectedPendingReservation.startDate }}, 2023 — {{ selectedPendingReservation.endDate }}, 2023
                                                        </p>
                                                        <span class="text-slate-450 dark:text-slate-500 text-xs mt-1 block">
                                                            {{ selectedPendingReservation.nights }} Nights, {{ selectedPendingReservation.nights + 1 }} Days
                                                        </span>
                                                    </div>
                                                </div>

                                                <!-- Room Category Box -->
                                                <div class="bg-slate-50 dark:bg-slate-855 p-4.5 rounded-2xl flex items-start gap-4 border border-slate-100/50 dark:border-slate-800/40">
                                                    <div class="h-10 w-10 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400 rounded-xl flex items-center justify-center shrink-0 border border-slate-100 dark:border-slate-700/50">
                                                        <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-9-8v2m0 8v2" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 8c0 1.1.9 2 2 2h10a2 2 0 002-2M5 16c0 1.1.9 2 2 2h10a2 2 0 002-2" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider leading-none">Room Category</p>
                                                        <p class="font-bold text-slate-800 dark:text-slate-200 text-sm mt-2 text-ellipsis overflow-hidden">
                                                            {{ selectedPendingReservation.roomType }}
                                                        </p>
                                                        <span class="text-slate-455 dark:text-slate-500 text-xs mt-1 block">
                                                            Villa 04, Private Pool Access
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Price Breakdown Card -->
                                            <div class="bg-[#FAF9F6] dark:bg-slate-900/60 p-5 rounded-2xl border border-slate-150/40 dark:border-slate-800 flex flex-col justify-between">
                                                <div>
                                                    <p class="text-[10px] font-semibold text-slate-455 dark:text-slate-500 uppercase tracking-wider mb-4">Price Breakdown</p>
                                                    <div class="space-y-2.5 text-xs">
                                                        <div class="flex justify-between text-slate-500 dark:text-slate-400">
                                                            <span>₱{{ priceBreakdown.ratePerNight }} × {{ selectedPendingReservation.nights }} Nights</span>
                                                            <span class="font-bold text-slate-800 dark:text-slate-200">₱{{ priceBreakdown.baseTotal }}</span>
                                                        </div>
                                                        <div class="flex justify-between text-slate-500 dark:text-slate-400">
                                                            <span>Service Charge (10%)</span>
                                                            <span class="font-bold text-slate-800 dark:text-slate-200">₱{{ priceBreakdown.serviceCharge }}</span>
                                                        </div>
                                                        <div class="flex justify-between text-slate-500 dark:text-slate-400">
                                                            <span>Local Taxes</span>
                                                            <span class="font-bold text-slate-800 dark:text-slate-200">₱{{ priceBreakdown.localTaxes }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="border-t border-slate-200/50 dark:border-slate-800/80 pt-4 mt-4 flex items-baseline justify-between">
                                                    <span class="text-xs font-bold text-[#0b1c3d] dark:text-slate-400 uppercase tracking-wider">Total Amount</span>
                                                    <span class="text-xl md:text-2xl font-serif font-bold text-[#0b1c3d] dark:text-amber-300">₱{{ priceBreakdown.total }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Special Requests Section -->
                                        <div class="pt-6 border-t border-slate-100 dark:border-slate-800 space-y-3">
                                            <div class="flex items-center gap-2 text-slate-400 dark:text-slate-500">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                                                </svg>
                                                <span class="text-[10px] font-semibold uppercase tracking-wider">Special Requests</span>
                                            </div>
                                            <div class="bg-slate-50 dark:bg-slate-855 p-5 rounded-2xl text-xs text-slate-655 dark:text-slate-400 leading-relaxed border border-slate-100/50 dark:border-slate-800/40">
                                                Guest requested a high floor with a view of the ocean. Also mentioned they are celebrating their 10th wedding anniversary and would appreciate a small surprise or room decoration if possible. No dietary restrictions noted.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right side: Timeline -->
                                <div class="lg:col-span-1">
                                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm space-y-6">
                                        <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">Reservation Timeline</h3>
                                        
                                        <div class="relative pl-6 border-l-2 border-slate-100 dark:border-slate-800 space-y-8 py-2 ml-3">
                                            <!-- Request Received -->
                                            <div class="relative">
                                                <div class="absolute -left-[35px] top-0.5 h-6 w-6 rounded-full bg-[#0B1E3F] text-white flex items-center justify-center shadow-sm">
                                                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="text-xs font-bold text-slate-800 dark:text-slate-205">Reservation Request Received</h4>
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold block mt-0.5">Oct 24, 2023 • 10:45 AM</span>
                                                    <p class="text-xs text-slate-550 dark:text-slate-400 mt-1.5 leading-relaxed">
                                                        Guest submitted booking via Aruga Direct Web Portal.
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Auto-Validation -->
                                            <div class="relative">
                                                <div class="absolute -left-[35px] top-0.5 h-6 w-6 rounded-full bg-amber-50 dark:bg-amber-950/20 text-[#A27B5C] dark:text-amber-300 flex items-center justify-center shadow-sm border border-amber-100/10 dark:border-amber-900/30">
                                                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="text-xs font-bold text-slate-800 dark:text-slate-205">Auto-Validation Check</h4>
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold block mt-0.5">Oct 24, 2023 • 10:46 AM</span>
                                                    <p class="text-xs text-slate-550 dark:text-slate-400 mt-1.5 leading-relaxed">
                                                        Payment method verified. Availability flagged for manual review.
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Pending Approval -->
                                            <div class="relative">
                                                <div class="absolute -left-[35px] top-0.5 h-6 w-6 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-400 dark:text-slate-500 flex items-center justify-center shadow-sm border border-slate-200/50 dark:border-slate-700">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-slate-450 dark:bg-slate-500"></span>
                                                </div>
                                                <div>
                                                    <h4 class="text-xs font-bold text-slate-450 dark:text-slate-500">Pending Admin Approval</h4>
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold block mt-0.5">Waiting for action...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- TAB: APPROVED STAYS -->
                    <div v-else-if="activeTab === 'approved'" class="space-y-8 animate-fade-in">
                        
                        <div v-if="!selectedApprovedReservation" class="space-y-8 animate-fade-in">
                            <!-- Header with title, subtitle and action buttons -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h1 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-3xl font-bold tracking-tight">Approved Stays</h1>
                                <p class="text-slate-500 dark:text-slate-400 text-xs mt-1 leading-relaxed">
                                    Manage confirmed reservations and finalize check-out processes for our distinguished guests.
                                </p>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex items-center gap-3 self-end sm:self-auto shrink-0">
                                <button class="flex items-center gap-2 px-4 py-2.5 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800/50 text-xs font-semibold tracking-wide shadow-sm transition cursor-pointer">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                    </svg>
                                    <span>Filter By Date</span>
                                </button>
                                <button class="flex items-center gap-2 px-4 py-2.5 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800/50 text-xs font-semibold tracking-wide shadow-sm transition cursor-pointer">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    <span>Export CSV</span>
                                </button>
                            </div>
                        </div>

                        <!-- Stats Grid (4 Columns) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                            
                            <!-- Total Confirmed Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4">
                                <div class="h-10 w-10 bg-emerald-100 dark:bg-emerald-950/30 rounded-xl flex items-center justify-center text-emerald-600 dark:text-emerald-400 shrink-0">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Total Confirmed</p>
                                    <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-1.5 leading-none">148</p>
                                </div>
                            </div>

                            <!-- Active Check-ins Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4">
                                <div class="h-10 w-10 bg-[#FAF0E6] dark:bg-amber-950/20 rounded-xl flex items-center justify-center text-[#A27B5C] dark:text-amber-400 shrink-0 border border-[#A27B5C]/10">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m-2 4a5 5 0 01-10 0m10-4a5 5 0 11-10 0m10 0h3a2 2 0 012 2v3m-2-1H9" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Active Check-ins</p>
                                    <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-1.5 leading-none">32</p>
                                </div>
                            </div>

                            <!-- Upcoming Arrivals Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4">
                                <div class="h-10 w-10 bg-blue-100 dark:bg-blue-950/30 rounded-xl flex items-center justify-center text-blue-600 dark:text-blue-400 shrink-0">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Upcoming Arrivals</p>
                                    <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-1.5 leading-none">12</p>
                                </div>
                            </div>

                            <!-- Revenue Secured Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4">
                                <div class="h-10 w-10 bg-emerald-100 dark:bg-emerald-950/30 rounded-xl flex items-center justify-center text-emerald-600 dark:text-emerald-450 shrink-0">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Revenue Secured</p>
                                    <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-1.5 leading-none">₱245k</p>
                                </div>
                            </div>
                        </div>

                        <!-- Table Card -->
                        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm space-y-4">
                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[800px] border-collapse text-left text-xs">
                                    <thead>
                                        <tr class="border-b border-slate-100 dark:border-slate-800 text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">
                                            <th class="py-4 font-semibold w-[32%]">Guest Information</th>
                                            <th class="py-4 font-semibold w-[22%]">Room / Villa</th>
                                            <th class="py-4 font-semibold w-[18%]">Dates</th>
                                            <th class="py-4 font-semibold w-[18%]">Status</th>
                                            <th class="py-4 text-right pr-6 font-semibold w-[10%]">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                                        <tr 
                                            v-for="reservation in approvedReservations" 
                                            :key="reservation.id" 
                                            class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition"
                                        >
                                            <!-- Guest Info -->
                                            <td class="py-5 flex items-center gap-3">
                                                <div 
                                                    class="h-10 w-10 rounded-full bg-[#FAF0E6] dark:bg-amber-950/20 text-[#A27B5C] dark:text-amber-400 font-bold flex items-center justify-center text-xs tracking-wider border border-slate-200 dark:border-slate-700 uppercase shrink-0"
                                                >
                                                    {{ reservation.initials }}
                                                </div>
                                                <div>
                                                    <p class="font-bold text-slate-900 dark:text-slate-100 group-hover:text-[#0b1c3d] dark:group-hover:text-amber-300 transition text-sm leading-snug">
                                                        {{ reservation.name }}
                                                    </p>
                                                    <span class="text-slate-400 dark:text-slate-500 text-[11px] mt-0.5 block leading-none font-medium">
                                                        {{ reservation.guestsText }}
                                                    </span>
                                                </div>
                                            </td>

                                            <!-- Room / Villa -->
                                            <td class="py-5">
                                                <div>
                                                    <p class="font-semibold text-slate-800 dark:text-slate-200 text-sm leading-snug">
                                                        {{ reservation.roomType }}
                                                    </p>
                                                    <span 
                                                        v-if="reservation.roomClass === 'PREMIUM'" 
                                                        class="inline-block mt-1 px-2.5 py-0.5 text-[9px] font-bold bg-emerald-50 dark:bg-emerald-950/40 text-emerald-800 dark:text-emerald-300 rounded tracking-wider uppercase"
                                                    >
                                                        PREMIUM
                                                    </span>
                                                    <span 
                                                        v-else-if="reservation.roomClass === 'STANDARD'" 
                                                        class="inline-block mt-1 px-2.5 py-0.5 text-[9px] font-bold bg-amber-50 dark:bg-amber-950/20 text-[#A27B5C] dark:text-amber-300 rounded tracking-wider uppercase border border-amber-100/30"
                                                    >
                                                        STANDARD
                                                    </span>
                                                    <span 
                                                        v-else-if="reservation.roomClass === 'LUXURY'" 
                                                        class="inline-block mt-1 px-2.5 py-0.5 text-[9px] font-bold bg-blue-50 dark:bg-blue-950/40 text-blue-800 dark:text-blue-300 rounded tracking-wider uppercase"
                                                    >
                                                        LUXURY
                                                    </span>
                                                </div>
                                            </td>

                                            <!-- Dates -->
                                            <td class="py-5">
                                                <div class="text-xs">
                                                    <p class="font-semibold text-slate-700 dark:text-slate-300 leading-normal">
                                                        {{ reservation.startDate }} -
                                                    </p>
                                                    <p class="font-semibold text-slate-700 dark:text-slate-300 leading-normal">
                                                        {{ reservation.endDate }}
                                                    </p>
                                                    <span class="text-slate-400 dark:text-slate-500 text-[10px] block mt-0.5 font-medium">
                                                        {{ reservation.nights }}
                                                    </span>
                                                </div>
                                            </td>

                                            <!-- Status -->
                                            <td class="py-5">
                                                <div class="flex items-center gap-1.5 text-emerald-600 dark:text-emerald-400 font-semibold text-xs">
                                                    <svg class="h-4.5 w-4.5 text-emerald-600 dark:text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <span>{{ reservation.status }}</span>
                                                </div>
                                            </td>

                                            <!-- Actions -->
                                            <td class="py-5 text-right pr-6">
                                                <div class="flex items-center justify-end gap-3.5">
                                                    <button @click="selectedApprovedReservation = reservation" class="text-slate-400 hover:text-[#0b1c3d] dark:text-slate-500 dark:hover:text-slate-350 transition cursor-pointer" title="View Details">
                                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </button>
                                                    <button class="text-slate-400 hover:text-slate-700 dark:text-slate-500 dark:hover:text-slate-350 transition cursor-pointer" title="Print Reservation">
                                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                        </svg>
                                                    </button>
                                                    <button class="text-slate-400 hover:text-emerald-600 dark:text-slate-500 dark:hover:text-emerald-450 transition cursor-pointer" title="Finalize Check-in/out">
                                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DETAILED VIEW -->
                    <div v-else class="space-y-8 animate-fade-in">
                            <!-- Back Button -->
                            <button 
                                @click="selectedApprovedReservation = null" 
                                class="flex items-center gap-2 text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200 text-sm font-semibold transition cursor-pointer mb-2"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                <span>Back to Approved</span>
                            </button>

                            <!-- Reservation Details Header -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-2">
                                <div>
                                    <div class="flex flex-wrap items-center gap-3">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 dark:bg-emerald-950/20 text-emerald-800 dark:text-emerald-300 border border-emerald-100/10 dark:border-emerald-900/30">
                                            Booking Confirmed
                                        </span>
                                        <span class="text-slate-400 dark:text-slate-500 text-sm font-semibold">
                                            #RES-2024-8842{{ selectedApprovedReservation.id }}
                                        </span>
                                    </div>
                                    <h1 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-3xl font-bold tracking-tight mt-2">Reservation Details</h1>
                                </div>
                                
                                <div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
                                    <button class="text-[#A27B5C] dark:text-amber-300 hover:underline text-xs font-semibold px-2 transition cursor-pointer">
                                        Resend Receipt
                                    </button>
                                    <button class="bg-[#0B1E3F] dark:bg-amber-500/20 text-white dark:text-amber-300 hover:bg-slate-800 dark:hover:bg-amber-550/30 text-xs font-semibold py-2.5 px-5 rounded-full shadow-sm transition cursor-pointer">
                                        Print Invoice
                                    </button>
                                </div>
                            </div>

                            <!-- Banner Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 p-5 rounded-[20px] flex items-start gap-4 shadow-sm">
                                <div class="h-10 w-10 bg-emerald-50 dark:bg-emerald-950/30 text-emerald-600 dark:text-emerald-400 rounded-full flex items-center justify-center shrink-0 border border-emerald-100/10 dark:border-emerald-900/30">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-850 dark:text-slate-205">Booking Fully Verified</h4>
                                    <p class="text-xs text-slate-550 dark:text-slate-400 mt-1">Payment received and villa schedule locked. No further action required from admin.</p>
                                </div>
                            </div>

                            <!-- Grid Content Layout -->
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                                <!-- Left column: Guest Profile & Special Requests -->
                                <div class="lg:col-span-1 space-y-6">
                                    
                                    <!-- Guest Profile Card (Initials Badge, No Image) -->
                                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm flex flex-col items-center text-center space-y-5">
                                        <p class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Guest Profile</p>
                                        
                                        <!-- Initials Badge -->
                                        <div class="h-14 w-14 rounded-full bg-[#FAF0E6] dark:bg-amber-950/20 text-[#A27B5C] dark:text-amber-400 font-bold flex items-center justify-center text-lg tracking-wider border border-slate-200 dark:border-slate-700 uppercase shrink-0 shadow-sm">
                                            {{ selectedApprovedReservation.initials }}
                                        </div>

                                        <div class="my-1">
                                            <h4 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">{{ selectedApprovedReservation.name }}</h4>
                                        </div>
                                        
                                        <div class="space-y-3.5 text-xs text-slate-650 dark:text-slate-400 w-full flex flex-col items-center border-t border-slate-50 dark:border-slate-800/85 pt-4">
                                            <div class="flex items-center gap-2">
                                                <svg class="h-4.5 w-4.5 text-slate-405" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                <span class="font-medium">{{ selectedApprovedReservation.email }}</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <svg class="h-4.5 w-4.5 text-slate-405" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                                <span class="font-medium">+63 917 123 4567</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Special Requests Card -->
                                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm space-y-4">
                                        <p class="text-[10px] font-semibold text-slate-455 dark:text-slate-500 uppercase tracking-wider">Special Requests</p>
                                        
                                        <div class="bg-slate-50 dark:bg-slate-855 p-4.5 rounded-2xl border border-slate-100/50 dark:border-slate-800/40 space-y-3">
                                            <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Requirements</p>
                                            <div class="text-xs text-slate-650 dark:text-slate-400 space-y-2.5 leading-relaxed">
                                                <p>• Dietary requirements: Gluten-free options requested for breakfast.</p>
                                                <p>• Anniversary surprise: Flower petals on bed upon arrival.</p>
                                            </div>
                                        </div>
                                        
                                        <p class="text-[10px] text-slate-400 dark:text-slate-500 italic mt-2 text-center">
                                            Note: These requests have been acknowledged by the concierge team.
                                        </p>
                                    </div>
                                </div>

                                <!-- Right column: Room visual stay details & Reservation Timeline -->
                                <div class="lg:col-span-2 space-y-6">
                                    
                                    <!-- Room visual stay details Card -->
                                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] overflow-hidden shadow-sm flex flex-col">
                                        <!-- Image Section with Overlay -->
                                        <div class="relative h-60 w-full overflow-hidden bg-slate-950">
                                            <div 
                                                class="absolute inset-0 bg-cover bg-center transition-transform duration-7000 ease-out hover:scale-105" 
                                                style="background-image: url('/images/staycation_hero.png');"
                                            ></div>
                                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/30 to-slate-950/20"></div>
                                            
                                            <div class="absolute bottom-6 left-6 text-white max-w-md">
                                                <h2 class="font-serif text-2xl font-bold tracking-tight">{{ selectedApprovedReservation.roomType }} – Suite 4</h2>
                                                <p class="text-white/85 text-xs font-semibold mt-1">
                                                    {{ selectedApprovedReservation.roomClass === 'PREMIUM' || selectedApprovedReservation.roomClass === 'LUXURY' ? '2 Bedrooms • Private Pool • Sea View' : '1 Bedroom • Garden Access • Mountain View' }}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Grid Columns Section -->
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-6 divide-y-0 md:divide-x divide-slate-100 dark:divide-slate-800/80">
                                            
                                            <!-- Check In -->
                                            <div class="flex flex-col">
                                                <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Check In</span>
                                                <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold mt-1.5">{{ selectedApprovedReservation.startDate }}</span>
                                                <span class="text-slate-550 dark:text-slate-450 text-[10px] font-semibold mt-0.5">Thursday, 2:00 PM</span>
                                            </div>

                                            <!-- Check Out -->
                                            <div class="flex flex-col md:pl-6">
                                                <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Check Out</span>
                                                <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold mt-1.5">{{ selectedApprovedReservation.endDate }}</span>
                                                <span class="text-slate-550 dark:text-slate-450 text-[10px] font-semibold mt-0.5">Sunday, 11:00 AM</span>
                                            </div>

                                            <!-- Guests -->
                                            <div class="flex flex-col md:pl-6">
                                                <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Guests</span>
                                                <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold mt-1.5">
                                                    {{ selectedApprovedReservation.guestsText.match(/\d+/) ? selectedApprovedReservation.guestsText.match(/\d+/)[0] : '02' }}
                                                </span>
                                                <span class="text-slate-550 dark:text-slate-455 text-[10px] font-semibold mt-0.5">Adults</span>
                                            </div>

                                            <!-- Duration -->
                                            <div class="flex flex-col md:pl-6">
                                                <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Duration</span>
                                                <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold mt-1.5">
                                                    {{ selectedApprovedReservation.nights.match(/\d+/) ? selectedApprovedReservation.nights.match(/\d+/)[0] : '3' }}
                                                </span>
                                                <span class="text-slate-550 dark:text-slate-455 text-[10px] font-semibold mt-0.5">Nights</span>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Timeline Card -->
                                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm space-y-6">
                                        <p class="text-[10px] font-semibold text-slate-455 dark:text-slate-500 uppercase tracking-wider">Reservation Timeline</p>
                                        
                                        <div class="relative pl-6 border-l-2 border-slate-100 dark:border-slate-800 space-y-8 py-2 ml-3">
                                            
                                            <!-- Item 1: Booking Confirmed & Paid -->
                                            <div class="relative">
                                                <div class="absolute -left-[35px] top-0.5 h-6 w-6 rounded-full bg-emerald-500 text-white flex items-center justify-center shadow-sm">
                                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="text-xs font-bold text-slate-800 dark:text-slate-202">Booking Confirmed & Paid</h4>
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-505 font-semibold block mt-0.5">Today, 09:14 AM</span>
                                                    <p class="text-xs text-slate-550 dark:text-slate-400 mt-1.5 leading-relaxed">
                                                        Full payment of 
                                                        <span class="font-bold text-slate-800 dark:text-slate-200">
                                                            ₱{{ ((selectedApprovedReservation.roomClass === 'PREMIUM' ? 25000 : (selectedApprovedReservation.roomClass === 'LUXURY' ? 55000 : 15000)) * (parseInt(selectedApprovedReservation.nights.match(/\d+/)) || 3)).toLocaleString('en-US') }}
                                                        </span> 
                                                        processed via Credit Card.
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Item 2: Admin Approval -->
                                            <div class="relative">
                                                <div class="absolute -left-[35px] top-0.5 h-6 w-6 rounded-full bg-amber-50 dark:bg-amber-950/20 text-[#A27B5C] dark:text-amber-300 flex items-center justify-center shadow-sm border border-amber-100/10 dark:border-amber-900/30">
                                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="text-xs font-bold text-slate-800 dark:text-slate-202">Admin Approval</h4>
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-550 font-semibold block mt-0.5">Oct 05, 02:45 PM</span>
                                                    <p class="text-xs text-slate-550 dark:text-slate-400 mt-1.5 leading-relaxed">
                                                        Availability verified and reservation approved by Admin Manager.
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Item 3: Request Received -->
                                            <div class="relative">
                                                <div class="absolute -left-[35px] top-0.5 h-6 w-6 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-450 dark:text-slate-500 flex items-center justify-center shadow-sm border border-slate-200/50 dark:border-slate-700">
                                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="text-xs font-bold text-slate-800 dark:text-slate-202">Booking Request Received</h4>
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-550 font-semibold block mt-0.5">Oct 05, 10:20 AM</span>
                                                    <p class="text-xs text-slate-555 dark:text-slate-400 mt-1.5 leading-relaxed">
                                                        Initial reservation request submitted by guest via Aruga Direct Web Portal.
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Control Buttons -->
                            <div class="flex items-center justify-end pt-4 border-t border-slate-100 dark:border-slate-800/80">
                                <button class="text-slate-550 hover:text-slate-850 dark:text-slate-400 dark:hover:text-slate-200 text-xs font-semibold mr-6 transition cursor-pointer">
                                    Modify Reservation
                                </button>
                                <button class="bg-[#B91C1C] hover:bg-[#991B1B] active:scale-[0.99] text-white text-xs font-semibold py-3 px-6 rounded-full shadow-md shadow-red-950/15 transition cursor-pointer">
                                    Cancel Booking
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- TAB: REJECTED RESERVATIONS -->
                    <div v-else-if="activeTab === 'rejected'" class="space-y-8 animate-fade-in">
                        <div v-if="!selectedRejectedReservation" class="space-y-8 animate-fade-in">
                            
                            <!-- Breadcrumb & Header with title, subtitle and action buttons -->
                            <div class="space-y-2">
                            <!-- Breadcrumb -->
                            <div class="flex items-center gap-1.5 text-[10px] font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                                <span>Portal</span>
                                <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                                <span class="text-slate-600 dark:text-slate-350">Rejected Reservations</span>
                            </div>

                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div>
                                    <h1 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-3xl font-bold tracking-tight">Rejected Reservations</h1>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs mt-1 leading-relaxed max-w-2xl">
                                        Management of declined booking requests. Review reasons for rejection or historical data for cancelled transactions.
                                    </p>
                                </div>
                                
                                <!-- Action Buttons -->
                                <div class="flex items-center gap-3 self-end sm:self-auto shrink-0">
                                    <button class="flex items-center gap-2 px-4 py-2.5 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-700 dark:text-slate-350 hover:text-slate-900 dark:hover:text-white bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800/50 text-xs font-semibold tracking-wide shadow-sm transition cursor-pointer">
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                        <span>Filter</span>
                                    </button>
                                    <button class="flex items-center gap-2 px-4 py-2.5 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-700 dark:text-slate-350 hover:text-slate-900 dark:hover:text-white bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800/50 text-xs font-semibold tracking-wide shadow-sm transition cursor-pointer">
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        <span>Export CSV</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Grid (4 Columns) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                            
                            <!-- Total Rejected Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[110px]">
                                <div class="flex items-center justify-between">
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Total Rejected</p>
                                    <span class="text-[9px] text-rose-600 bg-rose-50 dark:bg-rose-950/20 dark:text-rose-450 px-1.5 py-0.5 rounded font-bold flex items-center gap-0.5">
                                        <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        +12%
                                    </span>
                                </div>
                                <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-3">124</p>
                            </div>

                            <!-- Invalid Payments Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[110px]">
                                <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Invalid Payments</p>
                                <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-3">45</p>
                            </div>

                            <!-- Duplicate Bookings Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[110px]">
                                <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Duplicate Bookings</p>
                                <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-3">18</p>
                            </div>

                            <!-- User Cancelled Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[110px]">
                                <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">User Cancelled</p>
                                <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-3">61</p>
                            </div>
                        </div>

                        <!-- Table Card -->
                        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm space-y-4">
                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[800px] border-collapse text-left text-xs">
                                    <thead>
                                        <tr class="border-b border-slate-100 dark:border-slate-800 text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">
                                            <th class="py-4 font-semibold w-[24%]">Guest Name</th>
                                            <th class="py-4 font-semibold w-[20%]">Room Type</th>
                                            <th class="py-4 font-semibold w-[18%]">Dates</th>
                                            <th class="py-4 font-semibold w-[14%]">Amount</th>
                                            <th class="py-4 text-center font-semibold w-[14%]">Reason for Rejection</th>
                                            <th class="py-4 text-right pr-6 font-semibold w-[10%]">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                                        <tr 
                                            v-for="reservation in rejectedReservations" 
                                            :key="reservation.id" 
                                            class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition"
                                        >
                                            <!-- Guest Name & Initials Badge -->
                                            <td class="py-5 flex items-center gap-3">
                                                <div 
                                                    :class="['h-9 w-9 rounded-full font-bold flex items-center justify-center text-xs tracking-wider border border-slate-200/50 dark:border-slate-700 uppercase shrink-0', reservation.bgClass]"
                                                >
                                                    {{ reservation.initials }}
                                                </div>
                                                <span class="font-bold text-slate-900 dark:text-slate-100 group-hover:text-[#0b1c3d] dark:group-hover:text-amber-300 transition text-sm">
                                                    {{ reservation.name }}
                                                </span>
                                            </td>

                                            <!-- Room Type -->
                                            <td class="py-5 text-slate-700 dark:text-slate-300 font-medium text-xs">
                                                {{ reservation.roomType }}
                                            </td>

                                            <!-- Dates -->
                                            <td class="py-5">
                                                <div class="text-xs">
                                                    <p class="font-semibold text-slate-700 dark:text-slate-300 leading-normal">
                                                        {{ reservation.startDate }} -
                                                    </p>
                                                    <p class="font-semibold text-slate-700 dark:text-slate-300 leading-normal">
                                                        {{ reservation.endDate }},
                                                    </p>
                                                    <p class="text-slate-400 dark:text-slate-500 text-[10px] mt-0.5 leading-none">
                                                        {{ reservation.year }}
                                                    </p>
                                                </div>
                                            </td>

                                            <!-- Amount -->
                                            <td class="py-5 font-bold text-slate-850 dark:text-slate-100 text-sm">
                                                ₱{{ reservation.amount }}
                                            </td>

                                            <!-- Reason for Rejection Badge -->
                                            <td class="py-5 text-center">
                                                <div class="inline-block text-[9px] font-bold tracking-wide uppercase px-2.5 py-1.5 rounded-lg max-w-[110px] leading-tight">
                                                    <span v-if="reservation.reasonType === 'invalid_payment'" class="text-rose-600 bg-rose-50 dark:bg-rose-950/20 dark:text-rose-300 block">
                                                        Invalid<br/>Payment
                                                    </span>
                                                    <span v-else-if="reservation.reasonType === 'user_cancelled'" class="text-slate-500 bg-slate-50 dark:bg-slate-800 dark:text-slate-405 block">
                                                        User<br/>Cancelled
                                                    </span>
                                                    <span v-else-if="reservation.reasonType === 'duplicate_booking'" class="text-[#A27B5C] bg-[#FAF0E6] dark:bg-amber-950/20 dark:text-amber-300 block">
                                                        Duplicate<br/>Booking
                                                    </span>
                                                </div>
                                            </td>

                                            <!-- Actions -->
                                            <td class="py-5 text-right pr-6">
                                                <div class="flex justify-end">
                                                    <button @click="selectedRejectedReservation = reservation" class="text-slate-400 hover:text-[#0b1c3d] dark:text-slate-500 dark:hover:text-slate-350 transition cursor-pointer" title="View Details">
                                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table Pagination Footer -->
                            <div class="flex justify-between items-center border-t border-slate-50 dark:border-slate-800 pt-4 text-[10px] text-slate-400 dark:text-slate-500 font-medium">
                                <span>Showing 1 to 5 of 124 entries</span>
                                <div class="flex items-center gap-1.5">
                                    <button class="p-1 px-2 border border-slate-200 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50 disabled:opacity-50 text-slate-600 dark:text-slate-400" disabled>&lt;</button>
                                    <span class="px-2.5 py-1 font-bold text-white bg-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300 rounded shadow-sm">1</span>
                                    <button class="px-2.5 py-1 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800/50 font-semibold text-slate-700 dark:text-slate-350 cursor-pointer">2</button>
                                    <button class="px-2.5 py-1 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800/50 font-semibold text-slate-700 dark:text-slate-350 cursor-pointer">3</button>
                                    <span class="px-1 text-slate-450 dark:text-slate-600 font-bold">...</span>
                                    <button class="px-2.5 py-1 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800/50 font-semibold text-slate-700 dark:text-slate-350 cursor-pointer">25</button>
                                    <button class="p-1 px-2 border border-slate-200 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50 cursor-pointer text-slate-600 dark:text-slate-400">&gt;</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of v-if="!selectedRejectedReservation" -->

                    <!-- DETAILED VIEW -->
                    <div v-else class="space-y-8 animate-fade-in">
                        <!-- Back Button -->
                        <button 
                            @click="selectedRejectedReservation = null" 
                            class="flex items-center gap-2 text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200 text-sm font-semibold transition cursor-pointer mb-2"
                        >
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span>Back to Rejected</span>
                        </button>

                        <!-- Reservation Detailed Header -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-2">
                            <div>
                                <div class="flex flex-wrap items-center gap-3">
                                    <h1 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-3xl font-bold tracking-tight">
                                        Reservation <span class="text-slate-400 font-light">#AR-882{{ selectedRejectedReservation.id }}</span>
                                    </h1>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 dark:bg-rose-950/20 text-rose-700 dark:text-rose-300 border border-rose-100/10 dark:border-rose-900/30">
                                        REJECTED
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Details Content Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Left Column: Guest Profile & Rejection Detail -->
                            <div class="lg:col-span-1 space-y-6">
                                <!-- Guest Profile Card -->
                                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm space-y-5">
                                    <p class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Guest Profile</p>
                                    <div class="my-1">
                                        <h4 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">{{ selectedRejectedReservation.name }}</h4>
                                    </div>
                                    <div class="space-y-3.5 text-xs text-slate-600 dark:text-slate-400 w-full flex flex-col pt-4 border-t border-slate-50 dark:border-slate-800/85">
                                        <div class="flex items-center gap-2">
                                            <svg class="h-4.5 w-4.5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <span class="font-medium text-slate-705 dark:text-slate-300">{{ selectedRejectedReservation.email }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="h-4.5 w-4.5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            <span class="font-medium text-slate-705 dark:text-slate-300">{{ selectedRejectedReservation.phone }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Rejection Detail Card -->
                                <div class="bg-rose-50/40 dark:bg-rose-950/20 border border-rose-100 dark:border-rose-900/30 rounded-[28px] p-6 shadow-sm space-y-4">
                                    <div class="flex items-center justify-between">
                                        <p class="text-[10px] font-bold text-rose-600 dark:text-rose-400 uppercase tracking-wider">Rejection Detail</p>
                                        <!-- Info Icon SVG -->
                                        <svg class="h-4.5 w-4.5 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="space-y-2">
                                        <h4 class="text-sm font-bold text-slate-850 dark:text-slate-205">{{ selectedRejectedReservation.rejectionReason }}</h4>
                                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">{{ selectedRejectedReservation.rejectionDetail }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Stay Info & Timeline -->
                            <div class="lg:col-span-2 space-y-6">
                                <!-- Stay Information Card -->
                                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm space-y-6">
                                    <div class="flex items-center justify-between">
                                        <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">Stay Information</h3>
                                        <span class="px-3 py-1 text-xs font-semibold bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-slate-200 rounded-full">
                                            {{ selectedRejectedReservation.roomCategory }}
                                        </span>
                                    </div>

                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pb-4">
                                        <!-- Check In -->
                                        <div class="flex flex-col">
                                            <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Check In</span>
                                            <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-base font-bold mt-1.5">{{ selectedRejectedReservation.startDate }}, {{ selectedRejectedReservation.year }}</span>
                                            <span class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold mt-0.5">{{ selectedRejectedReservation.checkInTime }}</span>
                                        </div>

                                        <!-- Check Out -->
                                        <div class="flex flex-col">
                                            <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Check Out</span>
                                            <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-base font-bold mt-1.5">{{ selectedRejectedReservation.endDate }}, {{ selectedRejectedReservation.year }}</span>
                                            <span class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold mt-0.5">{{ selectedRejectedReservation.checkOutTime }}</span>
                                        </div>

                                        <!-- Guests -->
                                        <div class="flex flex-col">
                                            <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Guests</span>
                                            <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-base font-bold mt-1.5">{{ selectedRejectedReservation.guests }}</span>
                                            <span class="text-slate-455 dark:text-slate-500 text-[10px] font-semibold mt-0.5">{{ selectedRejectedReservation.guestsSubtext }}</span>
                                        </div>

                                        <!-- Total Value -->
                                        <div class="flex flex-col">
                                            <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Total Value</span>
                                            <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-base font-bold mt-1.5">₱{{ selectedRejectedReservation.amount }}</span>
                                            <span class="text-rose-500 dark:text-rose-450 text-[10px] font-semibold mt-0.5">{{ selectedRejectedReservation.refundStatus }}</span>
                                        </div>
                                    </div>

                                    <!-- Room Visual Image with absolute overlay info -->
                                    <div class="relative h-60 w-full overflow-hidden bg-slate-950 rounded-2xl">
                                        <div 
                                            class="absolute inset-0 bg-cover bg-center transition-transform duration-7000 ease-out hover:scale-105" 
                                            style="background-image: url('/images/staycation_hero.png');"
                                        ></div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/30 to-slate-950/20"></div>
                                        <div class="absolute bottom-6 left-6 text-white">
                                            <h2 class="font-serif text-2xl font-bold tracking-tight">{{ selectedRejectedReservation.roomType }}</h2>
                                            <p class="text-white/85 text-xs font-semibold mt-1">
                                                {{ selectedRejectedReservation.roomDescription }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Staff Internal Notes Box -->
                                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm space-y-4">
                                    <p class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Staff Internal Notes</p>
                                    <div class="border-l-4 border-slate-900 dark:border-slate-505 bg-slate-50 dark:bg-slate-855 rounded-r-xl p-4.5 text-xs text-slate-700 dark:text-slate-350 italic leading-relaxed">
                                        "{{ selectedRejectedReservation.internalNotes }}"
                                    </div>
                                </div>

                                <!-- Reservation Timeline -->
                                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm space-y-6">
                                    <p class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Reservation Timeline</p>
                                    
                                    <div class="relative pl-6 border-l-2 border-slate-100 dark:border-slate-800 space-y-8 py-2 ml-3">
                                        <div 
                                            v-for="(event, idx) in selectedRejectedReservation.timeline" 
                                            :key="idx" 
                                            class="relative"
                                        >
                                            <!-- Icon marker based on event type -->
                                            <div 
                                                v-if="event.iconType === 'rejected'"
                                                class="absolute -left-[35px] top-0.5 h-6 w-6 rounded-full bg-rose-500 text-white flex items-center justify-center shadow-sm"
                                            >
                                                <!-- Cross Icon -->
                                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </div>
                                            <div 
                                                v-else-if="event.iconType === 'note'"
                                                class="absolute -left-[35px] top-0.5 h-6 w-6 rounded-full bg-[#0B1E3F] text-white flex items-center justify-center shadow-sm"
                                            >
                                                <!-- Note / Doc Icon -->
                                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div 
                                                v-else
                                                class="absolute -left-[35px] top-0.5 h-6 w-6 rounded-full bg-amber-50 dark:bg-amber-950/20 text-[#A27B5C] dark:text-amber-300 flex items-center justify-center shadow-sm border border-amber-100/10 dark:border-amber-900/30"
                                            >
                                                <!-- Check / Initiated Icon -->
                                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                                                </svg>
                                            </div>

                                            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-1">
                                                <div>
                                                    <h4 class="text-xs font-bold text-slate-800 dark:text-slate-200">{{ event.title }}</h4>
                                                    <p class="text-xs text-slate-550 dark:text-slate-400 mt-1 leading-normal">
                                                        {{ event.actionedBy }}
                                                    </p>
                                                </div>
                                                <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold shrink-0 sm:mt-0.5">
                                                    {{ event.timestamp }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                    <!-- TAB: PAYMENTS VERIFICATION -->
                    <div v-else-if="activeTab === 'payments'" class="space-y-8 animate-fade-in">
                        
                        <!-- Overview Stat Cards Grid (3 Columns) -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <!-- Total Pending Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4.5">
                                <div class="h-12 w-12 bg-[#FAF0E6] dark:bg-amber-950/20 rounded-2xl flex items-center justify-center text-[#A27B5C] dark:text-amber-450 shrink-0 border border-[#A27B5C]/10">
                                    <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Total Pending</p>
                                    <p class="text-2xl font-bold text-slate-850 dark:text-slate-100 mt-2 leading-none">
                                        24 <span class="font-serif font-normal text-lg text-slate-500 dark:text-slate-400">Entries</span>
                                    </p>
                                </div>
                            </div>

                            <!-- Urgent Discrepancies Card -->
                            <div class="bg-white dark:bg-slate-900 border border-rose-100 dark:border-rose-950 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4.5">
                                <div class="h-12 w-12 bg-rose-50 dark:bg-rose-950/30 rounded-2xl flex items-center justify-center text-rose-500 shrink-0">
                                    <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Urgent Discrepancies</p>
                                    <p class="text-2xl font-bold text-rose-600 dark:text-rose-450 mt-2 leading-none">
                                        03 <span class="font-serif font-normal text-lg text-rose-500/80 dark:text-rose-400/80">Flags</span>
                                    </p>
                                </div>
                            </div>

                            <!-- Missing DP Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4.5">
                                <div class="h-12 w-12 bg-rose-50 dark:bg-rose-950/30 rounded-2xl flex items-center justify-center text-rose-500 shrink-0">
                                    <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Missing DP</p>
                                    <p class="text-2xl font-bold text-rose-600 dark:text-rose-450 mt-2 leading-none">
                                        05 <span class="font-serif font-normal text-lg text-rose-500/80 dark:text-rose-400/80">Bookings</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Active Submissions Card Table -->
                        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm space-y-5">
                            
                            <!-- Card Header -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">Active Submissions</h3>
                                
                                <div class="flex items-center gap-3 w-full sm:w-auto">
                                    <!-- Search guests -->
                                    <div class="relative flex-grow sm:w-72">
                                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </span>
                                        <input 
                                            type="text" 
                                            placeholder="Search guests..." 
                                            class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-100 dark:bg-slate-800 dark:border-slate-700 focus:outline-none focus:bg-white dark:focus:bg-slate-900 rounded-xl text-xs transition dark:text-slate-100"
                                        />
                                    </div>
                                    
                                    <!-- Filter Button -->
                                    <button class="flex items-center gap-1.5 px-3.5 py-2 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-600 dark:text-slate-350 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800 text-xs font-semibold transition cursor-pointer">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                        Filter
                                    </button>
                                </div>
                            </div>

                            <!-- Submissions Table -->
                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[800px] border-collapse text-left text-xs">
                                    <thead>
                                        <tr class="border-b border-slate-100 dark:border-slate-800 text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">
                                            <th class="py-4 font-semibold w-[28%]">Guest & Suite</th>
                                            <th class="py-4 font-semibold w-[16%]">Amount Due</th>
                                            <th class="py-4 font-semibold w-[18%]">Payment Type</th>
                                            <th class="py-4 font-semibold w-[14%]">Receipt Proof</th>
                                            <th class="py-4 font-semibold w-[14%]">Timestamp</th>
                                            <th class="py-4 text-right pr-6 font-semibold w-[10%]">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                                        <tr 
                                            v-for="submission in paymentSubmissions" 
                                            :key="submission.id" 
                                            class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition"
                                        >
                                            <!-- Guest & Suite -->
                                            <td class="py-5 flex items-center gap-3">
                                                <div 
                                                    :class="['h-9 w-9 rounded-full font-bold flex items-center justify-center text-xs tracking-wider border border-slate-200/50 dark:border-slate-700 uppercase shrink-0', submission.bgClass]"
                                                >
                                                    {{ submission.initials }}
                                                </div>
                                                <div>
                                                    <p class="font-bold text-slate-900 dark:text-slate-100 group-hover:text-[#0b1c3d] dark:group-hover:text-amber-300 transition text-sm leading-snug">
                                                        {{ submission.name }}
                                                    </p>
                                                    <span class="text-slate-400 dark:text-slate-500 text-[11px] mt-0.5 block leading-none font-medium">
                                                        {{ submission.suite }}
                                                    </span>
                                                </div>
                                            </td>

                                            <!-- Amount Due -->
                                            <td class="py-5">
                                                <p :class="['font-bold text-sm leading-snug', submission.amountColorClass]">
                                                    ₱{{ submission.amount }}
                                                </p>
                                                <!-- Red DP Missing Badge if applicable -->
                                                <span 
                                                    v-if="submission.isMissing" 
                                                    class="inline-block mt-1 px-1.5 py-0.5 text-[8px] font-extrabold bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-450 rounded-sm tracking-wider uppercase border border-rose-100/30"
                                                >
                                                    DP MISSING
                                                </span>
                                            </td>

                                            <!-- Payment Type -->
                                            <td class="py-5 text-slate-700 dark:text-slate-300 font-medium text-xs">
                                                {{ submission.paymentType }}
                                            </td>

                                            <!-- Receipt Proof image -->
                                            <td class="py-5">
                                                <div class="h-10 w-16 rounded overflow-hidden border border-slate-100 dark:border-slate-800 shadow-sm relative group/thumb cursor-zoom-in">
                                                    <img 
                                                        :src="submission.proofUrl" 
                                                        class="h-full w-full object-cover transition-transform duration-300 group-hover/thumb:scale-110" 
                                                        alt="Receipt proof"
                                                    />
                                                </div>
                                            </td>

                                            <!-- Timestamp -->
                                            <td class="py-5 text-slate-500 dark:text-slate-400 font-medium">
                                                {{ submission.timestamp }}
                                            </td>

                                            <!-- Actions (Sheet icon, Verify button, Reject button) -->
                                            <td class="py-5 text-right pr-6">
                                                <div class="flex items-center justify-end gap-2.5">
                                                    <button class="text-slate-400 hover:text-slate-650 dark:text-slate-500 dark:hover:text-slate-355 transition cursor-pointer" title="View Logs">
                                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                    </button>
                                                    <button class="px-3 py-1.5 rounded-lg bg-[#0B1E3F] hover:bg-[#152e59] dark:bg-amber-500/10 dark:hover:bg-amber-500/20 dark:text-amber-300 text-white font-bold text-[10px] tracking-wide transition cursor-pointer">
                                                        Verify
                                                    </button>
                                                    <button class="px-3 py-1.5 rounded-lg border border-rose-200 dark:border-rose-900/50 hover:bg-rose-50/30 text-rose-600 dark:text-rose-450 font-bold text-[10px] tracking-wide transition cursor-pointer">
                                                        Reject
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table Pagination Footer -->
                            <div class="flex justify-between items-center border-t border-slate-50 dark:border-slate-800 pt-4 text-[10px] text-slate-400 dark:text-slate-500 font-medium">
                                <span>Showing 3 of 24 pending payments</span>
                                <div class="flex items-center gap-1.5">
                                    <button class="p-1 px-2 border border-slate-200 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50 disabled:opacity-50 text-slate-600 dark:text-slate-400" disabled>&lt;</button>
                                    <span class="px-2.5 py-1 font-bold text-white bg-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300 rounded shadow-sm">1</span>
                                    <button class="px-2.5 py-1 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800/50 font-semibold text-slate-700 dark:text-slate-350 cursor-pointer">2</button>
                                    <button class="px-2.5 py-1 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800/50 font-semibold text-slate-700 dark:text-slate-350 cursor-pointer">3</button>
                                    <button class="p-1 px-2 border border-slate-200 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50 cursor-pointer text-slate-600 dark:text-slate-400">&gt;</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- TAB: USER MANAGEMENT -->
                    <div v-else-if="activeTab === 'user_management'" class="space-y-8 animate-fade-in">
                        <!-- Title & Search Header -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h1 class="font-serif text-[#0b1c3d] text-3xl font-bold tracking-tight">User Management</h1>
                                <p class="text-slate-500 text-xs mt-1 leading-relaxed">
                                    Manage administrators, property managers, and front desk staff accounts.
                                </p>
                            </div>
                            <!-- Search users input -->
                            <div class="relative w-80 max-w-full">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                                <input 
                                    type="text" 
                                    v-model="userSearchQuery"
                                    placeholder="Search users..." 
                                    class="w-full pl-10 pr-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-slate-300 focus:ring-1 focus:ring-slate-300 rounded-xl text-xs transition shadow-sm dark:text-slate-100"
                                />
                            </div>
                        </div>

                        <!-- Info Cards Grid (3 Columns) -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <!-- Total Users Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm flex items-center justify-between">
                                <div class="space-y-3">
                                    <p class="text-slate-400 dark:text-slate-500 text-xs font-semibold uppercase tracking-wider">Total Users</p>
                                    <p class="text-3xl font-bold text-slate-900 dark:text-slate-100">{{ usersList.length }}</p>
                                </div>
                                <div class="flex flex-col items-end gap-1">
                                    <div class="h-10 w-10 bg-slate-50 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-[#0B1E3F] dark:text-amber-300">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-[10px] text-green-600 bg-green-50 dark:bg-green-950/30 dark:text-green-300 px-2 py-0.5 rounded-full font-bold">+12%</span>
                                </div>
                            </div>

                            <!-- Active Sessions Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm flex items-center justify-between">
                                <div class="space-y-3">
                                    <p class="text-slate-400 dark:text-slate-500 text-xs font-semibold uppercase tracking-wider">Active Sessions</p>
                                    <p class="text-3xl font-bold text-slate-900 dark:text-slate-100">14</p>
                                </div>
                                <div class="flex flex-col items-end gap-1">
                                    <div class="h-10 w-10 bg-slate-50 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-[#0B1E3F] dark:text-amber-300">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <span class="text-[10px] text-[#2D5A27] bg-emerald-50 dark:bg-emerald-950/30 dark:text-emerald-300 px-2 py-0.5 rounded-full font-bold">Active</span>
                                </div>
                            </div>

                            <!-- Add New User Card (CTA) -->
                            <div @click="showAddUserModal = true" class="bg-[#0B1E3F] rounded-3xl p-6 shadow-md flex items-center justify-center text-white cursor-pointer group hover:bg-[#152e59] active:scale-[0.99] transition-all">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 bg-white/10 rounded-2xl flex items-center justify-center text-amber-300">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-semibold tracking-wide">Add New User</span>
                                </div>
                            </div>
                        </div>

                        <!-- User Directory Table Container -->
                        <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">User Directory</h3>
                                <div class="flex items-center gap-2">
                                    <button class="p-2 border border-slate-100 dark:border-slate-800 rounded-xl text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200 transition">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Error/Loading states -->
                            <div v-if="fetchUsersLoading" class="py-12 text-center text-slate-400 text-xs">
                                Loading directory...
                            </div>
                            <div v-else-if="fetchUsersError" class="py-12 text-center text-rose-500 text-xs font-semibold">
                                {{ fetchUsersError }}
                            </div>
                            
                            <!-- User Table -->
                            <div v-else class="overflow-x-auto">
                                <table class="w-full min-w-[700px] border-collapse text-left text-xs">
                                    <thead>
                                        <tr class="border-b border-slate-100 dark:border-slate-800 text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">
                                            <th class="py-4 font-semibold">Name</th>
                                            <th class="py-4 font-semibold">Email Address</th>
                                            <th class="py-4 font-semibold">Role</th>
                                            <th class="py-4 font-semibold">Status</th>
                                            <th class="py-4 text-right pr-4 font-semibold">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                                        <tr 
                                            v-for="user in usersList.filter(u => !userSearchQuery || u.name.toLowerCase().includes(userSearchQuery.toLowerCase()) || u.email.toLowerCase().includes(userSearchQuery.toLowerCase()))" 
                                            :key="user.id" 
                                            class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition"
                                        >
                                            <!-- User Name & Avatar -->
                                            <td class="py-4 flex items-center gap-3">
                                                <div class="h-9 w-9 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-semibold flex items-center justify-center text-xs tracking-wider border border-slate-200 dark:border-slate-700 uppercase animate-fade-in">
                                                    {{ user.name.slice(0, 2).toUpperCase() }}
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-slate-800 dark:text-slate-200 group-hover:text-[#0b1c3d] dark:group-hover:text-amber-300 transition">{{ user.name }}</p>
                                                    <span class="text-slate-400 dark:text-slate-500 text-[10px] mt-0.5 block">
                                                        {{ user.role === 'admin' || user.role === 'manager' ? 'Operations' : 'Front Desk' }}
                                                    </span>
                                                </div>
                                            </td>
                                            
                                            <!-- Email -->
                                            <td class="py-4 text-slate-500 dark:text-slate-400 font-medium select-all">
                                                {{ user.email }}
                                            </td>
                                            
                                            <!-- Role Badge -->
                                            <td class="py-4">
                                                <span 
                                                    :class="['px-2.5 py-1 text-[10px] font-bold rounded-full uppercase', 
                                                             user.role === 'admin' || user.role === 'manager' ? 'text-white bg-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300' : 'text-slate-700 bg-slate-100 dark:bg-slate-800 dark:text-slate-300']"
                                                >
                                                    {{ user.role === 'admin' || user.role === 'manager' ? 'Manager' : 'Staff' }}
                                                </span>
                                            </td>
                                            
                                            <!-- Status (Dynamic indicator: logged in user is Online, others Offline) -->
                                            <td class="py-4 flex items-center gap-2 mt-4.5">
                                                <span 
                                                    :class="['h-2 w-2 rounded-full', 
                                                             currentUser && currentUser.id === user.id ? 'bg-emerald-500' : 'bg-slate-400 dark:bg-slate-600']"
                                                ></span>
                                                <span class="text-slate-500 dark:text-slate-400 font-medium">
                                                    {{ currentUser && currentUser.id === user.id ? 'Online' : 'Offline' }}
                                                </span>
                                            </td>
                                            
                                            <!-- Actions -->
                                            <td class="py-4 text-right pr-4">
                                                <button @click="openEditUser(user)" class="p-1.5 border border-slate-100 dark:border-slate-800 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition cursor-pointer">
                                                    <!-- Pencil Edit SVG -->
                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-2.036a5 5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table Footer info -->
                            <div class="flex justify-between items-center border-t border-slate-50 dark:border-slate-800 pt-4 text-[10px] text-slate-400 dark:text-slate-500 font-medium">
                                <span>Showing {{ usersList.length }} of {{ usersList.length }} users</span>
                                <div class="flex items-center gap-1.5">
                                    <button class="p-1 px-2 border border-slate-100 rounded-md hover:bg-slate-50 disabled:opacity-50" disabled>&lt;</button>
                                    <span class="px-2 font-bold text-slate-700 bg-slate-50 rounded p-1">1</span>
                                    <button class="p-1 px-2 border border-slate-100 rounded-md hover:bg-slate-50 disabled:opacity-50" disabled>&gt;</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB: SALES REPORT -->
                    <div v-else-if="activeTab === 'sales'" class="space-y-8 animate-fade-in">
                        
                        <!-- Header with title, subtitle and timeframe buttons -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h1 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-3xl font-bold tracking-tight">Performance Overview</h1>
                                <p class="text-slate-500 dark:text-slate-400 text-xs mt-1 leading-relaxed">
                                    Real-time revenue and booking statistics for Aruga Admin.
                                </p>
                            </div>
                            
                            <!-- Timeframe Selector -->
                            <div class="bg-slate-100 dark:bg-slate-900 p-0.5 rounded-xl flex items-center gap-1 shrink-0 self-end sm:self-auto border border-slate-200/40 dark:border-slate-800">
                                <button class="bg-white dark:bg-slate-850 text-slate-850 dark:text-slate-100 text-xs font-semibold px-3 py-1.5 rounded-lg shadow-sm">Daily</button>
                                <button class="text-slate-500 hover:text-slate-750 dark:text-slate-400 dark:hover:text-slate-200 text-xs font-semibold px-3 py-1.5 transition">Weekly</button>
                                <button class="text-slate-500 hover:text-slate-750 dark:text-slate-400 dark:hover:text-slate-200 text-xs font-semibold px-3 py-1.5 transition">Monthly</button>
                                <button class="text-slate-500 hover:text-slate-750 dark:text-slate-400 dark:hover:text-slate-200 text-xs font-semibold px-3 py-1.5 transition">Yearly</button>
                            </div>
                        </div>

                        <!-- Stats Grid (4 Columns) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                            
                            <!-- Total Revenue Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[130px]">
                                <div class="flex items-center justify-between">
                                    <div class="h-10 w-10 bg-[#0B1E3F]/10 dark:bg-amber-500/20 text-[#0B1E3F] dark:text-amber-300 rounded-xl flex items-center justify-center shrink-0">
                                        <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-[9px] text-[#2D5A27] bg-emerald-50 dark:bg-emerald-950/30 dark:text-emerald-300 px-1.5 py-0.5 rounded font-bold flex items-center gap-0.5">
                                        <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        +12.4%
                                    </span>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Total Revenue</p>
                                    <p class="text-2xl font-serif font-bold text-[#0B1E3F] dark:text-amber-300 mt-2">₱2,450,000</p>
                                </div>
                            </div>

                            <!-- Bookings Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[130px]">
                                <div class="flex items-center justify-between">
                                    <div class="h-10 w-10 bg-[#FAF0E6] dark:bg-amber-950/20 text-[#A27B5C] dark:text-amber-450 rounded-xl flex items-center justify-center shrink-0 border border-[#A27B5C]/10">
                                        <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <span class="text-[9px] text-[#2D5A27] bg-emerald-50 dark:bg-emerald-950/30 dark:text-emerald-300 px-1.5 py-0.5 rounded font-bold flex items-center gap-0.5">
                                        <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        +5.2%
                                    </span>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Bookings</p>
                                    <p class="text-2xl font-serif font-bold text-[#0B1E3F] dark:text-amber-300 mt-2">128</p>
                                </div>
                            </div>

                            <!-- Approved Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[130px]">
                                <div class="flex items-center justify-between">
                                    <div class="h-10 w-10 bg-emerald-50 dark:bg-emerald-950/30 text-emerald-600 dark:text-emerald-400 rounded-xl flex items-center justify-center shrink-0">
                                        <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-[9px] text-rose-600 bg-rose-50 dark:bg-rose-950/20 dark:text-rose-450 px-1.5 py-0.5 rounded font-bold flex items-center gap-0.5">
                                        <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 13l-7 7-7-7m14-6l-7 7-7-7" />
                                        </svg>
                                        -2.1%
                                    </span>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Approved</p>
                                    <p class="text-2xl font-serif font-bold text-[#0B1E3F] dark:text-amber-300 mt-2">112</p>
                                </div>
                            </div>

                            <!-- Occupancy Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[130px]">
                                <div class="flex items-center justify-between">
                                    <div class="h-10 w-10 bg-blue-50 dark:bg-blue-950/30 text-blue-600 dark:text-blue-400 rounded-xl flex items-center justify-center shrink-0">
                                        <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                        </svg>
                                    </div>
                                    <span class="text-[9px] text-[#2D5A27] bg-emerald-50 dark:bg-emerald-950/30 dark:text-emerald-300 px-1.5 py-0.5 rounded font-bold flex items-center gap-0.5">
                                        <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        +8.9%
                                    </span>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Occupancy</p>
                                    <p class="text-2xl font-serif font-bold text-[#0B1E3F] dark:text-amber-300 mt-2">94%</p>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Transactions Card Table -->
                        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm space-y-5">
                            
                            <!-- Card Header -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div>
                                    <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">Recent Transactions</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs mt-0.5">
                                        A comprehensive overview of your latest resort bookings and payments.
                                    </p>
                                </div>
                                
                                <div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
                                    <button class="flex items-center gap-1.5 px-3.5 py-2.5 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-650 dark:text-slate-355 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800 text-xs font-semibold transition cursor-pointer">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                        Filter
                                    </button>
                                    
                                    <button class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] dark:bg-amber-500/20 dark:hover:bg-amber-500/30 text-white dark:text-amber-300 hover:text-white text-xs font-semibold tracking-wide shadow-md transition cursor-pointer">
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        <span>Export PDF</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Transactions Table -->
                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[800px] border-collapse text-left text-xs">
                                    <thead>
                                        <tr class="border-b border-slate-100 dark:border-slate-800 text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">
                                            <th class="py-4 font-semibold w-[16%]">Date</th>
                                            <th class="py-4 font-semibold w-[24%]">Guest Name</th>
                                            <th class="py-4 font-semibold w-[22%]">Room Type</th>
                                            <th class="py-4 font-semibold w-[20%]">Payment Method</th>
                                            <th class="py-4 font-semibold w-[12%]">Total Amount</th>
                                            <th class="py-4 text-center font-semibold w-[6%]">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                                        <tr 
                                            v-for="transaction in recentTransactions" 
                                            :key="transaction.id" 
                                            class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition"
                                        >
                                            <td class="py-5 text-slate-650 dark:text-slate-350 font-medium text-xs">
                                                {{ transaction.date }}
                                            </td>
                                            <td class="py-5 font-bold text-slate-900 dark:text-slate-100 text-sm">
                                                {{ transaction.name }}
                                            </td>
                                            <td class="py-5 text-slate-650 dark:text-slate-350 font-medium">
                                                {{ transaction.roomType }}
                                            </td>
                                            <td class="py-5">
                                                <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300 font-medium text-xs">
                                                    <svg v-if="transaction.methodType === 'credit_card'" class="h-4.5 w-4.5 text-slate-450 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                    </svg>
                                                    <svg v-else-if="transaction.methodType === 'gcash' || transaction.methodType === 'cash'" class="h-4.5 w-4.5 text-slate-450 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    <svg v-else-if="transaction.methodType === 'bank_transfer'" class="h-4.5 w-4.5 text-slate-450 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                                    </svg>
                                                    <span>{{ transaction.method }}</span>
                                                </div>
                                            </td>
                                            <td class="py-5 font-bold text-slate-850 dark:text-slate-100 text-sm">
                                                ₱{{ transaction.amount }}
                                            </td>
                                            <td class="py-5 text-center">
                                                <span 
                                                    v-if="transaction.statusType === 'paid'" 
                                                    class="inline-block px-2.5 py-0.5 text-[10px] font-bold bg-emerald-50 dark:bg-emerald-950/40 text-emerald-800 dark:text-emerald-300 rounded-full uppercase animate-fade-in"
                                                >
                                                    Paid
                                                </span>
                                                <span 
                                                    v-else-if="transaction.statusType === 'pending'" 
                                                    class="inline-block px-2.5 py-0.5 text-[10px] font-bold bg-amber-50 dark:bg-amber-950/20 text-[#A27B5C] dark:text-amber-300 rounded-full uppercase animate-fade-in"
                                                >
                                                    Pending
                                                </span>
                                                <span 
                                                    v-else-if="transaction.statusType === 'failed'" 
                                                    class="inline-block px-2.5 py-0.5 text-[10px] font-bold bg-rose-50 dark:bg-rose-950/20 text-rose-700 dark:text-rose-400 rounded-full uppercase animate-fade-in"
                                                >
                                                    Failed
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table Pagination Footer -->
                            <div class="flex justify-between items-center border-t border-slate-50 dark:border-slate-800 pt-4 text-[10px] text-slate-400 dark:text-slate-500 font-medium">
                                <span>Showing 1 to 5 of 128 transactions</span>
                                <div class="flex items-center gap-1.5">
                                    <button class="p-1 px-2 border border-slate-200 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50 disabled:opacity-50 text-slate-600 dark:text-slate-400" disabled>&lt;</button>
                                    <span class="px-2.5 py-1 font-bold text-white bg-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300 rounded shadow-sm">1</span>
                                    <button class="px-2.5 py-1 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800/50 font-semibold text-slate-700 dark:text-slate-350 cursor-pointer">2</button>
                                    <button class="px-2.5 py-1 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800/50 font-semibold text-slate-700 dark:text-slate-350 cursor-pointer">3</button>
                                    <button class="p-1 px-2 border border-slate-200 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50 cursor-pointer text-slate-600 dark:text-slate-400">&gt;</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- TAB: SETTINGS -->
                    <div v-else-if="activeTab === 'settings'" class="space-y-8 animate-fade-in">
                        <!-- Settings Header -->
                        <div>
                            <h1 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-3xl font-bold tracking-tight">Account Settings</h1>
                            <p class="text-slate-500 dark:text-slate-400 text-xs mt-1 leading-relaxed">
                                Manage your profile details, update your password, and choose your preferred application theme.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Left Column: Preferences Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm space-y-6">
                                <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">Preferences</h3>
                                
                                <div class="space-y-4">
                                    <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Application Theme</label>
                                    <div class="grid grid-cols-2 gap-3">
                                        <!-- Light Mode Option -->
                                        <button 
                                            @click="setTheme('light')"
                                            :class="['p-4 border rounded-2xl flex flex-col items-center gap-2 transition cursor-pointer',
                                                     theme === 'light' ? 'border-[#0B1E3F] dark:border-amber-300 bg-slate-50 dark:bg-slate-800' : 'border-slate-100 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-800/50']"
                                        >
                                            <svg class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                                            </svg>
                                            <span class="text-xs font-semibold text-slate-700 dark:text-slate-200">Light Mode</span>
                                        </button>

                                        <!-- Dark Mode Option -->
                                        <button 
                                            @click="setTheme('dark')"
                                            :class="['p-4 border rounded-2xl flex flex-col items-center gap-2 transition cursor-pointer',
                                                     theme === 'dark' ? 'border-[#0B1E3F] dark:border-amber-300 bg-slate-50 dark:bg-slate-800' : 'border-slate-100 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-800/50']"
                                        >
                                            <svg class="h-6 w-6 text-indigo-500 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                            </svg>
                                            <span class="text-xs font-semibold text-slate-700 dark:text-slate-200">Dark Mode</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Change Password Card -->
                            <div class="lg:col-span-2 bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-6 shadow-sm space-y-6">
                                <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">Security & Password</h3>
                                
                                <form @submit.prevent="updatePassword" class="space-y-4 max-w-xl">
                                    <!-- Alerts for feedback -->
                                    <div v-if="settingsSuccessMsg" class="p-3 text-xs text-green-700 bg-green-50 dark:bg-green-950/30 dark:text-green-300 rounded-xl border border-green-100 dark:border-green-900/50 font-medium">
                                        {{ settingsSuccessMsg }}
                                    </div>
                                    <div v-if="settingsErrorMsg" class="p-3 text-xs text-rose-600 bg-rose-50 dark:bg-rose-950/30 dark:text-rose-300 rounded-xl border border-rose-100 dark:border-rose-900/50 font-medium">
                                        {{ settingsErrorMsg }}
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Current Password</label>
                                        <div class="relative">
                                            <input 
                                                :type="showCurrentPassword ? 'text' : 'password'" 
                                                v-model="passwordForm.currentPassword" 
                                                placeholder="Enter your current password"
                                                class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                                                required
                                            />
                                            <button 
                                                type="button"
                                                @click="showCurrentPassword = !showCurrentPassword"
                                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-650 dark:text-slate-500 dark:hover:text-slate-350 transition cursor-pointer"
                                            >
                                                <svg v-if="showCurrentPassword" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                                </svg>
                                                <svg v-else class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">New Password</label>
                                        <div class="relative">
                                            <input 
                                                :type="showNewPassword ? 'text' : 'password'" 
                                                v-model="passwordForm.newPassword" 
                                                placeholder="Minimum 6 characters"
                                                class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                                                required
                                                minlength="6"
                                            />
                                            <button 
                                                type="button"
                                                @click="showNewPassword = !showNewPassword"
                                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-650 dark:text-slate-500 dark:hover:text-slate-350 transition cursor-pointer"
                                            >
                                                <svg v-if="showNewPassword" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                                </svg>
                                                <svg v-else class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Confirm New Password</label>
                                        <div class="relative">
                                            <input 
                                                :type="showConfirmPassword ? 'text' : 'password'" 
                                                v-model="passwordForm.confirmPassword" 
                                                placeholder="Re-type your new password"
                                                class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                                                required
                                                minlength="6"
                                            />
                                            <button 
                                                type="button"
                                                @click="showConfirmPassword = !showConfirmPassword"
                                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-650 dark:text-slate-500 dark:hover:text-slate-350 transition cursor-pointer"
                                            >
                                                <svg v-if="showConfirmPassword" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                                </svg>
                                                <svg v-else class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="pt-4">
                                        <button 
                                            type="submit"
                                            :disabled="settingsSubmitting"
                                            class="py-3 px-6 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] text-white text-xs font-semibold tracking-wide transition shadow-md disabled:opacity-60 cursor-pointer"
                                        >
                                            <span v-if="settingsSubmitting">Updating...</span>
                                            <span v-else>Update Password</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- OTHER TAB PLACEHOLDERS -->
                    <div v-else class="space-y-8 animate-fade-in py-12 text-center max-w-md mx-auto">
                        <div class="h-16 w-16 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 mx-auto mb-4">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h2 class="font-serif text-slate-900 font-bold text-xl">{{ activeTab.charAt(0).toUpperCase() + activeTab.slice(1).replace('_', ' ') }}</h2>
                        <p class="text-slate-400 text-xs mt-1">This section is currently under development or restricted based on your role privileges.</p>
                    </div>

                </main>
            </div>
        </div>

    </main>

    <!-- ========================================================================= -->
    <!-- MODAL: ADD NEW USER -->
    <!-- ========================================================================= -->
    <div v-if="showAddUserModal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-950/40 backdrop-blur-sm" @click="showAddUserModal = false"></div>
        
        <!-- Modal Body -->
        <div class="relative bg-white border border-slate-100 rounded-3xl p-8 shadow-2xl w-[460px] max-w-full animate-fade-in space-y-6">
            <div class="flex items-center justify-between border-b border-slate-50 pb-4">
                <div>
                    <h3 class="font-serif text-[#0b1c3d] text-xl font-bold">Add New User</h3>
                    <p class="text-slate-400 text-[10px] uppercase font-semibold tracking-wider mt-1">Manager Action</p>
                </div>
                <button @click="showAddUserModal = false" class="p-1 rounded-lg hover:bg-slate-50 text-slate-400 hover:text-slate-600 transition">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Error message -->
            <div v-if="modalError" class="p-3 text-xs text-rose-600 bg-rose-50 rounded-xl border border-rose-100 font-medium">
                {{ modalError }}
            </div>

            <form @submit.prevent="submitAddUser" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">User Full Name</label>
                    <input 
                        type="text" 
                        v-model="addUserForm.name" 
                        placeholder="e.g. John Doe"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition"
                        required
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Work Email Address</label>
                    <input 
                        type="email" 
                        v-model="addUserForm.email" 
                        placeholder="e.g. john@aruga.com"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition"
                        required
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Secure Password</label>
                    <div class="relative">
                        <input 
                            :type="showAddUserPassword ? 'text' : 'password'" 
                            v-model="addUserForm.password" 
                            placeholder="Minimum 6 characters"
                            class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            required
                            minlength="6"
                        />
                        <button 
                            type="button"
                            @click="showAddUserPassword = !showAddUserPassword"
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-650 dark:text-slate-500 dark:hover:text-slate-350 transition cursor-pointer"
                        >
                            <svg v-if="showAddUserPassword" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            <svg v-else class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Organization Role</label>
                    <select 
                        v-model="addUserForm.role"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition appearance-none dark:border-slate-700 dark:text-slate-100"
                    >
                        <option value="staff">Staff</option>
                        <option value="manager">Manager</option>
                    </select>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-slate-50">
                    <button 
                        type="button" 
                        @click="showAddUserModal = false"
                        class="flex-grow py-3 px-4 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-500 text-xs font-semibold tracking-wide transition cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit"
                        :disabled="modalSubmitting"
                        class="flex-grow py-3 px-4 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] text-white text-xs font-semibold tracking-wide transition shadow-md disabled:opacity-60 cursor-pointer"
                    >
                        <span v-if="modalSubmitting">Saving...</span>
                        <span v-else>Register User</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- MODAL: EDIT USER -->
    <!-- ========================================================================= -->
    <div v-if="showEditUserModal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-950/40 backdrop-blur-sm" @click="showEditUserModal = false"></div>
        
        <!-- Modal Body -->
        <div class="relative bg-white border border-slate-100 rounded-3xl p-8 shadow-2xl w-[460px] max-w-full animate-fade-in space-y-6">
            <div class="flex items-center justify-between border-b border-slate-50 pb-4">
                <div>
                    <h3 class="font-serif text-[#0b1c3d] text-xl font-bold">Edit User Directory</h3>
                    <p class="text-slate-400 text-[10px] uppercase font-semibold tracking-wider mt-1">Manager Action</p>
                </div>
                <button @click="showEditUserModal = false" class="p-1 rounded-lg hover:bg-slate-50 text-slate-400 hover:text-slate-600 transition">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Error message -->
            <div v-if="modalError" class="p-3 text-xs text-rose-600 bg-rose-50 rounded-xl border border-rose-100 font-medium">
                {{ modalError }}
            </div>

            <form @submit.prevent="submitEditUser" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">User Full Name</label>
                    <input 
                        type="text" 
                        v-model="editUserForm.name" 
                        placeholder="e.g. John Doe"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition"
                        required
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Work Email Address</label>
                    <input 
                        type="email" 
                        v-model="editUserForm.email" 
                        placeholder="e.g. john@aruga.com"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition"
                        required
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">New Password (Optional)</label>
                    <div class="relative">
                        <input 
                            :type="showEditUserPassword ? 'text' : 'password'" 
                            v-model="editUserForm.password" 
                            placeholder="Leave blank to keep current password"
                            class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            minlength="6"
                        />
                        <button 
                            type="button"
                            @click="showEditUserPassword = !showEditUserPassword"
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-650 dark:text-slate-500 dark:hover:text-slate-350 transition cursor-pointer"
                        >
                            <svg v-if="showEditUserPassword" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            <svg v-else class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Organization Role</label>
                    <select 
                        v-model="editUserForm.role"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition appearance-none dark:border-slate-700 dark:text-slate-100"
                    >
                        <option value="staff">Staff</option>
                        <option value="manager">Manager</option>
                    </select>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-slate-50">
                    <button 
                        type="button" 
                        @click="showEditUserModal = false"
                        class="flex-grow py-3 px-4 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-500 text-xs font-semibold tracking-wide transition cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit"
                        :disabled="modalSubmitting"
                        class="flex-grow py-3 px-4 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] text-white text-xs font-semibold tracking-wide transition shadow-md disabled:opacity-60 cursor-pointer"
                    >
                        <span v-if="modalSubmitting">Saving...</span>
                        <span v-else>Save Changes</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted, watch, computed } from 'vue'
import axiosInstance from 'axios'

const currentView = ref('selection')
const logoError = ref(false)
const showPassword = ref(false)
const loginError = ref('')
const isSubmitting = ref(false)
const currentUser = ref(null)

const activeTab = ref('dashboard_overview')
const theme = ref('light')
const selectedPendingReservation = ref(null)
const selectedApprovedReservation = ref(null)
const selectedRejectedReservation = ref(null)

const priceBreakdown = computed(() => {
    if (!selectedPendingReservation.value) return null
    const amountStr = selectedPendingReservation.value.amount || '0.00'
    const amount = parseFloat(amountStr.replace(/,/g, '')) || 0
    const baseTotal = amount / 1.14
    const nights = selectedPendingReservation.value.nights || 1
    const ratePerNight = baseTotal / nights
    const serviceCharge = baseTotal * 0.10
    const localTaxes = baseTotal * 0.04
    
    return {
        ratePerNight: ratePerNight.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
        baseTotal: baseTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
        serviceCharge: serviceCharge.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
        localTaxes: localTaxes.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
        total: amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
    }
})
const settingsSubmitting = ref(false)
const settingsSuccessMsg = ref('')
const settingsErrorMsg = ref('')
const passwordForm = reactive({
    currentPassword: '',
    newPassword: '',
    confirmPassword: ''
})
const showCurrentPassword = ref(false)
const showNewPassword = ref(false)
const showConfirmPassword = ref(false)
const showAddUserPassword = ref(false)
const showEditUserPassword = ref(false)

const pendingReservations = ref([
    {
        id: 1,
        initials: 'JS',
        name: 'Julianne Smith',
        email: 'julianne.s@example.com',
        roomType: 'Ocean Villa',
        startDate: 'Oct 12',
        endDate: 'Oct 15',
        nights: 3,
        guests: '2 Adults',
        amount: '24,500.00',
        statusType: 'awaiting_verification'
    },
    {
        id: 2,
        initials: 'MR',
        name: 'Marcus Rivera',
        email: 'm.rivera@global.net',
        roomType: 'Garden Suite',
        startDate: 'Oct 14',
        endDate: 'Oct 18',
        nights: 4,
        guests: '1 Adult',
        amount: '18,200.00',
        statusType: 'verified'
    },
    {
        id: 3,
        initials: 'AL',
        name: 'Amara Lim',
        email: 'amara.lim@mail.com',
        roomType: 'Penthouse',
        startDate: 'Oct 20',
        endDate: 'Oct 22',
        nights: 2,
        guests: '4 Adults',
        amount: '55,000.00',
        statusType: 'discrepancy'
    },
    {
        id: 4,
        initials: 'ET',
        name: 'Elena Torres',
        email: 'e.torres@lifestyle.ph',
        roomType: 'Ocean Villa',
        startDate: 'Nov 01',
        endDate: 'Nov 05',
        nights: 4,
        guests: '2 Adults',
        amount: '32,000.00',
        statusType: 'receipt_uploaded'
    }
])

const approvedReservations = ref([
    {
        id: 1,
        initials: 'ER',
        name: 'Elena Rodriguez',
        email: 'elena.r@example.com',
        guestsText: 'Confirmed • 2 Guests',
        roomType: 'Infinity Pool Villa',
        roomClass: 'PREMIUM',
        startDate: 'Oct 12',
        endDate: 'Oct 15',
        nights: '3 Nights',
        status: 'Confirmed',
        statusType: 'confirmed',
        avatarUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=120&q=80'
    },
    {
        id: 2,
        initials: 'JS',
        name: 'James Sutherland',
        email: 'james.s@example.com',
        guestsText: 'Confirmed • 1 Guest',
        roomType: 'Ocean View Suite',
        roomClass: 'STANDARD',
        startDate: 'Oct 14',
        endDate: 'Oct 18',
        nights: '4 Nights',
        status: 'In-Stay',
        statusType: 'in_stay',
        avatarUrl: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=120&q=80'
    },
    {
        id: 3,
        initials: 'SJ',
        name: 'Sarah Jenkins',
        email: 'sarah.j@example.com',
        guestsText: 'Confirmed • 4 Guests',
        roomType: 'Presidential Pavilion',
        roomClass: 'LUXURY',
        startDate: 'Oct 15',
        endDate: 'Oct 22',
        nights: '7 Nights',
        status: 'Pending Check-in',
        statusType: 'pending_check_in',
        avatarUrl: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=120&q=80'
    },
    {
        id: 4,
        initials: 'MC',
        name: 'Michael Chen',
        email: 'michael.c@example.com',
        guestsText: 'Confirmed • 2 Guests',
        roomType: 'Garden Villa',
        roomClass: 'PREMIUM',
        startDate: 'Oct 18',
        endDate: 'Oct 20',
        nights: '2 Nights',
        status: 'Confirmed',
        statusType: 'confirmed',
        avatarUrl: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=120&q=80'
    }
])

const rejectedReservations = ref([
    {
        id: 1,
        initials: 'JT',
        name: 'Jameson Thorne',
        email: 'j.thorne@premium-client.com',
        phone: '+63 917 123 4567',
        roomType: 'Ocean Breeze Villa 402',
        roomCategory: 'Luxury Villa',
        startDate: 'Oct 24',
        endDate: 'Oct 28',
        year: '2023',
        amount: '42,500.00',
        guests: '2 Adults',
        guestsSubtext: 'King Bed Suite',
        reasonType: 'invalid_payment',
        rejectionReason: 'Invalid Payment',
        rejectionDetail: 'The credit card authorization failed twice. Security protocol triggered automatic rejection after 24 hours of no response.',
        refundStatus: 'Refund Pending',
        internalNotes: 'Guest attempted to use a corporate card that was flagged by the bank. I reached out via phone at 10:15 AM but went to voicemail. Reservation held for additional 3 hours before system auto-reject. Please flag for future priority re-booking if guest contacts back.',
        bgClass: 'bg-[#FEF2F2] text-[#991B1B] dark:bg-red-950/40 dark:text-red-350',
        roomDescription: 'Private Infinity Pool • Sunrise View',
        checkInTime: 'From 2:00 PM',
        checkOutTime: 'Before 11:00 AM',
        timeline: [
            { title: 'Reservation Rejected', actionedBy: 'Actioned by: System Auto-Guardian', timestamp: 'Oct 23, 2023 • 02:45 PM', iconType: 'rejected' },
            { title: 'Staff Note Added', actionedBy: 'Actioned by: Admin Elena Rossi', timestamp: 'Oct 23, 2023 • 10:20 AM', iconType: 'note' },
            { title: 'Reservation Initiated', actionedBy: 'Origin: Mobile App Checkout', timestamp: 'Oct 22, 2023 • 11:12 PM', iconType: 'initiated' }
        ]
    },
    {
        id: 2,
        initials: 'RK',
        name: 'Robert Kawinski',
        email: 'robert.k@example.com',
        phone: '+63 918 765 4321',
        roomType: 'Garden Suite 102',
        roomCategory: 'Standard Room',
        startDate: 'Nov 02',
        endDate: 'Nov 05',
        year: '2024',
        amount: '8,900.00',
        guests: '1 Adult',
        guestsSubtext: 'Queen Bed Room',
        reasonType: 'user_cancelled',
        rejectionReason: 'User Cancelled',
        rejectionDetail: 'The guest cancelled the booking request directly from their guest portal prior to payment validation.',
        refundStatus: 'No Refund Required',
        internalNotes: 'Guest left a message saying their travel plans changed due to a business trip cancellation. Recommended offering a promotional code for their next stay.',
        bgClass: 'bg-[#E0F2FE] text-[#0369A1] dark:bg-blue-950/40 dark:text-blue-300',
        roomDescription: 'Garden View • Ground Floor Patio',
        checkInTime: 'From 2:00 PM',
        checkOutTime: 'Before 11:00 AM',
        timeline: [
            { title: 'Reservation Cancelled', actionedBy: 'Actioned by: Guest Portal Request', timestamp: 'Nov 01, 2024 • 04:30 PM', iconType: 'rejected' },
            { title: 'Reservation Initiated', actionedBy: 'Origin: Direct Web Portal', timestamp: 'Nov 01, 2024 • 11:15 AM', iconType: 'initiated' }
        ]
    },
    {
        id: 3,
        initials: 'EL',
        name: 'Elena Lopez',
        email: 'elena.l@example.com',
        phone: '+63 915 222 3333',
        roomType: 'Royal Beachfront 10',
        roomCategory: 'Luxury Villa',
        startDate: 'Dec 20',
        endDate: 'Dec 28',
        year: '2024',
        amount: '124,000.00',
        guests: '4 Guests',
        guestsSubtext: '2 King Beds',
        reasonType: 'duplicate_booking',
        rejectionReason: 'Duplicate Booking',
        rejectionDetail: 'This reservation was flag-rejected because a duplicate booking reference existed for the same guest and check-in date.',
        refundStatus: 'Refund Processed',
        internalNotes: 'Duplicate request detected by system. Spoke with Elena Lopez, she confirmed submitting twice by accident. Validated and kept her first booking active, rejected this duplicate.',
        bgClass: 'bg-[#FEF3C7] text-[#B45309] dark:bg-amber-950/30 dark:text-amber-400',
        roomDescription: 'Direct Beachfront • Private Gazebo',
        checkInTime: 'From 2:00 PM',
        checkOutTime: 'Before 11:00 AM',
        timeline: [
            { title: 'Reservation Rejected', actionedBy: 'Actioned by: Front Desk Agent', timestamp: 'Dec 10, 2024 • 09:15 AM', iconType: 'rejected' },
            { title: 'Reservation Initiated', actionedBy: 'Origin: Mobile App Checkout', timestamp: 'Dec 10, 2024 • 09:10 AM', iconType: 'initiated' }
        ]
    },
    {
        id: 4,
        initials: 'MC',
        name: 'Marcus Chen',
        email: 'marcus.chen@example.com',
        phone: '+63 916 444 5555',
        roomType: 'Garden Suite 204',
        roomCategory: 'Standard Room',
        startDate: 'Oct 25',
        endDate: 'Oct 30',
        year: '2024',
        amount: '12,500.00',
        guests: '2 Adults',
        guestsSubtext: '1 King Bed',
        reasonType: 'invalid_payment',
        rejectionReason: 'Invalid Payment',
        rejectionDetail: 'Bank returned insufficient funds (Code 51) for the down payment transaction. Reservation auto-rejected.',
        refundStatus: 'No Refund Required',
        internalNotes: 'Automatic bank verification failed. System automatically released the room after 24 hours of non-payment window.',
        bgClass: 'bg-[#F1F5F9] text-slate-600 dark:bg-slate-800 dark:text-slate-350',
        roomDescription: 'Garden View • High Floor Balcony',
        checkInTime: 'From 2:00 PM',
        checkOutTime: 'Before 11:00 AM',
        timeline: [
            { title: 'Reservation Rejected', actionedBy: 'Actioned by: System Auto-Guardian', timestamp: 'Oct 24, 2024 • 12:00 PM', iconType: 'rejected' },
            { title: 'Reservation Initiated', actionedBy: 'Origin: Direct Web Portal', timestamp: 'Oct 23, 2024 • 12:00 PM', iconType: 'initiated' }
        ]
    },
    {
        id: 5,
        initials: 'SH',
        name: 'Sarah Hughes',
        email: 'sarah.hughes@example.com',
        phone: '+63 919 666 7777',
        roomType: 'Overwater Villa 08',
        roomCategory: 'Luxury Villa',
        startDate: 'Jan 05',
        endDate: 'Jan 10',
        year: '2025',
        amount: '48,000.00',
        guests: '2 Adults',
        guestsSubtext: 'King Bed Suite',
        reasonType: 'user_cancelled',
        rejectionReason: 'User Cancelled',
        rejectionDetail: 'Cancelled by guest via API request. Reasons provided: family emergency.',
        refundStatus: 'Refund Completed',
        internalNotes: 'Guest contacted support requesting cancellation. Processed and fully refunded within policy guidelines.',
        bgClass: 'bg-[#0B1E3F] text-white dark:bg-slate-700 dark:text-slate-100',
        roomDescription: 'Private Infinity Pool • Sunrise View',
        checkInTime: 'From 2:00 PM',
        checkOutTime: 'Before 11:00 AM',
        timeline: [
            { title: 'Reservation Cancelled', actionedBy: 'Actioned by: Support Agent', timestamp: 'Jan 02, 2025 • 03:22 PM', iconType: 'rejected' },
            { title: 'Reservation Initiated', actionedBy: 'Origin: Direct Web Portal', timestamp: 'Jan 01, 2025 • 10:45 AM', iconType: 'initiated' }
        ]
    }
])

const paymentSubmissions = ref([
    {
        id: 1,
        initials: 'SM',
        bgClass: 'bg-amber-100 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300',
        name: 'Sofia Montenegro',
        suite: 'Presidential Overwater Villa',
        amount: '142,500.00',
        paymentType: 'Down Payment (50%)',
        proofUrl: 'https://images.unsplash.com/photo-1554415707-6e8cfc93fe23?auto=format&fit=crop&w=120&q=80',
        timestamp: '24 Oct, 09:42 AM',
        amountColorClass: 'text-slate-850 dark:text-slate-100',
        isMissing: false
    },
    {
        id: 2,
        initials: 'JL',
        bgClass: 'bg-[#0B1E3F] text-white dark:bg-slate-700 dark:text-slate-100',
        name: 'Julian Lorenzo',
        suite: 'Garden Pool Suite',
        amount: '85,200.00',
        paymentType: 'Down Payment (50%)',
        proofUrl: 'https://images.unsplash.com/photo-1563013544-824ae1d704d3?auto=format&fit=crop&w=120&q=80',
        timestamp: '24 Oct, 08:15 AM',
        amountColorClass: 'text-rose-600 dark:text-rose-450',
        isMissing: true
    },
    {
        id: 3,
        initials: 'MK',
        bgClass: 'bg-amber-100 text-amber-750 dark:bg-amber-950/30 dark:text-amber-400',
        name: 'Marcus Knight',
        suite: 'Lagoon Access Suite',
        amount: '62,000.00',
        paymentType: 'Full Payment',
        proofUrl: 'https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?auto=format&fit=crop&w=120&q=80',
        timestamp: '24 Oct, 07:30 AM',
        amountColorClass: 'text-slate-850 dark:text-slate-100',
        isMissing: false
    }
])

const recentTransactions = ref([
    {
        id: 1,
        date: 'Oct 12, 2024',
        name: 'Isabella Rodriguez',
        roomType: 'Azure Ocean Villa',
        method: 'Credit Card',
        methodType: 'credit_card',
        amount: '45,000',
        status: 'Paid',
        statusType: 'paid'
    },
    {
        id: 2,
        date: 'Oct 11, 2024',
        name: 'Mateo Santos',
        roomType: 'Sunrise Suite',
        method: 'G-Cash',
        methodType: 'gcash',
        amount: '28,500',
        status: 'Paid',
        statusType: 'paid'
    },
    {
        id: 3,
        date: 'Oct 11, 2024',
        name: 'Sophia Chen',
        roomType: 'Garden Terrace',
        method: 'Cash',
        methodType: 'cash',
        amount: '18,200',
        status: 'Pending',
        statusType: 'pending'
    },
    {
        id: 4,
        date: 'Oct 10, 2024',
        name: 'Julian Dela Cruz',
        roomType: 'Azure Ocean Villa',
        method: 'Bank Transfer',
        methodType: 'bank_transfer',
        amount: '45,000',
        status: 'Paid',
        statusType: 'paid'
    },
    {
        id: 5,
        date: 'Oct 09, 2024',
        name: 'Elena Gilbert',
        roomType: 'Family Pavilion',
        method: 'Credit Card',
        methodType: 'credit_card',
        amount: '72,400',
        status: 'Failed',
        statusType: 'failed'
    }
])

const usersList = ref([])
const fetchUsersLoading = ref(false)
const fetchUsersError = ref('')
const userSearchQuery = ref('')

const showAddUserModal = ref(false)
const showEditUserModal = ref(false)
const modalError = ref('')
const modalSubmitting = ref(false)

watch(showAddUserModal, (val) => {
    if (!val) {
        showAddUserPassword.value = false
    }
})

watch(showEditUserModal, (val) => {
    if (!val) {
        showEditUserPassword.value = false
    }
})

const guestForm = reactive({
    reference: '',
    lastName: ''
})

const adminForm = reactive({
    email: '',
    password: '',
    remember: false
})

const addUserForm = reactive({
    name: '',
    email: '',
    password: '',
    role: 'staff'
})

const editUserForm = reactive({
    id: null,
    name: '',
    email: '',
    password: '',
    role: 'staff'
})

const isManager = () => {
    return currentUser.value && (currentUser.value.role === 'admin' || currentUser.value.role === 'manager')
}

const fetchUsers = async () => {
    fetchUsersLoading.value = true
    fetchUsersError.value = ''
    try {
        const response = await axiosInstance.get('/api/users')
        if (response.data.success) {
            usersList.value = response.data.users
        }
    } catch (e) {
        console.error('Failed to fetch users:', e)
        fetchUsersError.value = 'Failed to load user directory.'
    } finally {
        fetchUsersLoading.value = false
    }
}

// Watch currentView to prevent navigating to dashboard if not logged in
watch(currentView, (newView) => {
    if (newView === 'dashboard' && !currentUser.value) {
        currentView.value = 'selection'
    }
})

// Watch activeTab to ensure Staff members cannot load restricted tabs (User Management, Sales)
watch(activeTab, (newTab) => {
    selectedPendingReservation.value = null // Reset selected pending reservation when changing tabs
    selectedApprovedReservation.value = null // Reset selected approved reservation when changing tabs
    selectedRejectedReservation.value = null // Reset selected rejected reservation when changing tabs
    if ((newTab === 'user_management' || newTab === 'sales') && !isManager()) {
        activeTab.value = 'dashboard_overview'
    } else if (newTab === 'user_management') {
        fetchUsers() // Fetch users when tab becomes active
    }
})

// Also watch currentUser, if they log out or role changes, check tab
watch(currentUser, (newUser) => {
    if (!newUser) {
        activeTab.value = 'dashboard_overview'
        usersList.value = []
    } else if (activeTab.value === 'user_management' && !isManager()) {
        activeTab.value = 'dashboard_overview'
    } else if (activeTab.value === 'user_management') {
        fetchUsers()
    }
})

onMounted(async () => {
    try {
        const savedTheme = localStorage.getItem('aruga-theme') || 'light'
        setTheme(savedTheme)
        const response = await axiosInstance.get('/api/user')
        if (response.data.logged_in) {
            currentUser.value = response.data.user
            currentView.value = 'dashboard'
            activeTab.value = 'dashboard_overview'
        } else {
            currentUser.value = null
            if (currentView.value === 'dashboard') {
                currentView.value = 'selection'
            }
        }
    } catch (e) {
        console.error('Failed to restore session:', e)
        currentUser.value = null
        if (currentView.value === 'dashboard') {
            currentView.value = 'selection'
        }
    }
})

const setView = (view) => {
    if (view === 'dashboard' && !currentUser.value) {
        currentView.value = 'selection'
        return
    }
    currentView.value = view
    loginError.value = ''
    showPassword.value = false
}

const handleGuestLogin = () => {
    alert(`Guest Login attempted:\nBooking Ref: ${guestForm.reference}\nLast Name: ${guestForm.lastName}`)
}

const handleAdminLogin = async () => {
    isSubmitting.value = true
    loginError.value = ''
    try {
        const response = await axiosInstance.post('/api/login', {
            email: adminForm.email,
            password: adminForm.password,
            remember: adminForm.remember
        })
        if (response.data.success) {
            currentUser.value = response.data.user
            currentView.value = 'dashboard'
            activeTab.value = 'dashboard_overview'
            // clear form
            adminForm.email = ''
            adminForm.password = ''
        }
    } catch (error) {
        if (error.response && error.response.data && error.response.data.message) {
            loginError.value = error.response.data.message
        } else {
            loginError.value = 'Invalid email or password. Please try again.'
        }
    } finally {
        isSubmitting.value = false
    }
}

const handleLogout = async () => {
    try {
        await axiosInstance.post('/api/logout')
    } catch (e) {
        console.error('Logout error:', e)
    } finally {
        currentUser.value = null
        currentView.value = 'selection'
    }
}

const submitAddUser = async () => {
    modalSubmitting.value = true
    modalError.value = ''
    try {
        const response = await axiosInstance.post('/api/users', {
            name: addUserForm.name,
            email: addUserForm.email,
            password: addUserForm.password,
            role: addUserForm.role
        })
        if (response.data.success) {
            usersList.value.push(response.data.user)
            showAddUserModal.value = false
            // Reset form
            addUserForm.name = ''
            addUserForm.email = ''
            addUserForm.password = ''
            addUserForm.role = 'staff'
        }
    } catch (error) {
        if (error.response && error.response.data && error.response.data.message) {
            modalError.value = error.response.data.message
        } else if (error.response && error.response.data && error.response.data.errors) {
            const firstErr = Object.values(error.response.data.errors)[0]
            modalError.value = Array.isArray(firstErr) ? firstErr[0] : firstErr
        } else {
            modalError.value = 'Failed to create user account.'
        }
    } finally {
        modalSubmitting.value = false
    }
}

const openEditUser = (user) => {
    editUserForm.id = user.id
    editUserForm.name = user.name
    editUserForm.email = user.email
    editUserForm.role = user.role === 'admin' ? 'manager' : user.role
    editUserForm.password = '' // Blank means keep existing password
    modalError.value = ''
    showEditUserModal.value = true
}

const submitEditUser = async () => {
    modalSubmitting.value = true
    modalError.value = ''
    try {
        const response = await axiosInstance.put(`/api/users/${editUserForm.id}`, {
            name: editUserForm.name,
            email: editUserForm.email,
            role: editUserForm.role,
            password: editUserForm.password || null
        })
        if (response.data.success) {
            // Update in local array
            const idx = usersList.value.findIndex(u => u.id === editUserForm.id)
            if (idx !== -1) {
                usersList.value[idx] = response.data.user
            }
            showEditUserModal.value = false
        }
    } catch (error) {
        if (error.response && error.response.data && error.response.data.message) {
            modalError.value = error.response.data.message
        } else if (error.response && error.response.data && error.response.data.errors) {
            const firstErr = Object.values(error.response.data.errors)[0]
            modalError.value = Array.isArray(firstErr) ? firstErr[0] : firstErr
        } else {
            modalError.value = 'Failed to update user account.'
        }
    } finally {
        modalSubmitting.value = false
    }
}

const setTheme = (newTheme) => {
    theme.value = newTheme
    localStorage.setItem('aruga-theme', newTheme)
    if (newTheme === 'dark') {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }
}

const updatePassword = async () => {
    settingsSuccessMsg.value = ''
    settingsErrorMsg.value = ''
    
    if (passwordForm.newPassword !== passwordForm.confirmPassword) {
        settingsErrorMsg.value = 'New passwords do not match.'
        return
    }
    
    settingsSubmitting.value = true
    try {
        const response = await axiosInstance.post('/api/user/change-password', {
            current_password: passwordForm.currentPassword,
            new_password: passwordForm.newPassword
        })
        if (response.data.success) {
            settingsSuccessMsg.value = response.data.message
            // Reset form
            passwordForm.currentPassword = ''
            passwordForm.newPassword = ''
            passwordForm.confirmPassword = ''
        }
    } catch (error) {
        if (error.response && error.response.data && error.response.data.message) {
            settingsErrorMsg.value = error.response.data.message
        } else if (error.response && error.response.data && error.response.data.errors) {
            const firstErr = Object.values(error.response.data.errors)[0]
            settingsErrorMsg.value = Array.isArray(firstErr) ? firstErr[0] : firstErr
        } else {
            settingsErrorMsg.value = 'Failed to update password.'
        }
    } finally {
        settingsSubmitting.value = false
    }
}
</script>

<style>
/* Custom animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
</style>
