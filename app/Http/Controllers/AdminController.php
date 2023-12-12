<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Perangkat;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','admin']);
    }

    public function index()
    {
        $perangkat = Perangkat::all();
        return view('index', compact('perangkat'));
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
        return redirect('/dashboard/admin/laporan-pengaduan')->withSuccess('Status Laporan Pengaduan Berhasil Diubah!');
    }

    public function update_laporan_pengaduan_selesai(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status = 'Selesai';
        $pengaduan->save();
        Alert::success('Berhasil', 'Status Laporan Pengaduan Berhasil Diubah!');
        return redirect('/dashboard/admin/laporan-pengaduan')->withSuccess('Status Laporan Pengaduan Berhasil Diubah!');
    }

    public function update_kelola_pengguna_tolak(Request $request, $id)
    {
        $perangkat = Perangkat::where('id', $id)->first();
        $perangkat->status = 'Pengajuan ditolak';
        $perangkat->save();
        Alert::success('Berhasil', 'Status Pengguna Berhasil Diubah!');
        return redirect('/dashboard/admin/kelola-pelanggan')->withSuccess('Status Pengguna Berhasil Diubah!');
    }

    public function update_kelola_pengguna_terima(Request $request, $id)
    {
        $perangkat = Perangkat::where('id', $id)->first();
        $perangkat->status = 'Active';
        $perangkat->save();
        Alert::success('Berhasil', 'Status Pengguna Berhasil Diubah!');
        return redirect('/dashboard/admin/kelola-pelanggan')->withSuccess('Status Pengguna Berhasil Diubah!');
    }


}
