<?php
$produk = [
    [
        "nama" => "Mousepad Gaming",
        "kategori" => "Aksesoris",
        "harga" => 175000,
        "stok" => 15
    ],
    [
        "nama" => "Apple Watch",
        "kategori" => "Smart Wearable",
        "harga" => 4500000,
        "stok" => 5
    ],
    [
        "nama" => "Mechanical Keyboard",
        "kategori" => "Perangkat Komputer",
        "harga" => 1250000,
        "stok" => 8
    ],
    [
        "nama" => "TWS Earbuds Wireless",
        "kategori" => "Audio",
        "harga" => 850000,
        "stok" => 12
    ],
    [
        "nama" => "External SSD 512GB",
        "kategori" => "Storage",
        "harga" => 1100000,
        "stok" => 0
    ],
    [
        "nama" => "Powerbank Fast Charging",
        "kategori" => "Aksesoris",
        "harga" => 450000,
        "stok" => 10
    ]
];

$total_produk = count($produk);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZOE Store - Katalog Produk</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            color: #333;
            line-height: 1.6;
        }

        /* Header / Navbar diubah menjadi warna biru elegan (Navy) */
        header {
            background-color: #1b365d;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        header h1 {
            font-size: 1.5rem;
            color: white;
        }

        nav a {
            color: #e0e6ed;
            text-decoration: none;
            margin-left: 20px;
            font-size: 0.95rem;
        }

        nav a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        /* Bagian Hero menggunakan background Headline.jpg */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('Headline.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: left;
            padding: 4rem 3rem;
            margin: 2rem auto;
            max-width: 1200px;
            border-radius: 12px;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .hero p {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }

        .btn-hero {
            display: inline-block;
            background-color: white;
            color: black;
            padding: 8px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 3rem 20px;
        }

        .info-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .info-header h3 {
            font-size: 1.2rem;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-total {
            background-color: white;
            border: 1px solid #ddd;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .katalog-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: flex-start;
        }

        .card {
            background: white;
            border-radius: 12px;
            border: 1px solid #eaeaea;
            width: calc(33.333% - 14px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-header-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .kategori-tag {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #777;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .diskon-badge {
            font-size: 0.75rem;
            background-color: #fff0f0;
            color: #e74c3c;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: bold;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: #222;
            font-weight: 700;
        }

        .harga-normal-coret {
            font-size: 0.9rem;
            color: #888;
            text-decoration: line-through;
            margin-bottom: 2px;
        }

        .harga {
            font-size: 1.3rem;
            font-weight: bold;
            color: #111;
            margin-bottom: 15px;
        }

        .stok-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: #555;
            border-top: 1px solid #f0f0f0;
            padding-top: 12px;
        }

        .badge-stok {
            font-size: 0.8rem;
            font-weight: 600;
            color: #27ae60;
        }

        .badge-habis {
            font-size: 0.8rem;
            font-weight: 600;
            color: #e74c3c;
        }

        .card-footer {
            padding: 1rem 1.5rem;
            background-color: #fff;
        }

        .btn-beli {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.95rem;
            transition: background-color 0.2s;
        }

        .btn-beli:hover {
            background-color: #2980b9;
        }

        .btn-beli.disabled {
            background-color: #e0e0e0;
            color: #888;
            cursor: not-allowed;
            pointer-events: none;
        }

        @media (max-width: 900px) {
            .card {
                width: calc(50% - 10px);
            }
        }

        @media (max-width: 600px) {
            .card {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>ZOE Store</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">About</a>
        </nav>
    </header>

    <section class="hero">
        <h2>Tech store.</h2>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <a href="#" class="btn-hero">Lihat Produk</a>
    </section>

    <div class="container">
        <div class="info-header">
            <h3>Katalog Produk</h3>
            <div class="badge-total">Total Produk: <?php echo $total_produk; ?></div>
        </div>

        <div class="katalog-grid">
            <?php foreach ($produk as $item): ?>
                <?php 
                    if ($item['harga'] >= 1000000) {
                        $diskon = $item['harga'] * 0.10;
                        $harga_akhir = $item['harga'] - $diskon;
                        $dapat_diskon = true;
                    } else {
                        $harga_akhir = $item['harga'];
                        $dapat_diskon = false;
                    }
                ?>
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-info">
                            <span class="kategori-tag"><?php echo $item['kategori']; ?></span>
                            <?php if ($dapat_diskon): ?>
                                <span class="diskon-badge">DISKON 10%</span>
                            <?php endif; ?>
                        </div>
                        
                        <h3 class="card-title"><?php echo $item['nama']; ?></h3>
                        
                        <?php if ($dapat_diskon): ?>
                            <div class="harga-normal-coret">Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></div>
                        <?php endif; ?>

                        <div class="harga">
                            Rp <?php echo number_format($harga_akhir, 0, ',', '.'); ?>
                        </div>

                        <div class="stok-wrapper">
                            <span>Stok: <?php echo $item['stok']; ?></span>
                            <?php if ($item['stok'] > 0): ?>
                                <span class="badge-stok">Tersedia</span>
                            <?php else: ?>
                                <span class="badge-habis">Stok Habis</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-footer">
                        <?php if ($item['stok'] > 0): ?>
                            <a href="#" class="btn-beli">Beli Sekarang</a>
                        <?php else: ?>
                            <button class="btn-beli disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>