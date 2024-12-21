<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Nama Saya {{ $nama }}</h1>
    {{-- nilai lebih besar dari 75 lulus kalo di bawah itu tidak lulus --}}
    {{-- if else --}}
    @if ($nilai >= 75)
        <h1>Lulus</h1>
    @else
        <h1>Tidak Lulus</h1>
    @endif

    @foreach ($nilaiArray as $item)
        {{ $item['nama'] }} nilai = {{ $item['nilai'] }}
        @if ($item['nilai'] >= 75)
            <h1>Lulus</h1>
        @else
            <h1>Tidak Lulus</h1>
        @endif
    @endforeach
    <button type="button" class="btn btn-primary">Primary</button>
    <x-button class="btn-secondary">
        Simpan
    </x-button>
    <x-card title="Judul" subtitle="deskripsi">
        <p class="card-text">Belajar component</p>
    </x-card>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
