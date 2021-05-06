<?php

$conn = mysqli_connect("localhost", "root", "", "test");
date_default_timezone_set("Asia/Jakarta");
$mydate=getdate(date("U"));
$time_stamp = "$mydate[year]-$mydate[mon]-$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";

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
    global $time_stamp;
    $nim = $data["nim"];
    $nama_mhs = $data["nama"];
    $alamat = $data["alamat"];
    $phone = $data["phone"];

    $data_mhs = "INSERT INTO mhs (nim, nama, alamat, phone, time_created) VALUES ('$nim', '$nama_mhs', '$alamat', '$phone', '$time_stamp')";

    mysqli_query($conn, $data_mhs);
    return mysqli_affected_rows($conn);
}


function delete($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mhs WHERE id=$id");

    return mysqli_affected_rows($conn);
}


function edit($data) {
    global $conn;
    global $time_stamp;
    $id = $data["id"];
    $nim = $data["nim"];
    $nama_mhs = $data["nama"];
    $alamat = $data["alamat"];
    $phone = $data["phone"];

    $sql = "UPDATE mhs SET
               nim = '$nim',
               nama = '$nama_mhs',
               alamat = '$alamat',
               phone = '$phone'
			WHERE
				id = $id
			";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);

}


function search($keyword) {
    $querry = "SELECT * FROM mhs 
                WHERE 
                nama LIKE '%$keyword%' or 
                nim LIKE '%$keyword%' or
                phone LIKE '%$keyword%' or
                ";

    return query($querry);
}

?>