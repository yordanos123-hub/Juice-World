<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>የመጡ ትዕዛዞች - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10 font-sans">
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">የመጡ ትዕዛዞች 📋</h1>
        <a href="/" class="bg-orange-600 text-white px-6 py-2 rounded-xl font-bold">ወደ ዌብሳይቱ ተመለስ</a>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-xl mb-4 text-center">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-800 text-white uppercase text-xs">
            <tr>
                <th class="p-4">ደንበኛ</th>
                <th class="p-4">ጁስ</th>
                <th class="p-4">ቅርንጫፍ</th>
                <th class="p-4">አይነት</th>
                <th class="p-4">ስልክ/አድራሻ</th>
                <th class="p-4 text-center">ሁኔታ/ርምጃ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr class="border-b hover:bg-orange-50 transition-all">
                    <td class="p-4 font-bold">{{ $order->user->name }}</td>
                    <td class="p-4 text-orange-600">{{ $order->juice->name }}</td>
                    <td class="p-4 text-gray-500">{{ $order->branch->name }}</td>
                    <td class="p-4 text-xs font-bold">{{ $order->order_type == 'delivery' ? '🚀 Delivery' : '🥤 Pickup' }}</td>
                    <td class="p-4 text-xs italic">{{ $order->phone }} <br> {{ $order->address }}</td>
                    <td class="p-4 text-center">
                        @if($order->status == 'Pending')
                            <form action="/admin/orders/{{ $order->id }}/status" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-xs font-bold hover:bg-green-600 hover:text-white transition-all">
                                    ✅ ትዕዛዝ ተቀበል
                                </button>
                            </form>
                        @else
                            <span class="bg-blue-100 text-blue-600 px-4 py-1 rounded-full text-xs font-black italic">
                                        {{ $order->status }}
                                    </span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-20 text-center text-gray-400">እስካሁን ምንም ትዕዛዝ አልመጣም።</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
