<?php
require 'functions.php';

$data_mhs = query("SELECT * FROM mhs");

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
            <th>No HP</th>
            <th>Time Created</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($data_mhs as $row) : ?>
            <tr>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["phone"]; ?></td>
                <td><?= $row["time_created"]; ?></td>
                <td>
                    <a class="edit-button" href="edit.php?id=<?= $row["id"]; ?> ">Edit</a>
                    <a class="hapus-button" href="delete.php?id=<?= $row["id"]; ?> " onclick="return confirm('Yakin akan menghapus data?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <form action="" method="POST">
        <h3>Input Data</h3>
        <div class="form-input">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" placeholder="A11xxxxxxxxx" maxlength="12" required>
        </div>
        <div class="form-input">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Vilantino Fernandion" required>
        </div>
        <div class="form-input">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" placeholder="Jl. xxxxxxxx" required>
        </div>
        <div class="form-input">
            <label for="phone">No Hp</label>
            <input type="text" name="phone" id="phone" placeholder="089xxxxxxxxx" maxlength="13">
        </div>
        <button type="submit" name="submit">SUBMIT</button>
    </form>
</body>

</html>