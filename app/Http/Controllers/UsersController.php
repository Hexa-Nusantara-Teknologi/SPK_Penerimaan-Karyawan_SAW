<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        return view('Master-Users.index');
    }

    public function create()
    {
        return view('Master-Users.create-users');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = UsersModel::select(['id', 'nama', 'email', 'role', 'status'])
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    return '<div class="d-flex justify-content-center">
                            <a href="' . route('users.edit', $row->id) . '" class="btn btn-warning btn-sm mr-2">Edit</a>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="' . $row->id . '">Delete</button>
                        </div>';
                })
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'password' => ['required', 'confirmed', Password::min(6)->letters()->numbers()],
            'notelp' => 'nullable|string|regex:/^[0-9]{10,15}$/', // Validasi nomor telepon hanya angka, panjang 10-15 digit
            'alamat' => 'nullable|string|max:255',
            'tgllahir' => 'nullable|date',
            'pendidikan' => 'nullable|string|max:255',
            'cv' => 'nullable|file|mimes:pdf|max:2048', // Validasi file PDF maksimum 2MB
            'sosmed' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        UsersModel::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'notelp' => $request->notelp,
            'alamat' => $request->alamat,
            'tgllahir' => $request->tgllahir,
            'pendidikan' => $request->pendidikan,
            'cv' => $request->cv,
            'sosmed' => $request->sosmed,
            'role' => $request->role,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('users.index')
            ->with('status', 'success')
            ->with('message', 'User berhasil disimpan.');
    }

    public function edit($id)
    {
        $users = UsersModel::findOrFail($id);
        return view('Master-Users.edit-users', compact('users', 'id'));
    }

    public function update(Request $request, $id)
    {

        // Validasi ID Pengguna
        $users = UsersModel::findOrFail($id);


        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $users->id . ',id',
            'notelp' => 'nullable|string|regex:/^[0-9]{10,15}$/', // Validasi nomor telepon hanya angka, panjang 10-15 digit
            'alamat' => 'nullable|string|max:255',
            'tgllahir' => 'nullable|date',
            'pendidikan' => 'nullable|string|max:255',
            'cv' => $request->hasFile('cv') ? 'required|file|mimes:pdf|max:2048' : 'nullable',  // Validasi file PDF maksimum 2MB
            'sosmed' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'password' => ['nullable', 'confirmed', Password::min(6)->letters()->numbers()],
        ]);



        if (!$users) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan!');
        }

        $updateData = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'notelp' => $request->notelp,
            'alamat' => $request->alamat,
            'tgllahir' => $request->tgllahir,
            'pendidikan' => $request->pendidikan,
            'cv' => $request->cv,
            'sosmed' => $request->sosmed,
            'role' => $request->role,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ];


    // Jika file CV ada dalam request dan valid
        if ($request->hasFile('cv') && $request->file('cv')->isValid()) {
            // Hapus CV lama jika ada
            if ($users->cv) {
                Storage::delete('public/' . $users->cv);
            }

            // Simpan CV baru
            $cvPath = $request->file('cv')->store('uploads/cv', 'public');
            $updateData['cv'] = $cvPath;
        } elseif (!$request->hasFile('cv') && $users->cv) {
            // Jika tidak ada file baru, tetap mempertahankan file CV lama
            $updateData['cv'] = $users->cv;
        }

        // Simpan perubahan
        $users->update($updateData);

        // Redirect dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $users = UsersModel::findOrFail($id);
        $users->delete();

        return response()->json(['status' => 'success', 'message' => 'Users berhasil dihapus.']);
    }
}