<?php
    require '../application/function.php';

    $id = $_GET["id"];

    if ( isset($_POST["tambah"]) ){
        if(tambahDetail($_POST) > 0) {
            
        }
    }
    
    $detail = query("SELECT * FROM detail WHERE id_transaksi = '$id'");
    $list = query("SELECT produk.gambar, produk.nama, produk.merek, produk.tipe, detail.qty FROM detail JOIN produk ON detail.id_produk = produk.id_produk WHERE id_transaksi = $id");
    $produk = query("SELECT * FROM produk");
    $jumlah = query("SELECT total FROM transaksi WHERE id_transaksi = $id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <navbar id="navbar">
        <div class="brand">
            <div class="brand-img">
                <img src="../assets/img/logo.svg" alt="png">
            </div>
            <p class="brand-title">Toko Bangunan</p>
        </div>
        <div class="nav-menus">
            <ul>
                <li class="active"><a href="../index.php">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1799 2.41C15.1799 1.08 16.2599 0 17.5899 0C18.9199 0 19.9999 1.08 19.9999 2.41C19.9999 3.74 18.9199 4.82 17.5899 4.82C16.2599 4.82 15.1799 3.74 15.1799 2.41ZM11.3298 12.7593L14.2198 9.0303L14.1798 9.0503C14.3398 8.8303 14.3698 8.5503 14.2598 8.3003C14.1508 8.0503 13.9098 7.8803 13.6508 7.8603C13.3798 7.8303 13.1108 7.9503 12.9498 8.1703L10.5308 11.3003L7.75976 9.1203C7.58976 8.9903 7.38976 8.9393 7.18976 8.9603C6.99076 8.9903 6.81076 9.0993 6.68976 9.2593L3.73076 13.1103L3.66976 13.2003C3.49976 13.5193 3.57976 13.9293 3.87976 14.1503C4.01976 14.2403 4.16976 14.3003 4.33976 14.3003C4.57076 14.3103 4.78976 14.1893 4.92976 14.0003L7.43976 10.7693L10.2898 12.9103L10.3798 12.9693C10.6998 13.1393 11.0998 13.0603 11.3298 12.7593ZM13.4498 1.7803C13.4098 2.0303 13.3898 2.2803 13.3898 2.5303C13.3898 4.7803 15.2098 6.5993 17.4498 6.5993C17.6998 6.5993 17.9398 6.5703 18.1898 6.5303V14.5993C18.1898 17.9903 16.1898 20.0003 12.7898 20.0003H5.40076C1.99976 20.0003 -0.000244141 17.9903 -0.000244141 14.5993V7.2003C-0.000244141 3.8003 1.99976 1.7803 5.40076 1.7803H13.4498Z" fill="#130F26"/>
                        </svg>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="page/customer.php">
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.294 5.29105C13.294 8.22808 10.9391 10.5831 8 10.5831C5.0619 10.5831 2.70601 8.22808 2.70601 5.29105C2.70601 2.35402 5.0619 0 8 0C10.9391 0 13.294 2.35402 13.294 5.29105ZM8 20C3.66237 20 0 19.295 0 16.575C0 13.8539 3.68538 13.1739 8 13.1739C12.3386 13.1739 16 13.8789 16 16.599C16 19.32 12.3146 20 8 20Z" fill="#130F26"/>
                        </svg>
                        <p>Customer</p>
                    </a>
                </li>
                <li>
                    <a href="page/produk.php">   
                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9303 5C13.9621 4.92913 13.977 4.85189 13.9739 4.77432H14C13.8882 2.10591 11.6849 0 9.00494 0C6.325 0 4.12172 2.10591 4.00989 4.77432C3.9967 4.84898 3.9967 4.92535 4.00989 5H3.93171C2.65022 5 1.28034 5.84597 0.882639 8.12007L0.104905 14.3147C-0.531424 18.8629 1.81062 20 4.86853 20H13.1585C16.2075 20 18.4789 18.3535 17.9133 14.3147L17.1444 8.12007C16.676 5.90964 15.3503 5 14.0865 5H13.9303ZM12.4932 5C12.4654 4.92794 12.4506 4.85153 12.4497 4.77432C12.4497 2.85682 10.8899 1.30238 8.96575 1.30238C7.04164 1.30238 5.48184 2.85682 5.48184 4.77432C5.49502 4.84898 5.49502 4.92535 5.48184 5H12.4932ZM6.097 10.1486C5.60889 10.1486 5.21321 9.74131 5.21321 9.23893C5.21321 8.73655 5.60889 8.32929 6.097 8.32929C6.5851 8.32929 6.98079 8.73655 6.98079 9.23893C6.98079 9.74131 6.5851 10.1486 6.097 10.1486ZM11.002 9.23893C11.002 9.74131 11.3977 10.1486 11.8858 10.1486C12.3739 10.1486 12.7696 9.74131 12.7696 9.23893C12.7696 8.73655 12.3739 8.32929 11.8858 8.32929C11.3977 8.32929 11.002 8.73655 11.002 9.23893Z" fill="#130F26"/>
                        </svg>
                        <p>Produk</p>
                    </a>
                 </li>
                <li>
                    <a href="page/histori.php">
                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.92574 14.39H11.3119C11.7178 14.39 12.0545 14.05 12.0545 13.64C12.0545 13.23 11.7178 12.9 11.3119 12.9H5.92574C5.5198 12.9 5.18317 13.23 5.18317 13.64C5.18317 14.05 5.5198 14.39 5.92574 14.39ZM9.27228 7.9H5.92574C5.5198 7.9 5.18317 8.24 5.18317 8.65C5.18317 9.06 5.5198 9.39 5.92574 9.39H9.27228C9.67822 9.39 10.0149 9.06 10.0149 8.65C10.0149 8.24 9.67822 7.9 9.27228 7.9ZM16.3381 7.02561C16.5708 7.02292 16.8242 7.02 17.0545 7.02C17.302 7.02 17.5 7.22 17.5 7.47V15.51C17.5 17.99 15.5099 20 13.0545 20H5.17327C2.59901 20 0.5 17.89 0.5 15.29V4.51C0.5 2.03 2.5 0 4.96535 0H10.2525C10.5099 0 10.7079 0.21 10.7079 0.46V3.68C10.7079 5.51 12.203 7.01 14.0149 7.02C14.4381 7.02 14.8112 7.02316 15.1377 7.02593C15.3917 7.02809 15.6175 7.03 15.8168 7.03C15.9578 7.03 16.1405 7.02789 16.3381 7.02561ZM16.6111 5.566C15.7972 5.569 14.8378 5.566 14.1477 5.559C13.0527 5.559 12.1507 4.648 12.1507 3.542V0.906C12.1507 0.475 12.6685 0.261 12.9646 0.572C13.5004 1.13476 14.2368 1.90834 14.9699 2.67837C15.7009 3.44632 16.4286 4.21074 16.9507 4.759C17.2398 5.062 17.0279 5.565 16.6111 5.566Z" fill="#130F26"/>
                        </svg>
                        <p>Histori</p>
                    </a>
                </li>
            </ul>
        </div>
    </navbar>

        <div class="col-produk">
            <div class="row-title">
                List produk
            </div>
            <div class="produk-wrapper">
                <?php foreach($produk as $row) : ?>
                    
                    <div class="produk-card">
                        <div class="produk-img">
                            <img src="../assets/img/<?= $row["gambar"]?>" alt="<?= $row["nama"] ?>">
                        </div>
                        <div class="produk-copy">
                            <div class="produk-top">
                                <p class="id hidden"><?= $row["id_produk"] ?></p>
                                <p class="produk-title"><?= $row["nama"]?> <?= $row["merek"] ?> <?= $row["tipe"] ?></p>
                                <p class="produk-stock"><?= $row["stock"] ?></p>
                            </div>
                            <div class="produk-bottom">
                                <p class="produk-harga"><?= $row["harga"] ?></p>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-right-produk">
            <div class="row-title-list">
                Transaksi <?= $id ?>
                <p>Rp. <?= $jumlah[0]["total"] ?></p>
            </div>
            <div class="row-list">
                <?php foreach($list as $row) : ?>
                <div class="list-wrapper">
                    <div>
                        <div class="list-img">
                            <img src="../assets/img/<?= $row["gambar"] ?>" alt="">
                        </div>
                        <div class="list-produk">
                            <p class="list-title"><?= $row["nama"] ?></p>
                            <p class="list-merek"><?= $row["merek"] ?></p>
                            <p class="list-tipe"><?= $row["tipe"] ?></p>
                        </div>
                    </div>
                    <p class="list-qty"><?= $row["qty"] ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="row-table">
                <form action="" method="POST" class="form-transaksi">
                    <input type="hidden" name="id_transaksi" value="<?= $id; ?>">
                    
                    <div>
                        <input type="text" id="id_input" name="id_produk">
                        <input type="number" id="qty" placeholder="Qty" name="qty">
                    </div>
                    <button name="tambah" class="btn btn-primary mt-4">tambah</button>
                </form>
            </div>
        </div>
    
    <script>
        const cards = document.querySelectorAll('.produk-card')
        const input = document.getElementById('id_input');
        cards.forEach(card => {
            card.addEventListener('click', () => {
                let id = card.querySelector('.id').innerText
                input.value = id;
            })
        })
    </script>
</body>
</html>