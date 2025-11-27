<section class="space-y-6">
    <header>
        <h2 class="text-lg font-semibold text-white">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-white/70">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    {{-- BUTTON DELETE --}}
    <button
        x-data
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-4 py-2 rounded-md bg-red-700/80 text-white font-medium
               hover:bg-red-700 transition border border-red-400/40">
        {{ __('Delete Account') }}
    </button>

    {{-- MODAL --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}"
              class="p-6 bg-[#0F5529] text-white rounded-lg">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-white">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-white/70">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}
            </p>

            {{-- PASSWORD INPUT --}}
            <div class="mt-6">
                <x-input-label for="password" class="sr-only" value="Password" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password"
                    class="mt-1 block w-3/4
                           bg-transparent border border-white/40
                           text-white placeholder-white/60
                           focus:border-white focus:ring-white"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')"
                               class="mt-2 text-red-300" />
            </div>

            {{-- BUTTONS --}}
            <div class="mt-6 flex justify-end">

                {{-- CANCEL --}}
                <button type="button"
                        x-on:click="$dispatch('close')"
                        class="px-4 py-2 rounded-md bg-white/10 text-white border border-white/30
                               hover:bg-white/20 transition">
                    {{ __('Cancel') }}
                </button>

                {{-- DELETE --}}
                <button class="ms-3 px-4 py-2 rounded-md bg-red-700/80 text-white border border-red-300/40
                               hover:bg-red-700 transition">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>

</section>
