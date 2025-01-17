<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class DataUsersController extends Controller
{
    public function index()
    {
        // Ambil pengguna yang sedang login
        $user = UsersModel::findOrFail(Auth::id()); // Gunakan findOrFail untuk error otomatis jika ID tidak ditemukan

        return view('User.form-data-diri', compact('user'));
    }

    public function update(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'notelp' => 'nullable|string|regex:/^[0-9]{10,15}$/', // Validasi nomor telepon hanya angka, panjang 10-15 digit
            'alamat' => 'nullable|string|max:255',
            'tgllahir' => 'nullable|date',
            'pendidikan' => 'nullable|string|max:255',
            'cv' => $request->hasFile('cv') ? 'required|file|mimes:pdf|max:2048' : 'nullable',  // Validasi file PDF maksimum 2MB
            'sosmed' => 'nullable|string|max:255',
            // 'password' => ['nullable', 'confirmed', Password::min(6)->letters()->numbers()],
        ]);

        // Cari pengguna yang sedang login
        $user = UsersModel::find(Auth::id());

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan!');
        }

        // Jika password diisi, hash dan simpan
        // if (!empty($validatedData['password'])) {
        //     $user->password = Hash::make($validatedData['password']);
        // }
        // Update data pengguna
        $user->nama = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->notelp = $validatedData['notelp'] ?? $user->notelp;
        $user->alamat = $validatedData['alamat'] ?? $user->alamat;
        $user->tgllahir = $validatedData['tgllahir'] ?? $user->tgllahir;
        $user->pendidikan = $validatedData['pendidikan'] ?? $user->pendidikan;
        $user->sosmed = $validatedData['sosmed'] ?? $user->sosmed;
        $user->status = 'Lengkap';

        // Jika file CV ada dalam request
        if ($request->hasFile('cv') && $request->file('cv')->isValid()) {
            // Hapus CV lama jika ada
            if ($user->cv) {
                Storage::delete('public/' . $user->cv);
            }

            // Simpan CV baru
            $cvPath = $request->file('cv')->store('uploads/cv', 'public');
            $user->cv = $cvPath;
        }


        // Simpan perubahan
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('dataUser.index')->with('success', 'Data user berhasil diperbarui!');
    }
}
