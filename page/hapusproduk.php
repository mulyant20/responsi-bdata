<?php
    require '../application/function.php';

    $id = $_GET["id"];
    
    if(hapusProduk($id) > 0) {
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = './produk.php';
            </script>
        ";
    }

?>
