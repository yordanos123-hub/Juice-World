<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>ትዕዛዝ ይላኩ - {{ $juice->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 p-10 font-sans">

<div class="max-w-lg mx-auto bg-white p-8 rounded-3xl shadow-2xl">
    <h2 class="text-2xl font-bold text-orange-600 mb-2">ትዕዛዝዎን ይላኩ 🥤</h2>
    <p class="text-gray-500 mb-6 font-bold">ጁስ፡ {{ $juice->name }} ({{ $juice->price }} ETB)</p>

    <form action="/order" method="POST" id="order-form">
        @csrf
        <input type="hidden" name="juice_id" value="{{ $juice->id }}">
        <input type="hidden" name="branch_id" value="{{ $branch->id }}">

        <!-- 1. ምርጫው -->
        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 mb-2">የአቀባበል ሁኔታ</label>
            <div class="flex gap-4">
                <label class="flex-1 p-3 border-2 rounded-xl cursor-pointer">
                    <input type="radio" name="order_type" value="pickup" checked onclick="toggleFields(false)">
                    <span class="ml-2 font-bold text-gray-700">እዚያው (Pickup)</span>
                </label>
                <label class="flex-1 p-3 border-2 rounded-xl cursor-pointer">
                    <input type="radio" name="order_type" value="delivery" onclick="toggleFields(true)">
                    <span class="ml-2 font-bold text-gray-700">ዴሊቨሪ (Delivery)</span>
                </label>
            </div>
        </div>

        <!-- 2. የሚደበቅ የዳታ መቀበያ ክፍል (ID="extra-fields") -->
        <div id="extra-fields" style="display: none;">
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-1">ስልክ ቁጥር</label>
                <input type="text" name="phone" id="phone" class="w-full px-4 py-2 border rounded-xl">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-1">መድረሻ አድራሻ</label>
                <textarea name="address" id="address" rows="2" class="w-full px-4 py-2 border rounded-xl"></textarea>
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            <a href="{{ url()->previous() }}" class="flex-1 text-center py-3 bg-gray-100 rounded-xl font-bold">ተመለስ</a>
            <button type="submit" class="flex-1 py-3 bg-green-600 text-white rounded-xl font-bold">ትዕዛዝ ላክ 🚀</button>
        </div>
    </form>
</div>
    <!-- አዲሱ የ JavaScript ኮድ -->
    <script>
        function toggleFields(show) {
            const fields = document.getElementById('extra-fields');
            const phone = document.getElementById('phone');
            const address = document.getElementById('address');

            if (show) {
                fields.style.display = 'block';
                phone.required = true;
                address.required = true;
            } else {
                fields.style.display = 'none';
                phone.required = false;
                address.required = false;
                phone.value = ''; // Pickup ከሆነ መረጃው ይጥፋ
                address.value = '';
            }
        }
    </script>


</body>
</html>
