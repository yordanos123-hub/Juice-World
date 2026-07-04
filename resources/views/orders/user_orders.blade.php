<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>የእኔ ትዕዛዞች</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-10 font-sans">
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">የእኔ ትዕዛዞች 🛍️</h1>
        <a href="/" class="text-orange-600 font-bold">← ወደ መነሻ ገጽ</a>
    </div>

    <div class="space-y-4">
        @forelse($orders as $order)
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-lg text-orange-600">{{ $order->juice->name }}</h3>
                    <p class="text-xs text-gray-500">ቅርንጫፍ፡ {{ $order->branch->name }}</p>
                    <p class="text-xs text-gray-400">የታዘዘበት ቀን፡ {{ $order->created_at->format('M d, Y') }}</p>
                </div>
                <div class="text-right">
                        <span class="px-4 py-1 rounded-full text-xs font-black uppercase
                            {{ $order->status == 'Pending' ? 'bg-yellow-100 text-yellow-600' : 'bg-green-100 text-green-600' }}">
                            {{ $order->status }}
                        </span>
                </div>
            </div>
        @empty
            <div class="bg-white p-20 text-center rounded-3xl text-gray-400">
                እስካሁን ምንም የዘዙት ጁስ የለም።
            </div>
        @endforelse
    </div>
</div>
</body>
</html>
