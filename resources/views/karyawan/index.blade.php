<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Karyawan</title>
</head>

<body>
    <h2>Daftar Karyawan</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>PhDP</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Berhenti</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $k)
                @php
                    $masuk = \Carbon\Carbon::parse($k->tanggal_masuk);
                    $berhenti = $k->tanggal_berhenti
                        ? \Carbon\Carbon::parse($k->tanggal_berhenti)
                        : \Carbon\Carbon::now();
                @endphp
                <tr>
                    <td>{{ $k->nama }}</td>
                    <td>{{ ucfirst($k->jabatan) }}</td>
                    <td>Rp{{ number_format($k->phdp, 0, ',', '.') }}</td>
                    <td>{{ $masuk->format('d-m-Y') }}</td>
                    <td>
                        {{ $k->tanggal_berhenti ? $berhenti->format('d-m-Y') : 'Aktif' }}
                    </td>
                    <td>
                        <a href="{{ route('mp.form', $k->id) }}">Hitung MP</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
