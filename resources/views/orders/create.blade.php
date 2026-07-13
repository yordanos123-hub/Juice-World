<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>ትዕዛዝ መሙያ - Juice World</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-[#FDFDFC] p-6 md:p-12 font-sans">

<div class="max-w-2xl mx-auto bg-white p-8 md:p-12 rounded-[50px] shadow-2xl border border-orange-50">

    <!-- Header -->
    <div class="text-center mb-10">
        <h2 class="text-3xl font-black text-[#8C2F00] uppercase tracking-tighter italic">Finalizing Order</h2>
        <div class="mt-4 flex items-center justify-center gap-4 bg-orange-50 p-4 rounded-3xl">
            <span class="text-3xl">🥤</span>
            <div class="text-left">
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest leading-none">የመረጡት ጁስ</p>
                <h3 class="text-xl font-black text-[#FF6B00]">{{ $juice->name }}</h3>
                <p class="text-sm font-bold text-[#8C2F00]">{{ $juice->price }} ETB</p>
            </div>
        </div>
        <p class="text-xs font-bold text-gray-300 mt-4 uppercase">ቅርንጫፍ፡ {{ $branch->name }}</p>
    </div>

    <form action="/order" method="POST" id="order-form">
        @csrf
        <input type="hidden" name="juice_id" value="{{ $juice->id }}">
        <input type="hidden" name="branch_id" value="{{ $branch->id }}">

        <!-- 1. የክፍያ አማራጭ (First Choice) -->
        <!-- የክፍያ አማራጭ (Stylish Payment Selection) -->
        <div class="mb-10">
            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-6 text-center">3. የክፍያ መንገድ ይምረጡ</label>
            <div class="grid grid-cols-2 gap-4">
                <!-- Telebirr -->
                <label class="relative flex flex-col items-center p-6 border-2 border-gray-100 rounded-[30px] cursor-pointer hover:border-blue-500 hover:bg-blue-50/30 transition-all has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50 shadow-sm group">
                    <input type="radio" name="payment_method" value="telebirr" checked class="hidden">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Telebirr_Logo.png/640px-Telebirr_Logo.png" class="h-10 object-contain mb-3 grayscale group-hover:grayscale-0 transition-all" alt="Telebirr">
                    <span class="text-[9px] font-black uppercase text-gray-400 group-hover:text-blue-600">Pay with Telebirr</span>
                </label>
                <!-- Chapa / Bank -->
                <label class="relative flex flex-col items-center p-6 border-2 border-gray-100 rounded-[30px] cursor-pointer hover:border-orange-500 hover:bg-orange-50/30 transition-all has-[:checked]:border-[#FF6B00] has-[:checked]:bg-orange-50 shadow-sm group">
                    <input type="radio" name="payment_method" value="chapa" class="hidden">
                    <div class="text-3xl mb-2">💳</div>
                    <span class="text-[9px] font-black uppercase text-gray-400 group-hover:text-[#8C2F00]">Pay with Bank / Chapa</span>
                </label>
            </div>
        </div>
        <!-- 2. የአቀባበል ሁኔታ (Second Choice) -->
        <div class="mb-10">
            <label class="block text-sm font-black text-[#8C2F00] uppercase tracking-widest mb-4 text-center">2. የጁስ አቀባበል</label>
            <div class="flex gap-4">
                <label class="flex-1 flex items-center justify-center gap-2 p-4 border-2 border-orange-50 rounded-3xl cursor-pointer hover:bg-orange-50 transition-all has-[:checked]:border-orange-500">
                    <input type="radio" name="order_type" value="pickup" checked onclick="toggleContact(false)" class="accent-orange-500">
                    <span class="text-[10px] font-black uppercase text-gray-700">እዚያው (Pickup)</span>
                </label>
                <label class="flex-1 flex items-center justify-center gap-2 p-4 border-2 border-orange-50 rounded-3xl cursor-pointer hover:bg-orange-50 transition-all has-[:checked]:border-orange-500">
                    <input type="radio" name="order_type" value="delivery" onclick="toggleContact(true)" class="accent-orange-500">
                    <span class="text-[10px] font-black uppercase text-gray-700">ዴሊቨሪ (Delivery)</span>
                </label>
            </div>
        </div>

        <!-- 3. የመገናኛ መረጃ (Conditional) -->
        <div id="contact-info" class="space-y-4 mb-10 hidden border-t border-orange-100 pt-8">
            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">ስልክ ቁጥር</label>
                <input type="text" name="phone" id="phone_field" placeholder="09..." class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-gray-700 focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">መድረሻ ቦታ</label>
                <textarea name="address" id="address_field" rows="2" placeholder="ትክክለኛ አድራሻዎን እዚህ ይጻፉ..." class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 resize-none"></textarea>
            </div>
        </div>

        <button type="submit" class="w-full bg-[#8C2F00] text-white py-5 rounded-full font-black text-xs uppercase tracking-[0.2em] shadow-2xl shadow-orange-100 hover:bg-[#FF6B00] hover:-translate-y-1 transition-all">
            PAY AND ORDER NOW 🚀
        </button>
    </form>
</div>

<script>
    function toggleContact(show) {
        const section = document.getElementById('contact-info');
        const phone = document.getElementById('phone_field');
        const address = document.getElementById('address_field');

        if (show) {
            section.classList.remove('hidden');
            phone.required = true;
            address.required = true;
        } else {
            section.classList.add('hidden');
            phone.required = false;
            address.required = false;
            phone.value = '';
            address.value = '';
        }
    }
</script>
</body>
</html>
