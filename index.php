<?php
require 'functions.php';

$data_mhs = query("SELECT * FROM mahasiswa");

if (isset($_POST["submit"])) {
    if (add($_POST) > 0) {
        header("location: index.php");
    } else {
        echo "Data Gagal Ditambahkan";
    }
}

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
    <h1>Tabel Mahasiswa</h1>


    <table border="1px" cellpadding="10px" cellspacing="0">
        <tr>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Alamat</th>
            <th>TTL</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($data_mhs as $row) : ?>
            <tr>
                <td><?= $row["nama_mhs"]; ?></td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["ttl"]; ?></td>
                <td><?= $row["no_HP"]; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row["id"]; ?> ">Edit</a> |
                    <a href="delete.php?id=<?= $row["id"]; ?> " onclick="return confirm('Yakin akan menghapus data?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" placeholder="Vilantino Fernandion" required>
            </li>
            <li>
                <label for="nim">NIM :</label>
                <input type="text" name="nim" id="nim" placeholder="A11xxxxxxxxx" maxlength="12" required>
            </li>
            <li>
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" placeholder="Jl. xxxxxxxx" required>
            </li>
            <li>
                <label for="ttl">TTL :</label>
                <input type="text" name="ttl" id="ttl" placeholder="yyyy-mm-dd">
            </li>
            <li>
                <label for="no_HP">No Hp :</label>
                <input type="text" name="no_HP" id="no_HP" placeholder="089xxxxxxxxx" maxlength="12">
            </li>
            <li>
                <button type="submit" name="submit">SUBMIT</button>
            </li>
        </ul>
    </form>
</body>

</html>