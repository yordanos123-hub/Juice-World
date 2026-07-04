<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>አዲስ ጁስ መመዝገቢያ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 p-10 font-sans">

<div class="max-w-lg mx-auto bg-white p-8 rounded-3xl shadow-2xl">
    <h2 class="text-2xl font-bold text-orange-600 mb-6 text-center">አዲስ ጁስ መመዝገቢያ 🥤</h2>

    <!-- ማሳሰቢያ፡ enctype="multipart/form-data" ከሌለ ፎቶው ወደ ዳታቤዝ አይሄድም! -->
    <form action="/juices" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700 mb-1">የጁሱ ስም</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded-xl outline-none focus:border-orange-500" placeholder="ለምሳሌ፡ አቮካዶ" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700 mb-1">መግለጫ (Description)</label>
            <textarea name="description" rows="2" class="w-full px-4 py-2 border rounded-xl outline-none focus:border-orange-500" placeholder="ስለ ጁሱ ትንሽ ማብራሪያ..." required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700 mb-1">ዋጋ (Price in ETB)</label>
            <input type="number" name="price" class="w-full px-4 py-2 border rounded-xl outline-none focus:border-orange-500" placeholder="0.00" required>
        </div>

        <!-- አዲሱ የፎቶ መጫኛ ሳጥን -->
        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 mb-1">የጁሱ ፎቶ</label>
            <div class="relative border-2 border-dashed border-orange-200 rounded-xl p-4 bg-orange-50 hover:bg-orange-100 transition-all text-center">
                <input type="file" name="image" class="w-full h-full cursor-pointer opacity-100 text-sm">
                <p class="text-xs text-gray-400 mt-2">JPEG, PNG ወይም JPG (ከ 2MB ያልበለጠ)</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 mb-1">ቅርንጫፍ ይምረጡ</label>
            <select name="branch_id" class="w-full px-4 py-2 border rounded-xl outline-none focus:border-orange-500 bg-white">
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3">
            <a href="/" class="flex-1 text-center py-3 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition-all">ተመለስ</a>
            <button type="submit" class="flex-1 py-3 bg-orange-600 text-white rounded-xl font-bold hover:bg-orange-700 shadow-lg shadow-orange-100 transition-all">
                መዝግብ
            </button>
        </div>
    </form>
</div>

</body>
</html>
