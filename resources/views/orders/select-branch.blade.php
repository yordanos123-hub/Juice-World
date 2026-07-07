<!DOCTYPE html>
<html lang="am">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 flex items-center justify-center min-h-screen p-6 font-sans">
<div class="max-w-md w-full bg-white p-10 rounded-[50px] shadow-2xl text-center">
    <h2 class="text-2xl font-black text-[#8C2F00] mb-2 uppercase italic">Choose Branch</h2>
    <p class="text-gray-400 text-sm mb-8 font-bold uppercase tracking-widest italic">የሚቀርብዎትን ቅርንጫፍ ይምረጡ</p>
    <div class="space-y-4">
        @foreach($branches as $branch)
            <a href="/juice/{{ $juice->id }}/branch/{{ $branch->id }}/order"
               class="block p-6 border-2 border-orange-50 rounded-[30px] hover:border-[#FF6B00] hover:bg-orange-50 transition-all group">
                <h3 class="text-lg font-black text-[#8C2F00] group-hover:text-[#FF6B00] uppercase tracking-tighter">{{ $branch->name }}</h3>
                <p class="text-xs text-gray-400 font-bold italic">{{ $branch->location }}</p>
            </a>
        @endforeach
    </div>
    <a href="/" class="mt-8 inline-block text-xs font-black text-gray-300 uppercase underline decoration-orange-200">Go Back</a>
</div>
</body>
</html>
