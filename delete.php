<?php

require 'functions.php';

$id = $_GET["id"];

if (delete($id) > 0) {
    header("location: index.php", true, 301);
} else {
    echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'index.php';
            </script>
    ";
}