<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        confirmDelete('Hapus Data', 'Apakah anda yakin ingin menghapus data ini?');

        return view('users.index', compact('users'));
    }
    

    public function store(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ],[
            'name.required'     => 'Nama harus diisi',
            'email.required'    => 'Email harus diisi',
            'email.email'       => 'Email tidak valid',
            'email.unique'      => 'Email sudah terdaftar',
        ]);

        $newRequest = $request->all();

        //jika tidak ada id maka akan buat tambah data user baru dg default password 123456
        if (!$id) {
            $newRequest['password'] = Hash::make('123456');
        }

        User::updateOrCreate(['id' => $id], $newRequest);
        toast()->success('User Berhasil Disimpan');
        
        return redirect()->route('users.index');
    }

    public function gantiPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed'
            // versi lengkap validasi password:
            // 'password' => [Password::min(8)->mixedCase()->numbers()->symbols(), 'confirmed']
        ],[
            'old_password.required' => 'Password lama harus diisi',
            'password.required'     => 'Password baru harus diisi',
            'password.min'          => 'Password baru minimal 6 karakter',
            'password.confirmed'    => 'Password baru tidak sama dengan konfirmasi password',
        ]);

        //cek user mana yg lagi login
        $user = User::find(Auth::id());

        //check old password
        if (!Hash::check($request->old_password, $user->password)) {
            toast()->error('Password lama tidak sesuai');
            return redirect()->route('dashboard');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        toast()->success('Password berhasil diganti');
        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (Auth::id() == $id) {
            toast()->error('Tidak dapat menghapus akun yang sedang login');
            return redirect()->route('users.index');
        }

        $user->delete();
        toast()->success('Users Berhasil Dihapus');
        return redirect()->route('users.index');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $user = User::find($request->id);

        $user->update([
            'password' => Hash::make('123456')
        ]);

        toast()->success('Password Berhasil Direset');
        return redirect()->route('users.index');
    }
}
