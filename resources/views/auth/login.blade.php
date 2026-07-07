<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>Juice World - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-[#FDFDFC] flex items-center justify-center min-h-screen p-6">

<div class="max-w-md w-full bg-white p-12 rounded-[60px] shadow-2xl border border-orange-50">
    <!-- Logo -->
    <div class="text-center mb-10">
        <div class="text-3xl font-black tracking-tighter uppercase mb-2">
            <span class="text-[#FF6B00]">juice</span><span class="text-[#8C2F00]">world</span><span class="text-orange-500">.</span>
        </div>
        <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Welcome Back!</p>
    </div>

    <!-- Session Status (መልእክት ካለ) -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <input type="email" name="email" placeholder="Email Address" required autofocus
                   class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-4 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 outline-none">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px]" />
        </div>

        <!-- Password -->
        <div>
            <input type="password" name="password" placeholder="Password" required
                   class="w-full rounded-2xl border-none bg-[#F7F6F0] px-6 py-4 text-sm font-bold text-gray-700 focus:ring-2 focus:ring-orange-500 outline-none">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-[10px]" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
            <label for="remember_me" class="ml-2 text-[10px] font-black text-gray-400 uppercase">Remember me</label>
        </div>

        <button type="submit"
                class="w-full bg-[#8C2F00] text-white py-4 rounded-full font-black text-xs uppercase tracking-widest shadow-xl shadow-orange-100 hover:bg-[#FF6B00] transition-all">
            LOG IN
        </button>

        <div class="text-center pt-4">
            <a href="/register" class="text-[10px] font-black text-gray-400 uppercase hover:text-orange-500">
                Don't have an account? <span class="text-orange-500">Register</span>
            </a>
        </div>
    </form>
</div>

</body>
</html>
