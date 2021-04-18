<?php

$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


function add($data) {
    global $conn;
    $nama_mhs = $data["nama"];
    $nim = $data["nim"];
    $alamat = $data["alamat"];
    $ttl = $data["ttl"];
    $no_hp = $data["no_HP"];

    $data_mhs = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama_mhs', '$alamat', '$ttl', '$no_hp')";

    mysqli_query($conn, $data_mhs);

    return mysqli_affected_rows($conn);
}


function delete($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");

    return mysqli_affected_rows($conn);
}


function edit($data) {
    global $conn;
    $id = $data["id"];
    $nama_mhs = $data["nama"];
    $nim = $data["nim"];
    $alamat = $data["alamat"];
    $ttl = $data["ttl"];
    $no_hp = $data["no_HP"];

    $sql = "UPDATE mahasiswa SET
               nama_mhs = '$nama_mhs',
               nim = '$nim',
               alamat = '$alamat',
               ttl = '$ttl',
               no_HP = '$no_hp'
			WHERE
				id = $id
			";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);

}

?>