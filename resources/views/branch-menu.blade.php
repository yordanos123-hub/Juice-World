<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>{{ $branch->name }} - Full Menu | Juice World</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .active-tab { background-color: #8C2F00 !important; color: white !important; box-shadow: 0 15px 20px -5px rgba(140, 47, 0, 0.2); }
    </style>
</head>
<body class="bg-[#FDFDFC]">

<!-- 1. Navbar -->
<nav class="flex justify-between items-center px-10 py-6 max-w-7xl mx-auto">
    <div class="text-2xl font-extrabold text-[#8C2F00]">juice world<span class="text-orange-500">.</span></div>
    <a href="/" class="bg-[#8C2F00] text-white px-6 py-2 rounded-full font-bold text-xs shadow-lg hover:bg-[#FF6B00] transition-all">BACK HOME</a>
</nav>

<!-- 2. Header Section -->
<div class="max-w-7xl mx-auto text-center py-16 px-6">
    <h1 class="text-5xl md:text-7xl font-black text-[#8C2F00] leading-tight tracking-tighter uppercase mb-4">
        {{ $branch->name }} <br><span class="text-[#FF6B00]">Full Menu</span>
    </h1>
    <p class="text-gray-400 text-sm font-medium italic">የመረጡትን ጁስ እዚህ ያግኙ። ትዕዛዝዎን ለመላክ የ (+) ምልክቱን ይጫኑ።</p>
</div>

<!-- 3. Category Filter Tabs -->
<div class="flex justify-center gap-3 mb-16" id="category-buttons">
    <button onclick="filterMenu('all', this)" class="menu-tab-btn active-tab px-10 py-3.5 rounded-full text-[10px] font-black uppercase tracking-widest border border-orange-100 transition-all duration-300">
        All Drinks
    </button>
    @foreach($juicesByCategory as $category => $items)
        <button onclick="filterMenu('{{ $category }}', this)" class="menu-tab-btn bg-white text-[#8C2F00] px-10 py-3.5 rounded-full text-[10px] font-black uppercase tracking-widest border border-orange-100 transition-all duration-300">
            {{ $category }}s
        </button>
    @endforeach
</div>

<!-- 4. The Magic Data Loop (ጁሶቹን የሚያወጣው ክፍል) -->
<section class="max-w-7xl mx-auto px-6 md:px-12 pb-24">
    @foreach($juicesByCategory as $category => $items)
        <div class="category-group mb-24" id="category-{{ $category }}">
            <h2 class="text-2xl font-black text-[#8C2F00] mb-10 uppercase flex items-center gap-3 tracking-tighter">
                <span class="w-2 h-8 bg-[#FF6B00] rounded-full"></span> {{ $category }}s
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($items as $juice)
                    <div class="flex flex-col group relative">
                        <!-- Image Container -->
                        <div class="relative w-full aspect-square bg-[#F7F6F0] rounded-[3rem] mb-6 flex items-center justify-center shadow-sm hover:shadow-2xl hover:bg-white border border-transparent hover:border-orange-200 transition-all duration-500 overflow-hidden">

                            @if($juice->image)
                                <img src="{{ asset('images/' . $juice->image) }}" alt="{{ $juice->name }}" class="h-full w-full object-contain p-6 group-hover:scale-110 transition-transform">
                            @else
                                <span class="text-6xl group-hover:scale-110 transition-transform opacity-30">
                                    {{ $category == 'Milkshake' ? '🥛' : '🥤' }}
                                </span>
                            @endif

                            <!-- 🏆 DIRECT ORDER BUTTON -->
                            <a href="/juice/{{ $juice->id }}/branch/{{ $branch->id }}/order"
                               class="absolute bottom-4 right-4 w-12 h-12 bg-[#FF6B00] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-[#8C2F00] hover:scale-110 transition-all text-3xl font-light no-underline">
                                +
                            </a>
                        </div>

                        <!-- Product Info -->
                        <div class="px-2 text-center">
                            <h4 class="text-sm font-black text-[#8C2F00] uppercase tracking-wide leading-tight mb-1">{{ $juice->name }}</h4>
                            <span class="text-base font-black text-[#FF6B00] tracking-tighter">
                                {{ number_format($juice->price, 2) }} <small class="text-[9px]">ETB</small>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</section>

<!-- 5. JavaScript Filtering -->
<script>
    function filterMenu(category, btn) {
        document.querySelectorAll('.category-group').forEach(group => {
            group.style.display = (category === 'all' || group.id === 'category-' + category) ? 'block' : 'none';
        });
        document.querySelectorAll('.menu-tab-btn').forEach(b => {
            b.classList.remove('active-tab');
            b.classList.add('bg-white', 'text-[#8C2F00]');
        });
        btn.classList.add('active-tab');
        btn.classList.remove('bg-white', 'text-[#8C2F00]');
    }
</script>

</body>
</html>
