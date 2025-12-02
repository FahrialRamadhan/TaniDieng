<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $addresses = $user->addresses;
    
        return view('profile.edit', [
            'user' => $request->user(),
            'addresses' => $addresses,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user  = $request->user();
        $data  = $request->validated();

        // === HANDLE FOTO PROFIL ===
        if ($request->hasFile('profile_photo')) {
            // simpan foto baru ke storage/app/public/profile_photos
            $photoPath = $request->file('profile_photo')
                                 ->store('profile_photos', 'public');

            // hapus foto lama kalau ada
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // masukkan path baru ke data yang akan di-fill
            $data['profile_photo'] = $photoPath;

        $request->user()->update([
        'password' => Hash::make($request->password),
    ]);

    return back()->with('status', 'password-updated')
                ->with('profile_tab', 'password');
        }

        // isi field user dari data yang sudah divalidasi
        $user->fill($data);

        // jika email berubah, reset verifikasi
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // hapus foto profil di storage juga (opsional tapi bagus)
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
}
