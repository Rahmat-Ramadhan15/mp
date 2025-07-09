<!DOCTYPE html>
<html>

<head>
    <title>Hasil MP</title>
</head>

<body>
    <h2>Hasil Perhitungan MP</h2>

    <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
    <p><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</p>
    <p><strong>PhDP:</strong> Rp{{ number_format($karyawan->phdp) }}</p>
    <p><strong>Masa Kerja:</strong> {{ $hasil['masa_kerja'] }} tahun</p>
    <p><strong>Kenaikan:</strong> Rp{{ number_format($hasil['kenaikan']) }}</p>

    <hr>

    <p><strong>Rumus Dasar:</strong> 2.5 × Masa Kerja × PhDP</p>
    <p><strong>PP:</strong> Rp{{ number_format($hasil['mp']) }}</p>

    @if (!is_null($hasil['maksimum']))
        <p><strong>Maksimum Manfaat (80% PhDP):</strong> Rp{{ number_format($hasil['maksimum']) }}</p>
    @endif

    <hr>
    <p><strong>Manfaat Pensiun:</strong> <strong>Rp{{ number_format($hasil['hasil']) }}</strong></p>
</body>

</html>
