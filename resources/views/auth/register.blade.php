<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>Juice World - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-[#FDFDFC] flex items-center justify-center min-h-screen p-6">

<div class="max-w-md w-full bg-white p-12 rounded-[60px] shadow-2xl border border-orange-50 relative overflow-hidden">
    <!-- Logo -->
    <div class="text-center mb-10">
        <div class="text-3xl font-black tracking-tighter uppercase mb-2">
            <span class="text-[#FF6B00]">juice</span><span class="text-[#8C2F00]">world</span><span class="text-orange-500">.</span>
        </div>
        <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Create Your Account</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <input type="text" name="name" placeholder="Full Name" required autofocus
                   class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-4 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 outline-none">
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-[10px]" />
        </div>

        <!-- Email -->
        <div>
            <input type="email" name="email" placeholder="Email Address" required
                   class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-4 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 outline-none">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px]" />
        </div>

        <!-- Password -->
        <div>
            <input type="password" name="password" placeholder="Password" required
                   class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-4 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 outline-none">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-[10px]" />
        </div>

        <!-- Confirm Password -->
        <div>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                   class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-4 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 outline-none">
        </div>

        <button type="submit"
                class="w-full bg-[#FF6B00] text-white py-4 rounded-full font-black text-xs uppercase tracking-widest shadow-xl shadow-orange-200 hover:bg-[#8C2F00] transition-all">
            CREATE ACCOUNT
        </button>

        <div class="text-center pt-4">
            <a href="{{ route('login') }}" class="text-[10px] font-black text-gray-400 uppercase hover:text-orange-500">
                Already have an account? <span class="text-orange-500">Login</span>
            </a>
        </div>
    </form>
</div>

</body>
</html>
