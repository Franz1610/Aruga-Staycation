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
        <div v-else-if="currentView === 'dashboard' && currentUser" class="min-h-screen w-full flex bg-[#F8FAFC] animate-fade-in text-slate-800">
            <!-- Sidebar -->
            <aside class="hidden md:flex flex-col w-64 bg-white border-r border-slate-100 p-6 shrink-0 justify-between">
                <div>
                    <!-- Logo / Portal Brand -->
                    <div class="flex items-center gap-3 pb-6 border-b border-slate-50 mb-6">
                        <div class="h-9 w-9 rounded-full overflow-hidden flex items-center justify-center border border-[#1B321F]/20 bg-[#1B321F]">
                            <img v-if="!logoError" :src="'/images/Aruga_logo.jpg'" @error="logoError = true" alt="Aruga Logo" class="h-full w-full object-cover"/>
                            <span v-else class="text-amber-400 text-xs font-serif font-bold">A</span>
                        </div>
                        <div>
                            <p class="font-serif text-slate-900 font-bold text-sm leading-none">Aruga Admin</p>
                            <span class="text-[9px] text-[#A27B5C] font-semibold uppercase tracking-wider">Staff Portal</span>
                        </div>
                    </div>

                    <!-- + New Booking Button -->
                    <button class="w-full mb-6 py-3 px-4 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] active:scale-[0.99] text-white text-xs font-semibold flex items-center justify-center gap-2 transition cursor-pointer shadow-sm">
                        <svg class="h-4.5 w-4.5 text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>New Booking</span>
                    </button>

                    <!-- Navigation Links -->
                    <nav class="space-y-1.5">
                        <a 
                            href="#" 
                            @click.prevent="activeTab = 'dashboard_overview'"
                            :class="['flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-xs leading-none transition', 
                                     activeTab === 'dashboard_overview' ? 'bg-amber-500/10 text-[#0B1E3F]' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50']"
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
                                     !isManager() ? 'text-slate-300 cursor-not-allowed opacity-60 bg-slate-50/20' : 
                                     (activeTab === 'user_management' ? 'bg-amber-500/10 text-[#0B1E3F]' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50')]"
                        >
                            <div class="flex items-center gap-3">
                                <!-- User Mgmt Icon SVG -->
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span>User Management</span>
                            </div>
                            <!-- Lock badge for Staff -->
                            <svg v-if="!isManager()" class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </a>

                        <a 
                            href="#" 
                            @click.prevent="activeTab = 'pending'"
                            :class="['flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-xs leading-none transition', 
                                     activeTab === 'pending' ? 'bg-amber-500/10 text-[#0B1E3F]' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50']"
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
                                     activeTab === 'approved' ? 'bg-amber-500/10 text-[#0B1E3F]' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50']"
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
                                     activeTab === 'rejected' ? 'bg-amber-500/10 text-[#0B1E3F]' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50']"
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
                                     activeTab === 'payments' ? 'bg-amber-500/10 text-[#0B1E3F]' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50']"
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
                                     !isManager() ? 'text-slate-300 cursor-not-allowed opacity-60 bg-slate-50/20' : 
                                     (activeTab === 'sales' ? 'bg-amber-500/10 text-[#0B1E3F]' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50')]"
                        >
                            <div class="flex items-center gap-3">
                                <!-- Sales Icon SVG -->
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <span>Sales</span>
                            </div>
                            <!-- Lock badge for Staff -->
                            <svg v-if="!isManager()" class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </a>
                    </nav>
                </div>

                <!-- Bottom Links / Support & Logout -->
                <div class="space-y-4">
                    <div class="space-y-1">
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-slate-700 font-medium text-xs transition">
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
                                    class="w-full pl-10 pr-4 py-2 bg-white border border-slate-200 focus:outline-none focus:border-slate-300 focus:ring-1 focus:ring-slate-300 rounded-xl text-xs transition shadow-sm"
                                />
                            </div>
                        </div>

                        <!-- Info Cards Grid (3 Columns) -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <!-- Total Users Card -->
                            <div class="bg-white border border-slate-50 rounded-3xl p-6 shadow-sm flex items-center justify-between">
                                <div class="space-y-3">
                                    <p class="text-slate-400 text-xs font-semibold uppercase tracking-wider">Total Users</p>
                                    <p class="text-3xl font-bold text-slate-900">{{ usersList.length }}</p>
                                </div>
                                <div class="flex flex-col items-end gap-1">
                                    <div class="h-10 w-10 bg-slate-50 rounded-2xl flex items-center justify-center text-[#0B1E3F]">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-[10px] text-green-600 bg-green-50 px-2 py-0.5 rounded-full font-bold">+12%</span>
                                </div>
                            </div>

                            <!-- Active Sessions Card -->
                            <div class="bg-white border border-slate-50 rounded-3xl p-6 shadow-sm flex items-center justify-between">
                                <div class="space-y-3">
                                    <p class="text-slate-400 text-xs font-semibold uppercase tracking-wider">Active Sessions</p>
                                    <p class="text-3xl font-bold text-slate-900">14</p>
                                </div>
                                <div class="flex flex-col items-end gap-1">
                                    <div class="h-10 w-10 bg-slate-50 rounded-2xl flex items-center justify-center text-[#0B1E3F]">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <span class="text-[10px] text-[#2D5A27] bg-emerald-50 px-2 py-0.5 rounded-full font-bold">Active</span>
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
                        <div class="bg-white border border-slate-50 rounded-3xl p-6 shadow-sm space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="font-serif text-[#0b1c3d] text-lg font-bold">User Directory</h3>
                                <div class="flex items-center gap-2">
                                    <button class="p-2 border border-slate-100 rounded-xl text-slate-500 hover:text-slate-800 transition">
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
                                        <tr class="border-b border-slate-100 text-slate-400 font-semibold uppercase tracking-wider">
                                            <th class="py-4 font-semibold">Name</th>
                                            <th class="py-4 font-semibold">Email Address</th>
                                            <th class="py-4 font-semibold">Role</th>
                                            <th class="py-4 font-semibold">Status</th>
                                            <th class="py-4 text-right pr-4 font-semibold">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50">
                                        <tr 
                                            v-for="user in usersList.filter(u => !userSearchQuery || u.name.toLowerCase().includes(userSearchQuery.toLowerCase()) || u.email.toLowerCase().includes(userSearchQuery.toLowerCase()))" 
                                            :key="user.id" 
                                            class="group hover:bg-slate-50/50 transition"
                                        >
                                            <!-- User Name & Avatar -->
                                            <td class="py-4 flex items-center gap-3">
                                                <div class="h-9 w-9 rounded-full bg-slate-100 text-slate-700 font-semibold flex items-center justify-center text-xs tracking-wider border border-slate-200 uppercase animate-fade-in">
                                                    {{ user.name.slice(0, 2).toUpperCase() }}
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-slate-800 group-hover:text-[#0b1c3d] transition">{{ user.name }}</p>
                                                    <span class="text-slate-400 text-[10px] mt-0.5 block">
                                                        {{ user.role === 'admin' || user.role === 'manager' ? 'Operations' : 'Front Desk' }}
                                                    </span>
                                                </div>
                                            </td>
                                            
                                            <!-- Email -->
                                            <td class="py-4 text-slate-500 font-medium select-all">
                                                {{ user.email }}
                                            </td>
                                            
                                            <!-- Role Badge -->
                                            <td class="py-4">
                                                <span 
                                                    :class="['px-2.5 py-1 text-[10px] font-bold rounded-full uppercase', 
                                                             user.role === 'admin' || user.role === 'manager' ? 'text-white bg-[#0B1E3F]' : 'text-slate-700 bg-slate-100']"
                                                >
                                                    {{ user.role === 'admin' || user.role === 'manager' ? 'Manager' : 'Staff' }}
                                                </span>
                                            </td>
                                            
                                            <!-- Status (Dynamic indicator: logged in user is Online, others Offline) -->
                                            <td class="py-4 flex items-center gap-2 mt-4.5">
                                                <span 
                                                    :class="['h-2 w-2 rounded-full', 
                                                             currentUser && currentUser.id === user.id ? 'bg-emerald-500' : 'bg-slate-400']"
                                                ></span>
                                                <span class="text-slate-500 font-medium">
                                                    {{ currentUser && currentUser.id === user.id ? 'Online' : 'Offline' }}
                                                </span>
                                            </td>
                                            
                                            <!-- Actions -->
                                            <td class="py-4 text-right pr-4">
                                                <button @click="openEditUser(user)" class="p-1.5 border border-slate-100 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-50 transition cursor-pointer">
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
                            <div class="flex justify-between items-center border-t border-slate-50 pt-4 text-[10px] text-slate-400 font-medium">
                                <span>Showing {{ usersList.length }} of {{ usersList.length }} users</span>
                                <div class="flex items-center gap-1.5">
                                    <button class="p-1 px-2 border border-slate-100 rounded-md hover:bg-slate-50 disabled:opacity-50" disabled>&lt;</button>
                                    <span class="px-2 font-bold text-slate-700 bg-slate-50 rounded p-1">1</span>
                                    <button class="p-1 px-2 border border-slate-100 rounded-md hover:bg-slate-50 disabled:opacity-50" disabled>&gt;</button>
                                </div>
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
                    <input 
                        type="password" 
                        v-model="addUserForm.password" 
                        placeholder="Minimum 6 characters"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition"
                        required
                        minlength="6"
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Organization Role</label>
                    <select 
                        v-model="addUserForm.role"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition appearance-none"
                    >
                        <option value="staff">Staff Member</option>
                        <option value="manager">Property Manager</option>
                        <option value="admin">Administrator (Manager)</option>
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
                    <input 
                        type="password" 
                        v-model="editUserForm.password" 
                        placeholder="Leave blank to keep current password"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition"
                        minlength="6"
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Organization Role</label>
                    <select 
                        v-model="editUserForm.role"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-sm transition appearance-none"
                    >
                        <option value="staff">Staff Member</option>
                        <option value="manager">Property Manager</option>
                        <option value="admin">Administrator (Manager)</option>
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
import { ref, reactive, onMounted, watch } from 'vue'
import axiosInstance from 'axios'

const currentView = ref('selection')
const logoError = ref(false)
const showPassword = ref(false)
const loginError = ref('')
const isSubmitting = ref(false)
const currentUser = ref(null)

const activeTab = ref('dashboard_overview')
const usersList = ref([])
const fetchUsersLoading = ref(false)
const fetchUsersError = ref('')
const userSearchQuery = ref('')

const showAddUserModal = ref(false)
const showEditUserModal = ref(false)
const modalError = ref('')
const modalSubmitting = ref(false)

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
    editUserForm.role = user.role
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
