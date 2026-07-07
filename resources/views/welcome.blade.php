<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Juice - Freshness Delivered</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-[#FDFDFC]">

<!-- 1. NAVIGATION (Updated for Register Button) -->
<nav class="flex justify-between items-center px-10 py-6 max-w-7xl mx-auto">

    <!-- Logo -->
    <div class="text-2xl font-black tracking-tighter uppercase">
        <span class="text-[#FF6B00]">juice</span><span class="text-[#8C2F00]">world</span><span class="text-orange-500">.</span>
    </div>

    <!-- Menu Links (Register እዚህ ጋር ጠፍቷል) -->
    <div class="hidden md:flex gap-10 text-[11px] font-black uppercase tracking-[0.2em] text-gray-500">
        <a href="home" class="text-[#FF6B00] border-b-2 border-[#FF6B00] pb-1">Home</a>
        <a href="#menu" class="hover:text-[#FF6B00] transition-all">Menu</a>
        <a href="#branches" class="hover:text-[#FF6B00] transition-all">Branches</a>
        <a href="#about" class="hover:text-[#FF6B00] transition-all">About Us</a>
        <a href="#order-contact" class="hover:text-[#FF6B00] transition-all">Contact</a>
    </div>

    <!-- Right Side: REGISTER / DASHBOARD Button -->
    <div class="flex items-center gap-4">
        @auth
            <!-- ተጠቃሚው ቀድሞውኑ Login ካደረገ ስሙን እና DASHBOARD ያሳያል -->
            <span class="text-[9px] font-black text-gray-400 uppercase hidden lg:inline">{{ auth()->user()->name }}</span>
            <a href="/admin/orders" class="bg-[#8C2F00] text-white px-8 py-3.5 rounded-full font-black text-[10px] uppercase tracking-widest shadow-xl hover:bg-[#FF6B00] transition-all">
                DASHBOARD
            </a>
        @else
            <!-- እንግዳ ከሆነ (Guest) መጀመሪያ REGISTER ይታያል -->
            <a href="/login" class="text-[10px] font-black uppercase text-gray-400 hover:text-orange-500 mr-2 transition-all">Login</a>

            <a href="/register" class="bg-[#FF6B00] text-white px-8 py-3.5 rounded-full font-black text-[10px] uppercase tracking-widest shadow-xl shadow-orange-200 hover:bg-[#8C2F00] transition-all">
                REGISTER
            </a>
        @endauth
    </div>

</nav>

<!-- 2. HERO SECTION (Amharic & English Balanced) -->
<section class="max-w-7xl mx-auto px-10 py-20 flex flex-col md:flex-row items-center justify-between">
    <div class="md:w-1/2 space-y-6">

        <!-- Top Badge -->
        <div class="flex items-center gap-2 text-xs font-bold text-gray-400 uppercase tracking-widest">
            <span class="border border-orange-200 px-3 py-1 rounded-full text-[10px] text-orange-500 bg-orange-50">
                ⊙ 100% Fresh & Organic
            </span>
        </div>

        <!-- Main Heading -->
        <h1 class="text-5xl md:text-7xl font-black text-gray-900 leading-[1.1] tracking-tighter">
            Sip Purity.<br>
            <span class="text-[#FF6B00]">Live Healthy.</span>
        </h1>

        <!-- Amharic Sub-heading -->
        <h2 class="text-2xl font-bold text-[#8C2F00] leading-tight">
            ንጽህናን ይጠጡ፣ በጤና ይኑሩ።
        </h2>

        <!-- Description Section -->
        <div class="space-y-4">
            <p class="text-gray-500 text-lg max-w-md italic leading-relaxed">
                Experience the true taste of nature. Our juices are cold-pressed daily from the finest local fruits to preserve every nutrient.
            </p>
            <p class="text-gray-600 text-base max-w-md font-medium leading-relaxed border-l-4 border-orange-500 pl-4">
                እውነተኛ የተፈጥሮ ጣዕምን ይለማመዱ። በየቀኑ ከምርጥ ፍራፍሬዎች የሚዘጋጁ ጁሶቻችን ሁሉንም ቪታሚኖች በውስጣቸው የያዙ እና ለጤናዎ ተስማሚ ናቸው።
            </p>
        </div>

        <!-- Call to Action Buttons -->
        <div class="flex gap-4 pt-4">
            <a href="#branches" class="bg-[#FF6B00] text-white px-10 py-4 rounded-full font-black text-xs uppercase tracking-widest hover:bg-[#8C2F00] shadow-xl shadow-orange-200 transition-all transform hover:-translate-y-1">
                ORDER NOW →
            </a>
            <a href="#menu" class="border-2 border-gray-100 text-gray-900 px-10 py-4 rounded-full font-black text-xs uppercase tracking-widest hover:bg-gray-50 transition-all text-center">
                EXPLORE MENU
            </a>
        </div>

        <!-- Trust Badges -->
        <div class="pt-12 flex flex-wrap gap-8 text-[9px] font-black text-gray-400 uppercase tracking-widest">
            <div class="flex items-center gap-2">🥑 100% Natural / ተፈጥሯዊ</div>
            <div class="flex items-center gap-2">🧊 No Sugar / ያለ ስኳር</div>
            <div class="flex items-center gap-2">🛵 Fresh Delivery / ትኩስ ስርጭት</div>
        </div>
    </div>

    <!-- Image Container -->
    <div class="md:w-1/2 relative mt-20 md:mt-0 flex justify-center">
        <!-- Background decorative circle -->
        <div class="absolute -z-10 bg-orange-100 w-[450px] h-[450px] rounded-full filter blur-3xl opacity-40 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-pulse"></div>

        <!-- Main Hero Image -->
        <div class="relative group">
            <img src="{{ asset('images/hero-juice.jpg') }}"
                 alt="Juice World Hero"
                 class="rounded-[60px] shadow-2xl hover:rotate-2 transition-transform duration-700 w-full max-w-[500px] h-[550px] object-cover border-[12px] border-white">

            <!-- Small floating tag -->
            <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-3xl shadow-xl border border-orange-50 animate-bounce">
                <span class="text-orange-500 font-black text-xl">Best in Town!</span>
            </div>
        </div>
    </div>
</section>


<!-- MENU SECTION (Juice World Professional Design) -->
<section
    id="menu"
    class="bg-[#FFF8F1] py-24 rounded-[60px] mx-4 md:mx-10 mb-10 shadow-sm border border-orange-50"
>
    <div class="max-w-7xl mx-auto px-6 md:px-12">

        <!-- 1. Centered Header -->
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-5xl md:text-7xl font-black text-[#8C2F00] leading-tight tracking-tighter uppercase">
                Our <span class="text-[#FF6B00]">Menu</span>
            </h2>
            <p class="mt-4 text-gray-500 text-sm md:text-base font-medium italic">
                ትኩስ እና ተፈጥሯዊ ፍራፍሬዎች ለጤናዎ። <br>
                እውነተኛ ጣዕም በ Juice World!
            </p>
        </div>

        <!-- 2. Category Tabs (Vanilla JS Powered) -->
        <div class="flex flex-wrap justify-center gap-3 mb-20" id="category-buttons">
            <button onclick="filterMenu('all', this)" class="menu-tab-btn active-tab px-10 py-3.5 rounded-full text-[11px] font-black uppercase tracking-widest transition-all duration-300">
                All Drinks
            </button>
            <button onclick="filterMenu('juice', this)" class="menu-tab-btn bg-white text-[#8C2F00] border border-orange-100 px-10 py-3.5 rounded-full text-[11px] font-black uppercase tracking-widest hover:bg-orange-50 transition-all duration-300">
                Juices (ጁስ)
            </button>
            <button onclick="filterMenu('shake', this)" class="menu-tab-btn bg-white text-[#8C2F00] border border-orange-100 px-10 py-3.5 rounded-full text-[11px] font-black uppercase tracking-widest hover:bg-orange-50 transition-all duration-300">
                Milkshakes (ሚልክ ሼክ)
            </button>
        </div>

        {{-- ========================= JUICES SECTION ========================= --}}
        <div id="juice-section" class="mb-24">
            <div class="flex justify-between items-center mb-10 border-b border-orange-100 pb-4">
                <h3 class="text-2xl font-black text-[#8C2F00] flex items-center gap-3">
                    <span class="w-2 h-8 bg-[#FF6B00] rounded-full"></span> ጁስ (Juices)
                </h3>
            </div>

            @php
                $juices = [
                    ['name'=>'Avocado','amharic'=>'አቮካዶ','price'=>'150'],
                    ['name'=>'Papaya','amharic'=>'ፓፓያ','price'=>'150'],
                    ['name'=>'Spris','amharic'=>'ስፕሪስ','price'=>'150'],
                    ['name'=>'Ambasha','amharic'=>'አምባሻ','price'=>'150'],
                    ['name'=>'Zaytun','amharic'=>'ዘይቱን','price'=>'150'],
                    ['name'=>'Strawberry','amharic'=>'ስትሮበሪ','price'=>'180'],
                    ['name'=>'Mango','amharic'=>'ማንጎ','price'=>'200'],
                    ['name'=>'Spris with Mango','amharic'=>'ስፕሪስ በማንጎ','price'=>'170'],
                    ['name'=>'Pineapple','amharic'=>'አናናስ','price'=>'180'],
                    ['name'=>'Watermelon','amharic'=>'ሀብሀብ','price'=>'160'],
                    ['name'=>'Apple','amharic'=>'አፕል','price'=>'240'],
                    ['name'=>'Orange','amharic'=>'ብርቱካን','price'=>'180'],
                    ['name'=>'Lemon','amharic'=>'ሎሚ','price'=>'150'],
                    ['name'=>'Juice Special','amharic'=>'ጁስ ወርልድ ስፔሻል','price'=>'220'],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                @foreach($juices as $item)
                    <div class="flex flex-col group">
                        <!-- ምስል + የ (+) በተን -->
                        <div class="relative w-full aspect-square bg-white rounded-[3rem] mb-6 flex items-center justify-center shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-orange-50/50">
                            <span class="text-6xl group-hover:scale-110 transition-transform duration-500">🥤</span>

                            <!-- የተስተካከለው የ (+) ሊንክ ሎጂክ -->
                            <a href="{{ auth()->check() ? '/juice/'.$loop->iteration.'/select-branch' : route('register') }}"
                               class="absolute bottom-4 right-4 w-12 h-12 bg-[#FF6B00] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-[#8C2F00] hover:scale-110 transition-all text-3xl font-light no-underline">
                                +
                            </a>
                        </div>

                        <div class="px-2 text-center">
                            <h4 class="text-sm font-black text-[#8C2F00] uppercase tracking-wide leading-tight mb-1">{{ $item['name'] }}</h4>
                            <p class="text-[10px] text-gray-400 font-bold italic mb-2">{{ $item['amharic'] }}</p>
                            <span class="text-base font-black text-[#FF6B00]">{{ $item['price'] }} <small class="text-[9px]">ETB</small></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- ========================= MILKSHAKES SECTION ========================= --}}
        <div id="shake-section">
            <div class="flex justify-between items-center mb-10 border-b border-orange-100 pb-4">
                <h3 class="text-2xl font-black text-[#8C2F00] flex items-center gap-3">
                    <span class="w-2 h-8 bg-[#FF6B00] rounded-full"></span> ሚልክ ሼክ (Milkshakes)
                </h3>
            </div>

            @php
                $shakes = [
                    ['name'=>'Avocado Shake','amharic'=>'አቮካዶ ሼክ','price'=>'200'],
                    ['name'=>'Mango Shake','amharic'=>'ማንጎ ሼክ','price'=>'250'],
                    ['name'=>'Chocolate Shake','amharic'=>'ቸኮሌት ሼክ','price'=>'220'],
                    ['name'=>'Strawberry Shake','amharic'=>'ስትሮበሪ ሼክ','price'=>'250'],
                    ['name'=>'Vanilla Shake','amharic'=>'ቫኒላ ሼክ','price'=>'200'],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                @foreach($shakes as $shake)
                    <div class="flex flex-col group">
                        <div class="relative w-full aspect-square bg-white rounded-[3rem] mb-6 flex items-center justify-center shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-orange-50/50">
                            <span class="text-6xl group-hover:scale-110 transition-transform duration-500">🥛</span>

                            <!-- አዲሱ የ "+" ማዘዣ በተን -->
                            <!-- አዲሱ የ "+" ሊንክ -->
                            <!-- በ welcome.blade.php ውስጥ ያለውን የ (+) ሊንክ እንዲህ ቀይረው -->
                            <a href="{{ auth()->check() ? '/juice/'.$loop->iteration.'/select-branch' : route('register') }}"
                               class="absolute bottom-4 right-4 w-12 h-12 bg-[#FF6B00] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-[#8C2F00] hover:scale-110 transition-all text-3xl font-light no-underline">
                                +
                            </a>
                        </div>
                        <div class="px-2">
                            <h4 class="text-sm font-black text-[#8C2F00] uppercase tracking-wide mb-1">{{ $shake['name'] }}</h4>
                            <p class="text-[10px] text-gray-400 font-bold italic mb-2">{{ $shake['amharic'] }}</p>
                            <span class="text-base font-black text-[#FF6B00]">{{ $shake['price'] }} <small class="text-[9px]">ETB</small></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<!-- Custom Styles -->
<style>
    .active-tab {
        background-color: #8C2F00 !important;
        color: white !important;
        box-shadow: 0 20px 25px -5px rgba(140, 47, 0, 0.2);
    }
    .scrollbar-hide::-webkit-scrollbar { display: none; }
</style>

<!-- Filter Script -->
<script>
    function filterMenu(type, btn) {
        const juiceSection = document.getElementById('juice-section');
        const shakeSection = document.getElementById('shake-section');

        if (type === 'all') {
            juiceSection.style.display = 'block';
            shakeSection.style.display = 'block';
        } else if (type === 'juice') {
            juiceSection.style.display = 'block';
            shakeSection.style.display = 'none';
        } else if (type === 'shake') {
            juiceSection.style.display = 'none';
            shakeSection.style.display = 'block';
        }

        document.querySelectorAll('.menu-tab-btn').forEach(b => {
            b.classList.remove('active-tab');
            b.classList.add('bg-white', 'text-[#8C2F00]');
        });

        btn.classList.add('active-tab');
        btn.classList.remove('bg-white', 'text-[#8C2F00]');
    }
</script>
<!-- ABOUT US SECTION (Bilingual & Orange Theme) -->
<section id="about" class="bg-[#FFF8F1] py-24 rounded-[60px] mx-4 md:mx-10 mb-10 shadow-sm border border-orange-50">
    <div class="max-w-7xl mx-auto px-6 md:px-12">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">

            <!-- 1. Text Content -->
            <div class="space-y-8">
                <div>
                    <p class="text-sm font-black text-[#FF6B00] uppercase tracking-[0.3em] mb-4">
                        Our Identity / ማንነታችን
                    </p>
                    <h2 class="text-4xl md:text-6xl font-black text-[#8C2F00] leading-tight tracking-tighter">
                        መነሻችን ንጽህና፣ <br> ግባችን <span class="text-[#FF6B00]">ጤናማነት።</span>
                    </h2>
                    <p class="text-gray-400 font-bold uppercase text-[10px] tracking-widest mt-2">
                        Rooted in purity. Driven by purpose.
                    </p>
                </div>

                <div class="space-y-4">
                    <p class="text-gray-600 text-lg leading-relaxed font-medium italic">
                        At Juice World, we believe real ingredients create real change. Our juices are made fresh daily with the finest organic fruits, never sweetened, and never compromised.
                    </p>
                    <p class="text-gray-500 text-base leading-relaxed font-medium border-l-4 border-orange-500 pl-4">
                        በ ጁስ ወርልድ (Juice World) እውነተኛ ግብዓቶች እውነተኛ ለውጥ ያመጣሉ ብለን እናምናለን። ጁሶቻችን በየቀኑ ከምርጥ ፍራፍሬዎች የሚዘጋጁ፣ ምንም አይነት ስኳር ወይም ኬሚካል ያልተቀላቀለባቸው እና ለጤናዎ ተስማሚ ናቸው።
                    </p>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 mt-12 border-t border-orange-100 pt-10 text-center sm:text-left">
                    <div>
                        <p class="text-3xl font-black text-[#FF6B00]">100%</p>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-tighter mt-1">Natural / ተፈጥሯዊ</p>
                    </div>

                    <div>
                        <p class="text-3xl font-black text-[#FF6B00]">0</p>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-tighter mt-1">Additives / ኬሚካሎች</p>
                    </div>

                    <div>
                        <p class="text-3xl font-black text-[#FF6B00]">10+</p>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-tighter mt-1">Years / የልምድ ዓመታት</p>
                    </div>

                    <div>
                        <p class="text-3xl font-black text-[#FF6B00]">24h</p>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-tighter mt-1">Freshness / ትኩስነት</p>
                    </div>
                </div>
            </div>

            <!-- 2. Image Side -->
            <div class="relative group">
                <!-- Decorative Shapes -->
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-orange-100 rounded-full blur-3xl opacity-60"></div>
                <div class="absolute -inset-4 bg-orange-200/40 rounded-[50px] rotate-3 group-hover:rotate-0 transition-transform duration-700"></div>

                <img src="{{ asset('images/hero-juice.jpg') }}"
                     alt="Our Fresh Process"
                     class="relative w-full aspect-[4/5] object-cover rounded-[50px] shadow-2xl z-10 border-8 border-white">

                <!-- Floating Info -->
                <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-3xl shadow-xl z-20 hidden md:block border border-orange-50">
                    <p class="text-[#8C2F00] font-black text-xl italic">Premium Quality</p>
                    <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Sourced from local farms</p>
                </div>
            </div>

        </div>

        <!-- 3. Core Values Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-24">

            <!-- Mission -->
            <div class="bg-white rounded-[40px] border border-orange-50 p-10 flex flex-col items-center text-center shadow-xl shadow-orange-100/50 hover:-translate-y-2 transition-all group">
                <div class="w-16 h-16 rounded-2xl bg-orange-50 text-[#FF6B00] flex items-center justify-center mb-6 text-3xl shadow-inner group-hover:rotate-6 transition-transform">🌱</div>
                <h3 class="text-sm font-black text-[#8C2F00] uppercase tracking-widest mb-4">Our Mission / ዓላማችን</h3>
                <p class="text-xs text-gray-500 leading-relaxed font-bold italic">To make healthy living easy and accessible for everyone. / ጤናማ አኗኗርን ለሁሉም ሰው ቀላል እና ተደራሽ ማድረግ።</p>
            </div>

            <!-- Promise -->
            <div class="bg-[#8C2F00] rounded-[40px] p-10 flex flex-col items-center text-center shadow-2xl shadow-orange-200 hover:-translate-y-2 transition-all group">
                <div class="w-16 h-16 rounded-2xl bg-white/10 text-orange-400 flex items-center justify-center mb-6 text-3xl shadow-inner group-hover:scale-110 transition-transform">✨</div>
                <h3 class="text-sm font-black text-white uppercase tracking-widest mb-4">Our Promise / ቃላችን</h3>
                <p class="text-xs text-orange-100/70 leading-relaxed font-bold italic text-white/80">Real flavor and real results in every cup. / በእያንዳንዱ ኩባያ ውስጥ እውነተኛ ጣዕም እና ውጤት እናቀርባለን።</p>
            </div>

            <!-- Sustainability -->
            <div class="bg-white rounded-[40px] border border-orange-50 p-10 flex flex-col items-center text-center shadow-xl shadow-orange-100/50 hover:-translate-y-2 transition-all group">
                <div class="w-16 h-16 rounded-2xl bg-orange-50 text-[#FF6B00] flex items-center justify-center mb-6 text-3xl shadow-inner group-hover:-rotate-6 transition-transform">♻️</div>
                <h3 class="text-sm font-black text-[#8C2F00] uppercase tracking-widest mb-4">Eco-Friendly / ተፈጥሮን መጠበቅ</h3>
                <p class="text-xs text-gray-500 leading-relaxed font-bold italic">Thoughtful choices for our beautiful planet. / ለተፈጥሮ እና ለአካባቢያችን ጥንቃቄ የተሞላበት ምርጫ እናደርጋለን።</p>
            </div>

        </div>

    </div>
</section>
<<!-- 3. OUR LOCATIONS SECTION (Fully Dynamic & Professional) -->
<section id="branches" class="max-w-7xl mx-auto px-6 md:px-12 py-32 bg-[#F7F6F0] rounded-[60px] mb-20 shadow-inner border border-orange-50 relative overflow-hidden">

    <div class="absolute top-0 right-0 w-64 h-64 bg-orange-200/20 rounded-full blur-3xl -mr-32 -mt-32"></div>

    <!-- Header -->
    <div class="text-center mb-20 relative z-10">
        <p class="text-sm font-black text-[#FF6B00] uppercase tracking-[0.4em] mb-4">Visit Us / ይጎብኙን</p>
        <h2 class="text-4xl md:text-6xl font-black text-[#8C2F00] uppercase tracking-tighter">Our <span class="text-[#FF6B00]">Locations</span></h2>
        <h3 class="text-xl font-bold text-[#8C2F00]/60 mt-2">ቅርንጫፎቻችን</h3>
        <div class="w-20 h-1.5 bg-[#FF6B00] mx-auto mt-6 rounded-full"></div>
    </div>

    <!-- Branch Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 relative z-10">
        @foreach ($allBranches as $branch)
            <div class="bg-white p-10 md:p-14 rounded-[55px] shadow-2xl shadow-orange-100/50 border border-transparent hover:border-[#FF6B00] transition-all duration-700 group flex flex-col items-center text-center relative overflow-hidden">

                <div class="absolute -right-8 -bottom-8 text-[12rem] text-orange-50 opacity-0 group-hover:opacity-40 transition-all duration-700 pointer-events-none select-none">📍</div>

                <div class="w-24 h-24 bg-orange-50 rounded-[30px] flex items-center justify-center text-4xl mb-8 shadow-inner group-hover:rotate-12 transition-transform duration-500">🏢</div>

                <!-- ቅርንጫፉ ስም (Bole, Meskelegna...) በራሱ ይመጣል -->
                <h3 class="text-3xl font-black text-[#8C2F00] uppercase tracking-tight mb-6">{{ $branch->name }}</h3>

                <!-- Contact & Location Info -->
                <div class="space-y-4 mb-10 w-full">
                    <div class="flex items-center justify-center gap-3 py-4 border-y border-orange-50">
                        <span class="text-lg">📍</span>
                        <p class="text-gray-500 font-bold text-sm uppercase tracking-wide">
                            <!-- ሎጂክ፡ ስሙ ላይ "Eshet" ካለ "አድራሻ፡ እሸት" ይላል፣ ካልሆነ "አድራሻ፡ መስቀለኛ" -->
                            አድራሻ፡ {{ str_contains($branch->name, 'Eshet') ? 'እሸት' : 'መስቀለኛ' }}
                            <span class="block text-[10px] text-gray-300">({{ $branch->location }})</span>
                        </p>
                    </div>
                    <div class="flex items-center justify-center gap-3">
                        <span class="text-lg">📞</span>
                        <p class="text-gray-500 font-bold text-sm tracking-widest">{{ $branch->phone }}</p>
                    </div>
                </div>

                <!-- Working Hours -->
                <div class="mb-10 px-6 py-2 bg-[#F7F6F0] rounded-full inline-block">
                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-[0.2em]">
                        🕒 Open: Mon - Sun (1:00 LT - 3:00 LT)
                    </p>
                </div>

                <a href="/branch/{{ $branch->id }}"
                   class="w-full bg-[#8C2F00] text-white py-5 rounded-full font-black text-xs uppercase tracking-[0.3em] hover:bg-[#FF6B00] shadow-xl shadow-orange-200 transition-all duration-300 transform group-hover:-translate-y-2 no-underline">
                    EXPLORE MENU 🥤
                </a>
            </div>
        @endforeach
    </div>
</section>
<!-- 4. ORDER & CONTACT SECTION -->
<section id="order-contact" class="bg-[#FFF8F1] py-24 rounded-[60px] mx-4 md:mx-10 mb-10 shadow-inner border border-orange-50 relative overflow-hidden">

    <!-- Background Decor -->
    <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-orange-100/30 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 md:px-12 relative z-10">

        <!-- Header -->
        <div class="max-w-3xl mx-auto text-center mb-20">
            <p class="text-[10px] font-black tracking-[0.4em] uppercase text-[#FF6B00] mb-4">
                Order & Contact / ትዕዛዝ እና አድራሻ
            </p>
            <h2 class="text-4xl md:text-6xl font-black text-[#8C2F00] leading-tight tracking-tighter uppercase">
                Sip Fresh. <br><span class="text-[#FF6B00]">Connect With Us.</span>
            </h2>
            <p class="mt-6 text-gray-500 text-sm md:text-base font-medium italic">
                እዚያው መጥተው መውሰድ (Pickup) ወይም ያሉበት ድረስ እንዲመጣ (Delivery) ይዘዙ።
            </p>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">

            <!-- በስተግራ፡ የሜሴጅ መላኪያ (Contact Form) -->
            <div class="bg-white rounded-[50px] p-10 md:p-14 shadow-2xl shadow-orange-100/50 border border-orange-50 relative">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-16 h-16 rounded-3xl bg-orange-50 text-[#FF6B00] flex items-center justify-center text-3xl shadow-inner italic">@</div>
                    <div>
                        <p class="text-[9px] font-black uppercase tracking-widest text-[#FF6B00]">Get In Touch</p>
                        <h3 class="text-2xl font-black text-[#8C2F00]">Send us a message</h3>
                    </div>
                </div>

                <form class="space-y-6">
                    @csrf
                    <input type="text" placeholder="Full Name / ሙሉ ስም" class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-5 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 outline-none">
                    <input type="email" placeholder="Email / ኢሜይል" class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-5 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 outline-none">
                    <textarea rows="4" placeholder="Your Message / መልእክትዎ..." class="w-full rounded-3xl border-none bg-[#F7F6F0] px-6 py-5 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 outline-none resize-none"></textarea>

                    <button type="submit" class="w-full bg-[#8C2F00] text-white py-5 rounded-full font-black text-xs uppercase tracking-widest shadow-xl shadow-orange-200 hover:bg-[#FF6B00] hover:-translate-y-1 transition-all">
                        SEND MESSAGE / መልእክት ላክ
                    </button>
                </form>
            </div>

            <!-- በስተቀኝ፡ Options & Dynamic Locations -->
            <div class="space-y-10">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-[#8C2F00] text-white rounded-[40px] p-8 shadow-xl shadow-orange-100 relative group overflow-hidden">
                        <span class="absolute right-[-10px] top-[-10px] text-7xl opacity-10 group-hover:scale-125 transition-transform">🛵</span>
                        <h3 class="text-xl font-black mb-2 italic">Delivery</h3>
                        <p class="text-[11px] text-orange-100/70 font-bold leading-relaxed">ያሉበት ቦታ ድረስ በፍጥነት እናመጣለን።</p>
                    </div>
                    <div class="bg-white rounded-[40px] p-8 border border-orange-50 shadow-lg relative group overflow-hidden">
                        <span class="absolute right-[-10px] top-[-10px] text-7xl opacity-10 group-hover:scale-125 transition-transform">🛍️</span>
                        <h3 class="text-xl font-black text-[#8C2F00] mb-2 italic">Pickup</h3>
                        <p class="text-[11px] text-gray-400 font-bold leading-relaxed">መጥተው ወዲያውኑ መውሰድ ይችላሉ።</p>
                    </div>
                </div>

                <div class="bg-white rounded-[50px] p-10 border border-orange-50 shadow-xl">
                    <div class="flex items-center justify-between mb-8 border-b border-orange-50 pb-6">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-[#FF6B00] mb-1">Our Outlets</p>
                            <h3 class="text-2xl font-black text-[#8C2F00]">Find your nearest store</h3>
                        </div>
                        <a href="#branches" class="text-orange-300 hover:text-[#FF6B00] transition-colors italic font-bold text-xs underline decoration-orange-100">See Map</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($allBranches as $branch)
                            <div class="rounded-[35px] bg-[#F7F6F0] p-7 hover:bg-white hover:shadow-2xl border border-transparent hover:border-orange-100 transition-all duration-500 group">
                                <p class="text-sm font-black text-[#8C2F00] group-hover:text-[#FF6B00] transition-colors uppercase">
                                    {{ $branch->name }}
                                </p>
                                <div class="mt-4 space-y-2 text-[10px] text-gray-400 font-bold">
                                    <p class="flex items-center gap-2">📍 {{ $branch->location }}</p>
                                    <p class="flex items-center gap-2">📞 {{ $branch->phone }}</p>
                                    <p class="flex items-center gap-2 text-[#8C2F00]/50 uppercase tracking-tighter">🕒 1:00 LT - 3:00 LT</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <!-- 3. FOOD COMING SOON SECTION  -->
        <div class="mt-16 bg-[#8C2F00] rounded-[55px] p-12 text-white flex flex-col md:flex-row items-center justify-between gap-10 shadow-2xl relative overflow-hidden">

            <div class="absolute left-0 top-0 w-32 h-32 bg-[#FF6B00]/20 rounded-full blur-3xl -ml-16 -mt-16"></div>

            <div class="relative z-10 text-center md:text-left">
                <p class="text-[10px] font-black uppercase tracking-[0.4em] text-orange-400 mb-2">
                    Exciting News / ታላቅ ዜና
                </p>
                <h3 class="text-3xl md:text-5xl font-black tracking-tight italic leading-tight uppercase">
                    Food <span class="text-[#FF6B00]">Coming Soon</span> 🍔🍟
                </h3>
                <p class="mt-4 text-sm md:text-base text-orange-100/60 font-medium max-w-lg leading-relaxed">
                    እውነተኛ የምግብ ጣዕም ከትኩስ ጁሶቻችን ጋር በቅርቡ እናቀርባለን። ዝግጅታችንን አጠናቀናል፤ በቅርብ ይጠብቁን!
                </p>
            </div>

            <div class="relative z-10 bg-white/5 border-2 border-orange-500/30 px-10 py-5 rounded-[30px] shadow-xl backdrop-blur-sm animate-pulse">
                <div class="text-center">
                    <span class="block text-2xl mb-1">🕒</span>
                    <p class="text-xs font-black text-[#FF6B00] uppercase tracking-widest">በቅርብ ቀን</p>
                    <p class="text-[10px] text-gray-400 font-bold uppercase mt-1 italic">Stay Tuned</p>
                </div>
            </div>
        </div>

    </div>
</section>
</body>
</html>
