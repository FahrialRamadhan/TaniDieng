<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;   // <--- TAMBAH INI

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil.
     */
    public function edit(Request $request): View
    {
        $user      = $request->user();
        $addresses = $user->addresses;

        return view('profile.edit', [
            'user'      => $user,
            'addresses' => $addresses,
        ]);
    }

    /**
     * Update data profil (nama, email, foto, dll) TANPA ubah password.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // === HANDLE FOTO PROFIL ===
        if ($request->hasFile('profile_photo')) {
            // Simpan foto baru ke storage/app/public/profile_photos
            $photoPath = $request->file('profile_photo')
                ->store('profile_photos', 'public');

            // Hapus foto lama kalau ada
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Masukkan path baru ke data yang akan di-fill
            $data['profile_photo'] = $photoPath;
        }

        // Isi field user dari data yang sudah divalidasi
        $user->fill($data);

        // Jika email berubah, reset verifikasi
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Notif khusus profil
        return Redirect::route('profile.edit')
            ->with('success', 'Profil berhasil diperbarui.')
            ->with('profile_tab', 'biodata');   // tetap di tab Biodata
    }

    /**
     * Update password (form "Ubah kata sandi").
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        // Pakai Validator manual supaya saat gagal kita bisa set profile_tab
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'confirmed', Password::defaults()],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)   // kirim error validasi
                ->withInput()              // isian lama tetap terisi (kecuali password karena security)
                ->with('profile_tab', 'password'); // *** tetap di tab Ubah kata sandi
        }

        // Kalau validasi lolos → update password
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()
            ->with('success', 'Password berhasil diubah.')
            ->with('profile_tab', 'password');  // tetap di tab Ubah kata sandi
    }

    /**
     * Hapus akun user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Hapus foto profil di storage juga
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
