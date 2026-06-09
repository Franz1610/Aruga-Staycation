<template>
    <main class="min-h-screen w-full bg-[#0B1320] font-sans antialiased text-slate-800 overflow-x-hidden">
        
        <!-- ========================================================================= -->
        <!-- VIEW: SELECTION & GUEST PORTALS (Split 50/50 Layout) -->
        <!-- ========================================================================= -->
        <div v-if="currentView === 'selection'" class="min-h-screen w-full flex flex-col lg:flex-row animate-fade-in">
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
                        ARUGA Staycation
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
                    <!-- Spacer -->
                </div>

                <!-- Central Content Area -->
                <div class="my-auto max-w-md w-full mx-auto py-8">
                    <!-- VIEW: ROLE SELECTION -->
                    <div class="space-y-8 animate-fade-in">
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
                </div>

                <!-- Bottom Copyright / Version Info -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-2 pt-6 border-t border-slate-100">
                    <span class="text-slate-400 text-xs">v1.0.0</span>
                    <span class="text-slate-400 text-xs">© 2026 ARUGA Staycation. All rights reserved.</span>
                </div>
            </section>
        </div>

        <!-- ========================================================================= -->
        <!-- VIEW: GUEST LANDING PAGE (1 to 1 to the Image) -->
        <!-- ========================================================================= -->
        <div v-else-if="currentView === 'guest'" class="min-h-screen w-full bg-[#FAF9F6] font-sans antialiased text-[#0B1E3F] animate-fade-in flex flex-col">
            
            <!-- Navbar Header -->
            <header class="sticky top-0 z-40 w-full bg-white/80 backdrop-blur-md border-b border-slate-100/60 px-6 md:px-12 lg:px-20 py-4 flex items-center justify-between transition-all duration-300">
                <!-- Left: Logo & Brand -->
                <div class="flex items-center gap-3">
                    <div class="h-9 w-9 rounded-lg overflow-hidden bg-[#1B321F] flex items-center justify-center border border-amber-500/20 shadow-sm">
                        <img 
                            v-if="!logoError" 
                            :src="'/images/Aruga_logo.jpg'" 
                            @error="logoError = true" 
                            alt="Aruga Logo" 
                            class="h-full w-full object-cover"
                        />
                        <span v-else class="text-amber-400 text-xs font-serif font-bold">A</span>
                    </div>
                    <div>
                        <p class="font-serif text-[#0B1E3F] font-bold text-sm tracking-wide leading-none">ARUGA Staycation</p>
                        <span class="text-[9px] text-[#A27B5C] font-semibold uppercase tracking-wider">Private Sanctuary</span>
                    </div>
                </div>

                <!-- Center: Nav Links -->
                <nav class="hidden md:flex items-center gap-8">
                    <button @click="scrollToSection('living-spaces')" class="text-xs font-bold text-[#0B1E3F] border-b border-[#0B1E3F] pb-1.5 tracking-wider uppercase cursor-pointer">Explore Rooms</button>
                    <button @click="setView('my_bookings')" class="text-xs font-semibold text-slate-500 hover:text-[#0B1E3F] pb-1.5 tracking-wider transition uppercase cursor-pointer">My Bookings</button>
                    <button @click="scrollToSection('living-spaces')" class="text-xs font-semibold text-slate-500 hover:text-[#0B1E3F] pb-1.5 tracking-wider transition uppercase cursor-pointer">Contact</button>
                </nav>

                <!-- Right: Login Button -->
                <div>
                    <button 
                        @click="setView('selection')" 
                        class="bg-[#0B1E3F] hover:bg-[#152e59] text-white px-6 py-2.5 rounded-full text-xs font-bold transition shadow-md hover:shadow-lg active:scale-98 cursor-pointer"
                    >
                        Login
                    </button>
                </div>
            </header>

            <!-- Hero Section -->
            <section class="relative w-full h-[70vh] min-h-[480px] flex items-center justify-center text-center px-6 overflow-hidden">
                <!-- Background Image -->
                <div 
                    class="absolute inset-0 bg-cover bg-center bg-no-repeat scale-102 transition-transform duration-10000" 
                    style="background-image: url('/images/staycation_hero.png');"
                ></div>
                <!-- Bottom fading gradient and dark tint overlay -->
                <div class="absolute inset-0 bg-gradient-to-b from-[#FAF9F6]/10 via-black/20 to-[#FAF9F6]"></div>

                <!-- Hero Content -->
                <div class="relative z-10 max-w-3xl space-y-6 mt-6">
                    <span class="text-[#0B1E3F] text-[10px] font-bold tracking-[0.25em] uppercase bg-white/70 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm">
                        Exceptional Sanctuary Experience
                    </span>
                    <h1 class="font-serif text-5xl md:text-6xl lg:text-7xl text-[#0B1E3F] font-bold leading-[1.1] tracking-tight">
                        Find Your Perfect <br />
                        <span class="italic font-serif font-light text-[#A27B5C]">Island Getaway</span>
                    </h1>
                    <p class="text-slate-800 text-xs md:text-sm max-w-xl mx-auto font-light leading-relaxed">
                        Experience the pinnacle of Tropical Modernism on the shores of Aruga. Where luxury meets the raw, serene beauty of the Davao Gulf. Your private villa awaits.
                    </p>
                    <div class="pt-4 flex justify-center">
                        <button @click="scrollToSection('living-spaces')" class="bg-[#0B1E3F] hover:bg-[#152e59] text-white px-8 py-3.5 rounded-full text-xs font-bold tracking-wider uppercase flex items-center gap-2 shadow-lg shadow-blue-950/20 active:scale-[0.99] transition-all cursor-pointer">
                            <span>Book Your Stay</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </section>

            <!-- Exceptional Living Spaces Section -->
            <section id="living-spaces" class="max-w-7xl w-full mx-auto px-6 md:px-12 lg:px-20 py-16 space-y-12">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-slate-200/60 pb-8">
                    <div class="space-y-3 max-w-2xl">
                        <h2 class="font-serif text-3xl md:text-4xl text-[#0B1E3F] font-bold tracking-tight">
                            Exceptional Living Spaces
                        </h2>
                        <p class="text-slate-500 text-xs md:text-sm font-light leading-relaxed">
                            Each residence is meticulously designed to dissolve the boundaries between indoor comfort and the breathtaking natural surroundings of the island.
                        </p>
                    </div>
                </div>

                <!-- Accommodations Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Dynamic Database Room Cards -->
                    <div 
                        v-for="room in roomChoices" 
                        :key="room.id"
                        class="bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between group"
                    >
                        <div class="relative h-64 overflow-hidden shrink-0">
                            <!-- Bestseller / Category Badge -->
                            <div 
                                v-if="room.type === 'Couple Room'"
                                class="absolute top-4 right-4 z-10 bg-white/95 backdrop-blur-sm text-[#A27B5C] border border-amber-500/10 px-3.5 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-wider shadow-sm"
                            >
                                Bestseller
                            </div>
                            <div 
                                v-else-if="room.type === 'Family Room'"
                                class="absolute top-4 right-4 z-10 bg-white/95 backdrop-blur-sm text-emerald-700 border border-emerald-500/10 px-3.5 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-wider shadow-sm"
                            >
                                Popular
                            </div>
                            <div 
                                v-else
                                class="absolute top-4 right-4 z-10 bg-[#0B1E3F]/90 backdrop-blur-sm text-white px-3.5 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-wider shadow-sm"
                            >
                                Event Space
                            </div>
                            
                            <img 
                                :src="room.image_url" 
                                :alt="room.type" 
                                class="w-full h-full object-cover group-hover:scale-103 transition duration-700"
                            />
                        </div>
                        
                        <div class="p-6 md:p-8 flex-grow flex flex-col justify-between">
                            <div class="space-y-4">
                                <div class="flex items-start justify-between gap-4">
                                    <h3 class="font-serif text-[#0B1E3F] text-lg md:text-xl font-bold leading-snug">
                                        {{ room.type }}
                                    </h3>
                                    <div class="text-right shrink-0">
                                        <span class="text-[9px] text-slate-400 font-bold uppercase tracking-wider block">From</span>
                                        <span class="font-bold text-[#0B1E3F] text-base">PHP {{ formatPrice(room.price) }}</span>
                                        <span class="text-[9px] text-slate-400 font-bold block mt-0.5">/night</span>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-500 font-light leading-relaxed">
                                    {{ room.description }}
                                </p>
                                
                                <!-- Dynamic Amenities Badges -->
                                <div class="flex flex-wrap gap-2 pt-2">
                                    <span 
                                        v-for="(amenity, index) in room.amenities" 
                                        :key="index"
                                        class="bg-[#FAF6F0] border border-[#F6EBE0]/60 px-2.5 py-1.5 rounded-lg text-[9px] font-bold text-[#A27B5C] flex items-center gap-1.5 shadow-sm uppercase tracking-wider"
                                    >
                                        <!-- Checkmark SVG -->
                                        <svg class="h-3 w-3 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                        {{ amenity }}
                                    </span>
                                </div>
                            </div>
                            
                            <button 
                                @click="startBooking(room.type, room.image_url, room.price)" 
                                class="w-full mt-6 py-3.5 px-6 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] active:scale-[0.99] text-white font-bold text-xs tracking-wider uppercase transition-all duration-200 cursor-pointer shadow-md shadow-blue-950/10"
                            >
                                Book Now
                            </button>
                        </div>
                    </div>
                    
                </div>
            </section>

            <!-- Footer -->
            <footer class="mt-auto bg-[#FAF9F6] border-t border-slate-200/50 px-6 md:px-12 lg:px-20 py-16 w-full">
                <div class="max-w-7xl w-full mx-auto flex flex-col lg:flex-row justify-between gap-12">
                    <!-- Footer Brand Info -->
                    <div class="space-y-4 max-w-sm">
                        <h4 class="font-serif text-[#0B1E3F] text-lg font-bold">ARUGA Staycation</h4>
                        <p class="text-xs text-slate-500 font-light leading-relaxed">
                            Experience the pinnacle of Tropical Modernism on the shores of Aruga. Where luxury meets the raw beauty of nature.
                        </p>
                        <!-- Socials -->
                        <div class="flex items-center gap-4 pt-2 text-slate-400">
                            <!-- Instagram SVG icon -->
                            <a href="#" class="hover:text-[#0B1E3F] transition cursor-pointer">
                                <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <!-- Location SVG icon -->
                            <a href="#" class="hover:text-[#0B1E3F] transition cursor-pointer">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Footer Link Columns -->
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-8 lg:gap-16">
                        <!-- Col 1 -->
                        <div class="space-y-4">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block font-semibold">Explore</span>
                            <div class="space-y-2">
                                <a href="#" class="text-xs text-slate-550 hover:text-[#0B1E3F] transition block font-medium">Villas</a>
                                <a href="#" class="text-xs text-slate-555 hover:text-[#0B1E3F] transition block font-medium">Amenities</a>
                                <a href="#" class="text-xs text-slate-555 hover:text-[#0B1E3F] transition block font-medium">Dining</a>
                                <a href="#" class="text-xs text-slate-555 hover:text-[#0B1E3F] transition block font-medium">Spa</a>
                            </div>
                        </div>
                        <!-- Col 2 -->
                        <div class="space-y-4">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block font-semibold">Connect</span>
                            <div class="space-y-2">
                                <a href="#" class="text-xs text-slate-555 hover:text-[#0B1E3F] transition block font-medium">Instagram</a>
                                <a href="#" class="text-xs text-slate-555 hover:text-[#0B1E3F] transition block font-medium">Newsletter</a>
                                <a href="#" class="text-xs text-slate-555 hover:text-[#0B1E3F] transition block font-medium">Map Location</a>
                                <a href="#" class="text-xs text-slate-555 hover:text-[#0B1E3F] transition block font-medium">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom bar -->
                <div class="max-w-7xl w-full mx-auto border-t border-slate-200/40 mt-12 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-slate-400 text-xs">
                    <span>v1.0.0</span>
                    <span>© 2026 ARUGA Staycation. All rights reserved.</span>
                </div>
            </footer>

        </div>

        <!-- ========================================================================= -->
        <!-- VIEW: MULTI-STEP BOOKING FORM (Samal Escape layout matching image 1-to-1) -->
        <!-- ========================================================================= -->
        <div v-else-if="currentView === 'booking' && selectedRoomToBook" class="min-h-screen w-full bg-[#FAF9F6] font-sans antialiased text-[#0B1E3F] animate-fade-in flex flex-col justify-between">
            
            <!-- Navbar Header -->
            <header class="sticky top-0 z-40 w-full bg-white/85 backdrop-blur-md border-b border-slate-100 px-6 md:px-12 lg:px-20 py-4 flex items-center justify-between transition-all duration-300">
                <!-- Left: Logo & Brand -->
                <div class="flex items-center gap-3">
                    <div class="h-9 w-9 rounded-lg overflow-hidden bg-[#1B321F] flex items-center justify-center border border-amber-500/20 shadow-sm">
                        <img 
                            v-if="!logoError" 
                            :src="'/images/Aruga_logo.jpg'" 
                            @error="logoError = true" 
                            alt="Aruga Logo" 
                            class="h-full w-full object-cover"
                        />
                        <span v-else class="text-amber-400 text-xs font-serif font-bold">A</span>
                    </div>
                    <div>
                        <p class="font-serif text-[#0B1E3F] font-bold text-sm tracking-wide leading-none">ARUGA Staycation</p>
                        <span class="text-[9px] text-[#A27B5C] font-semibold uppercase tracking-wider">Private Sanctuary</span>
                    </div>
                </div>

                <!-- Center: Nav Links -->
                <nav class="hidden md:flex items-center gap-8">
                    <button @click="setView('guest'); scrollToSection('living-spaces')" class="text-xs font-semibold text-slate-500 hover:text-[#0B1E3F] pb-1.5 tracking-wider transition uppercase cursor-pointer">Explore Rooms</button>
                    <button @click="setView('my_bookings')" class="text-xs font-semibold text-slate-500 hover:text-[#0B1E3F] pb-1.5 tracking-wider transition uppercase cursor-pointer">My Bookings</button>
                    <button @click="setView('guest'); scrollToSection('living-spaces')" class="text-xs font-semibold text-slate-500 hover:text-[#0B1E3F] pb-1.5 tracking-wider transition uppercase cursor-pointer">Contact</button>
                </nav>

                <!-- Right: Login & Close Button -->
                <div class="flex items-center gap-4">
                    <button 
                        @click="setView('selection')" 
                        class="bg-[#0B1E3F] hover:bg-[#152e59] text-white px-6 py-2.5 rounded-full text-xs font-bold transition shadow-md hover:shadow-lg active:scale-98 cursor-pointer"
                    >
                        Login
                    </button>
                    <!-- Close button -->
                    <button 
                        @click="setView('guest')" 
                        class="p-2 rounded-full hover:bg-slate-200/50 text-slate-400 hover:text-[#0B1E3F] transition cursor-pointer"
                        title="Cancel booking"
                    >
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Main Content Container -->
            <div class="w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-20 py-12 flex-grow flex flex-col justify-center">
                
                <!-- STEP 1: GUEST DETAILS & INFO -->
                <div v-if="currentBookingStep === 1" class="space-y-8 animate-fade-in">
                    <!-- Progress Header -->
                    <div class="flex items-center gap-4 max-w-3xl">
                        <div class="h-8 w-8 rounded-full bg-[#0B1E3F] text-white flex items-center justify-center font-bold text-sm">1</div>
                        <h2 class="font-serif text-2xl md:text-3xl text-[#0B1E3F] font-bold tracking-tight">Guest Information</h2>
                    </div>

                    <!-- Layout Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                        
                        <!-- Left: Form -->
                        <div class="lg:col-span-8 bg-white border border-slate-100 rounded-[32px] p-6 md:p-8 lg:p-10 shadow-xl shadow-slate-950/5 space-y-6">
                            <div class="space-y-1">
                                <h3 class="font-serif text-xl font-bold text-[#0B1E3F]">Tell Us About Yourself</h3>
                                <p class="text-slate-400 text-xs font-light">Please provide your details to ensure a personalized resort experience.</p>
                            </div>

                            <form @submit.prevent="currentBookingStep = 2" class="space-y-5">
                                <div>
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Full Name</label>
                                    <input 
                                        type="text" 
                                        v-model="bookingForm.name"
                                        placeholder="e.g. Julian Rivera"
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-xs font-semibold transition"
                                        required
                                    />
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Contact Number</label>
                                        <input 
                                            type="tel" 
                                            v-model="bookingForm.phone"
                                            @input="bookingForm.phone = bookingForm.phone.replace(/[^0-9+\s()-]/g, '')"
                                            placeholder="+63 912 345 6789"
                                            class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-xs font-semibold transition"
                                            required
                                        />
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Email Address</label>
                                        <input 
                                            type="email" 
                                            v-model="bookingForm.email"
                                            placeholder="julian.rivera@example.com"
                                            class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-xs font-semibold transition"
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Number of Guests</label>
                                        <input 
                                            type="number" 
                                            v-model="bookingForm.guests"
                                            placeholder="e.g. 2"
                                            min="1"
                                            class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-xs font-semibold transition"
                                            required
                                        />
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Special Requests(Optional)</label>
                                        <textarea 
                                            v-model="bookingForm.specialRequests"
                                            placeholder="Dietary requirements, accessibility needs, room placement, etc."
                                            rows="2"
                                            class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-xs font-semibold transition resize-none"
                                        ></textarea>
                                    </div>
                                </div>

                                <button 
                                    type="submit"
                                    class="w-full md:w-auto bg-[#0B1E3F] hover:bg-[#152e59] text-white px-8 py-4 rounded-2xl text-xs font-bold tracking-wider uppercase flex items-center justify-center gap-2 shadow-lg shadow-blue-950/20 active:scale-[0.99] transition-all cursor-pointer"
                                >
                                    <span>Proceed to Date & Time</span>
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Right Sidebar preview -->
                        <div class="lg:col-span-4 space-y-6">
                            <div class="bg-white border border-slate-100 rounded-[32px] overflow-hidden shadow-xl shadow-slate-950/5 flex flex-col">
                                <div class="relative h-64 overflow-hidden shrink-0">
                                    <img 
                                        :src="selectedRoomToBook.image" 
                                        :alt="selectedRoomToBook.name" 
                                        class="w-full h-full object-cover"
                                    />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <div class="absolute bottom-6 left-6 right-6 text-white space-y-1">
                                        <span class="text-[9px] font-bold text-amber-400 uppercase tracking-wider">Premium Selection</span>
                                        <h3 class="font-serif text-xl font-bold">{{ selectedRoomToBook.name }}</h3>
                                    </div>
                                </div>
                                <div class="p-6 space-y-4">
                                    <p class="text-xs text-slate-500 font-light leading-relaxed">
                                        Your villa selection is locked. Enter your contact details to check exact pricing and choose your arrival schedules.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- STEP 2: STAY SCHEDULE & DATES -->
                <div v-else-if="currentBookingStep === 2" class="space-y-10 animate-fade-in">
                    
                    <!-- Layout Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                        
                        <!-- Left Column (Stay Schedule) -->
                        <div class="lg:col-span-8 space-y-10">
                            
                            <!-- 1. Stay Schedule -->
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-full bg-[#0B1E3F] text-white flex items-center justify-center font-bold text-sm">2</div>
                                    <h3 class="font-serif text-xl font-bold text-[#0B1E3F]">Stay Schedule</h3>
                                </div>

                                <div class="bg-white border border-slate-100 rounded-3xl p-6 md:p-8 shadow-sm flex flex-col md:flex-row gap-8">
                                    <!-- Calendar side -->
                                    <div class="flex-1">
                                        <!-- Month Header -->
                                        <div class="flex items-center justify-between mb-4 px-1">
                                            <span class="font-serif text-[#0B1E3F] font-bold text-sm">{{ currentMonthName }} {{ currentCalendarYear }}</span>
                                            <div class="flex items-center gap-2">
                                                <button @click="prevMonth" type="button" class="p-1 text-slate-400 hover:text-[#0B1E3F] transition cursor-pointer">
                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                                    </svg>
                                                </button>
                                                <button @click="nextMonth" type="button" class="p-1 text-slate-400 hover:text-[#0B1E3F] transition cursor-pointer">
                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Days Header -->
                                        <div class="grid grid-cols-7 gap-1 text-center text-[10px] text-slate-400 font-bold uppercase tracking-wider mb-2">
                                            <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
                                        </div>

                                        <!-- Calendar Grid -->
                                        <div class="grid grid-cols-7 gap-1 text-center">
                                            <button 
                                                v-for="(day, idx) in calendarDays" 
                                                :key="idx"
                                                type="button"
                                                @click="handleCalendarDayClick(day)"
                                                :disabled="isPastDay(day)"
                                                :class="[
                                                    'h-9 w-9 text-xs flex items-center justify-center transition-all relative',
                                                    isPastDay(day) ? 'opacity-20 cursor-not-allowed pointer-events-none' : 'cursor-pointer',
                                                    day.isCurrentMonth && !isPastDay(day) ? 'text-[#0B1E3F] font-bold' : 'text-slate-300 font-light',
                                                    isCheckInDay(day) ? 'bg-[#0B1E3F] text-white rounded-full font-bold shadow-md' : '',
                                                    isCheckOutDay(day) ? 'bg-[#0B1E3F] text-white rounded-full font-bold shadow-md' : '',
                                                    isDayInRange(day) ? 'bg-slate-100/80 text-[#0B1E3F] font-bold' : ''
                                                ]"
                                            >
                                                {{ day.day }}
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Arrival Time (Fixed info card) -->
                                    <div class="flex-1 flex flex-col justify-between">
                                        <div class="space-y-4">
                                            <h4 class="text-[#0B1E3F] font-bold text-sm mb-2">Fixed Check-in & Check-out Schedules</h4>
                                            <p class="text-xs text-slate-500 font-light leading-relaxed">
                                                Our staycation has fixed schedules for check-in and check-out to ensure proper room sanitation and preparation.
                                            </p>
                                            
                                            <!-- Fixed schedule details -->
                                            <div class="space-y-3 pt-2">
                                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                                    <svg class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-2-2m2 2l2-2m-2 2v-3m0 5a9 9 0 110-18 9 9 0 010 18z" />
                                                    </svg>
                                                    <div>
                                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Fixed Check-in</p>
                                                        <p class="text-xs font-bold text-[#0B1E3F]">12:00 PM</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                                    <svg class="h-5 w-5 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <div>
                                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Fixed Check-out</p>
                                                        <p class="text-xs font-bold text-[#0B1E3F]">11:00 AM</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Notice Block -->
                                        <div class="mt-4 p-4 rounded-2xl bg-[#FAF6F0] border border-[#FAF6F0]/60 flex items-start gap-3 text-[#A27B5C]">
                                            <svg class="h-4.5 w-4.5 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="text-[10px] font-semibold tracking-wider leading-relaxed">
                                                Early check-in or late check-out is subject to room availability upon request.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Back Navigation link -->
                            <div class="flex items-center gap-2 pt-2">
                                <button 
                                    type="button" 
                                    @click="currentBookingStep = 1"
                                    class="text-xs font-bold text-slate-400 hover:text-[#0B1E3F] transition uppercase tracking-wider flex items-center gap-1.5 cursor-pointer"
                                >
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    <span>Back to Guest Info</span>
                                </button>
                            </div>

                        </div>

                        <!-- Right Column (Checkout Summary Card) -->
                        <div class="lg:col-span-4 sticky top-24">
                            <div class="bg-white border border-slate-100 rounded-[32px] overflow-hidden shadow-xl shadow-slate-950/5 flex flex-col">
                                <!-- Room header image -->
                                <div class="relative h-48 overflow-hidden shrink-0">
                                    <img 
                                        :src="selectedRoomToBook.image" 
                                        :alt="selectedRoomToBook.name" 
                                        class="w-full h-full object-cover"
                                    />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                                    <div class="absolute bottom-4 left-6 right-6 text-white">
                                        <span class="bg-white/20 backdrop-blur-sm text-[8px] font-bold uppercase tracking-wider px-2 py-0.5 rounded">Selected Accomodation</span>
                                        <h4 class="font-serif text-lg font-bold mt-1">{{ selectedRoomToBook.name }}</h4>
                                    </div>
                                </div>

                                <!-- Stay summary stats (Dates & Guests) -->
                                <div class="p-6 border-b border-slate-100 flex items-center justify-between text-xs">
                                    <div>
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Check-in</p>
                                        <p class="font-bold text-[#0B1E3F] mt-0.5">{{ formattedCheckIn || 'Select Date' }}</p>
                                    </div>
                                    
                                    <!-- Arrow divider -->
                                    <svg class="h-4 w-4 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>

                                    <div>
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Check-out</p>
                                        <p class="font-bold text-[#0B1E3F] mt-0.5">{{ formattedCheckOut || 'Select Date' }}</p>
                                    </div>

                                    <div class="border-l border-slate-100 pl-4">
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Guests</p>
                                        <p class="font-bold text-[#0B1E3F] mt-0.5 flex items-center gap-1">
                                            <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <span>{{ bookingForm.guests }} Guests</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Price breakdown items -->
                                <div class="p-6 space-y-4 text-xs">
                                    <div class="flex justify-between items-center text-slate-550">
                                        <span>{{ selectedRoomToBook.name }} x {{ bookingCalculations.nights }} nights</span>
                                        <span class="font-bold text-[#0B1E3F]">PHP {{ formatPrice(bookingCalculations.baseTotal) }}</span>
                                    </div>
                                    
                                    <!-- Total Price large text -->
                                    <div class="border-t border-slate-100 pt-4 flex justify-between items-end">
                                        <div>
                                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Total Price</span>
                                        </div>
                                        <span class="text-lg font-serif font-bold text-[#0B1E3F]">PHP {{ formatPrice(bookingCalculations.totalPrice) }}</span>
                                    </div>

                                    <!-- Main CTA Submit Button -->
                                    <button 
                                        type="button"
                                        @click="goToPaymentStep"
                                        class="w-full bg-[#0B1E3F] hover:bg-[#152e59] text-white py-4 rounded-2xl text-xs font-bold tracking-wider uppercase shadow-lg shadow-blue-950/20 active:scale-[0.99] transition-all cursor-pointer mt-4"
                                    >
                                        <span>Continue to Payment</span>
                                    </button>

                                    <!-- Security disclaimer -->
                                    <p class="text-[8px] text-slate-400 text-center uppercase tracking-widest leading-relaxed mt-2 font-medium">
                                        Secure 256-bit SSL encrypted transaction.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- STEP 3: PAYMENT METHOD & DETAILS -->
                <div v-else-if="currentBookingStep === 3" class="space-y-10 animate-fade-in">
                    
                    <!-- Layout Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                        
                        <!-- Left Column (Payment Method) -->
                        <div class="lg:col-span-8 space-y-10">
                            
                            <!-- 2. Payment Method -->
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-full bg-[#0B1E3F] text-white flex items-center justify-center font-bold text-sm">3</div>
                                    <h3 class="font-serif text-xl font-bold text-[#0B1E3F]">Payment Method</h3>
                                </div>

                                <div class="bg-white border border-slate-100 rounded-3xl p-6 md:p-8 shadow-sm space-y-6">
                                    <div class="space-y-4">
                                        <!-- Credit / Debit Card -->
                                        <div 
                                            @click="paymentMethod = 'credit_card'"
                                            :class="[
                                                'border rounded-2xl p-5 flex items-center justify-between cursor-pointer transition-all duration-200',
                                                paymentMethod === 'credit_card' ? 'border-[#0B1E3F] bg-[#FAF9F6]/20' : 'border-slate-100 hover:border-slate-200'
                                            ]"
                                        >
                                            <div class="flex items-center gap-4">
                                                <div 
                                                    :class="[
                                                        'h-5 w-5 rounded-full border flex items-center justify-center shrink-0 transition-all',
                                                        paymentMethod === 'credit_card' ? 'border-[#0B1E3F] bg-[#0B1E3F]' : 'border-slate-300'
                                                    ]"
                                                >
                                                    <div v-if="paymentMethod === 'credit_card'" class="h-2 w-2 rounded-full bg-white"></div>
                                                </div>
                                                <div>
                                                    <p class="text-xs font-bold text-[#0B1E3F]">Credit / Debit Card</p>
                                                    <p class="text-[10px] text-slate-450 font-light mt-0.5">Secure payment processing. All major cards accepted.</p>
                                                </div>
                                            </div>
                                            <!-- Card Icon -->
                                            <svg class="h-5 w-5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </div>

                                        <!-- GCash -->
                                        <div 
                                            @click="paymentMethod = 'gcash'"
                                            :class="[
                                                'border rounded-2xl p-5 flex items-center justify-between cursor-pointer transition-all duration-200',
                                                paymentMethod === 'gcash' ? 'border-[#0B1E3F] bg-[#FAF9F6]/20' : 'border-slate-100 hover:border-slate-200'
                                            ]"
                                        >
                                            <div class="flex items-center gap-4">
                                                <div 
                                                    :class="[
                                                        'h-5 w-5 rounded-full border flex items-center justify-center shrink-0 transition-all',
                                                        paymentMethod === 'gcash' ? 'border-[#0B1E3F] bg-[#0B1E3F]' : 'border-slate-300'
                                                    ]"
                                                >
                                                    <div v-if="paymentMethod === 'gcash'" class="h-2 w-2 rounded-full bg-white"></div>
                                                </div>
                                                <div>
                                                    <p class="text-xs font-bold text-[#0B1E3F]">GCash</p>
                                                    <p class="text-[10px] text-slate-450 font-light mt-0.5">Instant confirmation via GCash mobile app transfer.</p>
                                                </div>
                                            </div>
                                            <span class="bg-blue-600 text-white text-[8px] font-bold uppercase px-2 py-0.5 rounded tracking-wider shrink-0">E-Wallet</span>
                                        </div>

                                        <!-- Cash at Property -->
                                        <div 
                                            @click="paymentMethod = 'cash_at_property'"
                                            :class="[
                                                'border rounded-2xl p-5 flex items-center justify-between cursor-pointer transition-all duration-200',
                                                paymentMethod === 'cash_at_property' ? 'border-[#0B1E3F] bg-[#FAF9F6]/20' : 'border-slate-100 hover:border-slate-200'
                                            ]"
                                        >
                                            <div class="flex items-center gap-4">
                                                <div 
                                                    :class="[
                                                        'h-5 w-5 rounded-full border flex items-center justify-center shrink-0 transition-all',
                                                        paymentMethod === 'cash_at_property' ? 'border-[#0B1E3F] bg-[#0B1E3F]' : 'border-slate-300'
                                                    ]"
                                                >
                                                    <div v-if="paymentMethod === 'cash_at_property'" class="h-2 w-2 rounded-full bg-white"></div>
                                                </div>
                                                <div>
                                                    <p class="text-xs font-bold text-[#0B1E3F]">Cash at Property</p>
                                                    <p class="text-[10px] text-slate-450 font-light mt-0.5">Secure your booking with a 30% down payment via GCash or Card. Pay the remaining balance upon arrival.</p>
                                                </div>
                                            </div>
                                            <!-- Bill Icon -->
                                            <svg class="h-5 w-5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Credit Card Details Form -->
                                    <div v-if="paymentMethod === 'credit_card'" class="space-y-4 pt-5 border-t border-slate-100 animate-fade-in">
                                        <div>
                                            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Card Number</label>
                                            <input 
                                                type="text" 
                                                v-model="cardForm.number"
                                                @input="cardForm.number = cardForm.number.replace(/[^0-9\s]/g, '')"
                                                placeholder="0000 0000 0000 0000"
                                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-xs font-semibold tracking-widest transition"
                                                required
                                            />
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Expiry Date</label>
                                                <input 
                                                    type="text" 
                                                    v-model="cardForm.expiry"
                                                    @input="cardForm.expiry = cardForm.expiry.replace(/[^0-9\s/]/g, '')"
                                                    placeholder="MM / YY"
                                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-xs font-semibold tracking-wider transition"
                                                    required
                                                />
                                            </div>
                                            <div>
                                                <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">CVV</label>
                                                <input 
                                                    type="password" 
                                                    v-model="cardForm.cvv"
                                                    @input="cardForm.cvv = cardForm.cvv.replace(/[^0-9]/g, '')"
                                                    placeholder="***"
                                                    maxlength="4"
                                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-xs font-semibold tracking-wider transition"
                                                    required
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- GCash Payment Details Form -->
                                    <div v-if="paymentMethod === 'gcash'" class="space-y-4 pt-5 border-t border-slate-100 animate-fade-in">
                                        <div class="bg-[#FAF0E6]/50 dark:bg-slate-800/30 border border-[#A27B5C]/10 rounded-2xl p-4 space-y-2.5">
                                            <p class="text-xs font-semibold text-[#0B1E3F] dark:text-amber-355 font-bold">GCash Transfer Details</p>
                                            <p class="text-[10px] text-slate-550 font-light leading-relaxed">
                                                Please send the total amount (PHP {{ formatPrice(bookingCalculations.totalPrice) }}) to our verified GCash account:<br />
                                                Number: <strong class="text-slate-850 font-bold">0917 123 4567</strong><br />
                                                Account Name: <strong class="text-slate-850 font-bold">ARUGA STAYCATION</strong>
                                            </p>
                                        </div>
                                        <div>
                                            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Upload Receipt Proof (Screenshot)</label>
                                            <input 
                                                type="file" 
                                                @change="handleReceiptUpload"
                                                accept="image/*"
                                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] bg-white text-xs font-semibold transition file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-[#0B1E3F] file:text-white hover:file:bg-[#152e59] cursor-pointer"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <!-- Cash at Property Details Form -->
                                    <div v-if="paymentMethod === 'cash_at_property'" class="space-y-4 pt-5 border-t border-slate-100 animate-fade-in">
                                        <div>
                                            <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Securing Method</label>
                                            <select 
                                                v-model="cashSecuringMethod"
                                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] bg-white text-xs font-semibold transition"
                                            >
                                                <option value="card">Credit Card</option>
                                                <option value="gcash">GCash</option>
                                            </select>
                                        </div>
                                        
                                        <!-- Secured by Card details -->
                                        <div v-if="cashSecuringMethod === 'card'" class="space-y-4 animate-fade-in">
                                            <div>
                                                <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Card Number</label>
                                                <input 
                                                    type="text" 
                                                    v-model="cardForm.number"
                                                    @input="cardForm.number = cardForm.number.replace(/[^0-9\s]/g, '')"
                                                    placeholder="0000 0000 0000 0000"
                                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] bg-white text-xs font-semibold tracking-widest transition"
                                                    required
                                                />
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Expiry Date</label>
                                                    <input 
                                                        type="text" 
                                                        v-model="cardForm.expiry"
                                                        @input="cardForm.expiry = cardForm.expiry.replace(/[^0-9\s/]/g, '')"
                                                        placeholder="MM / YY"
                                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] bg-white text-xs font-semibold transition"
                                                        required
                                                    />
                                                </div>
                                                <div>
                                                    <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">CVV</label>
                                                    <input 
                                                        type="password" 
                                                        v-model="cardForm.cvv"
                                                        @input="cardForm.cvv = cardForm.cvv.replace(/[^0-9]/g, '')"
                                                        placeholder="***"
                                                        maxlength="4"
                                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] bg-white text-xs font-semibold transition"
                                                        required
                                                    />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Secured by GCash details -->
                                        <div v-if="cashSecuringMethod === 'gcash'" class="space-y-4 animate-fade-in">
                                            <div class="bg-[#FAF0E6]/50 dark:bg-slate-800/30 border border-[#A27B5C]/10 rounded-2xl p-4 space-y-2.5">
                                                <p class="text-xs font-semibold text-[#0B1E3F] dark:text-amber-355 font-bold">GCash 30% Down Payment Transfer</p>
                                                <p class="text-[10px] text-slate-550 font-light leading-relaxed">
                                                    Please send PHP {{ formatPrice(bookingCalculations.downPayment) }} to our verified GCash account:<br />
                                                    Number: <strong class="text-slate-850 font-bold">0917 123 4567</strong><br />
                                                    Account Name: <strong class="text-slate-850 font-bold">ARUGA STAYCATION</strong>
                                                </p>
                                            </div>
                                            <div>
                                                <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Upload Receipt Proof (Screenshot)</label>
                                                <input 
                                                    type="file" 
                                                    @change="handleReceiptUpload"
                                                    accept="image/*"
                                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] bg-white text-xs font-semibold transition file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-[#0B1E3F] file:text-white hover:file:bg-[#152e59] cursor-pointer"
                                                    required
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Back Navigation link -->
                            <div class="flex items-center gap-2 pt-2">
                                <button 
                                    type="button" 
                                    @click="currentBookingStep = 2"
                                    class="text-xs font-bold text-slate-400 hover:text-[#0B1E3F] transition uppercase tracking-wider flex items-center gap-1.5 cursor-pointer"
                                >
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    <span>Back to Stay Schedule</span>
                                </button>
                            </div>

                        </div>

                        <!-- Right Column (Checkout Summary Card) -->
                        <div class="lg:col-span-4 sticky top-24">
                            <div class="bg-white border border-slate-100 rounded-[32px] overflow-hidden shadow-xl shadow-slate-950/5 flex flex-col">
                                <!-- Room header image -->
                                <div class="relative h-48 overflow-hidden shrink-0">
                                    <img 
                                        :src="selectedRoomToBook.image" 
                                        :alt="selectedRoomToBook.name" 
                                        class="w-full h-full object-cover"
                                    />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                                    <div class="absolute bottom-4 left-6 right-6 text-white">
                                        <span class="bg-white/20 backdrop-blur-sm text-[8px] font-bold uppercase tracking-wider px-2 py-0.5 rounded">Selected Accomodation</span>
                                        <h4 class="font-serif text-lg font-bold mt-1">{{ selectedRoomToBook.name }}</h4>
                                    </div>
                                </div>

                                <!-- Stay summary stats (Dates & Guests) -->
                                <div class="p-6 border-b border-slate-100 flex items-center justify-between text-xs">
                                    <div>
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Check-in</p>
                                        <p class="font-bold text-[#0B1E3F] mt-0.5">{{ formattedCheckIn }}</p>
                                    </div>
                                    
                                    <!-- Arrow divider -->
                                    <svg class="h-4 w-4 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>

                                    <div>
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Check-out</p>
                                        <p class="font-bold text-[#0B1E3F] mt-0.5">{{ formattedCheckOut }}</p>
                                    </div>

                                    <div class="border-l border-slate-100 pl-4">
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Guests</p>
                                        <p class="font-bold text-[#0B1E3F] mt-0.5 flex items-center gap-1">
                                            <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <span>{{ bookingForm.guests }} Guests</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Price breakdown items -->
                                <div class="p-6 space-y-4 text-xs">
                                    <div class="flex justify-between items-center text-slate-550">
                                        <span>{{ selectedRoomToBook.name }} x {{ bookingCalculations.nights }} nights</span>
                                        <span class="font-bold text-[#0B1E3F]">PHP {{ formatPrice(bookingCalculations.baseTotal) }}</span>
                                    </div>
                                    
                                    <div class="border-t border-slate-100 pt-4 space-y-3">
                                        <div v-if="paymentMethod === 'cash_at_property'" class="flex justify-between items-center text-slate-550">
                                            <span>Down Payment (30%)</span>
                                            <span class="font-bold text-[#0B1E3F]">PHP {{ formatPrice(bookingCalculations.downPayment) }}</span>
                                        </div>
                                        <div v-if="paymentMethod === 'cash_at_property'" class="flex justify-between items-center text-slate-400">
                                            <span>Remaining Balance (70%)</span>
                                            <span>PHP {{ formatPrice(bookingCalculations.remainingBalance) }}</span>
                                        </div>
                                    </div>

                                    <!-- Total Price large text -->
                                    <div class="border-t border-slate-100 pt-4 flex justify-between items-end">
                                        <div>
                                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Total Price</span>
                                        </div>
                                        <span class="text-lg font-serif font-bold text-[#0B1E3F]">PHP {{ formatPrice(bookingCalculations.totalPrice) }}</span>
                                    </div>

                                    <!-- Main CTA Submit Button -->
                                    <button 
                                        type="button"
                                        @click="submitBookingSimulated"
                                        class="w-full bg-[#0B1E3F] hover:bg-[#152e59] text-white py-4 rounded-2xl text-xs font-bold tracking-wider uppercase shadow-lg shadow-blue-950/20 active:scale-[0.99] transition-all cursor-pointer mt-4"
                                    >
                                        <span v-if="paymentMethod === 'credit_card' || paymentMethod === 'gcash'">Confirm Payment</span>
                                        <span v-else>Confirm & Pay Down Payment</span>
                                    </button>

                                    <!-- Security disclaimer -->
                                    <p class="text-[8px] text-slate-450 text-center uppercase tracking-widest leading-relaxed mt-2 font-medium">
                                        By clicking confirm, you agree to our Terms of Service and Cancellation Policy. Secure 256-bit SSL encrypted transaction.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Footer -->
            <footer class="bg-white border-t border-slate-150 px-6 md:px-12 lg:px-20 py-8 w-full shrink-0">
                <div class="max-w-7xl w-full mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="space-y-1.5 text-center md:text-left">
                        <h4 class="font-serif text-[#0B1E3F] text-sm font-bold">ARUGA Staycation</h4>
                        <p class="text-[10px] text-slate-400 font-light max-w-sm leading-normal">
                            Experience the raw beauty of Samal Island through our curated tropical sanctuary.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center justify-center gap-8 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                        <div class="flex items-center gap-4">
                            <span class="text-slate-400 text-[9px] block">Connect:</span>
                            <a href="#" class="hover:text-[#0B1E3F] transition">Facebook</a>
                            <a href="#" class="hover:text-[#0B1E3F] transition">Instagram</a>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-slate-400 text-[9px] block">Explore:</span>
                            <a href="#" class="hover:text-[#0B1E3F] transition">Map Location</a>
                            <a href="#" class="hover:text-[#0B1E3F] transition">Newsletter</a>
                        </div>
                    </div>

                    <span class="text-[9px] text-slate-400 text-center md:text-right">
                        © 2026 ARUGA Staycation. All rights reserved.
                    </span>
                </div>
            </footer>

        </div>

        <!-- ========================================================================= -->
        <!-- ========================================================================= -->
        <div v-else-if="currentView === 'my_bookings'" class="min-h-screen w-full bg-[#FAF9F6] font-sans antialiased text-[#0B1E3F] animate-fade-in flex flex-col justify-between">
            
            <!-- Navbar Header -->
            <header class="sticky top-0 z-40 w-full bg-white/80 backdrop-blur-md border-b border-slate-100/60 px-6 md:px-12 lg:px-20 py-4 flex items-center justify-between transition-all duration-300">
                <!-- Left: Logo & Brand (Text only matching mockup) -->
                <div class="cursor-pointer" @click="setView('guest')">
                    <p class="font-serif text-[#0B1E3F] font-bold text-lg md:text-xl tracking-wide leading-none">Aruga Staycation</p>
                </div>

                <!-- Center: Nav Links (Title Case matching mockup) -->
                <nav class="hidden md:flex items-center gap-8">
                    <button @click="setView('guest'); scrollToSection('living-spaces')" class="text-xs font-semibold text-slate-500 hover:text-[#0B1E3F] pb-1.5 tracking-wider transition cursor-pointer">Explore Rooms</button>
                    <button @click="setView('my_bookings')" class="text-xs font-bold text-[#0B1E3F] border-b-2 border-[#0B1E3F] pb-1.5 tracking-wider cursor-pointer">My Bookings</button>
                    <button @click="setView('guest'); scrollToSection('living-spaces')" class="text-xs font-semibold text-slate-500 hover:text-[#0B1E3F] pb-1.5 tracking-wider transition cursor-pointer">Contact</button>
                </nav>

                <!-- Right: Book Now CTA Button (Dark pill matching mockup) -->
                <div>
                    <button 
                        @click="setView('guest'); scrollToSection('living-spaces')" 
                        class="bg-[#0B1E3F] hover:bg-[#152e59] text-white px-6 py-2.5 rounded-full text-xs font-bold transition shadow-md hover:shadow-lg active:scale-98 cursor-pointer"
                    >
                        Book Now
                    </button>
                </div>
            </header>

            <!-- Main Content Area: Retrieve Booking (Split 50/50 Layout matching mockup 1-to-1) -->
            <div v-if="!retrievedBooking" class="w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-20 py-16 flex-grow flex items-center justify-center">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center w-full max-w-5xl">
                    <!-- Left Side: Golden Circular Logo in Dark Square Box -->
                    <div class="flex justify-center">
                        <div class="h-80 w-80 md:h-[400px] md:w-[400px] rounded-[32px] overflow-hidden shadow-2xl border border-slate-200/50 flex items-center justify-center bg-[#0B1320] relative hover:scale-[1.01] transition-all duration-300">
                            <img 
                                :src="'/images/Aruga_logo.jpg'" 
                                alt="Aruga Staycation Logo" 
                                class="h-full w-full object-cover"
                            />
                        </div>
                    </div>

                    <!-- Right Side: Retrieve Form White Card -->
                    <div class="bg-white border border-slate-100 rounded-[32px] p-8 md:p-12 shadow-xl shadow-slate-950/5 space-y-6">
                        <div class="space-y-3">
                            <h2 class="font-serif text-[#0B1E3F] text-3xl font-bold tracking-tight">Retrieve Your Booking</h2>
                            <p class="text-slate-500 text-xs font-light leading-relaxed">
                                Enter the reference number provided in your confirmation email to see your booking status and details.
                            </p>
                        </div>

                        <form @submit.prevent="handleRetrieveBooking" class="space-y-6">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Booking Reference Number</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                                        <!-- Ticket Icon SVG -->
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                        </svg>
                                    </span>
                                    <input 
                                        type="text" 
                                        v-model="bookingRefInput"
                                        placeholder="e.g. ARUGA-123456"
                                        class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-xs font-semibold uppercase tracking-wider transition"
                                        required
                                    />
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Email Address</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                                        <!-- Mail Icon SVG -->
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                    <input 
                                        type="email" 
                                        v-model="bookingEmailInput"
                                        placeholder="e.g. guest@example.com"
                                        class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white text-xs font-semibold transition"
                                        required
                                    />
                                </div>
                            </div>

                            <button 
                                type="submit"
                                class="w-full bg-[#0B1E3F] hover:bg-[#152e59] text-white py-4 rounded-xl text-xs font-bold tracking-wider uppercase shadow-md flex items-center justify-center gap-2 transition cursor-pointer"
                            >
                                <span>View Reservation</span>
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>

                        <!-- Assistance Links -->
                        <div class="pt-6 border-t border-slate-100 text-center space-y-4">
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Need assistance?</p>
                            <div class="flex items-center justify-center gap-8 text-[11px] font-bold text-slate-500">
                                <a href="mailto:support@arugastaycation.com" class="hover:text-[#0B1E3F] transition flex items-center gap-2">
                                    <!-- Mail Icon SVG -->
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span>Contact Support</span>
                                </a>
                                <a href="#" class="hover:text-[#0B1E3F] transition flex items-center gap-2">
                                    <!-- Question Circle Icon SVG -->
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>FAQs</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area: Detailed Confirmation Page (Matching Mockup 2 1-to-1) -->
            <div v-else class="w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-20 py-12 flex-grow">
                <!-- Success Header Banner -->
                <div class="flex flex-col items-start gap-4 mb-8">
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-[#E2FBE9] text-[#1E7D3F] text-[10px] font-bold uppercase tracking-wider">
                        <!-- Checkmark SVG -->
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Successful Reservation
                    </span>
                    <div class="flex flex-col md:flex-row md:items-center justify-between w-full gap-4">
                        <div>
                            <h1 class="font-serif text-3xl md:text-4.5xl text-[#0B1E3F] font-bold leading-none tracking-tight">
                                Your island escape is confirmed.
                            </h1>
                            <p class="text-slate-500 text-xs md:text-sm font-light mt-2 max-w-2xl leading-relaxed">
                                We've reserved your suite at Aruga. Please find your booking details and itinerary below for your upcoming stay at Samal Island.
                            </p>
                        </div>
                        <!-- Search Another reservation CTA -->
                        <button 
                            @click="retrievedBooking = null" 
                            class="shrink-0 bg-white border border-slate-200 hover:border-slate-400 text-[#0B1E3F] px-5 py-2.5 rounded-xl text-xs font-bold transition shadow-sm hover:shadow active:scale-98 cursor-pointer flex items-center gap-2"
                        >
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <span>Search Another</span>
                        </button>
                    </div>
                </div>

                <!-- 2-Column Grid Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                    
                    <!-- Left Side Details (Spans 2 columns) -->
                    <div class="lg:col-span-2 space-y-6">
                        
                        <!-- Details Card -->
                        <div class="bg-white border border-slate-100 rounded-[24px] p-6 md:p-8 shadow-sm space-y-6">
                            <!-- Reference Header -->
                            <div class="flex items-center justify-between">
                                <div class="space-y-1">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Booking Reference</p>
                                    <h3 class="font-serif text-[#0B1E3F] text-xl md:text-2xl font-bold">{{ retrievedBooking.reference }}</h3>
                                </div>
                                <div class="flex items-center gap-2">
                                    <!-- Print Button -->
                                    <button onclick="window.print()" class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 px-4 py-2 rounded-xl text-xs font-bold flex items-center gap-2 transition cursor-pointer">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h6z" />
                                        </svg>
                                        <span>Print</span>
                                    </button>
                                    <!-- Share Button -->
                                    <button @click="shareReservation(retrievedBooking.reference)" class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 px-4 py-2 rounded-xl text-xs font-bold flex items-center gap-2 transition cursor-pointer">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 10.742l4.63-2.22m0 6.916l-4.63-2.22m7.893-2.68h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Share</span>
                                    </button>
                                </div>
                            </div>

                            <!-- 2x2 Grid details -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 pt-6 border-t border-slate-100">
                                <!-- Check In -->
                                <div class="flex gap-4">
                                    <div class="h-10 w-10 shrink-0 rounded-xl bg-[#FAF9F6] border border-slate-100 flex items-center justify-center text-[#A27B5C]">
                                        <!-- Calendar Icon -->
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Check-in</p>
                                        <p class="text-xs font-bold text-slate-800 leading-none">{{ retrievedBooking.checkIn }}</p>
                                        <p class="text-[10px] text-slate-500 font-light">{{ retrievedBooking.checkInTime }}</p>
                                    </div>
                                </div>

                                <!-- Guests -->
                                <div class="flex gap-4">
                                    <div class="h-10 w-10 shrink-0 rounded-xl bg-[#FAF9F6] border border-slate-100 flex items-center justify-center text-[#A27B5C]">
                                        <!-- Person Icon -->
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Guests</p>
                                        <p class="text-xs font-bold text-slate-800 leading-none">{{ retrievedBooking.guests }}</p>
                                    </div>
                                </div>

                                <!-- Check Out -->
                                <div class="flex gap-4">
                                    <div class="h-10 w-10 shrink-0 rounded-xl bg-[#FAF9F6] border border-slate-100 flex items-center justify-center text-[#A27B5C]">
                                        <!-- Calendar Icon -->
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Check-out</p>
                                        <p class="text-xs font-bold text-slate-800 leading-none">{{ retrievedBooking.checkOut }}</p>
                                        <p class="text-[10px] text-slate-500 font-light">{{ retrievedBooking.checkOutTime }}</p>
                                    </div>
                                </div>

                                <!-- Room Type -->
                                <div class="flex gap-4">
                                    <div class="h-10 w-10 shrink-0 rounded-xl bg-[#FAF9F6] border border-slate-100 flex items-center justify-center text-[#A27B5C]">
                                        <!-- Bed Icon -->
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Room Type</p>
                                        <p class="text-xs font-bold text-slate-800 leading-none">{{ retrievedBooking.roomType }}</p>
                                        <p class="text-[10px] text-slate-500 font-light">{{ retrievedBooking.roomDetails }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Special Requests Card -->
                        <div class="bg-white border border-slate-100 rounded-[24px] p-6 md:p-8 shadow-sm space-y-4">
                            <h4 class="text-xs font-bold text-slate-850 uppercase tracking-wider flex items-center gap-2">
                                <!-- Message Icon -->
                                <svg class="h-4.5 w-4.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <span>Special Requests</span>
                            </h4>
                            <div class="bg-slate-50 border border-slate-200/60 p-5 rounded-2xl text-slate-600 text-xs italic font-light leading-relaxed">
                                "{{ retrievedBooking.specialRequests }}"
                            </div>
                        </div>

                        <!-- Included Amenities Section -->
                        <div class="space-y-3 pt-2">
                            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Included Amenities</p>
                            <div class="flex flex-wrap gap-2.5">
                                <span v-for="amenity in retrievedBooking.amenities" :key="amenity" class="bg-slate-100 text-slate-700 px-4 py-2.5 rounded-xl text-[11px] font-bold flex items-center gap-2 border border-slate-200/30">
                                    <!-- Dynamic Amenity Icon -->
                                    <svg v-if="amenity.includes('WiFi')" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071a10.5 10.5 0 0114.14 0M1.808 8.899a16.5 16.5 0 0120.38 0" />
                                    </svg>
                                    <svg v-else-if="amenity.includes('Pool')" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                    </svg>
                                    <svg v-else-if="amenity.includes('Breakfast')" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <svg v-else-if="amenity.includes('Drinks')" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    <span>{{ amenity }}</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side Billing & Instructions -->
                    <div class="space-y-6">
                        <!-- Billing Summary Card -->
                        <div class="bg-white border border-slate-100 rounded-[24px] overflow-hidden shadow-sm">
                            <!-- Room Image header -->
                            <div class="relative h-48 w-full bg-slate-900 overflow-hidden">
                                <img 
                                    :src="retrievedBooking.roomImage" 
                                    alt="Reserved Suite" 
                                    class="h-full w-full object-cover opacity-90"
                                />
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/30 to-transparent"></div>
                                <div class="absolute bottom-5 left-6 right-6">
                                    <p class="text-[9px] font-bold text-white/75 uppercase tracking-wider leading-none">Reserved Suite</p>
                                    <p class="text-base font-bold text-white mt-1.5 leading-tight">{{ retrievedBooking.roomType }}</p>
                                </div>
                            </div>

                            <!-- Billing Body -->
                            <div class="p-6 space-y-5">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-slate-800">Billing</span>
                                    <span :class="[
                                        'text-[9px] font-bold px-2 py-0.5 rounded tracking-wider uppercase',
                                        retrievedBooking.status === 'PAID' ? 'bg-[#0B1E3F] text-white' : 'bg-amber-500 text-white'
                                    ]">{{ retrievedBooking.status }}</span>
                                </div>

                                <div class="space-y-3.5 text-xs text-slate-500">
                                    <div class="flex justify-between items-center">
                                        <span>{{ retrievedBooking.nights }} Nights × {{ retrievedBooking.currencySymbol }}{{ formatPrice(retrievedBooking.nightlyRate) }}</span>
                                        <span class="font-semibold text-slate-800">{{ retrievedBooking.currencySymbol }}{{ formatPrice(retrievedBooking.subtotal) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span>Service Fee (10%)</span>
                                        <span class="font-semibold text-slate-800">{{ retrievedBooking.currencySymbol }}{{ formatPrice(retrievedBooking.serviceFee) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span>Local Taxes</span>
                                        <span class="font-semibold text-slate-800">{{ retrievedBooking.currencySymbol }}{{ formatPrice(retrievedBooking.localTaxes) }}</span>
                                    </div>
                                </div>

                                <div class="border-t border-slate-100 pt-4 flex justify-between items-center">
                                    <span class="text-xs font-bold text-slate-900">Total Price</span>
                                    <span class="text-lg font-serif font-bold text-[#0B1E3F]">{{ retrievedBooking.currencySymbol }}{{ formatPrice(retrievedBooking.totalPrice) }}</span>
                                </div>

                                <!-- Payment/Transaction info -->
                                <div class="border-t border-slate-100 pt-4 space-y-2.5 text-[11px] text-slate-500 font-light">
                                    <div class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                        <span>{{ retrievedBooking.paymentCard }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.952 11.952 0 01-9.618 3.07M3 10c0 4.296 3.125 7.994 7 9.074M3 10c0-1.12.083-2.203.242-3.262M12 19c3.875-1.08 7-4.778 7-9.074M12 19c-1.12 0-2.203-.083-3.262-.242M19 10c0-1.12-.083-2.203-.242-3.262" />
                                        </svg>
                                        <span>Transaction ID: {{ retrievedBooking.transactionId }}</span>
                                    </div>
                                </div>

                                <button @click="downloadInvoice(retrievedBooking.reference)" class="w-full bg-[#0B1E3F] hover:bg-[#152e59] text-white py-3.5 rounded-xl text-[10px] font-bold tracking-wider uppercase shadow-sm transition active:scale-98 cursor-pointer flex items-center justify-center gap-2">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    <span>Download Invoice (PDF)</span>
                                </button>
                            </div>
                        </div>

                        <!-- Guest Information Alert Box -->
                        <div class="bg-[#FDF6E2] border border-[#F5E6C4] p-5 rounded-2xl flex gap-3 text-[#78350F]">
                            <svg class="h-5 w-5 text-amber-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364.364l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <div class="space-y-1">
                                <p class="text-xs font-bold uppercase tracking-wider leading-none">Guest Information</p>
                                <p class="text-xs font-light leading-normal text-amber-800">Don't forget to bring your valid ID upon checking in</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer (Aligned with mockup 4-Column layout) -->
            <footer class="bg-[#F2F1F3] border-t border-slate-200/60 px-6 md:px-12 lg:px-20 py-12 w-full shrink-0 mt-auto">
                <div class="max-w-7xl w-full mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Column 1: Info -->
                    <div class="space-y-3">
                        <h4 class="font-serif text-[#0B1E3F] text-sm font-bold">Aruga Staycation</h4>
                        <p class="text-[11px] text-slate-500 font-light leading-relaxed max-w-xs">
                            Refining the Samal Island experience through tropical modernism and elite hospitality.
                        </p>
                    </div>

                    <!-- Column 2: Legal -->
                    <div class="space-y-3">
                        <h5 class="text-[10px] font-bold text-slate-700 uppercase tracking-wider">Legal</h5>
                        <ul class="space-y-2 text-[11px] text-slate-500">
                            <li><a href="#" class="hover:text-[#0B1E3F] transition">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-[#0B1E3F] transition">Terms of Service</a></li>
                        </ul>
                    </div>

                    <!-- Column 3: Explore -->
                    <div class="space-y-3">
                        <h5 class="text-[10px] font-bold text-slate-700 uppercase tracking-wider">Explore</h5>
                        <ul class="space-y-2 text-[11px] text-slate-500">
                            <li><a href="#" class="hover:text-[#0B1E3F] transition">Sustainability</a></li>
                            <li><a href="#" class="hover:text-[#0B1E3F] transition">Careers</a></li>
                        </ul>
                    </div>

                    <!-- Column 4: Connect -->
                    <div class="space-y-4">
                        <h5 class="text-[10px] font-bold text-slate-700 uppercase tracking-wider">Connect</h5>
                        <div class="flex items-center gap-3.5 text-slate-600">
                            <!-- Instagram SVG -->
                            <a href="#" class="hover:text-[#0B1E3F] transition">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </a>
                            <!-- Facebook SVG -->
                            <a href="#" class="hover:text-[#0B1E3F] transition">
                                <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.8c4.56-.93 8-4.96 8-9.8z"/>
                                </svg>
                            </a>
                            <!-- Web SVG or envelope/at -->
                            <a href="#" class="hover:text-[#0B1E3F] transition">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </a>
                        </div>
                        <p class="text-[10px] text-slate-400 font-light leading-none">
                            © 2024 Aruga Staycation. All rights reserved.
                        </p>
                    </div>
                </div>
            </footer>

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
                        ARUGA Staycation
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
                        ARUGA Staycation
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
        <div v-else-if="currentView === 'dashboard' && currentUser" class="h-screen w-full flex overflow-hidden bg-[#F8FAFC] dark:bg-slate-950 animate-fade-in text-slate-800 dark:text-slate-200 transition-colors duration-300">
            <!-- Sidebar -->
            <aside class="hidden md:flex flex-col w-64 h-full bg-white dark:bg-slate-900 border-r border-slate-100 dark:border-slate-800 p-6 shrink-0 justify-between overflow-y-auto transition-colors duration-300">
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
                            @click.prevent="activeTab = 'room_management'"
                            :class="['flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-xs leading-none transition', 
                                     activeTab === 'room_management' ? 'bg-amber-500/10 text-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300' : 'text-slate-500 hover:text-[#0B1E3F] hover:bg-slate-50 dark:text-slate-400 dark:hover:text-slate-200 dark:hover:bg-slate-800/50']"
                        >
                            <!-- Room Mgmt Icon SVG (bed) -->
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10V19a2 2 0 002 2h14a2 2 0 002-2v-9M3 10V6a2 2 0 012-2h2a2 2 0 012 2v4M13 6a2 2 0 012-2h2a2 2 0 012 2v4M3 10h18" />
                            </svg>
                            <span>Room Management</span>
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
                                    <p class="text-2xl font-bold text-slate-800 mt-1">{{ pendingReservations.length }}</p>
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
                                    <p class="text-2xl font-bold text-slate-800 mt-1">{{ approvedReservations.length }}</p>
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
                                    <p class="text-2xl font-bold text-slate-800 mt-1">{{ rejectedReservations.length }}</p>
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
                            
                            <!-- Booking Trends Chart (Dynamic based on occupancy dates) -->
                            <div class="bg-white border border-slate-50 rounded-2xl p-6 shadow-sm lg:col-span-2 space-y-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-serif text-[#0b1c3d] text-base font-bold">Booking Trends</h3>
                                        <p class="text-slate-400 text-xs mt-0.5">Occupancy rate over the last 7 days</p>
                                    </div>
                                </div>

                                <!-- SVG Bar Chart -->
                                <div class="relative pt-6">
                                    <div class="h-44 w-full flex items-end justify-between px-2 gap-2 md:gap-4 border-b border-slate-100 pb-2 relative">
                                        <!-- Background grid lines -->
                                        <div class="absolute inset-x-0 top-0 border-t border-slate-100/60 w-full pointer-events-none"></div>
                                        <div class="absolute inset-x-0 top-1/3 border-t border-slate-100/60 w-full pointer-events-none"></div>
                                        <div class="absolute inset-x-0 top-2/3 border-t border-slate-100/60 w-full pointer-events-none"></div>

                                        <div 
                                            v-for="(bar, index) in trendBars" 
                                            :key="index" 
                                            class="flex-grow flex flex-col items-center group relative cursor-pointer h-full justify-end animate-fade-in"
                                        >
                                            <div 
                                                :style="{ height: Math.max(bar.percentage, 2) + '%' }" 
                                                :class="['w-full rounded-t-md transition-all duration-300 relative min-h-[4px]', 
                                                          bar.isCurrentDay 
                                                            ? 'bg-[#0B1E3F] hover:bg-[#152e59]' 
                                                            : 'bg-[#1B321F]/20 group-hover:bg-[#1B321F]/40'
                                                 ]"
                                            >
                                                <!-- Hover tooltip -->
                                                <div class="absolute -top-7 left-1/2 -translate-x-1/2 bg-[#0B1E3F] text-white text-[9px] font-bold py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition shadow-md pointer-events-none z-50 whitespace-nowrap">
                                                    {{ bar.percentage }}% ({{ bar.count }}/{{ bar.totalRooms }} Rooms occupied)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Labels -->
                                    <div class="flex justify-between text-[10px] text-slate-400 font-semibold px-2 pt-2">
                                        <span 
                                            v-for="(bar, index) in trendBars" 
                                            :key="index" 
                                            class="flex-grow text-center truncate px-0.5"
                                        >
                                            {{ bar.label }}
                                        </span>
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
                                    <!-- Dynamic Filter Dropdown -->
                                    <div ref="filterContainer" class="relative">
                                        <button @click="showFilterDropdown = !showFilterDropdown" class="flex items-center gap-1.5 px-3 py-2 border border-slate-100 rounded-xl text-slate-500 hover:text-slate-800 text-xs font-semibold transition cursor-pointer">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                            </svg>
                                            <span>Filter: {{ getFilterLabel(selectedStatusFilter) }}</span>
                                        </button>
                                        
                                        <div v-if="showFilterDropdown" class="absolute right-0 mt-2 w-48 bg-white border border-slate-100 rounded-xl shadow-lg py-1 z-50">
                                            <button 
                                                v-for="opt in filterOptions" 
                                                :key="opt.value"
                                                @click="setStatusFilter(opt.value)"
                                                :class="['w-full text-left px-4 py-2 text-xs transition hover:bg-slate-50 flex items-center justify-between', selectedStatusFilter === opt.value ? 'font-semibold text-[#0B1E3F]' : 'text-slate-600']"
                                            >
                                                <span>{{ opt.label }}</span>
                                                <svg v-if="selectedStatusFilter === opt.value" class="h-3.5 w-3.5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <button @click="exportGuestRecordsCSV" class="flex items-center gap-1.5 px-3 py-2 border border-slate-100 rounded-xl text-slate-500 hover:text-slate-800 text-xs font-semibold transition cursor-pointer">
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
                                        
                                        <!-- Dynamic Guest Records Row -->
                                        <tr 
                                            v-for="record in visibleGuestRecords" 
                                            :key="record.id" 
                                            @click="viewBookingDetails(record)" 
                                            class="group hover:bg-slate-50/50 transition cursor-pointer"
                                        >
                                            <td class="py-4 flex items-center gap-3">
                                                <div :class="['h-9 w-9 rounded-full font-semibold flex items-center justify-center text-xs tracking-wider text-[#A27B5C] bg-amber-50/50', getBgClass(record.id)]">
                                                    {{ getInitials(record.name) }}
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-slate-800 group-hover:text-[#0b1c3d] transition">{{ record.name }}</p>
                                                    <span class="text-slate-400 text-[10px] mt-0.5 block">{{ record.email }}</span>
                                                </div>
                                            </td>
                                            <td class="py-4">
                                                <span :class="[
                                                    'px-2.5 py-1 text-[10px] font-bold rounded-full',
                                                    record.statusType === 'pending' ? 'text-amber-600 bg-amber-50' :
                                                    record.statusType === 'rejected' ? 'text-rose-600 bg-rose-50' :
                                                    record.statusType === 'in_stay' ? 'text-blue-600 bg-blue-50' :
                                                    record.statusType === 'completed' ? 'text-slate-500 bg-slate-50' :
                                                    'text-[#2D5A27] bg-emerald-50'
                                                ]">{{ record.status }}</span>
                                            </td>
                                            <td class="py-4 text-slate-500 font-medium">
                                                {{ formatDate(record.checkInDateRaw) }}
                                            </td>
                                            <td class="py-4 font-semibold text-slate-800">
                                                ₱{{ record.amount }}
                                            </td>
                                            <td class="py-4 text-right pr-4">
                                                <button @click.stop="viewBookingDetails(record)" class="p-1 text-slate-400 hover:text-slate-700 transition cursor-pointer">
                                                    <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Fallback Empty Row -->
                                        <tr v-if="filteredGuestRecords.length === 0">
                                            <td colspan="5" class="py-8 text-center text-slate-400 font-light italic">
                                                {{ guestRecords.length === 0 ? 'No guest records found in the database.' : 'No guest records match the selected filter.' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table Footer -->
                            <button 
                                v-if="filteredGuestRecords.length > 3"
                                @click="expandGuestRecords = !expandGuestRecords" 
                                class="w-full py-3 text-slate-500 hover:text-slate-800 text-xs font-semibold tracking-wide border-t border-slate-50 transition cursor-pointer"
                            >
                                {{ expandGuestRecords ? 'Collapse Table' : 'View All Reservations' }}
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
                                <span>Showing {{ pendingReservations.length }} of {{ pendingReservations.length }} reservations</span>
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
                                    <p class="text-3xl font-bold text-slate-900 dark:text-slate-100">{{ urgentBookingsCount }} Bookings</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Bookings awaiting payment verification.</p>
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
                                    <p class="text-3xl font-bold text-[#2D5A27] dark:text-emerald-400">₱{{ projectedRevenue }}</p>
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
                                    <p class="text-3xl font-bold text-slate-900 dark:text-slate-100">{{ nextPendingCheckIn.dateText }}</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">{{ nextPendingCheckIn.subText }}</p>
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
                                            Reservation <span class="text-slate-400 font-light">#{{ selectedPendingReservation.reference }}</span>
                                        </h1>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 dark:bg-amber-950/20 text-[#A27B5C] dark:text-amber-300 border border-amber-100/10 dark:border-amber-900/30">
                                            Pending Verification
                                        </span>
                                        <span class="text-slate-400 dark:text-slate-500 text-xs font-semibold">
                                            Received {{ selectedPendingReservation.createdTime }}
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
                                                <p class="font-semibold text-slate-800 dark:text-slate-200 text-sm">{{ selectedPendingReservation.phone }}</p>
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
                                                            {{ selectedPendingReservation.startDate }}, {{ selectedPendingReservation.year }} — {{ selectedPendingReservation.endDate }}, {{ selectedPendingReservation.year }}
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
                                                            {{ selectedPendingReservation.roomName }}
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
                                                {{ selectedPendingReservation.specialRequests || 'No special requests.' }}
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
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold block mt-0.5">{{ selectedPendingReservation.createdTime }}</span>
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
                                                    <span class="inline-block mt-1 px-2.5 py-0.5 text-[9px] font-bold bg-emerald-50 dark:bg-emerald-950/40 text-emerald-800 dark:text-emerald-300 rounded tracking-wider uppercase">
                                                        {{ reservation.roomName }}
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
                                            #{{ selectedApprovedReservation.reference }}
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
                                                <span class="font-medium">{{ selectedApprovedReservation.phone }}</span>
                                            </div>
                                        </div>
                                    </div>
 
                                    <!-- Special Requests Card -->
                                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-[28px] p-6 shadow-sm space-y-4">
                                        <p class="text-[10px] font-semibold text-slate-455 dark:text-slate-500 uppercase tracking-wider">Special Requests</p>
                                        
                                        <div class="bg-slate-50 dark:bg-slate-855 p-4.5 rounded-2xl border border-slate-100/50 dark:border-slate-800/40 space-y-3">
                                            <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Requirements</p>
                                            <div class="text-xs text-slate-650 dark:text-slate-400 leading-relaxed whitespace-pre-line">
                                                {{ selectedApprovedReservation.specialRequests }}
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
                                                <h2 class="font-serif text-2xl font-bold tracking-tight">{{ selectedApprovedReservation.roomType }} – {{ selectedApprovedReservation.roomName }}</h2>
                                                <p class="text-white/85 text-xs font-semibold mt-1">
                                                    {{ selectedApprovedReservation.roomDescription }}
                                                </p>
                                            </div>
                                        </div>
 
                                        <!-- Grid Columns Section -->
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-6 divide-y-0 md:divide-x divide-slate-100 dark:divide-slate-800/80">
                                            
                                            <!-- Check In -->
                                            <div class="flex flex-col">
                                                <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Check In</span>
                                                <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold mt-1.5">{{ selectedApprovedReservation.startDate }}</span>
                                                <span class="text-slate-550 dark:text-slate-450 text-[10px] font-semibold mt-0.5">{{ selectedApprovedReservation.checkInDayOfWeek }}, 2:00 PM</span>
                                            </div>
 
                                            <!-- Check Out -->
                                            <div class="flex flex-col md:pl-6">
                                                <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Check Out</span>
                                                <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold mt-1.5">{{ selectedApprovedReservation.endDate }}</span>
                                                <span class="text-slate-550 dark:text-slate-455 text-[10px] font-semibold mt-0.5">{{ selectedApprovedReservation.checkOutDayOfWeek }}, 11:00 AM</span>
                                            </div>
 
                                            <!-- Guests -->
                                            <div class="flex flex-col md:pl-6">
                                                <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Guests</span>
                                                <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold mt-1.5">
                                                    {{ String(selectedApprovedReservation.guestsCount).padStart(2, '0') }}
                                                </span>
                                                <span class="text-slate-550 dark:text-slate-455 text-[10px] font-semibold mt-0.5">Adults</span>
                                            </div>
 
                                            <!-- Duration -->
                                            <div class="flex flex-col md:pl-6">
                                                <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Duration</span>
                                                <span class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold mt-1.5">
                                                    {{ String(selectedApprovedReservation.nightsCount).padStart(2, '0') }}
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
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-505 font-semibold block mt-0.5">{{ selectedApprovedReservation.createdTime }}</span>
                                                    <p class="text-xs text-slate-550 dark:text-slate-400 mt-1.5 leading-relaxed">
                                                        Full payment of 
                                                        <span class="font-bold text-slate-800 dark:text-slate-200">
                                                            ₱{{ selectedApprovedReservation.totalPrice }}
                                                        </span> 
                                                        processed via {{ selectedApprovedReservation.paymentMethodText }}.
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
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-550 font-semibold block mt-0.5">{{ selectedApprovedReservation.createdTime }}</span>
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
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-550 font-semibold block mt-0.5">{{ selectedApprovedReservation.createdTime }}</span>
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
                                        <span>Export</span>
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
                                <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-3">{{ rejectedReservations.length }}</p>
                            </div>

                            <!-- Invalid Payments Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[110px]">
                                <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Invalid Payments</p>
                                <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-3">{{ rejectedInvalidPaymentsCount }}</p>
                            </div>

                            <!-- Duplicate Bookings Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[110px]">
                                <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Duplicate Bookings</p>
                                <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-3">{{ rejectedDuplicateBookingsCount }}</p>
                            </div>

                            <!-- User Cancelled Card -->
                            <div class="bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between min-h-[110px]">
                                <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">User Cancelled</p>
                                <p class="text-2xl font-serif font-bold text-slate-850 dark:text-slate-100 mt-3">{{ rejectedUserCancelledCount }}</p>
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
                                                <div class="inline-block text-[10px] font-bold tracking-wide uppercase px-2.5 py-1.5 rounded-lg max-w-[160px] leading-tight text-rose-600 bg-rose-50 dark:bg-rose-950/20 dark:text-rose-300">
                                                    {{ reservation.rejectionReason }}
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
                                <span>Showing {{ rejectedReservations.length }} entry{{ rejectedReservations.length === 1 ? '' : 'es' }}</span>
                                <div class="flex items-center gap-1.5">
                                    <button class="p-1 px-2 border border-slate-200 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50 disabled:opacity-50 text-slate-600 dark:text-slate-400" disabled>&lt;</button>
                                    <span class="px-2.5 py-1 font-bold text-white bg-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300 rounded shadow-sm">1</span>
                                    <button class="p-1 px-2 border border-slate-200 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50 disabled:opacity-50 text-slate-600 dark:text-slate-400" disabled>&gt;</button>
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
                                        Reservation <span class="text-slate-400 font-light">#{{ selectedRejectedReservation.reference }}</span>
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
                            <div class="h-12 w-12 bg-[#FAF0E6] dark:bg-amber-950/20 rounded-2xl flex items-center justify-center text-[#A27B5C] dark:text-amber-455 shrink-0 border border-[#A27B5C]/10">
                                <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Total Pending</p>
                                <p class="text-2xl font-bold text-slate-850 dark:text-slate-100 mt-2 leading-none">
                                    {{ paymentSubmissions.length }} <span class="font-serif font-normal text-lg text-slate-500 dark:text-slate-400">Entries</span>
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
                                <p class="text-2xl font-bold text-rose-600 dark:text-rose-455 mt-2 leading-none">
                                    {{ String(paymentSubmissions.filter(s => s.isMissing).length).padStart(2, '0') }} <span class="font-serif font-normal text-lg text-rose-500/80 dark:text-rose-400/80">Flags</span>
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
                                <p class="text-slate-455 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Missing DP</p>
                                <p class="text-2xl font-bold text-rose-600 dark:text-rose-450 mt-2 leading-none">
                                    {{ String(paymentSubmissions.filter(s => s.isMissing).length).padStart(2, '0') }} <span class="font-serif font-normal text-lg text-rose-500/80 dark:text-rose-400/80">Bookings</span>
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
                                <button class="flex items-center gap-1.5 px-3.5 py-2 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-600 dark:text-slate-355 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800 text-xs font-semibold transition cursor-pointer">
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
                                                class="inline-block mt-1 px-1.5 py-0.5 text-[8px] font-extrabold bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-455 rounded-sm tracking-wider uppercase border border-rose-100/30"
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
                                            <div 
                                                v-if="submission.hasProof"
                                                @click="openReceipt(submission.proofUrl)"
                                                class="h-10 w-16 rounded overflow-hidden border border-slate-100 dark:border-slate-800 shadow-sm relative group/thumb cursor-zoom-in"
                                            >
                                                <img 
                                                    :src="submission.proofUrl" 
                                                    class="h-full w-full object-cover transition-transform duration-300 group-hover/thumb:scale-110" 
                                                    alt="Receipt proof"
                                                />
                                            </div>
                                            <span v-else class="text-slate-400 dark:text-slate-500 italic text-[11px]">No Receipt</span>
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
                                                <button 
                                                    @click="verifyPayment(submission)"
                                                    class="px-3 py-1.5 rounded-lg bg-[#0B1E3F] hover:bg-[#152e59] dark:bg-amber-500/10 dark:hover:bg-amber-500/20 dark:text-amber-300 text-white font-bold text-[10px] tracking-wide transition cursor-pointer"
                                                >
                                                    Verify
                                                </button>
                                                <button 
                                                    @click="rejectPayment(submission)"
                                                    class="px-3 py-1.5 rounded-lg border border-rose-200 dark:border-rose-900/50 hover:bg-rose-50/30 text-rose-600 dark:text-rose-455 font-bold text-[10px] tracking-wide transition cursor-pointer"
                                                >
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
                            <span>Showing {{ paymentSubmissions.length }} of {{ paymentSubmissions.length }} pending payments</span>
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
                                <button 
                                    @click="salesTimeframe = 'daily'"
                                    :class="[salesTimeframe === 'daily' ? 'bg-white dark:bg-slate-850 text-slate-850 dark:text-slate-100 shadow-sm' : 'text-slate-500 hover:text-slate-750 dark:text-slate-400 dark:hover:text-slate-200', 'text-xs font-semibold px-3 py-1.5 rounded-lg transition cursor-pointer']"
                                >Daily</button>
                                <button 
                                    @click="salesTimeframe = 'weekly'"
                                    :class="[salesTimeframe === 'weekly' ? 'bg-white dark:bg-slate-850 text-slate-850 dark:text-slate-100 shadow-sm' : 'text-slate-500 hover:text-slate-750 dark:text-slate-400 dark:hover:text-slate-200', 'text-xs font-semibold px-3 py-1.5 rounded-lg transition cursor-pointer']"
                                >Weekly</button>
                                <button 
                                    @click="salesTimeframe = 'monthly'"
                                    :class="[salesTimeframe === 'monthly' ? 'bg-white dark:bg-slate-850 text-slate-850 dark:text-slate-100 shadow-sm' : 'text-slate-500 hover:text-slate-750 dark:text-slate-400 dark:hover:text-slate-200', 'text-xs font-semibold px-3 py-1.5 rounded-lg transition cursor-pointer']"
                                >Monthly</button>
                                <button 
                                    @click="salesTimeframe = 'yearly'"
                                    :class="[salesTimeframe === 'yearly' ? 'bg-white dark:bg-slate-850 text-slate-850 dark:text-slate-100 shadow-sm' : 'text-slate-500 hover:text-slate-750 dark:text-slate-400 dark:hover:text-slate-200', 'text-xs font-semibold px-3 py-1.5 rounded-lg transition cursor-pointer']"
                                >Yearly</button>
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
                                    <span :class="[salesStats.revenue.change >= 0 ? 'text-[#2D5A27] bg-emerald-50 dark:bg-emerald-950/30 dark:text-emerald-300' : 'text-rose-600 bg-rose-50 dark:bg-rose-950/20 dark:text-rose-450', 'text-[9px] px-1.5 py-0.5 rounded font-bold flex items-center gap-0.5']">
                                        <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" :d="salesStats.revenue.change >= 0 ? 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6' : 'M19 13l-7 7-7-7m14-6l-7 7-7-7'" />
                                        </svg>
                                        {{ salesStats.revenue.change >= 0 ? '+' : '' }}{{ salesStats.revenue.change.toFixed(1) }}%
                                    </span>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Total Revenue</p>
                                    <p class="text-2xl font-serif font-bold text-[#0B1E3F] dark:text-amber-300 mt-2">₱{{ salesStats.revenue.value.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}</p>
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
                                    <span :class="[salesStats.bookings.change >= 0 ? 'text-[#2D5A27] bg-emerald-50 dark:bg-emerald-950/30 dark:text-emerald-300' : 'text-rose-600 bg-rose-50 dark:bg-rose-950/20 dark:text-rose-450', 'text-[9px] px-1.5 py-0.5 rounded font-bold flex items-center gap-0.5']">
                                        <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" :d="salesStats.bookings.change >= 0 ? 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6' : 'M19 13l-7 7-7-7m14-6l-7 7-7-7'" />
                                        </svg>
                                        {{ salesStats.bookings.change >= 0 ? '+' : '' }}{{ salesStats.bookings.change.toFixed(1) }}%
                                    </span>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Bookings</p>
                                    <p class="text-2xl font-serif font-bold text-[#0B1E3F] dark:text-amber-300 mt-2">{{ salesStats.bookings.value }}</p>
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
                                    <span :class="[salesStats.approved.change >= 0 ? 'text-[#2D5A27] bg-emerald-50 dark:bg-emerald-950/30 dark:text-emerald-300' : 'text-rose-600 bg-rose-50 dark:bg-rose-950/20 dark:text-rose-450', 'text-[9px] px-1.5 py-0.5 rounded font-bold flex items-center gap-0.5']">
                                        <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" :d="salesStats.approved.change >= 0 ? 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6' : 'M19 13l-7 7-7-7m14-6l-7 7-7-7'" />
                                        </svg>
                                        {{ salesStats.approved.change >= 0 ? '+' : '' }}{{ salesStats.approved.change.toFixed(1) }}%
                                    </span>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Approved</p>
                                    <p class="text-2xl font-serif font-bold text-[#0B1E3F] dark:text-amber-300 mt-2">{{ salesStats.approved.value }}</p>
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
                                    <span :class="[salesStats.occupancy.change >= 0 ? 'text-[#2D5A27] bg-emerald-50 dark:bg-emerald-950/30 dark:text-emerald-300' : 'text-rose-600 bg-rose-50 dark:bg-rose-950/20 dark:text-rose-450', 'text-[9px] px-1.5 py-0.5 rounded font-bold flex items-center gap-0.5']">
                                        <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" :d="salesStats.occupancy.change >= 0 ? 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6' : 'M19 13l-7 7-7-7m14-6l-7 7-7-7'" />
                                        </svg>
                                        {{ salesStats.occupancy.change >= 0 ? '+' : '' }}{{ salesStats.occupancy.change.toFixed(1) }}%
                                    </span>
                                </div>
                                <div class="mt-4">
                                    <p class="text-slate-450 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Occupancy</p>
                                    <p class="text-2xl font-serif font-bold text-[#0B1E3F] dark:text-amber-300 mt-2">{{ salesStats.occupancy.value.toFixed(1) }}%</p>
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
                                <span>Showing {{ recentTransactions.length > 0 ? (salesCurrentPage - 1) * 10 + 1 : 0 }} to {{ Math.min(salesCurrentPage * 10, salesTotalTransactions) }} of {{ salesTotalTransactions }} transaction{{ salesTotalTransactions === 1 ? '' : 's' }}</span>
                                <div class="flex items-center gap-1.5" v-if="salesTotalPages > 1">
                                    <button 
                                        @click="fetchSalesReport(salesCurrentPage - 1)" 
                                        class="p-1 px-2 border border-slate-200 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50 disabled:opacity-50 text-slate-600 dark:text-slate-400 cursor-pointer" 
                                        :disabled="salesCurrentPage === 1"
                                    >&lt;</button>
                                    <template v-for="page in salesTotalPages" :key="page">
                                        <span 
                                            v-if="page === salesCurrentPage" 
                                            class="px-2.5 py-1 font-bold text-white bg-[#0B1E3F] dark:bg-amber-500/20 dark:text-amber-300 rounded shadow-sm"
                                        >{{ page }}</span>
                                        <button 
                                            v-else 
                                            @click="fetchSalesReport(page)" 
                                            class="px-2.5 py-1 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800/50 font-semibold text-slate-700 dark:text-slate-350 cursor-pointer"
                                        >{{ page }}</button>
                                    </template>
                                    <button 
                                        @click="fetchSalesReport(salesCurrentPage + 1)" 
                                        class="p-1 px-2 border border-slate-200 dark:border-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50 cursor-pointer text-slate-600 dark:text-slate-400" 
                                        :disabled="salesCurrentPage === salesTotalPages"
                                    >&gt;</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- TAB: ROOM MANAGEMENT -->
                    <div v-else-if="activeTab === 'room_management'" class="space-y-8 animate-fade-in">
                        
                        <!-- DETAIL VIEW: If selectedRoomDetails is set -->
                        <div v-if="selectedRoomDetails" class="space-y-8 animate-fade-in">
                            <!-- Breadcrumb & Actions Bar -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
                                <div>
                                    <nav class="text-xs text-slate-400 dark:text-slate-550 font-semibold tracking-wider flex items-center gap-1.5 uppercase mb-1">
                                        <a href="#" @click.prevent="selectedRoomDetails = null" class="hover:text-[#0B1E3F] dark:hover:text-amber-500 transition">Room Management</a>
                                        <span class="text-slate-300 dark:text-slate-605">&rsaquo;</span>
                                        <span class="text-slate-600 dark:text-slate-400 font-bold">{{ selectedRoomDetails.name }}</span>
                                    </nav>
                                    <h1 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-3xl font-bold tracking-tight">{{ selectedRoomDetails.name }}</h1>
                                </div>
                                <div class="flex items-center gap-6">
                                    <button 
                                        @click="selectedRoomDetails = null" 
                                        class="flex items-center gap-1.5 text-slate-700 hover:text-[#0B1E3F] dark:text-slate-350 dark:hover:text-amber-500 text-xs font-semibold transition cursor-pointer"
                                    >
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                        </svg>
                                        Return to List
                                    </button>
                                    <button 
                                        v-if="selectedRoomDetails.status === 'available'" 
                                        @click="openOnsiteBookingModal" 
                                        class="flex items-center gap-2 text-slate-700 hover:text-[#0B1E3F] dark:text-slate-350 dark:hover:text-amber-500 text-xs font-semibold transition cursor-pointer"
                                    >
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Onsite Booking
                                    </button>
                                </div>
                            </div>

                            <!-- Two Column Layout Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                                
                                <!-- Left Main Area (Image and Amenities) - 2/3 Columns -->
                                <div class="lg:col-span-2 space-y-8">
                                    <!-- Image Card -->
                                    <div class="relative h-[450px] rounded-[32px] overflow-hidden border border-slate-100 dark:border-slate-800 shadow-sm bg-slate-100 dark:bg-slate-900 group">
                                        <img 
                                            :src="selectedRoomDetails.image_url || 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=800&q=80'" 
                                            class="h-full w-full object-cover transition-transform duration-10000 group-hover:scale-105"
                                            alt="Room Image"
                                        />
                                        <!-- Overlay Badges at Top Left -->
                                        <div class="absolute top-6 left-6 flex items-center gap-3">
                                            <span 
                                                class="px-4 py-1.5 bg-[#0B1E3F]/80 dark:bg-slate-950/80 backdrop-blur-md text-white rounded-full text-xs font-bold shadow-md flex items-center gap-2"
                                            >
                                                <span :class="[
                                                    'h-1.5 w-1.5 rounded-full',
                                                    selectedRoomDetails.status === 'available' ? 'bg-emerald-400' : 'bg-rose-500'
                                                ]"></span>
                                                <span class="capitalize">{{ selectedRoomDetails.status }}</span>
                                            </span>
                                            <span class="px-4 py-1.5 bg-white/95 dark:bg-slate-900/95 text-slate-800 dark:text-slate-200 border border-slate-200/50 dark:border-slate-800 rounded-full text-xs font-bold shadow-md">
                                                {{ selectedRoomDetails.type }} Category
                                            </span>
                                        </div>

                                        <!-- Description Text Overlay at Bottom -->
                                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent p-8 pt-16 flex flex-col justify-end">
                                            <p class="text-white/90 text-sm italic leading-relaxed max-w-2xl font-light">
                                                "{{ selectedRoomDetails.description || 'Experience the ultimate coastal serenity in our flagship ocean-front staycation suite, loaded with premium features.' }}"
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Exclusive Amenities Section -->
                                    <div class="space-y-4">
                                        <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-xl font-bold tracking-tight">Exclusive Amenities</h3>
                                        <div class="flex flex-wrap gap-4">
                                            <!-- Dynamic Amenity Box -->
                                            <div 
                                                v-for="(amenity, idx) in selectedRoomDetails.amenities" 
                                                :key="idx"
                                                class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-5 w-24 h-32 flex flex-col items-center justify-center text-center gap-2.5 shadow-sm hover:shadow-md transition duration-300"
                                            >
                                                <!-- Icon Circle Container -->
                                                <div class="h-11 w-11 bg-[#F0F2F5] dark:bg-slate-800 rounded-full flex items-center justify-center text-slate-700 dark:text-slate-300 border border-slate-200/40 dark:border-slate-700/50 shrink-0">
                                                    <!-- Wifi Icon -->
                                                    <svg v-if="amenity.toLowerCase().includes('wifi') || amenity.toLowerCase().includes('internet')" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071a10.5 10.5 0 0114.14 0M1.34 8.59a16.5 16.5 0 0121.32 0" />
                                                    </svg>
                                                    <!-- Pool Icon -->
                                                    <svg v-else-if="amenity.toLowerCase().includes('pool') || amenity.toLowerCase().includes('swim')" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-9-8v2m0 8v2" />
                                                    </svg>
                                                    <!-- Snowflake (Aircon) -->
                                                    <svg v-else-if="amenity.toLowerCase().includes('air conditioning') || amenity.toLowerCase().includes('aircon') || amenity.toLowerCase().includes('climate')" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M3 12h18m-3-3l-3 3 3 3M6 9l3 3-3 3M9 6l3 3-3 3m6-6l-3 3 3 3" />
                                                    </svg>
                                                    <!-- Cocktail / Fridge (Bar) -->
                                                    <svg v-else-if="amenity.toLowerCase().includes('bar') || amenity.toLowerCase().includes('fridge') || amenity.toLowerCase().includes('refrigerator')" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 22a7 7 0 007-7V4H5v11a7 7 0 007 7z M12 2v2 M9 8h6" />
                                                    </svg>
                                                    <!-- Balcony / Door -->
                                                    <svg v-else-if="amenity.toLowerCase().includes('balcony') || amenity.toLowerCase().includes('terrace') || amenity.toLowerCase().includes('deck')" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1" />
                                                    </svg>
                                                    <!-- Bed -->
                                                    <svg v-else-if="amenity.toLowerCase().includes('bed') || amenity.toLowerCase().includes('king') || amenity.toLowerCase().includes('queen')" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10V19a2 2 0 002 2h14a2 2 0 002-2v-9M3 10V6a2 2 0 012-2h2a2 2 0 012 2v4M13 6a2 2 0 012-2h2a2 2 0 012 2v4M3 10h18" />
                                                    </svg>
                                                    <!-- TV / Screen -->
                                                    <svg v-else-if="amenity.toLowerCase().includes('tv') || amenity.toLowerCase().includes('television') || amenity.toLowerCase().includes('screen')" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 4h10M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z M12 20v-4" />
                                                    </svg>
                                                    <!-- Hot Shower / Bath -->
                                                    <svg v-else-if="amenity.toLowerCase().includes('shower') || amenity.toLowerCase().includes('bath') || amenity.toLowerCase().includes('hot')" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16v2H4z M12 6v10 M12 16a2 2 0 100 4 2 2 0 000-4z" />
                                                    </svg>
                                                    <!-- Default Check -->
                                                    <svg v-else class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <span class="text-[10px] font-bold text-slate-600 dark:text-slate-400 uppercase tracking-wider leading-tight">
                                                    {{ formatAmenityName(amenity) }}
                                                </span>
                                            </div>
                                            <div 
                                                v-if="!selectedRoomDetails.amenities || selectedRoomDetails.amenities.length === 0"
                                                class="text-xs text-slate-400 italic py-2"
                                            >
                                                No exclusive amenities configured for this room.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Column (Specifications & Check-in Details) - 1/3 Column -->
                                <div class="space-y-6">
                                    <!-- Specifications Card -->
                                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm space-y-6">
                                        <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold tracking-tight">Specifications</h3>
                                        
                                        <div class="space-y-4">
                                            <!-- Capacity -->
                                            <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800/50">
                                                <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider">
                                                    <svg class="h-4.5 w-4.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    Capacity
                                                </div>
                                                <span class="text-xs font-bold text-slate-800 dark:text-slate-200">
                                                    {{ selectedRoomDetails.type === 'Couple Room' ? '2-4 Guests' : selectedRoomDetails.type === 'Family Room' ? '4-6 Guests' : '50-100 Guests' }}
                                                </span>
                                            </div>
                                            
                                            <!-- Bed Type -->
                                            <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800/50">
                                                <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider">
                                                    <svg class="h-4.5 w-4.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10V19a2 2 0 002 2h14a2 2 0 002-2v-9M3 10V6a2 2 0 012-2h2a2 2 0 012 2v4M13 6a2 2 0 012-2h2a2 2 0 012 2v4M3 10h18" />
                                                    </svg>
                                                    Bed Type
                                                </div>
                                                <span class="text-xs font-bold text-slate-800 dark:text-slate-200">
                                                    {{ selectedRoomDetails.type === 'Couple Room' ? 'King Size' : selectedRoomDetails.type === 'Family Room' ? '2 Queen Beds' : 'N/A' }}
                                                </span>
                                            </div>
                                            
                                            <!-- Price / Night -->
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider">
                                                    <svg class="h-4.5 w-4.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M12 16V5" />
                                                    </svg>
                                                    Price / Night
                                                </div>
                                                <span class="text-xs font-bold text-slate-800 dark:text-slate-200 font-serif">
                                                    ₱{{ Number(selectedRoomDetails.price).toLocaleString() }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Revenue Month-To-Date (MTD) Panel -->
                                        <div class="bg-[#ECEFF3] dark:bg-slate-800/50 rounded-2xl p-5 space-y-2">
                                            <div class="flex items-center justify-between">
                                                <span class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest leading-none">Revenue (MTD)</span>
                                                <span 
                                                    v-if="selectedRoomDetails.revenue_mtd_change >= 0"
                                                    class="text-[10px] font-bold text-emerald-600"
                                                >
                                                    +{{ selectedRoomDetails.revenue_mtd_change }}%
                                                </span>
                                                <span 
                                                    v-else
                                                    class="text-[10px] font-bold text-rose-600"
                                                >
                                                    {{ selectedRoomDetails.revenue_mtd_change }}%
                                                </span>
                                            </div>
                                            <p class="text-2xl font-bold text-[#0B1E3F] dark:text-slate-100 font-serif leading-none">
                                                ₱{{ Number(selectedRoomDetails.revenue_mtd || 0).toLocaleString() }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Check-in Information Card (Only if room is Occupied) -->
                                    <div 
                                        v-if="selectedRoomDetails.status === 'occupied' && selectedRoomDetails.active_booking"
                                        class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm space-y-5"
                                    >
                                        <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold tracking-tight">Check-in Information</h3>
                                        
                                        <div class="space-y-1">
                                            <p class="text-[9px] font-extrabold text-slate-400 uppercase tracking-widest leading-none mb-0.5">Booking Reference</p>
                                            <p class="text-sm font-extrabold text-slate-800 dark:text-slate-100 tracking-wider">
                                                {{ selectedRoomDetails.active_booking.reference }}
                                            </p>
                                        </div>

                                        <div class="space-y-1">
                                            <p class="text-[9px] font-extrabold text-slate-400 uppercase tracking-widest leading-none mb-1">Guest Details</p>
                                            <p class="text-xs font-bold text-slate-850 dark:text-slate-200">{{ selectedRoomDetails.active_booking.guest_name }}</p>
                                            <p class="text-[11px] text-slate-500 font-medium leading-none">{{ selectedRoomDetails.active_booking.guest_phone }}</p>
                                            <p class="text-[11px] text-slate-500 font-medium leading-none">{{ selectedRoomDetails.active_booking.guest_email }}</p>
                                        </div>

                                        <div class="border-t border-slate-100 dark:border-slate-800/80 pt-4 grid grid-cols-2 gap-4">
                                            <div>
                                                <p class="text-[9px] font-extrabold text-slate-400 uppercase tracking-widest leading-none mb-1">Check-In</p>
                                                <p class="text-[11px] font-bold text-slate-800 dark:text-slate-200 uppercase">{{ formatDate(selectedRoomDetails.active_booking.check_in_date) }}</p>
                                            </div>
                                            <div>
                                                <p class="text-[9px] font-extrabold text-slate-400 uppercase tracking-widest leading-none mb-1">Check-Out</p>
                                                <p class="text-[11px] font-bold text-slate-800 dark:text-slate-200 uppercase">{{ formatDate(selectedRoomDetails.active_booking.check_out_date) }}</p>
                                            </div>
                                        </div>

                                        <div v-if="selectedRoomDetails.active_booking.special_requests" class="border-t border-slate-100 dark:border-slate-800/80 pt-4 space-y-2">
                                            <p class="text-[9px] font-extrabold text-slate-400 uppercase tracking-widest leading-none">Special Requests</p>
                                            <div class="bg-slate-50 dark:bg-slate-950 p-4 rounded-2xl border border-slate-100 dark:border-slate-850">
                                                <p class="text-[11px] text-slate-600 dark:text-slate-400 italic leading-relaxed font-light">
                                                    "{{ selectedRoomDetails.active_booking.special_requests }}"
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- GRID VIEW: If selectedRoomDetails is null -->
                        <div v-else class="space-y-8 animate-fade-in">
                            <!-- Room Management Header -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div>
                                    <h1 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-3xl font-bold tracking-tight">Room Management</h1>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs mt-1 leading-relaxed">
                                        Create, update, and monitor the current occupancy and maintenance statuses of all staycation rooms.
                                    </p>
                                </div>
                                <!-- Add New Room Button -->
                                <button 
                                    v-if="currentUser?.role === 'admin' || currentUser?.role === 'manager'"
                                    @click="showAddRoomModal = true"
                                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] dark:bg-amber-500 dark:hover:bg-amber-600 text-white dark:text-slate-950 font-bold text-xs shadow-md transition cursor-pointer"
                                >
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add New Room
                                </button>
                            </div>

                            <!-- Stats Cards Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                                <!-- Total Rooms -->
                                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4.5">
                                    <div class="h-12 w-12 bg-blue-50 dark:bg-blue-950/20 rounded-2xl flex items-center justify-center text-blue-600 dark:text-blue-400 shrink-0 border border-blue-100 dark:border-blue-900/10">
                                        <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10V19a2 2 0 002 2h14a2 2 0 002-2v-9M3 10V6a2 2 0 012-2h2a2 2 0 012 2v4M13 6a2 2 0 012-2h2a2 2 0 012 2v4M3 10h18" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-slate-455 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Total Rooms</p>
                                        <p class="text-2xl font-bold text-slate-850 dark:text-slate-100 mt-2 leading-none">
                                            {{ roomStats.total }} <span class="font-serif font-normal text-lg text-slate-500 dark:text-slate-400">Rooms</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Occupied Rooms -->
                                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4.5">
                                    <div class="h-12 w-12 bg-rose-50 dark:bg-rose-955/20 rounded-2xl flex items-center justify-center text-rose-500 dark:text-rose-455 shrink-0 border border-rose-100 dark:border-rose-900/10">
                                        <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-slate-455 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Occupied</p>
                                        <p class="text-2xl font-bold text-slate-850 dark:text-slate-100 mt-2 leading-none">
                                            {{ roomStats.occupied }} <span class="font-serif font-normal text-lg text-slate-500 dark:text-slate-400">/ {{ roomStats.occupied_percentage }}%</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Available Rooms -->
                                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4.5">
                                    <div class="h-12 w-12 bg-emerald-50 dark:bg-emerald-950/20 rounded-2xl flex items-center justify-center text-emerald-600 dark:text-emerald-400 shrink-0 border border-emerald-100 dark:border-emerald-900/10">
                                        <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-slate-455 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Available</p>
                                        <p class="text-2xl font-bold text-slate-850 dark:text-slate-100 mt-2 leading-none">
                                            {{ roomStats.available }} <span class="font-serif font-normal text-lg text-slate-500 dark:text-slate-400">Ready</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Maintenance / Service -->
                                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition duration-200 flex items-center gap-4.5">
                                    <div class="h-12 w-12 bg-amber-50 dark:bg-amber-955/20 rounded-2xl flex items-center justify-center text-amber-700 dark:text-amber-500 shrink-0 border border-amber-100 dark:border-amber-900/10">
                                        <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-slate-455 dark:text-slate-500 text-[10px] font-semibold uppercase tracking-wider leading-none">Under Service</p>
                                        <p class="text-2xl font-bold text-slate-850 dark:text-slate-100 mt-2 leading-none">
                                            {{ roomStats.maintenance + roomStats.cleaning }} <span class="font-serif font-normal text-lg text-slate-500 dark:text-slate-400">Rooms</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Search & Filter Controls -->
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white dark:bg-slate-900 border border-slate-50 dark:border-slate-800 rounded-3xl p-4 shadow-sm">
                                <!-- Filter Chips -->
                                <div class="flex flex-wrap items-center gap-2">
                                    <button 
                                        @click="roomFilter = 'all'"
                                        :class="['px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer',
                                                 roomFilter === 'all' ? 'bg-[#0B1E3F] text-white dark:bg-amber-500 dark:text-slate-955' : 'bg-slate-50 dark:bg-slate-800 text-slate-500 hover:text-[#0B1E3F] dark:hover:text-white']"
                                    >
                                        All Rooms ({{ roomStats.total }})
                                    </button>
                                    <button 
                                        @click="roomFilter = 'available'"
                                        :class="['px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer flex items-center gap-1.5',
                                                 roomFilter === 'available' ? 'bg-[#0B1E3F] text-white dark:bg-amber-500 dark:text-slate-955' : 'bg-slate-50 dark:bg-slate-800 text-slate-500 hover:text-slate-800 dark:hover:text-white']"
                                    >
                                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                        Available ({{ roomStats.available }})
                                    </button>
                                    <button 
                                        @click="roomFilter = 'occupied'"
                                        :class="['px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer flex items-center gap-1.5',
                                                 roomFilter === 'occupied' ? 'bg-[#0B1E3F] text-white dark:bg-amber-500 dark:text-slate-955' : 'bg-slate-50 dark:bg-slate-800 text-slate-500 hover:text-slate-800 dark:hover:text-white']"
                                    >
                                        <span class="h-2 w-2 rounded-full bg-rose-500"></span>
                                        Occupied ({{ roomStats.occupied }})
                                    </button>
                                    <button 
                                        @click="roomFilter = 'cleaning'"
                                        :class="['px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer flex items-center gap-1.5',
                                                 roomFilter === 'cleaning' ? 'bg-[#0B1E3F] text-white dark:bg-amber-500 dark:text-slate-955' : 'bg-slate-50 dark:bg-slate-800 text-slate-500 hover:text-slate-800 dark:hover:text-white']"
                                    >
                                        <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                                        Cleaning ({{ roomStats.cleaning }})
                                    </button>
                                    <button 
                                        @click="roomFilter = 'maintenance'"
                                        :class="['px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer flex items-center gap-1.5',
                                                 roomFilter === 'maintenance' ? 'bg-[#0B1E3F] text-white dark:bg-amber-500 dark:text-slate-955' : 'bg-slate-50 dark:bg-slate-800 text-slate-500 hover:text-slate-800 dark:hover:text-white']"
                                    >
                                        <span class="h-2 w-2 rounded-full bg-amber-700"></span>
                                        Maintenance ({{ roomStats.maintenance }})
                                    </button>
                                </div>

                                <!-- Search Bar -->
                                <div class="relative w-full md:w-72">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </span>
                                    <input 
                                        type="text" 
                                        v-model="roomSearchQuery"
                                        placeholder="Search by code, type..." 
                                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-100 dark:bg-slate-800 dark:border-slate-700 focus:outline-none focus:bg-white dark:focus:bg-slate-900 rounded-xl text-xs transition dark:text-slate-100 font-medium"
                                    />
                                </div>
                            </div>

                            <!-- Room Card Grid -->
                            <div v-if="filteredRoomsList.length > 0" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                <div 
                                    v-for="room in filteredRoomsList" 
                                    :key="room.id"
                                    class="group bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col"
                                >
                                    <div class="relative h-48 overflow-hidden bg-slate-100 dark:bg-slate-800">
                                        <img 
                                            :src="room.image_url || 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=800&q=80'" 
                                            class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            alt="Room Image"
                                        />
                                        <span 
                                            :class="[
                                                'absolute top-4 right-4 px-3 py-1 rounded-full text-[10px] font-extrabold tracking-wider uppercase shadow-sm border',
                                                room.status === 'available' ? 'bg-emerald-550/90 text-white border-emerald-450' :
                                                room.status === 'occupied' ? 'bg-rose-550/90 text-white border-rose-450' :
                                                room.status === 'cleaning' ? 'bg-blue-550/90 text-white border-blue-450' :
                                                'bg-amber-700/90 text-white border-amber-600'
                                            ]"
                                        >
                                            {{ room.status }}
                                        </span>
                                    </div>

                                    <div class="p-5 flex-grow flex flex-col justify-between space-y-4">
                                        <div>
                                            <h4 class="font-serif text-slate-900 dark:text-slate-100 text-base font-bold truncate">{{ room.name }}</h4>
                                            <p class="text-slate-400 dark:text-slate-500 text-xs mt-0.5 font-medium">{{ room.type }}</p>
                                            <p class="font-bold text-sm text-[#A27B5C] dark:text-amber-500 mt-2">
                                                ₱{{ Number(room.price).toLocaleString() }}
                                                <span class="text-[10px] text-slate-405 font-normal">/ night</span>
                                            </p>
                                        </div>

                                        <div class="flex items-center gap-2.5 pt-3 border-t border-slate-50 dark:border-slate-800">
                                            <button 
                                                @click="selectedRoomDetails = room"
                                                class="flex-grow py-2 rounded-xl bg-slate-50 hover:bg-slate-100 dark:bg-slate-800/80 dark:hover:bg-slate-700/80 text-slate-700 dark:text-slate-300 font-bold text-[10px] tracking-wide transition cursor-pointer text-center"
                                            >
                                                View Details
                                            </button>
                                            <button 
                                                @click="openEditRoomModal(room)"
                                                class="p-2 rounded-xl bg-slate-50 hover:bg-slate-100 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white transition cursor-pointer"
                                                title="Edit Room"
                                            >
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Empty State -->
                            <div v-else class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-12 text-center shadow-sm space-y-4">
                                <div class="h-16 w-16 bg-slate-50 dark:bg-slate-800 rounded-full flex items-center justify-center text-slate-400 mx-auto">
                                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-lg font-bold">No Rooms Found</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs mt-1 max-w-sm mx-auto leading-relaxed">
                                        We couldn't find any rooms matching your current filter and search query. Try adjusting your settings or add a new room.
                                    </p>
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

    <!-- ========================================================================= -->
    <!-- MODAL: ADD ROOM -->
    <!-- ========================================================================= -->
    <div v-if="showAddRoomModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fade-in">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-950/40" @click="showAddRoomModal = false"></div>
        
        <!-- Modal Body -->
        <div class="relative bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-3xl p-8 shadow-2xl w-[500px] max-w-full animate-fade-in space-y-6">
            <div class="flex items-center justify-between border-b border-slate-50 dark:border-slate-800 pb-4">
                <div>
                    <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-xl font-bold">Add New Room</h3>
                    <p class="text-slate-400 text-[10px] uppercase font-semibold tracking-wider mt-1">Manager Action</p>
                </div>
                <button @click="showAddRoomModal = false" class="p-1 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-400 hover:text-slate-600 transition">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Error message -->
            <div v-if="modalError" class="p-3 text-xs text-rose-600 bg-rose-50 dark:bg-rose-955/20 dark:text-rose-300 rounded-xl border border-rose-100 dark:border-rose-900/30 font-medium">
                {{ modalError }}
            </div>

            <form @submit.prevent="submitAddRoom" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Room Code / Name</label>
                        <input 
                            type="text" 
                            v-model="addRoomForm.name" 
                            placeholder="e.g. Room 101"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            required
                        />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Room Type</label>
                        <select 
                            v-model="addRoomForm.type"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                        >
                            <option value="Couple Room">Couple Room</option>
                            <option value="Family Room">Family Room</option>
                            <option value="Function Hall">Function Hall</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Price per Night (₱)</label>
                        <input 
                            type="number" 
                            v-model="addRoomForm.price" 
                            min="0"
                            step="0.01"
                            placeholder="e.g. 3500"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            required
                        />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Initial Status</label>
                        <select 
                            v-model="addRoomForm.status"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                        >
                            <option value="available">Available</option>
                            <option value="occupied">Occupied</option>
                            <option value="cleaning">Cleaning</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Image URL</label>
                    <input 
                        type="url" 
                        v-model="addRoomForm.image_url" 
                        placeholder="https://example.com/image.jpg"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Amenities (Comma separated)</label>
                    <input 
                        type="text" 
                        v-model="addRoomForm.amenities" 
                        placeholder="e.g. WiFi, King Bed, TV, Aircon"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Description</label>
                    <textarea 
                        v-model="addRoomForm.description" 
                        placeholder="Describe the room layout, views, etc."
                        rows="3"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100 resize-none"
                    ></textarea>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-slate-50 dark:border-slate-800">
                    <button 
                        type="button" 
                        @click="showAddRoomModal = false"
                        class="flex-grow py-3 px-4 rounded-xl border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 text-xs font-semibold tracking-wide transition cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit"
                        :disabled="modalSubmitting"
                        class="flex-grow py-3 px-4 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] dark:bg-amber-500 dark:hover:bg-amber-600 dark:text-slate-950 text-white text-xs font-semibold tracking-wide transition shadow-md disabled:opacity-60 cursor-pointer"
                    >
                        <span v-if="modalSubmitting">Creating...</span>
                        <span v-else>Create Room</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- MODAL: EDIT ROOM -->
    <!-- ========================================================================= -->
    <div v-if="showEditRoomModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fade-in">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-950/40" @click="showEditRoomModal = false"></div>
        
        <!-- Modal Body -->
        <div class="relative bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-3xl p-8 shadow-2xl w-[500px] max-w-full animate-fade-in space-y-6">
            <div class="flex items-center justify-between border-b border-slate-50 dark:border-slate-800 pb-4">
                <div>
                    <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-xl font-bold">Edit Room Details</h3>
                    <p class="text-slate-400 text-[10px] uppercase font-semibold tracking-wider mt-1">Room Action</p>
                </div>
                <button @click="showEditRoomModal = false" class="p-1 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-400 hover:text-slate-600 transition">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Error message -->
            <div v-if="modalError" class="p-3 text-xs text-rose-600 bg-rose-50 dark:bg-rose-955/20 dark:text-rose-300 rounded-xl border border-rose-100 dark:border-rose-900/30 font-medium">
                {{ modalError }}
            </div>

            <form @submit.prevent="submitEditRoom" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Room Code / Name</label>
                        <input 
                            type="text" 
                            v-model="editRoomForm.name" 
                            placeholder="e.g. Room 101"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            required
                            :disabled="currentUser?.role === 'staff'"
                        />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Room Type</label>
                        <select 
                            v-model="editRoomForm.type"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            :disabled="currentUser?.role === 'staff'"
                        >
                            <option value="Couple Room">Couple Room</option>
                            <option value="Family Room">Family Room</option>
                            <option value="Function Hall">Function Hall</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Price per Night (₱)</label>
                        <input 
                            type="number" 
                            v-model="editRoomForm.price" 
                            min="0"
                            step="0.01"
                            placeholder="e.g. 3500"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            required
                            :disabled="currentUser?.role === 'staff'"
                        />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Room Status</label>
                        <select 
                            v-model="editRoomForm.status"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                        >
                            <option value="available">Available</option>
                            <option value="occupied">Occupied</option>
                            <option value="cleaning">Cleaning</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Image URL</label>
                    <input 
                        type="url" 
                        v-model="editRoomForm.image_url" 
                        placeholder="https://example.com/image.jpg"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                        :disabled="currentUser?.role === 'staff'"
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Amenities (Comma separated)</label>
                    <input 
                        type="text" 
                        v-model="editRoomForm.amenities" 
                        placeholder="e.g. WiFi, King Bed, TV, Aircon"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                        :disabled="currentUser?.role === 'staff'"
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Description</label>
                    <textarea 
                        v-model="editRoomForm.description" 
                        placeholder="Describe the room layout, views, etc."
                        rows="3"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100 resize-none"
                        :disabled="currentUser?.role === 'staff'"
                    ></textarea>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-slate-50 dark:border-slate-800">
                    <button 
                        type="button" 
                        @click="showEditRoomModal = false"
                        class="flex-grow py-3 px-4 rounded-xl border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 text-xs font-semibold tracking-wide transition cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit"
                        :disabled="modalSubmitting"
                        class="flex-grow py-3 px-4 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] dark:bg-amber-500 dark:hover:bg-amber-600 dark:text-slate-950 text-white text-xs font-semibold tracking-wide transition shadow-md disabled:opacity-60 cursor-pointer"
                    >
                        <span v-if="modalSubmitting">Saving...</span>
                        <span v-else>Save Changes</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- MODAL: ONSITE BOOKING -->
    <!-- ========================================================================= -->
    <div v-if="showOnsiteBookingModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fade-in">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-950/40" @click="showOnsiteBookingModal = false"></div>
        
        <!-- Modal Body -->
        <div class="relative bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-3xl p-8 shadow-2xl w-[520px] max-w-full animate-fade-in space-y-6 max-h-[95vh] overflow-y-auto">
            <div class="flex items-center justify-between border-b border-slate-50 dark:border-slate-800 pb-4">
                <div>
                    <h3 class="font-serif text-[#0b1c3d] dark:text-slate-100 text-xl font-bold">Onsite Booking</h3>
                    <p class="text-[#A27B5C] dark:text-amber-500 text-[10px] uppercase font-semibold tracking-wider mt-1">{{ selectedRoomDetails?.name }} ({{ selectedRoomDetails?.type }})</p>
                </div>
                <button @click="showOnsiteBookingModal = false" class="p-1 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-400 hover:text-slate-600 transition">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Error message -->
            <div v-if="modalError" class="p-3 text-xs text-rose-600 bg-rose-50 dark:bg-rose-955/20 dark:text-rose-300 rounded-xl border border-rose-100 dark:border-rose-900/30 font-medium">
                {{ modalError }}
            </div>

            <form @submit.prevent="submitOnsiteBooking" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Guest Name</label>
                    <input 
                        type="text" 
                        v-model="onsiteBookingForm.guest_name" 
                        placeholder="e.g. Juan Dela Cruz"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                        required
                    />
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Email Address</label>
                        <input 
                            type="email" 
                            v-model="onsiteBookingForm.guest_email" 
                            placeholder="guest@example.com"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            required
                        />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Phone Number</label>
                        <input 
                            type="text" 
                            v-model="onsiteBookingForm.guest_phone" 
                            placeholder="e.g. +63 912 345 6789"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            required
                        />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Check-in Date</label>
                        <input 
                            type="date" 
                            v-model="onsiteBookingForm.check_in_date" 
                            :min="getTodayStr()"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            required
                        />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Check-out Date</label>
                        <input 
                            type="date" 
                            v-model="onsiteBookingForm.check_out_date" 
                            :min="getMinCheckOutDate"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            required
                        />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Number of Guests</label>
                        <input 
                            type="number" 
                            v-model="onsiteBookingForm.guests_count" 
                            min="1"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100"
                            required
                        />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Payment Option</label>
                        <div class="px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-xs font-bold text-slate-800 dark:text-slate-200 flex items-center gap-1.5">
                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                            Cash Payment
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Special Requests</label>
                    <textarea 
                        v-model="onsiteBookingForm.special_requests" 
                        placeholder="e.g. Anniversary setup, extra towels..."
                        rows="2"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-[#0B1E3F] focus:ring-1 focus:ring-[#0B1E3F] bg-white dark:bg-slate-800 text-sm transition dark:text-slate-100 resize-none"
                    ></textarea>
                </div>

                <!-- Booking Summary -->
                <div class="bg-[#FAF9F6] dark:bg-slate-950 p-5 rounded-2xl border border-slate-100 dark:border-slate-850 space-y-2.5">
                    <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest leading-none">Booking Summary</p>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-slate-500 dark:text-slate-400">Rate per Night</span>
                        <span class="font-semibold text-slate-800 dark:text-slate-200">₱{{ Number(selectedRoomDetails?.price || 0).toLocaleString() }}</span>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-slate-500 dark:text-slate-400">Duration of Stay</span>
                        <span class="font-bold text-[#A27B5C] dark:text-amber-500">
                            {{ onsiteBookingNights }} {{ onsiteBookingNights === 1 ? 'Night' : 'Nights' }}
                        </span>
                    </div>
                    <div class="border-t border-slate-200/50 dark:border-slate-800 pt-2.5 flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-700 dark:text-slate-350">Total Booking Price</span>
                        <span class="text-lg font-bold text-[#0B1E3F] dark:text-amber-500 font-serif">
                            ₱{{ Number(onsiteBookingTotalPrice).toLocaleString() }}
                        </span>
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-slate-50 dark:border-slate-800">
                    <button 
                        type="button" 
                        @click="showOnsiteBookingModal = false"
                        class="flex-grow py-3 px-4 rounded-xl border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 text-xs font-semibold tracking-wide transition cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit"
                        :disabled="modalSubmitting || onsiteBookingNights <= 0"
                        class="flex-grow py-3 px-4 rounded-xl bg-[#0B1E3F] hover:bg-[#152e59] dark:bg-amber-500 dark:hover:bg-amber-600 dark:text-slate-950 text-white text-xs font-semibold tracking-wide transition shadow-md disabled:opacity-60 cursor-pointer"
                    >
                        <span v-if="modalSubmitting">Booking...</span>
                        <span v-else>Confirm Booking</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Receipt Preview Modal -->
    <div v-if="showReceiptModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fade-in" @click.self="showReceiptModal = false">
        <div class="relative max-w-lg w-full bg-white dark:bg-slate-900 rounded-[32px] overflow-hidden shadow-2xl p-6 border border-slate-100 dark:border-slate-850 animate-scale-in">
            <!-- Close Button -->
            <button @click="showReceiptModal = false" class="absolute top-4 right-4 p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-400 hover:text-slate-650 dark:hover:text-slate-355 transition cursor-pointer">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h3 class="font-serif text-lg font-bold text-[#0b1c3d] dark:text-slate-100 mb-4 pr-10">Receipt Proof</h3>
            <div class="rounded-2xl overflow-hidden border border-slate-100 dark:border-slate-850 bg-slate-50 dark:bg-slate-950 flex items-center justify-center max-h-[70vh]">
                <img :src="activeReceiptUrl" class="max-w-full max-h-[60vh] object-contain" alt="Receipt proof large" />
            </div>
        </div>
    </div>

    <!-- Custom Modal/Alert dialog -->
    <div v-if="customAlert.show" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fade-in" @click.self="handleCustomCancel">
        <div class="relative max-w-md w-full bg-white dark:bg-slate-900 rounded-[32px] overflow-hidden shadow-2xl p-8 border border-slate-100 dark:border-slate-850 animate-scale-in space-y-6">
            
            <!-- Close Button -->
            <button @click="handleCustomCancel" class="absolute top-4 right-4 p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-400 hover:text-slate-650 dark:hover:text-slate-355 transition cursor-pointer">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Icon Header -->
            <div class="flex flex-col items-center text-center space-y-3">
                <!-- Success Icon -->
                <div v-if="customAlert.type === 'success'" class="h-16 w-16 bg-emerald-50 dark:bg-emerald-950/30 text-emerald-600 dark:text-emerald-400 rounded-full flex items-center justify-center border border-emerald-100 dark:border-emerald-900/20">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <!-- Confirm Icon -->
                <div v-else-if="customAlert.type === 'confirm'" class="h-16 w-16 bg-blue-50 dark:bg-blue-950/30 text-blue-600 dark:text-blue-400 rounded-full flex items-center justify-center border border-blue-100 dark:border-blue-900/20">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <!-- Prompt Icon -->
                <div v-else-if="customAlert.type === 'prompt'" class="h-16 w-16 bg-rose-50 dark:bg-rose-955/20 text-rose-600 dark:text-rose-455 rounded-full flex items-center justify-center border border-rose-100 dark:border-rose-900/30">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <!-- Default Info/Error Icon -->
                <div v-else class="h-16 w-16 bg-rose-50 dark:bg-rose-955/20 text-rose-600 dark:text-rose-455 rounded-full flex items-center justify-center border border-rose-100 dark:border-rose-900/30">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>

                <h3 class="font-serif text-2xl font-bold text-[#0b1c3d] dark:text-slate-100 pt-2">{{ customAlert.title }}</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-light leading-relaxed px-2">{{ customAlert.message }}</p>
            </div>

            <!-- Booking Success Specific Fields -->
            <div v-if="customAlert.type === 'success' && customAlert.reference" class="bg-[#FAF9F6] dark:bg-slate-950 p-5 rounded-2xl border border-slate-100 dark:border-slate-855 space-y-3.5">
                <div class="flex items-center justify-between text-xs border-b border-slate-200/50 dark:border-slate-800 pb-2.5">
                    <span class="text-slate-400 font-semibold uppercase tracking-wider">Guest Name</span>
                    <span class="font-bold text-[#0b1c3d] dark:text-slate-200">{{ customAlert.guestName }}</span>
                </div>
                <div class="flex items-center justify-between text-xs">
                    <span class="text-slate-400 font-semibold uppercase tracking-wider">Booking Reference</span>
                    <div class="flex items-center gap-2">
                        <span class="font-extrabold text-[#A27B5C] dark:text-amber-300 text-sm tracking-wider">{{ customAlert.reference }}</span>
                    </div>
                </div>
            </div>

            <!-- Rejection Prompt Input Field -->
            <div v-if="customAlert.type === 'prompt'" class="space-y-1.5">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Reason for Rejection</label>
                <input 
                    type="text" 
                    v-model="customAlert.inputValue"
                    :placeholder="customAlert.inputPlaceholder"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#0B1E3F] bg-white text-xs font-semibold transition"
                    required
                />
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4">
                <button 
                    v-if="customAlert.type === 'confirm' || customAlert.type === 'prompt'"
                    type="button"
                    @click="handleCustomCancel"
                    class="flex-grow py-3.5 px-4 rounded-2xl border border-slate-200 hover:bg-slate-50 text-slate-500 text-xs font-bold tracking-wider uppercase transition cursor-pointer"
                >
                    Cancel
                </button>
                <button 
                    type="button"
                    @click="handleCustomConfirm"
                    class="flex-grow py-3.5 px-4 rounded-2xl bg-[#0B1E3F] hover:bg-[#152e59] text-white text-xs font-bold tracking-wider uppercase transition shadow-md cursor-pointer"
                >
                    {{ customAlert.type === 'confirm' ? 'Confirm' : customAlert.type === 'prompt' ? 'Reject Booking' : 'Continue' }}
                </button>
            </div>

        </div>
    </div>
</main>
</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted, watch, computed } from 'vue'
import axiosInstance from 'axios'

const currentView = ref('selection')
const logoError = ref(false)
const showPassword = ref(false)
const loginError = ref('')
const isSubmitting = ref(false)
const currentUser = ref(null)

const dbRooms = ref([
    {
        name: 'Couple Room 1',
        type: 'Couple Room',
        price: 2500.00,
        description: 'A cozy retreat designed for couples, featuring a king-size bed, warm ambient lighting, and modern amenities.',
        image_url: 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=800&q=80',
        amenities: ['King Bed', 'High-speed WiFi', 'Flat-screen TV', 'Air Conditioning', 'Private Bathroom', 'Mini Fridge']
    },
    {
        name: 'Family Room 1',
        type: 'Family Room',
        price: 4500.00,
        description: 'Spacious and elegant accommodation for families, featuring two queen-size beds, a lounge area, and garden views.',
        image_url: 'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=800&q=80',
        amenities: ['2 Queen Beds', 'High-speed WiFi', 'Smart TV', 'Air Conditioning', 'Refrigerator', 'Hot Shower', 'Balcony']
    },
    {
        name: 'Function Hall',
        type: 'Function Hall',
        price: 5000.00,
        description: 'A grand and versatile event venue perfect for conferences, weddings, celebrations, or workshops. Customizable seating layout.',
        image_url: 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=800&q=80',
        amenities: ['Premium Sound System', 'HD Projector & Screen', 'High-speed WiFi', 'Air Conditioning', 'Dedicated Restrooms', 'Custom Seating Layout']
    }
])

const fetchRooms = async () => {
    try {
        const response = await axiosInstance.get('/api/rooms')
        if (response.data && response.data.success) {
            dbRooms.value = response.data.rooms
        }
    } catch (e) {
        console.error('Failed to fetch rooms from database:', e)
    }
}

const roomChoices = computed(() => {
    const unique = {}
    dbRooms.value.forEach(room => {
        if (!unique[room.type]) {
            let parsedAmenities = room.amenities
            if (typeof parsedAmenities === 'string') {
                try {
                    parsedAmenities = JSON.parse(parsedAmenities)
                } catch (e) {
                    parsedAmenities = []
                }
            }
            unique[room.type] = {
                ...room,
                amenities: parsedAmenities || []
            }
        }
    })
    return Object.values(unique)
})


const selectedRoomToBook = ref(null)
const bookingForm = reactive({
    name: '',
    phone: '',
    email: '',
    guests: '2',
    specialRequests: ''
})
const currentBookingStep = ref(1)

const bookingRefInput = ref('')
const bookingEmailInput = ref('')
const retrievedBooking = ref(null)

const receiptFile = ref(null)
const receiptPreviewUrl = ref('')
const cashSecuringMethod = ref('card')

const handleReceiptUpload = (e) => {
    const file = e.target.files[0]
    if (file) {
        receiptFile.value = file
        receiptPreviewUrl.value = URL.createObjectURL(file)
    }
}

const bookingsList = ref([
    {
        reference: 'AS-88209',
        currencySymbol: 'PHP ',
        name: 'Julian Rivera',
        email: 'julian.rivera@example.com',
        phone: '+63 917 123 4567',
        checkIn: 'Nov 14, 2024',
        checkInTime: 'From 2:00 PM',
        checkOut: 'Nov 18, 2024',
        checkOutTime: 'Until 12:00 PM',
        guests: '2 Adults, 1 Child',
        roomType: 'Beachfront Villa',
        roomDetails: 'Villa Area, Beachfront',
        roomImage: 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=800&q=80',
        nights: 4,
        nightlyRate: 12000.00,
        subtotal: 48000.00,
        serviceFee: 4800.00,
        localTaxes: 5760.00,
        totalPrice: 58560.00,
        paymentCard: 'Card ending in **** 4429',
        transactionId: 'TR-991204',
        specialRequests: 'We are celebrating our 5th wedding anniversary during this stay. If possible, we would love a room with a direct sunset view and perhaps some swan towel art on arrival. Also, please ensure the airport shuttle is aware of our late arrival at 11:30 PM.',
        amenities: ['High-Speed WiFi', 'Private Infinity Pool', 'Daily Breakfast'],
        status: 'PAID'
    }
])

const handleRetrieveBooking = async () => {
    const refVal = bookingRefInput.value.trim().toUpperCase()
    const emailVal = bookingEmailInput.value.trim().toLowerCase()
    if (!refVal || !emailVal) {
        showCustomAlert({
            title: 'Fields Required',
            message: 'Please enter both your Booking Reference Number and Email Address.',
            type: 'error'
        })
        return
    }
    
    try {
        const response = await axiosInstance.get(`/api/bookings/${refVal}`, {
            params: { email: emailVal }
        })
        
        if (response.data.success) {
            const b = response.data.booking
            
            const checkInFormatted = formatDateString(b.check_in_date)
            const checkOutFormatted = formatDateString(b.check_out_date)
            
            let cardEnd = 'Credit Card'
            if (b.payment_method === 'credit_card') {
                cardEnd = `Card ending in **** ${b.card_last_four || '4429'}`
            } else if (b.payment_method === 'gcash') {
                cardEnd = 'GCash Mobile Wallet (Paid)'
            } else {
                cardEnd = `Cash Down Payment (Secured by ${b.cash_securing_method === 'gcash' ? 'GCash' : 'Card'})`
            }
            
            let displayRoomName = b.room ? b.room.name : (b.room_type || 'Beachfront Villa')
            let displayRoomImage = b.room && b.room.image_url ? b.room.image_url : '/images/staycation_hero.png'
            
            retrievedBooking.value = {
                reference: b.reference,
                currencySymbol: 'PHP ',
                name: b.guest_name,
                email: b.guest_email,
                phone: b.guest_phone,
                checkIn: checkInFormatted,
                checkInTime: b.check_in_time || 'From 2:00 PM',
                checkOut: checkOutFormatted,
                checkOutTime: b.check_out_time || 'Before 11:00 AM',
                guests: `${b.guests_count} Guests`,
                roomType: displayRoomName,
                roomDetails: displayRoomName.includes('Garden') || displayRoomName.includes('Family') ? 'Building B, Floor 4' : 'Villa Area, Beachfront',
                roomImage: displayRoomImage,
                nights: b.nights_count,
                nightlyRate: b.room ? parseFloat(b.room.price) : 12000,
                subtotal: parseFloat(b.total_price),
                serviceFee: 0,
                localTaxes: 0,
                totalPrice: parseFloat(b.total_price),
                paymentCard: cardEnd,
                transactionId: `TR-${b.id}`,
                specialRequests: b.special_requests || 'None',
                amenities: ['High-Speed WiFi', 'Private Infinity Pool', 'Daily Breakfast', 'Welcome Drinks'],
                status: b.status
            }
        }
    } catch (e) {
        console.error('Failed to retrieve booking:', e)
        showCustomAlert({
            title: 'Retrieve Failed',
            message: e.response?.data?.message || 'Booking reference not found or email address does not match.',
            type: 'error'
        })
    }
}

const shareReservation = (ref) => {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(window.location.origin + '/bookings/' + ref)
            .then(() => {
                showCustomAlert({
                    title: 'Link Copied',
                    message: `Booking details link copied to clipboard for reference: ${ref}`,
                    type: 'success'
                })
            })
            .catch(() => {
                showCustomAlert({
                    title: 'Booking Info',
                    message: `Booking reference code: ${ref}`,
                    type: 'success'
                })
            })
    } else {
        showCustomAlert({
            title: 'Booking Info',
            message: `Booking reference code: ${ref}`,
            type: 'success'
        })
    }
}

const downloadInvoice = (ref) => {
    showCustomAlert({
        title: 'Invoice Request',
        message: `Generating invoice for reservation ${ref}...\nYour download will begin shortly in PDF format.`,
        type: 'success'
    })
}

const formatDateString = (dateStr) => {
    try {
        if (!dateStr) return ''
        const d = new Date(dateStr)
        if (isNaN(d.getTime())) return dateStr
        const options = { month: 'short', day: 'numeric', year: 'numeric' }
        return d.toLocaleDateString('en-US', options)
    } catch (e) {
        return dateStr
    }
}

const getPhilippineDate = () => {
    const now = new Date()
    const utc = now.getTime() + (now.getTimezoneOffset() * 60000)
    const phOffset = 8
    return new Date(utc + (3600000 * phOffset))
}

const getTodayStr = () => {
    const d = getPhilippineDate()
    const yyyy = d.getFullYear()
    const mm = String(d.getMonth() + 1).padStart(2, '0')
    const dd = String(d.getDate()).padStart(2, '0')
    return `${yyyy}-${mm}-${dd}`
}

const getTomorrowStr = () => {
    const d = getPhilippineDate()
    d.setDate(d.getDate() + 1)
    const yyyy = d.getFullYear()
    const mm = String(d.getMonth() + 1).padStart(2, '0')
    const dd = String(d.getDate()).padStart(2, '0')
    return `${yyyy}-${mm}-${dd}`
}

const checkInDate = ref(getTodayStr())
const checkOutDate = ref(getTomorrowStr())
const checkInWindow = ref('02:00 PM - 04:00 PM')
const paymentMethod = ref('credit_card')
const cardForm = reactive({
    number: '',
    expiry: '',
    cvv: ''
})

const bookingNights = computed(() => {
    if (!checkInDate.value || !checkOutDate.value) return 0
    const start = new Date(checkInDate.value)
    const end = new Date(checkOutDate.value)
    const diff = end - start
    if (diff <= 0) return 0
    return Math.ceil(diff / (1000 * 60 * 60 * 24))
})

const formattedCheckIn = computed(() => {
    if (!checkInDate.value) return ''
    const d = new Date(checkInDate.value)
    return d.toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' })
})

const formattedCheckOut = computed(() => {
    if (!checkOutDate.value) return ''
    const d = new Date(checkOutDate.value)
    return d.toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' })
})

const formatPrice = (value) => {
    return Number(value).toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 })
}

const bookingCalculations = computed(() => {
    if (!selectedRoomToBook.value) return null
    const rate = parseFloat(selectedRoomToBook.value.price) || 2500
    const nights = bookingNights.value
    const baseTotal = rate * nights
    const taxesAndFees = 0
    const discount = 0
    const totalPrice = baseTotal
    
    // Cash-at-Property requires a 30% down payment; others are 100% full payment
    const downPaymentPercent = paymentMethod.value === 'cash_at_property' ? 0.30 : 1.00
    const downPayment = totalPrice * downPaymentPercent
    const remainingBalance = totalPrice - downPayment
    
    return {
        rate,
        nights,
        baseTotal,
        taxesAndFees,
        discount,
        totalPrice,
        downPayment,
        remainingBalance
    }
})


const todayDateObj = getPhilippineDate()
const currentCalendarMonth = ref(todayDateObj.getMonth())
const currentCalendarYear = ref(todayDateObj.getFullYear())

const monthNames = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
]

