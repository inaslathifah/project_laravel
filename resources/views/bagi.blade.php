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
    <a href="{{ route('bagi') }}">Pembagian</a>
    <a href="{{ url()->previous() }}">Back</a>
    <br><br>
    <form action="{{ route('actionBagi') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Angka 1</label>
            <input type="number" name="angka1" placeholder="Masukkan Angka">
        </div>
        <br>
        <div class="form-group">
            <label for="">Angka 2</label>
            <input type="number" name="angka2" placeholder="Masukkan Angka">
        </div>
        <br>
        <div class="form-group">
            <button type="submit">Hasil</button>
        </div>
    </form>
    <br>
    <h1>Hasilnya adalah {{ $jumlah ?? 0 }}</h1>
</body>

</html>
