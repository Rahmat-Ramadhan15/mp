<!DOCTYPE html>
<html>

<head>
    <title>Form Hitung MP</title>
</head>

<body>
    <h2>Form Hitung MP untuk {{ $karyawan->nama }}</h2>
    <form method="POST" action="{{ route('mp.hitung') }}">
        @csrf
        <input type="hidden" name="karyawan_id" value="{{ $karyawan->id }}">

        <label>Jenis Pensiun:</label>
        <select name="jenis">
            <option value="normal">Normal</option>
            <option value="dipercepat">Dipercepat</option>
        </select><br>

        <label>Metode Pembayaran:</label>
        <select name="metode">
            <option value="bulanan">100% Bulanan</option>
            <option value="sekaligus">100% Sekaligus</option>
        </select><br>

        <label>Kenaikan:</label>
        <select name="kenaikan">
            <option value="300000">300.000 (Pegawai)</option>
            <option value="900000">900.000 (Direksi)</option>
        </select><br>

        <button type="submit">Hitung</button>
    </form>
</body>

</html>
