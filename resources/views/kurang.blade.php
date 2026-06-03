 @extends('main')
 @section('title', 'Pengurangan')
 @section('content')
     <br><br>
     <form action="{{ route('action-kurang') }}" method="POST">
         @csrf
         <label for="">Angka Pertama</label>
         <input type="text" placeholder="Masukan Angka" name="angka1">
         <strong>-</strong>
         <label for="">Angka Kedua</label>
         <input type="text" placeholder="Masukan Angka" name="angka2">
         <br><br>
         <button type="submit">Process</button>
     </form>

     <h1>Hasilnya adalah : {{ $pengurangan }}</h1>

 @endsection