const currentMonthName = computed(() => {
    return monthNames[currentCalendarMonth.value]
})

const prevMonth = () => {
    currentCalendarMonth.value--
    if (currentCalendarMonth.value < 0) {
        currentCalendarMonth.value = 11
        currentCalendarYear.value--
    }
}

const nextMonth = () => {
    currentCalendarMonth.value++
    if (currentCalendarMonth.value > 11) {
        currentCalendarMonth.value = 0
        currentCalendarYear.value++
    }
}

const isPastDay = (dayObj) => {
    const today = getPhilippineDate()
    today.setHours(0, 0, 0, 0)
    const dayDate = new Date(dayObj.year, dayObj.month - 1, dayObj.day)
    return dayDate.getTime() < today.getTime()
}

const calendarDays = computed(() => {
    const year = currentCalendarYear.value
    const month = currentCalendarMonth.value
    
    const firstDay = new Date(year, month, 1)
    const startDayOfWeek = firstDay.getDay()
    
    const totalDays = new Date(year, month + 1, 0).getDate()
    const prevMonthDays = new Date(year, month, 0).getDate()
    
    const days = []
    
    for (let i = startDayOfWeek - 1; i >= 0; i--) {
        const d = prevMonthDays - i
        let pm = month - 1
        let py = year
        if (pm < 0) {
            pm = 11
            py = year - 1
        }
        days.push({ day: d, month: pm + 1, year: py, isCurrentMonth: false })
    }
    
    for (let i = 1; i <= totalDays; i++) {
        days.push({ day: i, month: month + 1, year: year, isCurrentMonth: true })
    }
    
    const totalCells = Math.ceil(days.length / 7) * 7
    const nextPadding = totalCells - days.length
    for (let i = 1; i <= nextPadding; i++) {
        let nm = month + 1
        let ny = year
        if (nm > 11) {
            nm = 0
            ny = year + 1
        }
        days.push({ day: i, month: nm + 1, year: ny, isCurrentMonth: false })
    }
    
    return days
})

