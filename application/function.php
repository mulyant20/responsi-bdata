<?php
    require 'db.php';

    function query($query) {
        global $connect;
        $result = mysqli_query($connect, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }


    function tambahTransaksi($data) {
        global $connect;

        $customer = htmlspecialchars($data["id_customer"]);
        
        $tambah = "INSERT INTO transaksi VALUES (
                NULL,
                $customer,
                NOW(),
                DEFAULT
            )";

        mysqli_query($connect, $tambah);
        return mysqli_affected_rows($connect);
    }

    function tambahDetail($data) {
        global $connect;

        $transaksi = htmlspecialchars($data["id_transaksi"]);
        $produk = htmlspecialchars($data["id_produk"]);
        $qty = htmlspecialchars($data["qty"]);

        $tambah = "INSERT INTO detail VALUES (NULL,$transaksi, $produk, $qty)";

        mysqli_query($connect, $tambah);
        return mysqli_affected_rows($connect);
    }

    function updateAlat($data) {
        global $connect;

        $id = htmlspecialchars($data["id_alat"]);

        $update = "UPDATE nametable SET
                id_alat = '$id'
                WHERE id_alat = '$id'";

        mysqli_query($connect, $update);
        return mysqli_affected_rows($connect);
    }

    function hapusAlat($data) {
        global $connect;
        $delete = "DELETE FROM nametable
                WHERE id_alat = '$data'";

        mysqli_query($connect, $delete);
        return mysqli_affected_rows($connect);
    }
    // --------------------------------------------------------------------------------------------------- Customer
    function tambahCustomer($data) {
        global $connect;
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $nomor = htmlspecialchars($data["nomor"]);

        $tambah = "INSERT INTO customer VALUES (
                NULL,'$nama', '$alamat', '$nomor'
            )";

        mysqli_query($connect, $tambah);
        return mysqli_affected_rows($connect);
    }

    function updateCustomer($data) {
        global $connect;

        $id = htmlspecialchars($data["id_customer"]);
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $nomor = htmlspecialchars($data["nomor"]);

        $update = "UPDATE customer SET
                id_customer = $id,
                nama = '$nama',
                alamat = '$alamat',
                nomor = '$nomor'

                WHERE id_customer = $id";

        mysqli_query($connect, $update);
        return mysqli_affected_rows($connect);
    }

    function hapusCustomer($data) {
        global $connect;
        $delete = "DELETE FROM customer
                WHERE id_customer = $data";

        mysqli_query($connect, $delete);
        return mysqli_affected_rows($connect);
    }
    // --------------------------------------------------------------------------------------------------- produk
    function tambahProduk($data) {
        global $connect;
        $nama = htmlspecialchars($data["nama"]);
        $merek = htmlspecialchars($data["merek"]);
        $tipe = htmlspecialchars($data["tipe"]);
        $stock = htmlspecialchars($data["stock"]);
        $harga = htmlspecialchars($data["harga"]);
        $gambar = htmlspecialchars($data["gambar"]);

        $tambah = "INSERT INTO produk VALUES (
                NULL,'$nama', '$merek', '$tipe',$stock,$harga, '$gambar'
            )";

        mysqli_query($connect, $tambah);
        return mysqli_affected_rows($connect);
    }

    function updateProduk($data) {
        global $connect;

        $id = htmlspecialchars($data["id_produk"]);
        $nama = htmlspecialchars($data["nama"]);
        $merek = htmlspecialchars($data["merek"]);
        $tipe = htmlspecialchars($data["tipe"]);
        $stock = htmlspecialchars($data["stock"]);
        $harga = htmlspecialchars($data["harga"]);
        $gambar = htmlspecialchars($data["gambar"]);

        $update = "UPDATE produk SET
                id_produk = $id,
                nama = '$nama',
                merek = '$merek',
                tipe = '$tipe',
                stock = $stock,
                harga = $harga,
                gambar = '$gambar'

                WHERE id_produk = $id";

        mysqli_query($connect, $update);
        return mysqli_affected_rows($connect);
    }

    function hapusProduk($data) {
        global $connect;
        $delete = "DELETE FROM produk
                WHERE id_produk = $data";

        mysqli_query($connect, $delete);
        return mysqli_affected_rows($connect);
    }

?>