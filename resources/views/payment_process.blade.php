<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>የክፍያ ሂደት - Juice World</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FDFDFC] flex items-center justify-center min-h-screen p-6 font-sans">
<div class="max-w-md w-full bg-white p-12 rounded-[50px] shadow-2xl text-center border border-orange-50">
    <div class="w-20 h-20 bg-orange-50 rounded-3xl flex items-center justify-center mx-auto mb-8 animate-pulse">
        <span class="text-4xl">💳</span>
    </div>

    <h2 class="text-2xl font-black text-[#8C2F00] mb-4 uppercase italic">Secure Payment</h2>
    <p class="text-gray-400 text-sm mb-10 font-medium italic">ክፍያዎን በTelebirr ወይም በባንክ ካርድ ይፈጽሙ</p>

    <div class="bg-gray-50 p-6 rounded-3xl mb-10">
        <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">Total Amount</p>
        <p class="text-3xl font-black text-[#FF6B00] mt-1">{{ number_format($order->juice->price, 2) }} ETB</p>
    </div>

    <div class="space-y-4">
        <!-- ለኢንተርንሺፕ ማሳያ የሚሆኑ የክፍያ በተኖች -->
        <button class="w-full bg-[#00AEEF] text-white py-4 rounded-full font-black text-xs shadow-lg shadow-blue-100 hover:scale-105 transition-all">PAY WITH TELEBIRR</button>
        <button class="w-full bg-[#8C2F00] text-white py-4 rounded-full font-black text-xs shadow-lg shadow-orange-100 hover:scale-105 transition-all">PAY WITH CHAPA</button>
    </div>

    <a href="/" class="mt-10 inline-block text-[10px] font-black text-gray-300 uppercase underline decoration-orange-200">Skip and Pay later</a>
</div>
</body>
</html>