const isCheckInDay = (dayObj) => {
    const dateStr = `${dayObj.year}-${String(dayObj.month).padStart(2, '0')}-${String(dayObj.day).padStart(2, '0')}`
    return dateStr === checkInDate.value
}

const isCheckOutDay = (dayObj) => {
    const dateStr = `${dayObj.year}-${String(dayObj.month).padStart(2, '0')}-${String(dayObj.day).padStart(2, '0')}`
    return dateStr === checkOutDate.value
}

const isDayInRange = (dayObj) => {
    if (!checkInDate.value || !checkOutDate.value) return false
    const dateStr = `${dayObj.year}-${String(dayObj.month).padStart(2, '0')}-${String(dayObj.day).padStart(2, '0')}`
    return dateStr > checkInDate.value && dateStr < checkOutDate.value
}

const handleCalendarDayClick = (dayObj) => {
    if (isPastDay(dayObj)) {
        showCustomAlert({
            title: 'Invalid Date',
            message: 'You cannot select a date in the past.',
            type: 'error'
        })
        return
    }
    const dateStr = `${dayObj.year}-${String(dayObj.month).padStart(2, '0')}-${String(dayObj.day).padStart(2, '0')}`
    if (!checkInDate.value || (checkInDate.value && checkOutDate.value)) {
        checkInDate.value = dateStr
        checkOutDate.value = ''
    } else {
        const checkInTime = new Date(checkInDate.value).getTime()
        const clickTime = new Date(dateStr).getTime()
        if (clickTime <= checkInTime) {
            checkInDate.value = dateStr
        } else {
            checkOutDate.value = dateStr
        }
    }
}

