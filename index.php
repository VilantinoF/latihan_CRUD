<?php
require 'functions.php';

$data_penjualan = query("SELECT pelanggan.nama_pelanggan, barang.nama_brg, pelanggan.alamat, pelanggan.kota, barang.harga, jual.tgl_jual FROM ((jual INNER JOIN pelanggan ON pelanggan.kode_pelanggan=jual.kode_pelanggan) INNER JOIN barang ON barang.kode_brg=jual.kode_brg)");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Tabel Penjualan</h1>
    <table border="1px" cellpadding="10px" cellspacing="0">
        <tr>
            <th>Nama Pelanggan</th>
            <th>Barang</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Harga</th>
            <th>Tanggal Transaksi</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($data_penjualan as $row) : ?>
        <tr>
            <td><?= $row["nama_pelanggan"] ?></td>
            <td><?= $row["nama_brg"]; ?></td>
            <td><?= $row["alamat"] ?></td>
            <td><?= $row["kota"] ?></td>
            <td><?= $row["harga"] ?></td>
            <td><?= $row["tgl_jual"] ?></td>
            <td>
                <a href="">Edit</a> |
                <a href="">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</body>

</html>