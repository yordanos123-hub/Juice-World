<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>የመጡ ትዕዛዞች - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10 font-sans">
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 uppercase tracking-tighter">የመጡ ትዕዛዞች 📋</h1>
        <a href="/" class="bg-[#8C2F00] text-white px-6 py-2 rounded-xl font-bold hover:bg-orange-600 transition-all shadow-lg">ወደ ዌብሳይቱ ተመለስ</a>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-xl mb-6 text-center shadow-md animate-pulse">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[40px] shadow-2xl overflow-hidden border border-orange-50">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 text-[#8C2F00] uppercase text-[10px] font-black tracking-widest border-b border-orange-100">
            <tr>
                <th class="p-6">ደንበኛ</th>
                <th class="p-6">የታዘዘ ጁስ</th>
                <th class="p-6">ቅርንጫፍ</th>
                <th class="p-6">ሁኔታ/ክፍያ</th>
                <th class="p-6 text-center">የክፍያ ማረጋገጫ</th>
                <th class="p-6">ሂሳብ</th>
                <th class="p-6">ስልክ/አድራሻ</th>
                <th class="p-6 text-center">ርምጃ (Action)</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
            @forelse($orders as $order)
                <tr class="hover:bg-orange-50/30 transition-all">
                    <td class="p-6 font-bold text-gray-700">{{ $order->user->name ?? 'Guest' }}</td>
                    <td class="p-6">
                        <span class="text-orange-600 font-black">{{ $order->juice->name }}</span>
                        <p class="text-[10px] text-gray-400 font-bold uppercase">{{ $order->juice->category }}</p>
                    </td>
                    <td class="p-6 text-gray-500 font-medium text-sm italic">{{ $order->branch->name }}</td>
                    <td class="p-6">
                        <div class="flex flex-col gap-1">
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase inline-block w-fit {{ $order->order_type == 'delivery' ? 'bg-blue-100 text-blue-600' : 'bg-purple-100 text-purple-600' }}">
                                {{ $order->order_type == 'delivery' ? '🚀 Delivery' : '🥤 Pickup' }}
                            </span>
                            <span class="text-[9px] font-black text-gray-400 uppercase tracking-tighter italic">
                                Paid via: {{ $order->payment_method }}
                            </span>
                        </div>
                    </td>

                    <!-- *** አዲሱ የክፍያ ማረጋገጫ ክፍል *** -->
                    <td class="p-6 text-center">
                        <!-- ደረጃ 1፡ ክፍያው ካልተከፈለ ማረጋገጫ ብቻ አሳይ -->
                        @if($order->payment_status == 'unpaid')
                            <form action="/admin/orders/{{ $order->id }}/pay" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-red-50 text-red-500 px-4 py-2 rounded-xl text-[10px] font-black uppercase border border-red-100 hover:bg-green-600 hover:text-white transition-all">
                                    💰 ክፍያ አረጋግጥ (Mark as Paid)
                                </button>
                            </form>

                            <!-- ደረጃ 2፡ ከተከፈለ በኋላ የ Accept በተን እንዲመጣ አድርግ -->
                        @elseif($order->status == 'Pending')
                            <div class="flex flex-col items-center gap-2">
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-[9px] font-black italic mb-1">✅ ክፍያ ተፈጽሟል</span>

                                <form action="/admin/orders/{{ $order->id }}/status" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-[#8C2F00] text-white px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-orange-600 shadow-lg transition-all">
                                        ✔️ ትዕዛዝ ተቀበል (Accept)
                                    </button>
                                </form>
                            </div>

                            <!-- ደረጃ 3፡ ትዕዛዙ ተቀባይነት ካገኘ በኋላ ሁኔታውን ብቻ አሳይ -->
                        @else
                            <span class="bg-blue-50 text-blue-600 px-5 py-2 rounded-full text-[9px] font-black uppercase italic border border-blue-100">
            {{ $order->status }}
        </span>
                        @endif
                    </td>

                    <td class="p-6">
                        <span class="text-sm font-black text-[#8C2F00]">{{ number_format($order->juice->price * ($order->quantity ?? 1), 2) }}</span>
                        <p class="text-[9px] text-gray-400 font-bold uppercase">ETB</p>
                    </td>
                    <td class="p-6">
                        <p class="text-xs font-bold text-gray-700">📞 {{ $order->phone ?? 'N/A' }}</p>
                        <p class="text-[10px] text-gray-400 font-medium truncate max-w-[150px]">📍 {{ $order->address ?? 'In-store' }}</p>
                    </td>
                    <td class="p-6 text-center">
                        @if($order->status == 'Pending')
                            <form action="/admin/orders/{{ $order->id }}/status" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-[#8C2F00] shadow-lg shadow-green-100 transition-all">
                                    ✅ Accept
                                </button>
                            </form>
                        @else
                            <span class="bg-blue-50 text-blue-600 px-5 py-2 rounded-full text-[9px] font-black uppercase italic tracking-widest border border-blue-100">
                                {{ $order->status }}
                            </span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="p-32 text-center">
                        <span class="text-5xl opacity-20 block mb-4">🛒</span>
                        <p class="text-gray-400 font-black uppercase tracking-widest text-sm">እስካሁን ምንም ትዕዛዝ አልመጣም።</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
