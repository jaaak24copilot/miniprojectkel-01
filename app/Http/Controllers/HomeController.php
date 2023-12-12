<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengaduan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Perangkat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id','=',auth()->user()->id)->first();
        $perangkat = Perangkat::where('user_id','=',auth()->user()->id)->get();
        return view('index', compact('user','perangkat'));
    }

    public function laporan_pengaduan()
    {
        $user = User::where('id','=',auth()->user()->id)->first();
        $pengaduan = Pengaduan::where('user_id','=',auth()->user()->id)->get();
        return view('laporan-pengaduan', compact('user','pengaduan'));
    }

    public function tambah_laporan_pengaduan()
    {
        $user = User::where('id','=',auth()->user()->id)->first();
        return view('form-pengaduan', compact('user'));
    }

    public function store_laporan_pengaduan(Request $request)
    {
        $pengaduan = new \App\Models\Pengaduan;
        $pengaduan->user_id = auth()->user()->id;
        $pengaduan->nama_pelapor = $request->nama;
        $pengaduan->email = $request->email;
        $pengaduan->subjek = $request->subjek;
        $pengaduan->no_telp = $request->no_telp;
        $pengaduan->status = "Belum Diproses";
        $pengaduan->deskripsi = $request->deskripsi;
        $pengaduan->save();
        Alert::success('Berhasil', 'Laporan Pengaduan Berhasil Ditambahkan!');
        return redirect('/dashboard/user/laporan-pengaduan')->withSuccess('Laporan Pengaduan Berhasil Ditambahkan!');
    }

    public function profile()
    {
        $user = User::where('id','=',auth()->user()->id)->first();
        return view('profile', compact('user'));
    }   

    public function update_profile(Request $request)
    {
        $user = User::where('id','=',auth()->user()->id)->first();
        $user->name = $request->name;
        $user->no_telp = $request->no_telp;
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('foto_profile/', $filename);
            $user->foto = $filename;
        }
        $user->save();
        Alert::success('Berhasil', 'Profile Berhasil Diubah!');
        return redirect('/dashboard/user/profile')->withSuccess('Profile Berhasil Diubah!');
    }

    public function detail_perangkat()
    {
        $user = User::where('id','=',auth()->user()->id)->first();
        $perangkat = Perangkat::where('user_id','=',auth()->user()->id)->get();
        return view('detail-perangkat', compact('user','perangkat'));
    }

    public function tambah_detail_perangkat()
    {
        $user = User::where('id','=',auth()->user()->id)->first();
        return view('tambah-perangkat', compact('user'));
    }

    public function store_detail_perangkat(Request $request)
    {
        $perangkat = Perangkat::where('user_id','=',auth()->user()->id)->where('status','=','Active')->count();
        if($perangkat >= 2){
            Alert::error('Kuota Limit', 'Maksimal peminjaman perangkat hanya 2!');
            return redirect('/dashboard/user/detail-perangkat')->withSuccess('Maksimal peminjaman perangkat hanya 2!');
        }else{
            $perangkat = new Perangkat;
        $perangkat->user_id = auth()->user()->id;
        $perangkat->nama_pelanggan = $request->nama;
        $perangkat->device_id = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(18/strlen($x)) )),1,18);
        $perangkat->tipe_perangkat = $request->type_device;
        $perangkat->tanggal_pinjam = $request->tanggal_sewa;
        $perangkat->tanggal_kembali = $request->tanggal_selesai;
        $perangkat->save();
        Alert::success('Berhasil', 'Detail Perangkat Berhasil Ditambahkan!');
        return redirect('/dashboard/user/detail-perangkat')->withSuccess('Detail Perangkat Berhasil Ditambahkan!');
        }
    }

    public function selesai_detail_perangkat($id)
    {
        $perangkat = Perangkat::where('id','=',$id)->first();
        $perangkat->status = "Pengajuan sedang di proses";
        $perangkat->save();
        Alert::success('Berhasil', 'Pembayaran berhasil!');
        return redirect('/dashboard/user/detail-perangkat')->withSuccess('Permbayaran berhasil!');
    }
}
