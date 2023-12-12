<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Perangkat;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','superadmin']);
    }

    public function index()
    {
        $perangkat = Perangkat::all();
        return view('index', compact('perangkat'));
    }

    public function kelola_admin()
    {
        $user = User::where('role', 1)->get();
        $userCount = User::where('role', 1)->count();
        return view('kelola-admin', compact('user', 'userCount'));
    }

    public function kelola_pelanggan()
    {
        $user = User::where('role', 0)->get();
        $userCount = User::where('role', 0)->count();
        $perangkat = Perangkat::all();
        return view('kelola-pelanggan' , compact('user', 'userCount', 'perangkat'));
    }

    public function laporan_pengaduan()
    {
        $pengaduan = Pengaduan::all();
        $belumDiProsesCount = Pengaduan::where('status', 'Belum Diproses')->count();
        $sedangDiProsesCount = Pengaduan::where('status', 'Sedang Diproses')->count();
        $selesaiCount = Pengaduan::where('status', 'Selesai')->count();
        return view('kelola-pengaduan', compact('pengaduan', 'belumDiProsesCount', 'sedangDiProsesCount', 'selesaiCount'));
    }

    public function update_laporan_pengaduan_proses(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status = 'Sedang Diproses';
        $pengaduan->save();
        Alert::success('Berhasil', 'Status Laporan Pengaduan Berhasil Diubah!');
        return redirect('/dashboard/superadmin/laporan-pengaduan')->withSuccess('Status Laporan Pengaduan Berhasil Diubah!');
    }

    public function update_laporan_pengaduan_selesai(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status = 'Selesai';
        $pengaduan->save();
        Alert::success('Berhasil', 'Status Laporan Pengaduan Berhasil Diubah!');
        return redirect('/dashboard/superadmin/laporan-pengaduan')->withSuccess('Status Laporan Pengaduan Berhasil Diubah!');
    }

    public function tambah_admin()
    {
        return view('form-tambah-admin');
    }

    public function store_admin(Request $request)
    {
        $user = new \App\Models\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->no_telp = $request->no_telp;
        $user->kecamatan = $request->kecamatan;
        $user->alamat = $request->alamat;
        $user->role = 1;
        $user->save();
        Allert::success('Berhasil', 'Admin Berhasil Ditambahkan!');
        return redirect('/dashboard/superadmin/kelola-admin')->withSuccess('Admin Berhasil Ditambahkan!');
    }

    public function edit_admin($id)
    {
        $user = User::find($id);
        return view('form-edit-admin', compact('user'));
    }

    public function update_admin(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->no_telp = $request->no_telp;
        $user->kecamatan = $request->kecamatan;
        $user->alamat = $request->alamat;
        $user->save();
        Alert::success('Berhasil', 'Admin Berhasil Diubah!');
        return redirect('/dashboard/superadmin/kelola-admin')->withSuccess('Admin Berhasil Diubah!');
    }

    public function delete_admin($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::success('Berhasil', 'Admin Berhasil Dihapus!');
        return redirect('/dashboard/superadmin/kelola-admin')->withSuccess('Admin Berhasil Dihapus!');
    }

    public function update_kelola_pengguna_tolak(Request $request, $id)
    {
        $perangkat = Perangkat::where('id', $id)->first();
        $perangkat->status = 'Pengajuan ditolak';
        $perangkat->save();
        Alert::success('Berhasil', 'Status Pengguna Berhasil Diubah!');
        return redirect('/dashboard/superadmin/kelola-pelanggan')->withSuccess('Status Pengguna Berhasil Diubah!');
    }

    public function update_kelola_pengguna_terima(Request $request, $id)
    {
        $perangkat = Perangkat::where('id', $id)->first();
        $perangkat->status = 'Active';
        $perangkat->save();
        Alert::success('Berhasil', 'Status Pengguna Berhasil Diubah!');
        return redirect('/dashboard/superadmin/kelola-pelanggan')->withSuccess('Status Pengguna Berhasil Diubah!');
    }

    
}
