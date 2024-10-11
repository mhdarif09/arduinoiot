<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
use App\Models\User;

class StaffController extends Controller
{
    // Menampilkan form untuk menambah staff
    public function create()
    {
        $roles = User::all();  // Mengambil semua user untuk pemilihan role
        return view('admin.staff.create', compact('roles'));
    }

    // Menyimpan data staff baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:staff',
            'password' => 'required|min:6|confirmed',
            'location' => 'required|string|max:255',
            'maskapai' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id', // User id harus valid dan ada di tabel users
        ]);

        // Membuat staff baru
        $staff = new Staff();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password = Hash::make($request->password);  // Hash password sebelum disimpan
        $staff->location = $request->location;
        $staff->maskapai = $request->maskapai;
        $staff->user_id = $request->user_id;  // Menghubungkan dengan user/role
        
        // Simpan staff ke database
        $staff->save();

        // Redirect kembali ke halaman staff dengan pesan sukses
        return redirect()->route('admin.staff.index')->with('success', 'Staff successfully added.');
    }

    // Menampilkan daftar staff
    public function index()
    {
        $staff = Staff::all();  // Mengambil semua staff
        return view('admin.staff.index', compact('staff'));
    }
}