const scrollToSection = (id) => {
    const el = document.getElementById(id)
    if (el) {
        el.scrollIntoView({ behavior: 'smooth' })
    }
}

const startBooking = (roomName, roomImage, roomPrice) => {
    selectedRoomToBook.value = { name: roomName, image: roomImage, price: parseFloat(roomPrice) }
    bookingForm.name = ''
    bookingForm.phone = ''
    bookingForm.email = ''
    bookingForm.guests = '2'
    bookingForm.specialRequests = ''
    checkInDate.value = getTodayStr()
    checkOutDate.value = getTomorrowStr()
    checkInWindow.value = '12:00 PM'
    paymentMethod.value = 'credit_card'
    cardForm.number = ''
    cardForm.expiry = ''
    cardForm.cvv = ''
    currentBookingStep.value = 1
    currentView.value = 'booking'
}

const goToPaymentStep = () => {
    if (!checkInDate.value || !checkOutDate.value) {
        showCustomAlert({
            title: 'Dates Required',
            message: 'Please select both Check-in and Check-out dates on the calendar before proceeding.',
            type: 'error'
        })
        return
    }
    currentBookingStep.value = 3
}


const submitBookingSimulated = async () => {
    isSubmitting.value = true
    try {
        const formData = new FormData()
        formData.append('guest_name', bookingForm.name)
        formData.append('guest_email', bookingForm.email)
        formData.append('guest_phone', bookingForm.phone)
        formData.append('guests_count', parseInt(bookingForm.guests))
        
        const roomType = selectedRoomToBook.value?.name || 'Couple Room'
        formData.append('room_type', roomType)
        
        formData.append('check_in_date', checkInDate.value)
        formData.append('check_out_date', checkOutDate.value)
        formData.append('payment_method', paymentMethod.value)
        
        if (paymentMethod.value === 'credit_card') {
            const num = cardForm.number.trim()
            const last4 = num ? num.slice(-4) : '4429'
            formData.append('card_last_four', last4)
        } else if (paymentMethod.value === 'gcash') {
            if (receiptFile.value) {
                formData.append('receipt', receiptFile.value)
            }
        } else if (paymentMethod.value === 'cash_at_property') {
            formData.append('cash_securing_method', cashSecuringMethod.value)
            if (cashSecuringMethod.value === 'gcash' && receiptFile.value) {
                formData.append('receipt', receiptFile.value)
            } else if (cashSecuringMethod.value === 'card') {
                const num = cardForm.number.trim()
                const last4 = num ? num.slice(-4) : '4429'
                formData.append('card_last_four', last4)
            }
        }
        
        // Add special requests if any
        if (bookingForm.specialRequests) {
            formData.append('special_requests', bookingForm.specialRequests)
        }
        
        const response = await axiosInstance.post('/api/bookings', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        
        if (response.data.success) {
            const b = response.data.booking
            
            // Reset fields function
            const resetBookingFields = () => {
                bookingForm.name = ''
                bookingForm.phone = ''
                bookingForm.email = ''
                bookingForm.guests = '2'
                bookingForm.specialRequests = ''
                receiptFile.value = null
                receiptPreviewUrl.value = ''
            }
            
            showCustomAlert({
                title: 'Sanctuary Reserved',
                message: 'Your tropical getaway request has been successfully created. We are waiting to verify your payment.',
                type: 'success',
                guestName: b.guest_name,
                reference: b.reference,
                onConfirm: () => {
                    const checkInFormatted = formatDateString(b.check_in_date)
                    const checkOutFormatted = formatDateString(b.check_out_date)
                    
                    let cardEnd = 'Credit Card'
                    if (b.payment_method === 'credit_card') {
                        cardEnd = `Card ending in **** ${b.card_last_four || '4429'}`
                    } else if (b.payment_method === 'gcash') {
                        cardEnd = 'GCash Mobile Wallet (Paid)'
                    } else {
                        cardEnd = `Cash Down Payment (Secured by ${b.cash_securing_method === 'gcash' ? 'GCash' : 'Card'})`
                    }
                    
                    let displayRoomName = b.room ? b.room.name : (b.room_type || 'Beachfront Villa')
                    let displayRoomImage = b.room && b.room.image_url ? b.room.image_url : '/images/staycation_hero.png'
                    
                    retrievedBooking.value = {
                        reference: b.reference,
                        currencySymbol: 'PHP ',
                        name: b.guest_name,
                        email: b.guest_email,
                        phone: b.guest_phone,
                        checkIn: checkInFormatted,
                        checkInTime: b.check_in_time || 'From 2:00 PM',
                        checkOut: checkOutFormatted,
                        checkOutTime: b.check_out_time || 'Before 11:00 AM',
                        guests: `${b.guests_count} Guests`,
                        roomType: displayRoomName,
                        roomDetails: displayRoomName.includes('Garden') || displayRoomName.includes('Family') ? 'Building B, Floor 4' : 'Villa Area, Beachfront',
                        roomImage: displayRoomImage,
                        nights: b.nights_count,
                        nightlyRate: b.room ? parseFloat(b.room.price) : 12000,
                        subtotal: parseFloat(b.total_price),
                        serviceFee: 0,
                        localTaxes: 0,
                        totalPrice: parseFloat(b.total_price),
                        paymentCard: cardEnd,
                        transactionId: `TR-${b.id}`,
                        specialRequests: b.special_requests || 'None',
                        amenities: ['High-Speed WiFi', 'Private Infinity Pool', 'Daily Breakfast', 'Welcome Drinks'],
                        status: b.status
                    }
                    
                    bookingRefInput.value = b.reference
                    currentView.value = 'my_bookings'
                    resetBookingFields()
                }
            })
        }
    } catch (e) {
        console.error('Failed to submit booking:', e)
        showCustomAlert({
            title: 'Booking Failed',
            message: e.response?.data?.message || 'Failed to submit booking. Please try again.',
            type: 'error'
        })
    } finally {
        isSubmitting.value = false
    }
}

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

const urgentBookingsCount = computed(() => {
    return pendingReservations.value.filter(r => r.statusType === 'awaiting_verification').length
})

const projectedRevenue = computed(() => {
    const total = pendingReservations.value.reduce((acc, r) => {
        const val = parseFloat(r.amount.replace(/,/g, '')) || 0
        return acc + val
    }, 0)
    return total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
})

const nextPendingCheckIn = computed(() => {
    if (pendingReservations.value.length === 0) {
        return {
            dateText: 'No check-ins',
            subText: 'No pending reservations found.'
        }
    }
    const sorted = [...pendingReservations.value].sort((a, b) => {
        const timeA = a.checkInDateRaw ? new Date(a.checkInDateRaw).getTime() : 0
        const timeB = b.checkInDateRaw ? new Date(b.checkInDateRaw).getTime() : 0
        return timeA - timeB
    })
    const next = sorted[0]
    return {
        dateText: `${next.startDate}, 2:00 PM`,
        subText: `${next.name} (${next.roomType}) is expected next.`
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

const pendingReservations = ref([])

const approvedReservations = ref([])


const rejectedReservations = ref([])

const guestRecords = computed(() => {
    const list = []
    
    pendingReservations.value.forEach(r => {
        list.push({
            id: r.id,
            reference: r.reference,
            name: r.name,
            email: r.email,
            phone: r.phone,
            roomName: r.roomName,
            roomType: r.roomType,
            checkIn: r.startDate,
            checkInDateRaw: r.checkInDateRaw,
            amount: r.amount,
            status: 'Pending',
            statusType: 'pending',
            guests: r.guests,
            nights: r.nights,
            specialRequests: r.specialRequests,
            createdTime: r.createdTime
        })
    })
    
    approvedReservations.value.forEach(r => {
        list.push({
            id: r.id,
            reference: r.reference,
            name: r.name,
            email: r.email,
            phone: r.phone,
            roomName: r.roomName,
            roomType: r.roomType,
            checkIn: r.startDate,
            checkInDateRaw: r.checkInDateRaw,
            amount: r.amount,
            status: r.status, 
            statusType: r.statusType,
            guests: r.guestsText,
            nights: r.nightsCount,
            specialRequests: r.specialRequests,
            createdTime: r.createdTime
        })
    })
    
    rejectedReservations.value.forEach(r => {
        list.push({
            id: r.id,
            reference: r.reference,
            name: r.name,
            email: r.email,
            phone: r.phone,
            roomName: r.roomName,
            roomType: r.roomType,
            checkIn: r.startDate,
            checkInDateRaw: r.checkInDateRaw,
            amount: r.amount,
            status: 'Rejected',
            statusType: 'rejected',
            guests: r.guests,
            nights: r.nightsCount,
            specialRequests: r.specialRequests,
            createdTime: r.createdTime
        })
    })
    
    return list.sort((a, b) => b.id - a.id)
})

const showFilterDropdown = ref(false)
const selectedStatusFilter = ref('all')
const filterContainer = ref(null)

const filterOptions = [
    { label: 'All Statuses', value: 'all' },
    { label: 'Pending', value: 'pending' },
    { label: 'Approved', value: 'approved' },
    { label: 'In Stay', value: 'in_stay' },
    { label: 'Completed', value: 'completed' },
    { label: 'Rejected', value: 'rejected' }
]

const filteredGuestRecords = computed(() => {
    if (selectedStatusFilter.value === 'all') {
        return guestRecords.value
    }
    return guestRecords.value.filter(record => record.statusType === selectedStatusFilter.value)
})

const expandGuestRecords = ref(false)

const visibleGuestRecords = computed(() => {
    if (expandGuestRecords.value) {
        return filteredGuestRecords.value
    }
    return filteredGuestRecords.value.slice(0, 3)
})

const getTrendDaysList = () => {
    const dates = []
    const now = new Date()
    // Convert now to Manila time (UTC+8)
    const manilaTime = new Date(now.getTime() + (now.getTimezoneOffset() * 60000) + (8 * 3600000))
    
    for (let i = 6; i >= 0; i--) {
        const d = new Date(manilaTime.getTime())
        d.setDate(manilaTime.getDate() - i)
        
        const yyyy = d.getFullYear()
        const mm = String(d.getMonth() + 1).padStart(2, '0')
        const dd = String(d.getDate()).padStart(2, '0')
        const rawDate = `${yyyy}-${mm}-${dd}`
        
        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        const label = dayNames[d.getDay()]
        
        dates.push({ rawDate, label, isCurrentDay: i === 0 })
    }
    return dates
}

const trendBars = computed(() => {
    const days = getTrendDaysList()
    const totalRooms = roomsList.value.length || dbRooms.value.length || 3
    
    return days.map((day) => {
        const occupiedCount = approvedReservations.value.filter(r => {
            return day.rawDate >= r.checkInDateRaw && day.rawDate < r.checkOutDateRaw
        }).length
        
        const percentage = totalRooms > 0 ? Math.min(Math.round((occupiedCount / totalRooms) * 100), 100) : 0
        
        return {
            rawDate: day.rawDate,
            label: day.label,
            percentage,
            count: occupiedCount,
            totalRooms,
            isCurrentDay: day.isCurrentDay
        }
    })
})

const getFilterLabel = (value) => {
    const found = filterOptions.find(o => o.value === value)
    return found ? found.label : 'All Statuses'
}

const setStatusFilter = (value) => {
    selectedStatusFilter.value = value
    showFilterDropdown.value = false
}

const handleClickOutside = (event) => {
    if (filterContainer.value && !filterContainer.value.contains(event.target)) {
        showFilterDropdown.value = false
    }
}

onMounted(() => {
    document.addEventListener('click', handleClickOutside)
})

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside)
})

const viewBookingDetails = (record) => {
    if (record.statusType === 'pending') {
        const found = pendingReservations.value.find(r => r.id === record.id)
        if (found) {
            selectedPendingReservation.value = found
            activeTab.value = 'pending'
        }
    } else if (record.statusType === 'rejected') {
        const found = rejectedReservations.value.find(r => r.id === record.id)
        if (found) {
            selectedRejectedReservation.value = found
            activeTab.value = 'rejected'
        }
    } else {
        const found = approvedReservations.value.find(r => r.id === record.id)
        if (found) {
            selectedApprovedReservation.value = found
            activeTab.value = 'approved'
        }
    }
}

const exportGuestRecordsCSV = () => {
    const recordsToExport = filteredGuestRecords.value
    if (recordsToExport.length === 0) {
        alert('No guest records available to export.')
        return
    }
    
    let csvContent = "data:text/csv;charset=utf-8," 
        + "Reference,Guest Name,Email,Phone,Room Type,Room Name,Check-in Date,Nights,Guests,Amount,Status\n"
        
    recordsToExport.forEach(r => {
        const row = [
            r.reference,
            `"${r.name.replace(/"/g, '""')}"`,
            r.email,
            r.phone,
            r.roomType,
            r.roomName,
            r.checkInDateRaw,
            r.nights,
            `"${r.guests}"`,
            r.amount.replace(/,/g, ''),
            r.status
        ].join(",")
        csvContent += row + "\n"
    })
    
    const encodedUri = encodeURI(csvContent)
    const link = document.createElement("a")
    link.setAttribute("href", encodedUri)
    link.setAttribute("download", "aruga_guest_records.csv")
    document.body.appendChild(link)
    link.click()
    document.body.removeChild(link)
}

const rejectedInvalidPaymentsCount = computed(() => {
    return rejectedReservations.value.filter(r => {
        const reason = (r.rejectionReason || '').toLowerCase()
        return reason.includes('payment') || reason.includes('receipt') || reason.includes('proof') || reason.includes('blurry') || reason.includes('amount') || reason.includes('cash') || reason.includes('gcash') || reason.includes('card')
    }).length
})

const rejectedDuplicateBookingsCount = computed(() => {
    return rejectedReservations.value.filter(r => {
        const reason = (r.rejectionReason || '').toLowerCase()
        return reason.includes('duplicate') || reason.includes('double') || reason.includes('already booked') || reason.includes('same')
    }).length
})

const rejectedUserCancelledCount = computed(() => {
    return rejectedReservations.value.filter(r => {
        const reason = (r.rejectionReason || '').toLowerCase()
        if (reason.includes('cancel') || reason.includes('guest') || reason.includes('user') || reason.includes('change')) {
            return true
        }
        return !reason.includes('payment') && !reason.includes('receipt') && !reason.includes('proof') && !reason.includes('blurry') && !reason.includes('amount') && !reason.includes('cash') && !reason.includes('gcash') && !reason.includes('card') && !reason.includes('duplicate') && !reason.includes('double') && !reason.includes('already booked') && !reason.includes('same')
    }).length
})


const paymentSubmissions = ref([])

const showReceiptModal = ref(false)
const activeReceiptUrl = ref('')

// Custom Alert Modal System
const customAlert = reactive({
    show: false,
    title: '',
    message: '',
    type: 'success', // 'success', 'confirm', 'prompt', 'error'
    guestName: '',
    reference: '',
    inputValue: '',
    inputPlaceholder: '',
    confirmCallback: null,
    cancelCallback: null
})

const showCustomAlert = (options) => {
    customAlert.title = options.title || 'Notification'
    customAlert.message = options.message || ''
    customAlert.type = options.type || 'success'
    customAlert.guestName = options.guestName || ''
    customAlert.reference = options.reference || ''
    customAlert.inputValue = ''
    customAlert.inputPlaceholder = options.inputPlaceholder || ''
    customAlert.confirmCallback = options.onConfirm || null
    customAlert.cancelCallback = options.onCancel || null
    customAlert.show = true
}

const handleCustomConfirm = () => {
    if (customAlert.confirmCallback) {
        customAlert.confirmCallback(customAlert.inputValue)
    }
    customAlert.show = false
}

const handleCustomCancel = () => {
    if (customAlert.cancelCallback) {
        customAlert.cancelCallback()
    }
    customAlert.show = false
}

const recentTransactions = ref([])
const salesTimeframe = ref('monthly')
const salesLoading = ref(false)
const salesStats = ref({
    revenue: { value: 0, change: 0 },
    bookings: { value: 0, change: 0 },
    approved: { value: 0, change: 0 },
    occupancy: { value: 0, change: 0 }
})
const salesCurrentPage = ref(1)
const salesTotalPages = ref(1)
const salesTotalTransactions = ref(0)

const fetchSalesReport = async (page = 1) => {
    salesLoading.value = true
    salesCurrentPage.value = page
    try {
        const response = await axiosInstance.get('/api/admin/sales', {
            params: {
                timeframe: salesTimeframe.value,
                page: page
            }
        })
        if (response.data.success) {
            salesStats.value = response.data.stats
            recentTransactions.value = response.data.transactions
            salesTotalPages.value = response.data.pagination.last_page
            salesTotalTransactions.value = response.data.pagination.total
        }
    } catch (e) {
        console.error('Failed to fetch sales report:', e)
    } finally {
        salesLoading.value = false
    }
}

watch(salesTimeframe, () => {
    fetchSalesReport(1)
})

const roomsList = ref([])
const roomStats = ref({ total: 0, occupied: 0, available: 0, maintenance: 0, cleaning: 0, occupied_percentage: 0 })
const roomFilter = ref('all')
const roomSearchQuery = ref('')
const showAddRoomModal = ref(false)
const showEditRoomModal = ref(false)
const selectedRoomDetails = ref(null)

const formatAmenityName = (name) => {
    const lower = name.toLowerCase();
    if (lower.includes('wifi') || lower.includes('internet')) return 'Wi-Fi 6';
    if (lower.includes('pool') || lower.includes('swim')) return 'Private Pool';
    if (lower.includes('air conditioning') || lower.includes('aircon') || lower.includes('climate')) return 'Climate Control';
    if (lower.includes('bar') || lower.includes('fridge') || lower.includes('refrigerator')) return 'Mini Bar';
    if (lower.includes('balcony') || lower.includes('terrace') || lower.includes('deck')) return 'Balcony';
    return name;
}

const filteredRoomsList = computed(() => {
    return roomsList.value.filter(room => {
        const matchesFilter = roomFilter.value === 'all' || room.status === roomFilter.value;
        const matchesSearch = !roomSearchQuery.value || 
            room.name.toLowerCase().includes(roomSearchQuery.value.toLowerCase()) ||
            room.type.toLowerCase().includes(roomSearchQuery.value.toLowerCase()) ||
            (room.description && room.description.toLowerCase().includes(roomSearchQuery.value.toLowerCase()));
        return matchesFilter && matchesSearch;
    });
})

const addRoomForm = reactive({
    name: '',
    type: 'Couple Room',
    price: 0,
    status: 'available',
    description: '',
    image_url: '',
    amenities: ''
})

const editRoomForm = reactive({
    id: null,
    name: '',
    type: 'Couple Room',
    price: 0,
    status: 'available',
    description: '',
    image_url: '',
    amenities: ''
})

const fetchAdminRooms = async () => {
    try {
        const response = await axiosInstance.get('/api/admin/rooms')
        if (response.data.success) {
            roomsList.value = response.data.rooms
            roomStats.value = response.data.stats
        }
    } catch (e) {
        console.error('Failed to fetch rooms:', e)
    }
}

const submitAddRoom = async () => {
    modalSubmitting.value = true
    modalError.value = ''
    try {
        const amenitiesArray = addRoomForm.amenities
            ? addRoomForm.amenities.split(',').map(item => item.trim()).filter(Boolean)
            : []

        const response = await axiosInstance.post('/api/admin/rooms', {
            name: addRoomForm.name,
            type: addRoomForm.type,
            price: Number(addRoomForm.price),
            status: addRoomForm.status,
            description: addRoomForm.description,
            image_url: addRoomForm.image_url || 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=800&q=80',
            amenities: amenitiesArray
        })

        if (response.data.success) {
            showCustomAlert({
                title: 'Room Created',
                message: `Successfully created room: ${addRoomForm.name}`,
                type: 'success'
            })
            showAddRoomModal.value = false
            await fetchAdminRooms()
            
            // Reset form
            addRoomForm.name = ''
            addRoomForm.type = 'Couple Room'
            addRoomForm.price = 0
            addRoomForm.status = 'available'
            addRoomForm.description = ''
            addRoomForm.image_url = ''
            addRoomForm.amenities = ''
        }
    } catch (e) {
        modalError.value = e.response?.data?.message || 'Failed to create room. Please try again.'
    } finally {
        modalSubmitting.value = false
    }
}

const openEditRoomModal = (room) => {
    editRoomForm.id = room.id
    editRoomForm.name = room.name
    editRoomForm.type = room.type
    editRoomForm.price = room.price
    editRoomForm.status = room.status
    editRoomForm.description = room.description || ''
    editRoomForm.image_url = room.image_url || ''
    editRoomForm.amenities = Array.isArray(room.amenities) ? room.amenities.join(', ') : ''
    modalError.value = ''
    showEditRoomModal.value = true
}

const submitEditRoom = async () => {
    modalSubmitting.value = true
    modalError.value = ''
    try {
        const amenitiesArray = editRoomForm.amenities
            ? editRoomForm.amenities.split(',').map(item => item.trim()).filter(Boolean)
            : []

        const response = await axiosInstance.put(`/api/admin/rooms/${editRoomForm.id}`, {
            name: editRoomForm.name,
            type: editRoomForm.type,
            price: Number(editRoomForm.price),
            status: editRoomForm.status,
            description: editRoomForm.description,
            image_url: editRoomForm.image_url || 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=800&q=80',
            amenities: amenitiesArray
        })

        if (response.data.success) {
            showCustomAlert({
                title: 'Room Updated',
                message: `Successfully updated room: ${editRoomForm.name}`,
                type: 'success'
            })
            showEditRoomModal.value = false
            await fetchAdminRooms()
        }
    } catch (e) {
        modalError.value = e.response?.data?.message || 'Failed to update room. Please try again.'
    } finally {
        modalSubmitting.value = false
    }
}

const deleteRoom = async (room) => {
    showCustomAlert({
        title: 'Delete Room',
        message: `Are you sure you want to delete room "${room.name}"? This action cannot be undone.`,
        type: 'confirm',
        onConfirm: async () => {
            try {
                const response = await axiosInstance.delete(`/api/admin/rooms/${room.id}`)
                if (response.data.success) {
                    showCustomAlert({
                        title: 'Room Deleted',
                        message: 'The room has been successfully deleted.',
                        type: 'success'
                    })
                    if (showRoomDetailsModal.value && selectedRoomDetails.value?.id === room.id) {
                        showRoomDetailsModal.value = false
                    }
                    await fetchAdminRooms()
                }
            } catch (e) {
                showCustomAlert({
                    title: 'Delete Failed',
                    message: e.response?.data?.message || 'Cannot delete room. It may have associated staycation bookings.',
                    type: 'error'
                })
            }
        }
    })
}

const showOnsiteBookingModal = ref(false)
const onsiteBookingForm = reactive({
    guest_name: '',
    guest_email: '',
    guest_phone: '',
    guests_count: 2,
    check_in_date: '',
    check_out_date: '',
    payment_method: 'cash_at_property',
    cash_securing_method: 'card',
    special_requests: ''
})

const onsiteBookingNights = computed(() => {
    if (!onsiteBookingForm.check_in_date || !onsiteBookingForm.check_out_date) return 0
    const start = new Date(onsiteBookingForm.check_in_date)
    const end = new Date(onsiteBookingForm.check_out_date)
    const diffTime = end - start
    if (diffTime <= 0) return 0
    return Math.ceil(diffTime / (1000 * 60 * 60 * 24))
})

const onsiteBookingTotalPrice = computed(() => {
    if (!selectedRoomDetails.value) return 0
    return onsiteBookingNights.value * Number(selectedRoomDetails.value.price)
})

const getMinCheckOutDate = computed(() => {
    if (!onsiteBookingForm.check_in_date) return getTomorrowStr()
    const d = new Date(onsiteBookingForm.check_in_date)
    d.setDate(d.getDate() + 1)
    const yyyy = d.getFullYear()
    const mm = String(d.getMonth() + 1).padStart(2, '0')
    const dd = String(d.getDate()).padStart(2, '0')
    return `${yyyy}-${mm}-${dd}`
})

watch(() => onsiteBookingForm.check_in_date, (newVal) => {
    const today = getTodayStr()
    if (newVal && newVal < today) {
        onsiteBookingForm.check_in_date = today
    }
    if (newVal && onsiteBookingForm.check_out_date && onsiteBookingForm.check_out_date <= newVal) {
        const d = new Date(newVal)
        d.setDate(d.getDate() + 1)
        const yyyy = d.getFullYear()
        const mm = String(d.getMonth() + 1).padStart(2, '0')
        const dd = String(d.getDate()).padStart(2, '0')
        onsiteBookingForm.check_out_date = `${yyyy}-${mm}-${dd}`
    }
})

watch(() => onsiteBookingForm.check_out_date, (newVal) => {
    if (newVal && onsiteBookingForm.check_in_date && newVal <= onsiteBookingForm.check_in_date) {
        const d = new Date(onsiteBookingForm.check_in_date)
        d.setDate(d.getDate() + 1)
        const yyyy = d.getFullYear()
        const mm = String(d.getMonth() + 1).padStart(2, '0')
        const dd = String(d.getDate()).padStart(2, '0')
        onsiteBookingForm.check_out_date = `${yyyy}-${mm}-${dd}`
    }
})

const openOnsiteBookingModal = () => {
    onsiteBookingForm.guest_name = ''
    onsiteBookingForm.guest_email = ''
    onsiteBookingForm.guest_phone = ''
    onsiteBookingForm.guests_count = 2
    onsiteBookingForm.check_in_date = getTodayStr()
    onsiteBookingForm.check_out_date = getTomorrowStr()
    onsiteBookingForm.payment_method = 'cash_at_property'
    onsiteBookingForm.cash_securing_method = 'card'
    onsiteBookingForm.special_requests = ''
    modalError.value = ''
    showOnsiteBookingModal.value = true
}

const submitOnsiteBooking = async () => {
    modalSubmitting.value = true
    modalError.value = ''
    try {
        const response = await axiosInstance.post('/api/admin/bookings/onsite', {
            room_id: selectedRoomDetails.value.id,
            guest_name: onsiteBookingForm.guest_name,
            guest_email: onsiteBookingForm.guest_email,
            guest_phone: onsiteBookingForm.guest_phone,
            guests_count: Number(onsiteBookingForm.guests_count),
            check_in_date: onsiteBookingForm.check_in_date,
            check_out_date: onsiteBookingForm.check_out_date,
            payment_method: onsiteBookingForm.payment_method,
            cash_securing_method: onsiteBookingForm.payment_method === 'cash_at_property' ? onsiteBookingForm.cash_securing_method : null,
            special_requests: onsiteBookingForm.special_requests
        })

        if (response.data.success) {
            showCustomAlert({
                title: 'Onsite Booking Confirmed',
                message: `Successfully created onsite booking for ${onsiteBookingForm.guest_name}. Reference: ${response.data.booking.reference}`,
                type: 'success'
            })
            showOnsiteBookingModal.value = false
            await fetchAdminRooms()
            await fetchPendingBookings()
            await fetchConfirmedBookings()
            await fetchRejectedBookings()
            const updated = roomsList.value.find(r => r.id === selectedRoomDetails.value.id)
            if (updated) {
                selectedRoomDetails.value = updated
            }
        }
    } catch (e) {
        modalError.value = e.response?.data?.message || 'Failed to create onsite booking. Please try again.'
    } finally {
        modalSubmitting.value = false
    }
}

const formatDate = (dateStr) => {
    if (!dateStr) return ''
    const d = new Date(dateStr)
    return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })
}

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

