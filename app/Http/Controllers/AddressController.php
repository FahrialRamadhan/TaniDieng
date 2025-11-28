<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // (kalau mau ada page /profile/address terpisah)
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        return view('profile.edit', compact('user', 'addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipient_name' => 'required|string',
            'phone'          => 'required|string',
            'address'        => 'required|string',
            'label'          => 'nullable|string',
            'city'           => 'nullable|string',
            'subdistrict'    => 'nullable|string',
            'postal_code'    => 'nullable|string',
        ]);

        Auth::user()->addresses()->create([
            'label'        => $request->label,
            'recipient_name' => $request->recipient_name,
            'phone'        => $request->phone,
            'address'      => $request->address,
            'city'         => $request->city,
            'subdistrict'  => $request->subdistrict,
            'postal_code'  => $request->postal_code,
            'is_primary'   => false,
        ]);

        return back()->with('success', 'Alamat berhasil ditambahkan.')->with('profile_tab', 'alamat');
    }

    public function setPrimary(Address $address)
    {
        $user = Auth::user();

        // pastikan alamat milik user yang login
        abort_unless($address->user_id === $user->id, 403);

        // reset alamat utama lama
        $user->addresses()->update(['is_primary' => false]);

        // set yang baru
        $address->update(['is_primary' => true]);

        return back()->with('success', 'Alamat utama berhasil diubah.')->with('profile_tab', 'alamat');
    }

    public function update(Request $request, Address $address)
    {
        // pastikan alamat milik user yang login
        if ($address->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'label'          => 'nullable|string|max:255',
            'recipient_name' => 'required|string|max:255',
            'phone'          => 'required|string|max:30',
            'address'        => 'required|string|max:255',
            'city'           => 'nullable|string|max:255',
            'subdistrict'    => 'nullable|string|max:255',
            'postal_code'    => 'nullable|string|max:10',
        ]);

        $address->update($validated);

        return back()->with('success', 'Alamat berhasil diperbarui.') ->with('profile_tab', 'alamat');
    }

    public function destroy(Address $address)
{
    // Pastikan alamat milik user yang login
    if ($address->user_id !== auth()->id()) {
        abort(403);
    }

    $address->delete();

    return redirect()->route('profile.edit', ['tab' => 'alamat'])
                     ->with('success', 'Alamat berhasil dihapus!')
                     ->with('profile_tab', 'alamat');
}


}
