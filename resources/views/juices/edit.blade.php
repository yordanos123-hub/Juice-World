<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>ጁስ ማስተካከያ - {{ $juice->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 p-10 font-sans">

<div class="max-w-lg mx-auto bg-white p-8 rounded-3xl shadow-2xl border border-orange-100">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-gray-800">መረጃ ማስተካከያ ✏️</h2>
        <a href="/" class="text-gray-400 hover:text-gray-600">X</a>
    </div>

    <form action="/juices/{{ $juice->id }}" method="POST">
        @csrf
        @method('PATCH') <!-- ላራቬል ይህ ማስተካከያ መሆኑን እንዲያውቅ ይረዳዋል -->

        <!-- የጁሱ ስም -->
        <div class="mb-5">
            <label class="block text-sm font-bold text-gray-700 mb-2">የጁሱ ስም</label>
            <input type="text" name="name" value="{{ $juice->name }}"
                   class="w-full px-4 py-3 border-2 border-gray-100 rounded-xl focus:border-orange-500 outline-none transition-all" required>
        </div>

        <!-- መግለጫ -->
        <div class="mb-5">
            <label class="block text-sm font-bold text-gray-700 mb-2">መግለጫ (Description)</label>
            <textarea name="description" rows="3"
                      class="w-full px-4 py-3 border-2 border-gray-100 rounded-xl focus:border-orange-500 outline-none transition-all" required>{{ $juice->description }}</textarea>
        </div>

        <!-- ዋጋ -->
        <div class="mb-8">
            <label class="block text-sm font-bold text-gray-700 mb-2">ዋጋ (Price in ETB)</label>
            <input type="number" name="price" value="{{ $juice->price }}"
                   class="w-full px-4 py-3 border-2 border-gray-100 rounded-xl focus:border-orange-500 outline-none transition-all" required>
        </div>

        <!-- በተኖች -->
        <div class="flex gap-3">
            <a href="/" class="flex-1 text-center py-3 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition-all">
                ⬅️ ተመለስ
            </a>
            <button type="submit" class="flex-1 py-3 bg-orange-600 text-white rounded-xl font-bold hover:bg-orange-700 shadow-lg shadow-orange-200 transition-all">
                ለውጡን መዝግብ
            </button>
        </div>
    </form>
</div>

</body>
</html>