const getInitials = (name) => {
    if (!name) return '??'
    const parts = name.trim().split(/\s+/)
    if (parts.length >= 2) {
        return (parts[0][0] + parts[parts.length - 1][0]).toUpperCase()
    }
    return name.slice(0, 2).toUpperCase()
}

const getBgClass = (id) => {
    const classes = [
        'bg-amber-100 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300',
        'bg-[#0B1E3F] text-white dark:bg-slate-700 dark:text-slate-100',
        'bg-[#FAF0E6] text-[#A27B5C] dark:bg-amber-950/20 dark:text-amber-455',
        'bg-[#FAF6F0] text-[#A27B5C] dark:bg-emerald-955/40 dark:text-emerald-350',
        'bg-blue-100 text-blue-700 dark:bg-blue-955/40 dark:text-blue-350'
    ]
    return classes[id % classes.length]
}

const formatToManilaDateString = (dateStr) => {
    if (!dateStr) return ''
    if (dateStr.length === 10 && !dateStr.includes('T')) {
        return dateStr
    }
    const d = new Date(dateStr)
    if (isNaN(d.getTime())) {
        return dateStr.split('T')[0]
    }
    const formatter = new Intl.DateTimeFormat('sv-SE', {
        timeZone: 'Asia/Manila',
        year: 'numeric',
        month: '2-digit',
        day: '2-digit'
    })
    return formatter.format(d)
}

