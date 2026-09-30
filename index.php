<?php
function hitungTotalProduk($data) {
    return count($data);
}

function hitungHargaDiskon($harga) {
    if ($harga >= 1000000) {
        return $harga - ($harga * 0.10);
    }
    return $harga;
}

function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

$products = [
    [
        "nama" => "Gundam RX-78-2 Master Grade",
        "kategori" => "Mecha Model Kit",
        "harga" => 750000,
        "stok" => 5
    ],
    [
        "nama" => "Nendoroid Anime Character",
        "kategori" => "Chibi Figure",
        "harga" => 650000,
        "stok" => 8
    ],
    [
        "nama" => "S.H.Figuarts Rider Action Figure",
        "kategori" => "Action Figure",
        "harga" => 1250000,
        "stok" => 3
    ],
    [
        "nama" => "Scale Figure 1/7 Collector Edition",
        "kategori" => "Scale Figure",
        "harga" => 2400000,
        "stok" => 2
    ],
    [
        "nama" => "Pop Up Parade Figure Statue",
        "kategori" => "Statue",
        "harga" => 550000,
        "stok" => 0
    ],
    [
        "nama" => "PG 1/60 Perfect Grade Mecha",
        "kategori" => "Mecha Model Kit",
        "harga" => 3200000,
        "stok" => 0
    ]
];

$total_produk = hitungTotalProduk($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Cia Store</h1>
        <p>Katalog Action Figure & Model Kit</p>
    </header>

    <div class="container">
        <div class="info-total">
            <h3>Total Koleksi: <?php echo $total_produk; ?> produk</h3>
        </div>

        <div class="product-grid">
            <?php foreach ($products as $item): ?>
                <?php 
                    $harga_akhir = hitungHargaDiskon($item['harga']);
                    $is_discount = $item['harga'] >= 1000000;
                ?>
                <div class="card">
                    <p class="kategori"><?php echo $item['kategori']; ?></p>
                    <h3 class="nama"><?php echo $item['nama']; ?></h3>

                    <p class="harga">
                        <?php if ($is_discount): ?>
                            <s><?php echo formatRupiah($item['harga']); ?></s><br>
                            <?php echo formatRupiah($harga_akhir); ?>
                            <span class="diskon">(Diskon 10%)</span>
                        <?php else: ?>
                            <?php echo formatRupiah($item['harga']); ?>
                        <?php endif; ?>
                    </p>

                    <p>
                        Stok: 
                        <?php if ($item['stok'] > 0): ?>
                            <span class="stok-ada"><?php echo $item['stok']; ?> (Tersedia)</span>
                        <?php else: ?>
                            <span class="stok-habis">Stok Habis</span>
                        <?php endif; ?>
                    </p>

                    <?php if ($item['stok'] > 0): ?>
                        <button>Beli</button>
                    <?php else: ?>
                        <button disabled>Stok Habis</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Cia Store</p>
    </footer>

</body>
</html>