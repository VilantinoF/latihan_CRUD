<?php

require 'functions.php';

$id = $_GET["id"];
$data_mhs = query("SELECT * FROM mhs WHERE id = $id")[0];



if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			  </script>";
    } else {
        var_dump($_POST);
        echo "<script>
				alert('data gagal diubah!');
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

    <form style="margin-top: 50px;" action="" method="POST">
        <h1>Edit Data</h1>
        <input type="hidden" name="id" value="<?= $data_mhs["id"]; ?>">
        <div class="form-input">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" placeholder="A11xxxxxxxxx" maxlength="12" value="<?= $data_mhs["nim"]; ?>" required>
        </div>
        <div class="form-input">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Vilantino Fernandion" value="<?= $data_mhs["nama"]; ?>" required>
        </div>
        <div class="form-input">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" placeholder="Jl. xxxxxxxx" value="<?= $data_mhs["alamat"]; ?>" required>
        </div>
        <div class="form-input">
            <label for="phone">No Hp</label>
            <input type="text" name="phone" id="phone" placeholder="089xxxxxxxxx" value="<?= $data_mhs["phone"]; ?>" maxlength="13">
        </div>
        <button type="submit" name="submit">UPDATE</button>
    </form>
</body>

</html>