const formatTimestamp = (dateStr) => {
    if (!dateStr) return ''
    const d = new Date(dateStr)
    if (isNaN(d.getTime())) return dateStr
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    const month = months[d.getMonth()]
    const day = d.getDate()
    let hours = d.getHours()
    const minutes = String(d.getMinutes()).padStart(2, '0')
    const ampm = hours >= 12 ? 'PM' : 'AM'
    hours = hours % 12
    hours = hours ? hours : 12
    return `${day} ${month}, ${String(hours).padStart(2, '0')}:${minutes} ${ampm}`
}

const formatDateMMMdd = (dateStr) => {
    if (!dateStr) return ''
    const formattedDate = formatToManilaDateString(dateStr)
    const parts = formattedDate.split('-')
    if (parts.length === 3) {
        const year = parseInt(parts[0], 10)
        const month = parseInt(parts[1], 10) - 1
        const day = parseInt(parts[2], 10)
        const d = new Date(year, month, day)
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        return `${months[d.getMonth()]} ${String(d.getDate()).padStart(2, '0')}`
    }
    return dateStr
}

const getYearFromDate = (dateStr) => {
    if (!dateStr) return 2026
    const formattedDate = formatToManilaDateString(dateStr)
    const parts = formattedDate.split('-')
    if (parts.length === 3) {
        return parseInt(parts[0], 10)
    }
    return 2026
}

