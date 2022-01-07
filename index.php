<?php
    require 'application/function.php';

    if ( isset($_POST["tambah"]) ){
        if(tambahTransaksi($_POST) > 0) {
            echo "
                <script>
                    document.location.href = 'index.php'
                </script>
            ";
        }
    }

    $transaksi = query("SELECT transaksi.id_transaksi, customer.id_customer, customer.nama, transaksi.tggl, transaksi.total FROM transaksi
    JOIN customer ON transaksi.id_customer = customer.id_customer");

    $customer = query("SELECT * FROM customer");

    $keuntungan = query("SELECT SUM(total) FROM transaksi");
    $jml_transaksi = query("SELECT COUNT(id_transaksi) FROM transaksi");
    $jml_customer = query("SELECT COUNT(id_customer) FROM customer");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <navbar id="navbar">
        <div class="profile">
            Mulyana
        </div>
        <div class="nav-menus">
            <ul>
                <li><a href="page/customer.php">Customer</a></li>
                <li><a href="page/produk.php">Produk</a></li>
                <li><a href="page/transaksi.php">transaksi</a></li>
            </ul>
        </div>
    </navbar>
    <div class="main-section">
        <div class="col-left">
            <div class="row-top">
                <div class="card">
                    <p>Pemasukan</p>
                    <p><?= $keuntungan[0]["SUM(total)"] ?></p>
                </div>
                <div class="card">
                    <p>Jumlah transaksi</p>
                    <p><?= $jml_transaksi[0]["COUNT(id_transaksi)"] ?></p>
                </div>
                <div class="card">
                    <p>Jumlah customer</p>
                    <p><?= $jml_customer[0]["COUNT(id_customer)"] ?></p>
                </div>
            </div>
            <div class="row-table">
                <div class="row-title">
                    <p>Data transaksi</p>
                </div>
                <table class="table table-data">
                    <tr>
                        <th>ID</th>
                        <th>ID Customer</th>
                        <th>nama</th>
                        <th>Tanggal</th>
                        <th>total</th>
                    </tr>
                    <?php foreach($transaksi as $row) : ?>
                        <tr>
                            <td><?= $row["id_transaksi"] ?></td>
                            <td><?= $row["id_customer"] ?></td>
                            <td><?= $row["nama"] ?></td>
                            <td><?= $row["tggl"] ?></td>
                            <td><?= $row["total"] ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>Mulyana</td>
                        <td>4</td>
                        <td>120000</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>Mulyana</td>
                        <td>4</td>
                        <td>120000</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>Mulyana</td>
                        <td>4</td>
                        <td>120000</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-right">
            <div class="row-input">
                <div class="row-title">
                    <p>Transaksi baru</p>
                </div>
                <form action="" method="POST" class="form">
                <label for="id_customer">Pilih customer</label>
                    <select name="id_customer" id="id_customer">
                        <option value="">--pilih customer--</option>
                        <?php foreach($customer as $i) :?>
                            <option value="<?= $i["id_customer"] ?>"><?= $i["nama"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btn btn-primary pt-4" name="tambah">Buat</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>