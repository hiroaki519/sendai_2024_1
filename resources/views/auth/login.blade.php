<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-black">高齢者のログイン</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Phone number -->
        <div>
            <x-input-label for="phone_number" :value="__('電話番号')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
        
            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