const getDayOfWeekName = (dateStr) => {
    if (!dateStr) return ''
    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
    const formattedDate = formatToManilaDateString(dateStr)
    const parts = formattedDate.split('-')
    if (parts.length === 3) {
        const year = parseInt(parts[0], 10)
        const month = parseInt(parts[1], 10) - 1
        const day = parseInt(parts[2], 10)
        const d = new Date(year, month, day)
        return days[d.getDay()]
    }
    return ''
}

const fetchConfirmedBookings = async () => {
    try {
        const response = await axiosInstance.get('/api/admin/bookings/confirmed')
        if (response.data && response.data.success) {
            approvedReservations.value = response.data.bookings.map(b => {
                const initials = getInitials(b.guest_name)
                const checkInDayOfWeek = getDayOfWeekName(b.check_in_date)
                const checkOutDayOfWeek = getDayOfWeekName(b.check_out_date)
                const guestsTextVal = `Confirmed • ${b.guests_count === 1 ? '1 Guest' : `${b.guests_count} Guests`}`
                const amountVal = b.total_price

                // Dynamic stay status check (Manila time UTC+8)
                const now = new Date(new Date().getTime() + (8 * 60 * 60 * 1000))
                
                const checkInStr = formatToManilaDateString(b.check_in_date)
                const checkOutStr = formatToManilaDateString(b.check_out_date)
                
                let checkInDateTime = null
                let checkOutDateTime = null
                
                if (checkInStr && checkOutStr) {
                    const parseTime = (dateStr, timeStr) => {
                        const [time, modifier] = timeStr.split(' ')
                        let [hours, minutes] = time.split(':').map(Number)
                        if (modifier === 'PM' && hours < 12) hours += 12
                        if (modifier === 'AM' && hours === 12) hours = 0
                        
                        const d = new Date(dateStr)
                        d.setUTCHours(hours, minutes, 0, 0)
                        return d
                    }
                    
                    checkInDateTime = parseTime(checkInStr, b.check_in_time || '12:00 PM')
                    checkOutDateTime = parseTime(checkOutStr, b.check_out_time || '11:00 AM')
                }
                
                let statusText = 'Confirmed'
                let statusTypeVal = 'confirmed'
                
                if (checkInDateTime && checkOutDateTime) {
                    if (now >= checkInDateTime && now < checkOutDateTime) {
                        statusText = 'In-Stay'
                        statusTypeVal = 'in_stay'
                    } else if (now >= checkOutDateTime) {
                        statusText = 'Completed'
                        statusTypeVal = 'completed'
                    } else if (now < checkInDateTime) {
                        statusText = 'Pending Check-in'
                        statusTypeVal = 'pending_check_in'
                    }
                }

                return {
                    id: b.id,
                    initials,
                    name: b.guest_name,
                    email: b.guest_email,
                    phone: b.guest_phone,
                    roomType: b.room ? b.room.type : 'Unknown Room',
                    roomName: b.room ? b.room.name : 'Unknown Room',
                    roomDescription: b.room ? b.room.description : 'No description available',
                    startDate: formatDateMMMdd(b.check_in_date),
                    endDate: formatDateMMMdd(b.check_out_date),
                    checkInDateRaw: b.check_in_date,
                    checkOutDateRaw: b.check_out_date,
                    checkInDayOfWeek,
                    checkOutDayOfWeek,
                    year: getYearFromDate(b.check_in_date),
                    nights: `${b.nights_count || 1} Night${(b.nights_count || 1) > 1 ? 's' : ''}`,
                    nightsCount: b.nights_count || 1,
                    guestsText: guestsTextVal,
                    guestsCount: b.guests_count || 1,
                    status: statusText,
                    statusType: statusTypeVal,
                    amount: parseFloat(amountVal).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
                    totalPrice: parseFloat(amountVal).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
                    paymentMethodText: b.payment_method === 'gcash' ? 'GCash' : (b.payment_method === 'credit_card' ? 'Credit Card' : 'Cash at Property'),
                    specialRequests: b.special_requests || 'None',
                    createdTime: formatTimestamp(b.created_at),
                    reference: b.reference
                }
            })
        }
    } catch (e) {
        console.error('Failed to fetch confirmed bookings:', e)
    }
}

