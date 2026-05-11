<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-white mb-1 drop-shadow-md">Welcome Back</h2>
        <p class="text-blue-100 text-sm">Please sign in to your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-5">
            <label for="email" class="block font-medium text-sm text-blue-50 mb-1 drop-shadow-md">Email Address</label>
            <input id="email" class="block w-full bg-white/20 border border-white/30 rounded-xl text-white placeholder-blue-200 focus:bg-white/30 focus:border-white focus:ring-2 focus:ring-white/50 transition duration-200 backdrop-blur-sm px-4 py-3" type="email" name="email" :value="old('email')" placeholder="Enter your email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <div class="flex justify-between items-center mb-1 drop-shadow-md">
                <label for="password" class="block font-medium text-sm text-blue-50">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-blue-200 hover:text-white transition" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <input id="password" class="block w-full bg-white/20 border border-white/30 rounded-xl text-white placeholder-blue-200 focus:bg-white/30 focus:border-white focus:ring-2 focus:ring-white/50 transition duration-200 backdrop-blur-sm px-4 py-3"
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
        </div>

        <!-- Remember Me -->
        <div class="block mb-6">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-white/30 bg-white/10 text-emerald-500 shadow-sm focus:ring-emerald-500" name="remember">
                <span class="ms-2 text-sm text-blue-100">Remember me</span>
            </label>
        </div>

        <div>
            <button type="submit" class="w-full bg-white text-emerald-900 font-bold py-3 px-4 rounded-xl hover:bg-emerald-50 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-emerald-600 transition duration-200 shadow-lg shadow-black/20">
                Log In
            </button>
        </div>
        
        <div class="mt-6 text-center text-sm text-blue-100">
            <p>Admin: admin@uks.com | Password: password</p>
            <p>Petugas: petugas@uks.com | Password: password</p>
        </div>
    </form>
</x-guest-layout>
