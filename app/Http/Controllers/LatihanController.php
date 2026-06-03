<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        // index() biasa dan lumrahnya di load di awal dalam laravel
        return view('latihan');
    }

    public function tambah()
    {
        $jumlah = 0;
        // buat variable $title jika menggunakan variabel untuk merubah judul
        // dan variabelnya harus masukan kedalam compact
        // $title = 'Penjumlahan';
        return view('tambah', compact('jumlah'));
    }

    public function actionTambah(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah'));
    }
    public function kurang()
    {
        $pengurangan = 0;
        // $title = 'Pengurangan';
        return view('kurang', compact('pengurangan'));
    }

    public function actionKurang(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $pengurangan = $angka1 - $angka2;

        return view('kurang', compact('pengurangan'));
    }
    public function kali()
    {
        $perkalian = 0;
        return view('kali', compact('perkalian'));
    }
    public function actionKali(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $perkalian = $angka1 * $angka2;

        return view('kali', compact('perkalian'));
    }

    public function bagi()
    {
        $pembagian = 0;
        return view('bagi', compact('pembagian'));
    }
    public function actionBagi(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $pembagian = $angka1 / $angka2;

        return view('bagi', compact('pembagian'));
    }
}