const fetchRejectedBookings = async () => {
    try {
        const response = await axiosInstance.get('/api/admin/bookings/rejected')
        if (response.data && response.data.success) {
            rejectedReservations.value = response.data.bookings.map(b => {
                const initials = getInitials(b.guest_name)
                const checkInDayOfWeek = getDayOfWeekName(b.check_in_date)
                const checkOutDayOfWeek = getDayOfWeekName(b.check_out_date)
                const guestsTextVal = `${b.guests_count || 1} Guest${(b.guests_count || 1) > 1 ? 's' : ''}`
                const amountVal = b.total_price

                return {
                    id: b.id,
                    initials,
                    name: b.guest_name,
                    email: b.guest_email,
                    phone: b.guest_phone,
                    roomType: b.room ? b.room.type : 'Unknown Room',
                    roomName: b.room ? b.room.name : 'Unknown Room',
                    roomDescription: b.room ? b.room.description : 'No description available',
                    roomCategory: b.room ? b.room.type : 'Unknown Room',
                    internalNotes: b.special_requests || 'None',
                    startDate: formatDateMMMdd(b.check_in_date),
                    endDate: formatDateMMMdd(b.check_out_date),
                    checkInDateRaw: b.check_in_date,
                    checkOutDateRaw: b.check_out_date,
                    checkInDayOfWeek,
                    checkOutDayOfWeek,
                    year: getYearFromDate(b.check_in_date),
                    nightsCount: b.nights_count || 1,
                    guests: guestsTextVal,
                    guestsCount: b.guests_count || 1,
                    guestsSubtext: b.room ? b.room.name : 'Unknown Room',
                    rejectionReason: b.rejection_reason || 'Unknown Reason',
                    rejectionDetail: b.rejection_reason || 'Declined by admin during verification.',
                    amount: parseFloat(amountVal).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
                    bgClass: getBgClass(b.id),
                    checkInTime: b.check_in_time || 'From 2:00 PM',
                    checkOutTime: b.check_out_time || 'Before 11:00 AM',
                    refundStatus: b.payment_method === 'gcash' ? 'Refund Process Initiated' : 'No Refund Required',
                    createdTime: formatTimestamp(b.created_at),
                    reference: b.reference,
                    timeline: [
                        { title: 'Reservation Rejected', actionedBy: 'Actioned by: Admin Staff', timestamp: formatTimestamp(b.updated_at), iconType: 'rejected' },
                        { title: 'Reservation Initiated', actionedBy: 'Origin: Direct Guest Web Portal', timestamp: formatTimestamp(b.created_at), iconType: 'initiated' }
                    ]
                }
            })
        }
    } catch (e) {
        console.error('Failed to fetch rejected bookings:', e)
    }
}

const fetchPendingBookings = async () => {
    try {
        const response = await axiosInstance.get('/api/admin/bookings/pending')
        if (response.data.success) {
            // Populate payment submissions
            paymentSubmissions.value = response.data.bookings.map(b => {
                const initials = getInitials(b.guest_name)
                const bgClass = getBgClass(b.id)
                const isMissingVal = (b.payment_method === 'gcash' || (b.payment_method === 'cash_at_property' && b.cash_securing_method === 'gcash')) && !b.receipt_file_path
                const amountVal = b.payment_method === 'cash_at_property' ? b.down_payment : b.total_price
                const paymentTypeVal = b.payment_method === 'cash_at_property' ? 'Down Payment (30%)' : 'Full Payment'
                
                return {
                    id: b.id,
                    initials,
                    bgClass,
                    name: b.guest_name,
                    suite: b.room ? b.room.name : 'Unknown Room',
                    amount: parseFloat(amountVal).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
                    paymentType: paymentTypeVal,
                    hasProof: !!b.receipt_file_path,
                    proofUrl: b.receipt_file_path,
                    timestamp: formatTimestamp(b.created_at),
                    amountColorClass: isMissingVal ? 'text-rose-600 dark:text-rose-455' : 'text-slate-850 dark:text-slate-100',
                    isMissing: isMissingVal,
                    reference: b.reference
                }
            })

            // Populate pending reservations
            pendingReservations.value = response.data.bookings.map(b => {
                const initials = getInitials(b.guest_name)
                const isMissingVal = (b.payment_method === 'gcash' || (b.payment_method === 'cash_at_property' && b.cash_securing_method === 'gcash')) && !b.receipt_file_path
                const amountVal = b.total_price
                
                let statusTypeVal = 'awaiting_verification'
                if (b.receipt_file_path) {
                    statusTypeVal = 'receipt_uploaded'
                } else if (b.payment_method === 'credit_card' || (b.payment_method === 'cash_at_property' && b.cash_securing_method === 'card')) {
                    statusTypeVal = 'verified'
                }

                return {
                    id: b.id,
                    initials,
                    name: b.guest_name,
                    email: b.guest_email,
                    phone: b.guest_phone,
                    roomType: b.room ? b.room.type : 'Unknown Room',
                    roomName: b.room ? b.room.name : 'Unknown Room',
                    startDate: formatDateMMMdd(b.check_in_date),
                    endDate: formatDateMMMdd(b.check_out_date),
                    checkInDateRaw: b.check_in_date,
                    year: getYearFromDate(b.check_in_date),
                    nights: b.nights_count || 1,
                    guests: b.guests_count === 1 ? '1 Guest' : `${b.guests_count} Guests`,
                    amount: parseFloat(amountVal).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
                    statusType: statusTypeVal,
                    reference: b.reference,
                    specialRequests: b.special_requests || 'None',
                    createdTime: formatTimestamp(b.created_at)
                }
            })
        }
    } catch (e) {
        console.error('Failed to fetch pending bookings:', e)
    }
}

const verifyPayment = async (submission) => {
    showCustomAlert({
        title: 'Verify Payment & Approve',
        message: `Are you sure you want to verify and approve the booking for ${submission.name} (Reference: ${submission.reference})?`,
        type: 'confirm',
        onConfirm: async () => {
            try {
                const response = await axiosInstance.post(`/api/admin/bookings/${submission.id}/approve`)
                if (response.data.success) {
                    showCustomAlert({
                        title: 'Booking Approved',
                        message: 'The reservation has been successfully verified and confirmed.',
                        type: 'success'
                    })
                    await fetchAdminRooms()
                    await fetchPendingBookings()
                    await fetchConfirmedBookings()
                    if (selectedPendingReservation.value && selectedPendingReservation.value.id === submission.id) {
                        selectedPendingReservation.value = null
                    }
                }
            } catch (e) {
                console.error('Failed to approve booking:', e)
                showCustomAlert({
                    title: 'Error',
                    message: e.response?.data?.message || 'Failed to approve booking. Please try again.',
                    type: 'error'
                })
            }
        }
    })
}

const rejectPayment = async (submission) => {
    showCustomAlert({
        title: 'Reject Reservation',
        message: `Please enter the rejection reason for ${submission.name}'s booking (Reference: ${submission.reference}):`,
        type: 'prompt',
        inputPlaceholder: 'e.g. Blurry receipt upload, incorrect amount, etc.',
        onConfirm: async (reason) => {
            const trimmedReason = reason ? reason.trim() : ''
            if (!trimmedReason) {
                showCustomAlert({
                    title: 'Reason Required',
                    message: 'A rejection reason is required to decline the stay reservation.',
                    type: 'error'
                })
                return
            }
            try {
                const response = await axiosInstance.post(`/api/admin/bookings/${submission.id}/reject`, {
                    rejection_reason: trimmedReason
                })
                if (response.data.success) {
                    showCustomAlert({
                        title: 'Booking Rejected',
                        message: 'The reservation has been successfully rejected with the reason saved.',
                        type: 'success'
                    })
                    await fetchPendingBookings()
                    await fetchRejectedBookings()
                    if (selectedPendingReservation.value && selectedPendingReservation.value.id === submission.id) {
                        selectedPendingReservation.value = null
                    }
                }
            } catch (e) {
                console.error('Failed to reject booking:', e)
                showCustomAlert({
                    title: 'Error',
                    message: e.response?.data?.message || 'Failed to reject booking. Please try again.',
                    type: 'error'
                })
            }
        }
    })
}

const openReceipt = (url) => {
    activeReceiptUrl.value = url
    showReceiptModal.value = true
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
    } else if (newTab === 'sales') {
        fetchSalesReport() // Fetch sales report when tab becomes active
    } else if (newTab === 'room_management') {
        fetchAdminRooms() // Fetch rooms when tab becomes active
    } else if (newTab === 'payments' || newTab === 'pending' || newTab === 'dashboard_overview') {
        fetchPendingBookings()
        if (newTab === 'dashboard_overview') {
            fetchConfirmedBookings()
            fetchRejectedBookings()
        }
    } else if (newTab === 'approved') {
        fetchConfirmedBookings()
    } else if (newTab === 'rejected') {
        fetchRejectedBookings()
    }
})

// Also watch currentUser, if they log out or role changes, check tab
watch(currentUser, (newUser) => {
    if (!newUser) {
        activeTab.value = 'dashboard_overview'
        usersList.value = []
    } else {
        fetchPendingBookings()
        fetchConfirmedBookings()
        fetchRejectedBookings()
        if (activeTab.value === 'user_management' && !isManager()) {
            activeTab.value = 'dashboard_overview'
        } else if (activeTab.value === 'user_management') {
            fetchUsers()
        }
    }
})

onMounted(async () => {
    try {
        const savedTheme = localStorage.getItem('aruga-theme') || 'light'
        setTheme(savedTheme)
        await fetchRooms()
        const response = await axiosInstance.get('/api/user')
        if (response.data.logged_in) {
            currentUser.value = response.data.user
            currentView.value = 'dashboard'
            activeTab.value = 'dashboard_overview'
            fetchPendingBookings()
            fetchConfirmedBookings()
            fetchRejectedBookings()
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
