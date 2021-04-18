<?php

require 'functions.php';

$id = $_GET["id"];
$data_mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];



if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			  </script>";
    } else {
        echo "<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			  </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Edit Data</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $data_mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?= $data_mhs["nama_mhs"]; ?>">
            </li>
            <li>
                <label for="nim">NIM :</label>
                <input type="text" name="nim" id="nim" maxlength="12" required value="<?= $data_mhs["nim"]; ?>">
            </li>
            <li>
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" required value="<?= $data_mhs["alamat"]; ?>">
            </li>
            <li>
                <label for="ttl">TTL :</label>
                <input type="text" name="ttl" id="ttl" value="<?= $data_mhs["ttl"]; ?>">
            </li>
            <li>
                <label for="no_HP">No Hp :</label>
                <input type="text" name="no_HP" id="no_HP" maxlength="12" value="<?= $data_mhs["no_HP"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">SUBMIT</button>
            </li>
        </ul>
    </form>
</body>

</html>