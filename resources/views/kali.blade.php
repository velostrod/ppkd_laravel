<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Perkalian</h1>
    <a href="/tambah">Tambah</a>
    <a href="{{ url('kurang') }}">Kurang</a>
    <a href="{{ route('bagi') }}">Bagi</a>
    <a href="{{ route('kali') }}">Kali</a>
    <a href="{{ url()->previous() }}">Kembali</a>

    <br><br>
    <form action="{{ route('action-kali') }}" method="POST">
        @csrf
        <label for="">Angka Pertama</label>
        <input type="text" placeholder="Masukan Angka" name="angka1">
        <strong>X</strong>
        <label for="">Angka Kedua</label>
        <input type="text" placeholder="Masukan Angka" name="angka2">
        <br><br>
        <button type="submit">Process</button>
    </form>

    <h1>Hasilnya adalah : {{ $perkalian }}</h1>
</body>

</html>
