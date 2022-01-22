<?php
    require '../application/function.php';

    $id = $_GET["id"];
    
    if(hapusCustomer($id) > 0) {
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = 'Customer.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal dihapus');
                document.location.href = 'Customer.php';
            </script>
        ";

    }

?>
