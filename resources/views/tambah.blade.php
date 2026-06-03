@extends('main')
{{-- membuat title yang dinamis untuk file main, dengan @section dan akan dipanggil di parentnya main dgn cara @yield --}}
@section('title', 'Penjumlahan')
@section('content')
    <br><br>
    <form action="{{ route('action-tambah') }}" method="POST">
        @csrf
        <label for="">Angka Pertana</label>
        <input type="text" placeholder="Masukan Angka" name="angka1">
        <strong>+</strong>
        <label for="">Angka Kedua</label>
        <input type="text" placeholder="Masukan Angka" name="angka2">
        <br><br>
        <button type="submit">Process</button>
    </form>

    <h1>Hasilnya adalah : {{ $jumlah }}</h1>

@endsection
