<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>{{ $branch->name }} - ሜኑ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 font-sans">

<header class="bg-white shadow-sm p-6 text-center border-b-2 border-orange-200">
    <div class="max-w-4xl mx-auto flex justify-between items-center mb-4 text-xs font-bold uppercase tracking-widest text-gray-400">
        <a href="/" class="hover:text-orange-600 transition-colors">← Just Juice</a>
        <div>
            @auth
                <span class="text-green-600">{{ auth()->user()->is_admin ? 'Admin' : 'ደንበኛ' }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline ml-2">
                    @csrf
                    <button type="submit" class="underline hover:text-red-600">ውጣ</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-orange-600">መግቢያ</a>
            @endauth
        </div>
    </div>
    <h1 class="text-3xl font-bold text-orange-600">{{ $branch->name }} - ሜኑ 🥤</h1>
    <p class="text-gray-500 mt-1">📍 {{ $branch->location }}</p>
</header>

<main class="max-w-4xl mx-auto p-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($juices as $juice)
            <div class="bg-white p-5 rounded-2xl shadow-md border-l-8 border-orange-500 flex justify-between items-center mb-2">
                <div class="flex items-center gap-4">
                    @if($juice->image)
                        <img src="{{ asset('storage/' . $juice->image) }}" alt="{{ $juice->name }}" class="w-16 h-16 rounded-xl object-cover shadow-sm">
                    @else
                        <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center text-2xl">🥤</div>
                    @endif

                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $juice->name }}</h3>
                        <p class="text-gray-400 text-xs italic">{{ $juice->description }}</p>
                    </div>
                </div>

                <div class="flex flex-col items-end gap-3">
                    <div class="text-right text-orange-600 font-bold">
                        {{ number_format($juice->price, 2) }} <span class="text-[10px] text-gray-400">ETB</span>
                    </div>

                    @auth
                        @if(auth()->user()->is_admin)
                            <!-- አድሚን ብቻ የሚያያቸው በተኖች -->
                            <div class="flex items-center gap-2">
                                <a href="/juices/{{ $juice->id }}/edit" class="bg-blue-100 text-blue-600 px-3 py-1 rounded-lg text-[10px] font-bold hover:bg-blue-600 hover:text-white transition-all">✏️ አስተካክል</a>
                                <form action="/juices/{{ $juice->id }}" method="POST" onsubmit="return confirm('እርግጠኛ ነህ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-100 text-red-600 px-3 py-1 rounded-lg text-[10px] font-bold hover:bg-red-600 hover:text-white transition-all">🗑️ አጥፋ</button>
                                </form>
                            </div>
                        @else
                            <!-- ተራ ደንበኞች የሚያዩት "ማዘዣ" በተን -->
                            <!-- ሊንኩን እዚህ ጋር እናስተካክላለን -->
                            <a href="/juice/{{ $juice->id }}/branch/{{ $branch->id }}/order"
                               class="bg-orange-600 text-white px-4 py-1.5 rounded-lg text-[10px] font-bold">
                                🛒 አሁኑኑ እዘዝ
                            </a>
                        @endif
                    @else
                        <!-- ሎጊን ላላደረገ ሰው የሚታይ -->
                        <a href="/login" class="text-[10px] text-orange-400 underline italic">ለማዘዝ መጀመሪያ ይግቡ</a>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>

    @if($juices->isEmpty())
        <div class="text-center p-20 text-gray-400">ለጊዜው ምንም ጁስ የለም።</div>
    @endif
</main>

</body>
</html>
