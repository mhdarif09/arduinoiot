<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User; // Pastikan namespace User benar

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Validasi input, termasuk validasi untuk gambar
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        /** @var User $user */
        $user = Auth::user();

        // Update nama dan email
        $user->name = $request->name;
        $user->email = $request->email;

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Jika gambar diunggah, proses unggahan
        if ($request->hasFile('profile_picture')) {
            // Hapus gambar profil lama jika ada
            if ($user->profile_picture) {
                Storage::delete('public/profile/' . $user->profile_picture);
            }

            // Simpan gambar baru ke direktori 'storage/app/public/profile'
            $fileName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->storeAs('public/profile', $fileName);

            // Simpan nama file gambar baru ke database
            $user->profile_picture = $fileName;
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
