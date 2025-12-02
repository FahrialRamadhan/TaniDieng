
<section>
    <header>
        <h2 class="text-lg font-semibold text-white">
            {{ __('Ubah Kata Sandi') }}
        </h2>

        <p class="mt-1 text-sm text-white/70">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        {{-- CURRENT PASSWORD --}}
        <div>
            <x-input-label for="update_password_current_password"
                           :value="__('Current Password')"
                           class="text-white" />

            <x-text-input id="update_password_current_password"
                          name="current_password"
                          type="password"
                          class="mt-1 block w-full
                                 bg-transparent border border-white/40
                                 text-white placeholder-white/60
                                 focus:border-white focus:ring-white"
                          autocomplete="current-password" />

            <x-input-error :messages="$errors->updatePassword->get('current_password')"
                           class="mt-2 text-red-300" />
        </div>

        {{-- NEW PASSWORD --}}
        <div>
            <x-input-label for="update_password_password"
                           :value="__('New Password')"
                           class="text-white" />

            <x-text-input id="update_password_password"
                          name="password"
                          type="password"
                          class="mt-1 block w-full
                                 bg-transparent border border-white/40
                                 text-white placeholder-white/60
                                 focus:border-white focus:ring-white"
                          autocomplete="new-password" />

            <x-input-error :messages="$errors->updatePassword->get('password')"
                           class="mt-2 text-red-300" />
        </div>

        {{-- CONFIRM PASSWORD --}}
        <div>
            <x-input-label for="update_password_password_confirmation"
                           :value="__('Confirm Password')"
                           class="text-white" />

            <x-text-input id="update_password_password_confirmation"
                          name="password_confirmation"
                          type="password"
                          class="mt-1 block w-full
                                 bg-transparent border border-white/40
                                 text-white placeholder-white/60
                                 focus:border-white focus:ring-white"
                          autocomplete="new-password" />

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                           class="mt-2 text-red-300" />
        </div>

        {{-- BUTTON SAVE --}}
        <div class="flex items-center gap-4">
            <x-primary-button
                class="bg-white/10 border border-white/40 text-white
                       hover:bg-white/20 hover:border-white">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</section>
