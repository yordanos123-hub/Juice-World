<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Juice - Freshness Delivered</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-[#FDFDFC]">

<!-- 1. NAVIGATION -->
<nav class="flex justify-between items-center px-10 py-6 max-w-7xl mx-auto">
    <div class="text-2xl font-extrabold text-[#7FB432]">justjuice<span class="text-orange-500">.</span></div>
    <div class="hidden md:flex gap-8 text-sm font-bold text-gray-700">
        <a href="/" class="text-orange-500 border-b-2 border-orange-500 pb-1">Home</a>
        <!-- እንዲህ መሆኑን አረጋግጥ -->
        <a href="#menu" class="hover:text-orange-500 transition-all">Menu</a>
        <a href="#branches" class="hover:text-orange-500 transition-all">Branches</a>
        <a href="/register" class="hover:text-orange-500 transition-all">Register</a>
        <a href="#about" class="hover:text-orange-500 transition-all">About Us</a>
    </div>
    <div class="flex items-center gap-4">
        @auth
            <a href="/admin/orders" class="bg-orange-500 text-white px-6 py-2.5 rounded-full font-bold text-sm shadow-lg shadow-orange-200">ORDER NOW</a>
        @else
            <a href="/login" class="bg-[#7FB432] text-white px-6 py-2.5 rounded-full font-bold text-sm shadow-lg shadow-green-100">ORDER NOW</a>
        @endauth
    </div>
</nav>

<!-- 2. HERO SECTION -->
<section class="max-w-7xl mx-auto px-10 py-20 flex flex-col md:flex-row items-center justify-between">
    <div class="md:w-1/2 space-y-6">
        <div class="flex items-center gap-2 text-xs font-bold text-gray-400 uppercase tracking-widest">
            <span class="border border-gray-200 px-2 py-1 rounded-full text-[10px]">⊙ 100% COLD-PRESSED</span>
        </div>
        <h1 class="text-6xl md:text-7xl font-black text-gray-900 leading-[1.1]">Good Juice.<br><span class="text-orange-500">Real Results.</span></h1>
        <p class="text-gray-500 text-lg max-w-md italic">Nutrient-rich juices made from the freshest fruits and vegetables. No sugar. No shortcuts.</p>
        <div class="flex gap-4">
            <a href="#branches" class="bg-orange-500 text-white px-8 py-4 rounded-full font-black text-sm hover:scale-105 transition-all">ORDER NOW →</a>
            <a href="#menu" class="border-2 border-gray-100 text-gray-900 px-8 py-4 rounded-full font-black text-sm hover:bg-gray-50 transition-all text-center">
                EXPLORE MENU
            </a>
        </div>
        <div class="pt-10 flex gap-10 text-[10px] font-black text-gray-400 uppercase tracking-tighter">
            <div>🥑 100% NATURAL</div>
            <div>🧊 COLD-PRESSED</div>
            <div>🛵 DELIVERED FRESH</div>
        </div>
    </div>

    <div class="md:w-1/2 relative mt-20 md:mt-0">
        <div class="absolute -z-10 bg-orange-100 w-[500px] h-[500px] rounded-full filter blur-3xl opacity-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>
        <!-- እዚህ ጋር የጁስ ፎቶዎችን እና ፍራፍሬዎችን ማስቀመጥ ትችላለህ -->
        <!-- እንዲህ አድርገህ ቀይረው -->
        <img src="{{ asset('images/hero-juice.jpg') }}" alt="My Fresh Juice" class="rounded-[40px] shadow-2xl hover:rotate-3 transition-transform w-full h-[500px] object-cover">
    </div>
</section>


<!-- MENU SECTION -->
<section id="menu" class="bg-[#FFF8F1] py-24">
    <div class="max-w-7xl mx-auto px-6 md:px-12">

        <!-- Header -->
        <div class="max-w-3xl mx-auto text-center mb-10">
            <h2 class="text-4xl md:text-5xl font-black text-[#17210F] leading-tight">
                Our <span class="text-[#9BB51B]">Menu</span>
            </h2>

            <p class="mt-4 text-gray-600 text-sm md:text-base leading-relaxed font-medium">
                Cold-pressed juices made with real ingredients.<br class="hidden sm:block">
                Nothing added, nothing artificial.
            </p>
        </div>

        <!-- Category Tabs -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button class="bg-[#17210F] text-white px-6 py-3 rounded-full text-xs font-black uppercase tracking-widest">
                All Juices
            </button>

            <button class="bg-white text-[#17210F] px-6 py-3 rounded-full text-xs font-black uppercase tracking-widest border border-[#E6E8D2] hover:bg-[#EEF4D2] transition-colors">
                Cleanses
            </button>

            <button class="bg-white text-[#17210F] px-6 py-3 rounded-full text-xs font-black uppercase tracking-widest border border-[#E6E8D2] hover:bg-[#EEF4D2] transition-colors">
                Boosters
            </button>

            <button class="bg-white text-[#17210F] px-6 py-3 rounded-full text-xs font-black uppercase tracking-widest border border-[#E6E8D2] hover:bg-[#EEF4D2] transition-colors">
                Wellness Shots
            </button>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Product 1 -->
            <article class="bg-white rounded-lg border border-[#E6E8D2] p-5 shadow-sm hover:shadow-lg transition-shadow">
                <div class="bg-[#F7F3E8] rounded-lg h-56 flex items-center justify-center overflow-hidden mb-5">
                    <img
                        src="{{ asset('images/green-detox.png') }}"
                        alt="Green Detox juice"
                        class="h-full w-full object-contain p-4"
                    >
                </div>

                <h3 class="text-base font-black text-[#17210F]">
                    Green Detox
                </h3>

                <p class="mt-1 text-sm text-gray-500 font-medium">
                    Cucumber & Refresh
                </p>

                <p class="mt-4 text-lg font-black text-[#17210F]">
                    $6.49
                </p>
            </article>

            <!-- Product 2 -->
            <article class="bg-white rounded-lg border border-[#E6E8D2] p-5 shadow-sm hover:shadow-lg transition-shadow">
                <div class="bg-[#F7F3E8] rounded-lg h-56 flex items-center justify-center overflow-hidden mb-5">
                    <img
                        src="{{ asset('images/tropical-glow.png') }}"
                        alt="Tropical Glow juice"
                        class="h-full w-full object-contain p-4"
                    >
                </div>

                <h3 class="text-base font-black text-[#17210F]">
                    Tropical Glow
                </h3>

                <p class="mt-1 text-sm text-gray-500 font-medium">
                    Energy Booster
                </p>

                <p class="mt-4 text-lg font-black text-[#17210F]">
                    $6.49
                </p>
            </article>

            <!-- Product 3 -->
            <article class="bg-white rounded-lg border border-[#E6E8D2] p-5 shadow-sm hover:shadow-lg transition-shadow">
                <div class="bg-[#F7F3E8] rounded-lg h-56 flex items-center justify-center overflow-hidden mb-5">
                    <img
                        src="{{ asset('images/berry-boost.png') }}"
                        alt="Berry Boost juice"
                        class="h-full w-full object-contain p-4"
                    >
                </div>

                <h3 class="text-base font-black text-[#17210F]">
                    Berry Boost
                </h3>

                <p class="mt-1 text-sm text-gray-500 font-medium">
                    Immunity Support
                </p>

                <p class="mt-4 text-lg font-black text-[#17210F]">
                    $6.49
                </p>
            </article>

            <!-- Product 4 -->
            <article class="bg-white rounded-lg border border-[#E6E8D2] p-5 shadow-sm hover:shadow-lg transition-shadow">
                <div class="bg-[#F7F3E8] rounded-lg h-56 flex items-center justify-center overflow-hidden mb-5">
                    <img
                        src="{{ asset('images/citrus-kick.png') }}"
                        alt="Citrus Kick juice"
                        class="h-full w-full object-contain p-4"
                    >
                </div>

                <h3 class="text-base font-black text-[#17210F]">
                    Citrus Kick
                </h3>

                <p class="mt-1 text-sm text-gray-500 font-medium">
                    Vitamin C Power
                </p>

                <p class="mt-4 text-lg font-black text-[#17210F]">
                    $6.49
                </p>
            </article>

            <!-- Product 5 -->
            <article class="bg-white rounded-lg border border-[#E6E8D2] p-5 shadow-sm hover:shadow-lg transition-shadow">
                <div class="bg-[#F7F3E8] rounded-lg h-56 flex items-center justify-center overflow-hidden mb-5">
                    <img
                        src="{{ asset('images/orange-zing.png') }}"
                        alt="Orange Zing juice"
                        class="h-full w-full object-contain p-4"
                    >
                </div>

                <h3 class="text-base font-black text-[#17210F]">
                    Orange Zing
                </h3>

                <p class="mt-1 text-sm text-gray-500 font-medium">
                    Refresh & Energize
                </p>

                <p class="mt-4 text-lg font-black text-[#17210F]">
                    $6.49
                </p>
            </article>

            <!-- Product 6 -->
            <article class="bg-white rounded-lg border border-[#E6E8D2] p-5 shadow-sm hover:shadow-lg transition-shadow">
                <div class="bg-[#F7F3E8] rounded-lg h-56 flex items-center justify-center overflow-hidden mb-5">
                    <img
                        src="{{ asset('images/beet-glow.png') }}"
                        alt="Beet Glow juice"
                        class="h-full w-full object-contain p-4"
                    >
                </div>

                <h3 class="text-base font-black text-[#17210F]">
                    Beet Glow
                </h3>

                <p class="mt-1 text-sm text-gray-500 font-medium">
                    Blood & Skin Health
                </p>

                <p class="mt-4 text-lg font-black text-[#17210F]">
                    $6.49
                </p>
            </article>

            <!-- Product 7 -->
            <article class="bg-white rounded-lg border border-[#E6E8D2] p-5 shadow-sm hover:shadow-lg transition-shadow">
                <div class="bg-[#F7F3E8] rounded-lg h-56 flex items-center justify-center overflow-hidden mb-5">
                    <img
                        src="{{ asset('images/mango-bliss.png') }}"
                        alt="Mango Bliss juice"
                        class="h-full w-full object-contain p-4"
                    >
                </div>

                <h3 class="text-base font-black text-[#17210F]">
                    Mango Bliss
                </h3>

                <p class="mt-1 text-sm text-gray-500 font-medium">
                    Tropical Refreshment
                </p>

                <p class="mt-4 text-lg font-black text-[#17210F]">
                    $6.49
                </p>
            </article>

            <!-- Product 8 -->
            <article class="bg-white rounded-lg border border-[#E6E8D2] p-5 shadow-sm hover:shadow-lg transition-shadow">
                <div class="bg-[#F7F3E8] rounded-lg h-56 flex items-center justify-center overflow-hidden mb-5">
                    <img
                        src="{{ asset('images/wellness-shot.png') }}"
                        alt="Wellness Shot juice"
                        class="h-full w-full object-contain p-4"
                    >
                </div>

                <h3 class="text-base font-black text-[#17210F]">
                    Wellness Shot
                </h3>

                <p class="mt-1 text-sm text-gray-500 font-medium">
                    Daily Immunity
                </p>

                <p class="mt-4 text-lg font-black text-[#17210F]">
                    $3.49
                </p>
            </article>

        </div>

    </div>
</section>
<!-- ABOUT US SECTION (Clean & Orange Theme) -->
<section id="about" class="bg-[#FFF8F1] py-24 rounded-[60px] mx-4 md:mx-10 mb-10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

            <!-- 1. Text Content -->
            <div class="space-y-6">
                <p class="text-lg font-black text-[#8C2F00] uppercase tracking-widest">
                    About <span class="text-[#FF6B00]">Us</span>
                </p>

                <h2 class="text-4xl md:text-6xl font-black text-[#8C2F00] leading-tight tracking-tighter">
                    Rooted in purity.<br>
                    Driven by <span class="text-[#FF6B00]">purpose.</span>
                </h2>

                <p class="text-gray-600 text-base md:text-lg leading-relaxed font-medium italic">
                    At Just Juice, we believe real ingredients create real change.
                    Our juices are made fresh daily with the finest fruits and vegetables,
                    never rushed, never sweetened, and never compromised.
                </p>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 mt-12 border-t border-orange-100 pt-10">
                    <div>
                        <p class="text-3xl font-black text-[#FF6B00]">100%</p>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">Natural</p>
                    </div>

                    <div>
                        <p class="text-3xl font-black text-[#FF6B00]">0</p>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">Additives</p>
                    </div>

                    <div>
                        <p class="text-3xl font-black text-[#FF6B00]">30%</p>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">Cold Pressed</p>
                    </div>

                    <div>
                        <p class="text-3xl font-black text-[#FF6B00]">24h</p>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">Freshness</p>
                    </div>
                </div>
            </div>

            <!-- 2. Image Side -->
            <div class="relative group">
                <!-- Decorative Orange Box -->
                <div class="absolute -inset-4 bg-orange-200/40 rounded-[40px] rotate-3 group-hover:rotate-0 transition-transform duration-500"></div>

                <img src="{{ asset('images/hero-juice.jpg') }}"
                     alt="Fresh Juice Display"
                     class="relative w-full aspect-[4/3] object-cover rounded-[40px] shadow-2xl z-10">
            </div>

        </div>

        <!-- 3. Feature Cards (Mission, Promise, Sustainability) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-24">

            <!-- Mission -->
            <div class="bg-white rounded-[35px] border border-orange-50 p-8 flex items-start gap-5 shadow-xl shadow-orange-100/50 hover:-translate-y-2 transition-all">
                <div class="w-14 h-14 rounded-2xl bg-orange-50 text-[#FF6B00] flex items-center justify-center shrink-0 text-2xl shadow-inner">🌱</div>
                <div>
                    <h3 class="text-sm font-black text-[#8C2F00] uppercase tracking-widest mb-3">Our Mission</h3>
                    <p class="text-xs text-gray-500 leading-relaxed font-bold italic">Make healthy living easy, fresh, and accessible for everyone.</p>
                </div>
            </div>

            <!-- Promise -->
            <div class="bg-white rounded-[35px] border border-orange-50 p-8 flex items-start gap-5 shadow-xl shadow-orange-100/50 hover:-translate-y-2 transition-all">
                <div class="w-14 h-14 rounded-2xl bg-orange-50 text-[#FF6B00] flex items-center justify-center shrink-0 text-2xl shadow-inner">✨</div>
                <div>
                    <h3 class="text-sm font-black text-[#8C2F00] uppercase tracking-widest mb-3">Our Promise</h3>
                    <p class="text-xs text-gray-500 leading-relaxed font-bold italic">Pure ingredients, real flavor, and real results in every cup.</p>
                </div>
            </div>

            <!-- Sustainability -->
            <div class="bg-white rounded-[35px] border border-orange-50 p-8 flex items-start gap-5 shadow-xl shadow-orange-100/50 hover:-translate-y-2 transition-all">
                <div class="w-14 h-14 rounded-2xl bg-orange-50 text-[#FF6B00] flex items-center justify-center shrink-0 text-2xl shadow-inner">♻️</div>
                <div>
                    <h3 class="text-sm font-black text-[#8C2F00] uppercase tracking-widest mb-3">Eco-Friendly</h3>
                    <p class="text-xs text-gray-500 leading-relaxed font-bold italic">Better for you and thoughtful for our beautiful planet.</p>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- 3. BRANCHES SECTION (የእኛ ስራ እዚህ ይገባል) -->
<section id="branches" class="max-w-7xl mx-auto px-10 py-20 bg-gray-50 rounded-[50px] mb-10 shadow-inner">
    <div class="flex justify-between items-end mb-12">
        <div>
            <h2 class="text-3xl font-black text-gray-900 uppercase">Our Locations</h2>
            <p class="text-gray-500 text-sm mt-2">ለእርስዎ ቅርብ የሆኑ የጁስ መሸጫ ቅርንጫፎቻችን</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        @foreach ($allBranches as $branch)
            <div class="bg-white p-10 rounded-[40px] shadow-xl border border-gray-100 hover:border-orange-500 transition-all group">
                <h3 class="text-3xl font-black text-gray-900 mb-2">{{ $branch->name }}</h3>
                <p class="text-gray-400 font-medium">📍 {{ $branch->location }}</p>
                <p class="text-gray-400 font-medium mt-1">📞 {{ $branch->phone }}</p>
                <a href="/branch/{{ $branch->id }}" class="mt-8 inline-block w-full text-center bg-gray-900 text-white py-4 rounded-full font-black text-sm group-hover:bg-orange-500 transition-all">EXPLORE MENU</a>
            </div>
        @endforeach
    </div>
</section>


<!-- ORDER & CONTACT SECTION (Dynamic Version) -->
<section id="order-contact" class="bg-[#FFF8F1] py-24 rounded-[60px] mx-6 md:mx-10 mb-10">
    <div class="max-w-7xl mx-auto px-6 md:px-12">

        <!-- 1. Header -->
        <div class="max-w-3xl mx-auto text-center mb-16">
            <p class="text-xs font-black tracking-[0.35em] uppercase text-[#FF6B00] mb-4">
                Order & Contact
            </p>
            <h2 class="text-4xl md:text-6xl font-black text-[#8C2F00] leading-tight tracking-tighter">
                Order online. We deliver fresh.
            </h2>
            <p class="mt-6 text-gray-600 text-base md:text-lg leading-relaxed font-medium italic">
                እዚያው መጥተው መውሰድ (Pickup) ወይም ያሉበት ድረስ እንዲመጣ (Delivery) ይዘዙ።
            </p>
        </div>

        <!-- 2. Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-start">

            <!-- በስተግራ፡ የሜሴጅ መላኪያ (Contact Form) -->
            <div class="bg-white rounded-[40px] p-8 md:p-12 border border-orange-100 shadow-xl shadow-orange-50">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-14 h-14 rounded-2xl bg-orange-50 text-[#FF6B00] flex items-center justify-center text-2xl shadow-inner">✉️</div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-[0.25em] text-[#FF6B00]">Get In Touch</p>
                        <h3 class="text-2xl font-black text-[#8C2F00]">Send us a message</h3>
                    </div>
                </div>

                <form class="space-y-5">
                    <input type="text" placeholder="Full Name" class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-4 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500">
                    <input type="email" placeholder="Email Address" class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-4 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500">
                    <textarea rows="4" placeholder="Your Message" class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-4 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 resize-none"></textarea>
                    <button type="submit" class="w-full bg-[#8C2F00] text-white px-8 py-5 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-[#FF6B00] shadow-xl shadow-orange-200 transition-all">
                        SEND MESSAGE
                    </button>
                </form>
            </div>

            <!-- በስተቀኝ፡ Delivery/Pickup + የቅርንጫፎች ዝርዝር -->
            <div class="space-y-8">

                <!-- Pickup/Delivery Options -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-[#8C2F00] text-white rounded-[35px] p-8 shadow-xl shadow-orange-100">
                        <div class="text-3xl mb-4">🚀</div>
                        <h3 class="text-xl font-black mb-2 tracking-tighter">Delivery</h3>
                        <p class="text-xs text-orange-100/70 font-bold leading-relaxed">Fast and fresh delivery straight to your door.</p>
                    </div>
                    <div class="bg-white rounded-[35px] p-8 border border-orange-50 shadow-lg">
                        <div class="text-3xl mb-4 text-[#FF6B00]">🥡</div>
                        <h3 class="text-xl font-black text-[#8C2F00] mb-2 tracking-tighter">In-Store Pickup</h3>
                        <p class="text-xs text-gray-400 font-bold leading-relaxed">Order ahead and pick up at our nearest store.</p>
                    </div>
                </div>

                <!-- DYNAMIC BRANCHES SECTION (አስማቱ እዚህ ነው!) -->
                <div class="bg-white rounded-[40px] p-10 border border-orange-50 shadow-xl shadow-orange-50">
                    <div class="flex items-center justify-between mb-10 border-b border-orange-50 pb-6">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-[#FF6B00] mb-1">Our Locations</p>
                            <h3 class="text-2xl font-black text-[#8C2F00] tracking-tighter">Nearest Store</h3>
                        </div>
                        <a href="#branches" class="bg-[#F7F6F0] text-[#8C2F00] px-6 py-2 rounded-full text-[10px] font-black uppercase hover:bg-orange-50">See Map</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($allBranches as $branch)
                            <div class="rounded-3xl bg-[#F7F6F0] p-6 hover:bg-white hover:shadow-lg border border-transparent hover:border-orange-100 transition-all group">
                                <p class="text-sm font-black text-[#8C2F00] group-hover:text-[#FF6B00] transition-colors">
                                    {{ $branch->name }}
                                </p>
                                <p class="mt-2 text-[10px] text-gray-500 font-bold leading-relaxed">
                                    📍 {{ $branch->location }} <br>
                                    📞 {{ $branch->phone }} <br>
                                    <span class="text-[#8C2F00]/40 uppercase mt-1 inline-block">7:00 AM - 9:00 PM</span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <!-- 3. Bottom Rewards Info -->
        <div class="mt-12 bg-[#8C2F00] rounded-[50px] p-10 text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-2xl">
            <div>
                <p class="text-[10px] font-black uppercase tracking-widest text-orange-400 mb-2">Exclusive Rewards</p>
                <h3 class="text-3xl font-black tracking-tighter italic leading-none">Healthy Rewards Await.</h3>
                <p class="mt-2 text-sm text-orange-100/60 font-medium">Join our rewards program and earn points with every fresh order.</p>
            </div>
            <a href="/register" class="bg-[#FF6B00] text-white px-10 py-5 rounded-full font-black text-xs uppercase tracking-widest shadow-xl hover:-translate-y-1 transition-all">JOIN NOW 🎁</a>
        </div>

    </div>
</section>

<!-- FOOTER CTA -->
<div class="bg-gray-900 text-white p-20 rounded-[50px] mx-10 mb-10 flex flex-col md:flex-row items-center justify-between overflow-hidden relative">
    <div class="md:w-1/2 z-10">
        <h2 class="text-5xl font-black mb-6">Freshness Delivered <br>To Your Door</h2>
        <p class="text-gray-400 max-w-sm mb-10 italic font-medium">Order now and enjoy clean, cold-pressed goodness delivered fresh, right to you.</p>
        <a href="#branches" class="bg-[#7FB432] text-white px-10 py-5 rounded-full font-black text-sm inline-block shadow-xl">START ORDERING</a>
    </div>
    <img src="https://images.unsplash.com/photo-1547514701-42782101795e?q=80&w=400" alt="Freshness" class="absolute right-0 opacity-20 md:opacity-100 -bottom-10 w-96 rounded-3xl">
</div>

</body>
</html>
