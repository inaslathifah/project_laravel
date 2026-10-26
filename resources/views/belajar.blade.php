<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Belajar Laravel' }}</title>
</head>

<body>
    <h1>Belajar Matdas</h1>
    <a href="{{ route('tambah') }}">Penjumlahan</a>
    <a href="{{ route('kurang') }}">Pengurangan</a>
    <a href="{{ route('kali') }}">Perkalian</a>
    <a href="{{ route('bagi') }}">Pembagian</a>
    <a href="{{ url()->previous() }}">Back</a>
</body>

</html>
