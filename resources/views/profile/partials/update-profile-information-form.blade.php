<section>
    <header>
        <h2 class="text-lg font-semibold text-white">
            {{ __('Ubah biodata') }}
        </h2>

        <p class="mt-1 text-sm text-white/70">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post"
          action="{{ route('profile.update') }}"
          class="mt-6 space-y-6"
          enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- FOTO PROFIL --}}
        <div class="flex items-center gap-4">
            <img src="{{ $user->profile_photo
                        ? asset('storage/' . $user->profile_photo)
                        : asset('img/default-avatar.png') }}"
                 alt="Foto profil"
                 class="h-16 w-16 rounded-full object-cover border border-white/60 shadow-lg" />

            <div class="flex-1">
                <x-input-label for="profile_photo" value="Foto Profil" class="text-white" />

                <input id="profile_photo"
                       name="profile_photo"
                       type="file"
                       accept="image/*"
                       class="mt-1 block w-full text-sm text-white
                              file:mr-4 file:rounded-md file:border file:border-white/30
                              file:bg-white/10 file:px-4 file:py-2
                              file:text-sm file:font-medium file:text-white
                              hover:file:bg-white/20" />

                <p class="mt-1 text-xs text-white/60">
                    Format: JPG, JPEG, PNG. Maksimal 2MB.
                </p>

                <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
            </div>
        </div>

        {{-- NAMA --}}
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-white" />
            <x-text-input id="name" name="name" type="text"
                          class="mt-1 block w-full bg-transparent border border-white/40
                                 text-white placeholder-white/60
                                 focus:border-white focus:ring-white"
                          :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- EMAIL --}}
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email" name="email" type="email"
                          class="mt-1 block w-full bg-transparent border border-white/40
                                 text-white placeholder-white/60
                                 focus:border-white focus:ring-white"
                          :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-white/80">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                                class="underline text-sm text-white/80 hover:text-white
                                       rounded-md focus:outline-none focus:ring-2
                                       focus:ring-offset-2 focus:ring-white">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-emerald-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- NOMOR HP --}}
        <div>
            <x-input-label for="phone" value="Nomor Handphone" class="text-white" />
            <x-text-input id="phone" name="phone" type="text"
                          class="mt-1 block w-full bg-transparent border border-white/40
                                 text-white placeholder-white/60
                                 focus:border-white focus:ring-white"
                          :value="old('phone', $user->phone)" placeholder="08xxxxxxxxxx" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        {{-- ALAMAT LENGKAP --}}
        <div>
            <x-input-label for="address" value="Alamat Lengkap" class="text-white" />
            <textarea id="address"
                      name="address"
                      rows="3"
                      class="mt-1 block w-full rounded-md bg-transparent
                             border border-white/40 text-white placeholder-white/60
                             shadow-sm focus:border-white focus:ring-white sm:text-sm">{{ old('address', $user->address) }}</textarea>
            <p class="mt-1 text-xs text-white/60">
                Alamat pengiriman barang (jalan, RT/RW, kelurahan, kecamatan, kota, kode pos).
            </p>
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button
                class="bg-white/10 border border-white/40 text-white
                       hover:bg-white/20 hover:border-white">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-white/70">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
