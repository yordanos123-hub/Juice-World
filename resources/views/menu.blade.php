<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>Just Juice Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* ለእይታ እንዲያምር ብርቱካናማ ጥላዎች */
        .dark-orange { color: #8C2F00; }
        .bg-dark-orange { background-color: #8C2F00; }
        .accent-orange { color: #FF6B00; }
        .bg-accent-orange { background-color: #FF6B00; }
    </style>
</head>
<body class="bg-[#FDFDFC] p-10">

<div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-12">

    <!-- በስተግራ፡ ርዕስ እና መግለጫ (Dark Orange Theme) -->
    <div class="md:w-1/4">
        <h1 class="text-6xl font-black text-[#8C2F00] leading-[0.9]">Our <br> <span class="text-[#FF6B00]">Menu</span></h1>
        <p class="text-gray-500 mt-8 text-sm font-medium leading-relaxed border-l-4 border-orange-500 pl-4">
            ትኩስ ፍራፍሬዎች፣ ጤናማ ግብዓቶች። ለእርስዎ ተብሎ የተዘጋጀ ምርጥ የጁስ ዝርዝር።
        </p>

        <div class="mt-12 p-8 bg-white rounded-[35px] shadow-2xl shadow-orange-100 border border-orange-50 relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-16 h-16 bg-orange-100 rounded-full opacity-50 group-hover:scale-150 transition-transform"></div>
            <span class="text-[#FF6B00] text-3xl font-black italic">100%</span>
            <p class="text-xs font-black text-[#8C2F00] uppercase mt-1 tracking-tighter">Cold-Pressed Juice</p>
            <p class="text-[10px] text-gray-400 mt-3 italic leading-tight">ምንም አይነት ስኳር ወይም ኬሚካል አልተጨመረበትም። ተፈጥሯዊነቱ የተጠበቀ!</p>
        </div>
    </div>

    <!-- በስተቀኝ፡ የጁስ ዝርዝር -->
    <div class="md:w-3/4">

        <!-- Category Tabs (ብርቱካናማ ከለር) -->
        <div class="flex gap-4 mb-12 overflow-x-auto pb-2 scrollbar-hide">
            <button class="bg-[#8C2F00] text-white px-8 py-3 rounded-full text-xs font-black uppercase shadow-lg shadow-orange-200">All Drinks</button>
            <button class="bg-white text-gray-400 border border-gray-100 px-8 py-3 rounded-full text-xs font-bold hover:bg-orange-50 hover:text-[#FF6B00] transition-all">Smoothies</button>
            <button class="bg-white text-gray-400 border border-gray-100 px-8 py-3 rounded-full text-xs font-bold hover:bg-orange-50 hover:text-[#FF6B00] transition-all">Detox Shots</button>
        </div>

        <!-- በየምድቡ የሚያሳየው ዝርዝር -->
        @foreach($juicesByCategory as $category => $items)
            <div class="mb-20">
                <div class="flex justify-between items-center mb-8 border-b border-orange-100 pb-4">
                    <h2 class="text-2xl font-black text-[#8C2F00] uppercase tracking-tighter flex items-center gap-3">
                        <span class="w-2 h-8 bg-[#FF6B00] rounded-full"></span> {{ $category }}
                    </h2>
                    <a href="#" class="text-[10px] font-black text-gray-400 hover:text-[#FF6B00] uppercase">View All →</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($items as $juice)
                        <div class="bg-white p-7 rounded-[45px] shadow-xl shadow-orange-50 border border-transparent hover:border-[#FF6B00] transition-all duration-500 group relative">

                            <div class="flex justify-between items-start mb-6">
                                <!-- የጁስ ምስል ማስቀመጫ -->
                                <div class="w-20 h-32 bg-gradient-to-b from-orange-50 to-orange-100 rounded-3xl flex items-center justify-center overflow-hidden shadow-inner group-hover:rotate-6 transition-transform">
                                    @if($juice->image)
                                        <img src="{{ asset('storage/' . $juice->image) }}" class="h-full w-full object-cover">
                                    @else
                                        <span class="text-4xl">🥤</span>
                                    @endif
                                </div>
                                <div class="bg-white px-3 py-1 rounded-full shadow-sm border border-orange-50">
                                    <span class="text-sm font-black text-[#8C2F00] tracking-tighter">{{ $juice->price }} <small class="text-[10px]">ETB</small></span>
                                </div>
                            </div>

                            <h3 class="text-xs font-black text-[#8C2F00] uppercase tracking-widest mb-2">{{ $juice->name }}</h3>
                            <p class="text-[10px] text-gray-400 mb-6 italic leading-relaxed line-clamp-2">{{ $juice->description }}</p>

                            <!-- ትዕዛዝ መስጫ በተን -->
                            <a href="/juice/{{ $juice->id }}/order" class="flex items-center justify-center gap-2 w-full bg-gray-50 text-[#8C2F00] py-4 rounded-3xl text-[10px] font-black uppercase group-hover:bg-[#FF6B00] group-hover:text-white group-hover:shadow-lg group-hover:shadow-orange-200 transition-all duration-300">
                                Add to Order 🛒
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
