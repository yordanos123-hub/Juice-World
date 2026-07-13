<!DOCTYPE html>
<html lang="am">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body class="bg-[#FDFDFC] flex items-center justify-center min-h-screen p-6 font-sans" style="font-family: 'Plus Jakarta Sans', sans-serif;">

<div class="max-w-md w-full bg-white p-12 rounded-[60px] shadow-2xl border border-orange-50 text-center">
    <div class="w-24 h-24 bg-orange-50 rounded-[35px] flex items-center justify-center mx-auto mb-10 shadow-inner">
        <span class="text-5xl animate-bounce">📱</span>
    </div>

    <h2 class="text-3xl font-black text-[#8C2F00] uppercase tracking-tighter italic">Secure Checkout</h2>
    <p class="text-gray-400 text-sm mt-2 font-bold uppercase tracking-widest">በ {{ strtoupper($order->payment_method) }} ክፍያዎን ይፈጽሙ</p>

    <div class="my-10 p-10 bg-[#F7F6F0] rounded-[45px] border border-orange-50">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">ጠቅላላ ሂሳብ (Total)</p>
        <p class="text-4xl font-black text-[#FF6B00] mt-2 tracking-tighter">{{ number_format($order->juice->price, 2) }} <small class="text-sm">ETB</small></p>
    </div>

    <!-- ክፍያውን ለማረጋገጥ ወደ ሲሙሌሽን ይወስደዋል -->
    <a href="{{ route('payment.verify', $order->id) }}"
       class="block w-full bg-[#8C2F00] text-white py-5 rounded-full font-black text-xs uppercase tracking-widest shadow-xl shadow-orange-100 hover:bg-[#FF6B00] transform hover:-translate-y-1 transition-all">
        PAY NOW / አሁኑኑ ክፈሉ
    </a>

    <div class="mt-8 flex items-center justify-center gap-2 text-[9px] font-black text-gray-300 uppercase italic">
        <span>🔒 Encrypted</span> • <span>Verified by Juice World</span>
    </div>
</div>

</body>
</html>
