<?php
$umkmData = [
    [
        'nama' => 'Warung Makan Mbak Rini',
        'kategori' => 'Kuliner',
        'alamat' => 'Dusun Jumantono Kulon',
        'lat' => -7.5876,
        'lng' => 110.9422,
        'deskripsi' => 'Menyediakan menu harian dan katering warga.',
    ],
    [
        'nama' => 'Batik Jumantono Lestari',
        'kategori' => 'Fashion',
        'alamat' => 'Dusun Ngrandu',
        'lat' => -7.5829,
        'lng' => 110.9481,
        'deskripsi' => 'Produksi batik tulis khas lokal.',
    ],
    [
        'nama' => 'Kerajinan Bambu Pak Darto',
        'kategori' => 'Kerajinan',
        'alamat' => 'Dusun Ngemplak',
        'lat' => -7.5914,
        'lng' => 110.9528,
        'deskripsi' => 'Aneka kerajinan bambu untuk rumah tangga.',
    ],
    [
        'nama' => 'Toko Sembako Barokah',
        'kategori' => 'Perdagangan',
        'alamat' => 'Jalan Raya Jumantono',
        'lat' => -7.5854,
        'lng' => 110.9569,
        'deskripsi' => 'Kebutuhan pokok dengan harga terjangkau.',
    ],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direktori GIS UMKM Desa Jumantono</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""
    >
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header class="hero">
        <div class="overlay"></div>
        <nav class="navbar container">
            <div class="brand">
                <div class="brand-logo">DJ</div>
                <div>
                    <h1>Desa Jumantono</h1>
                    <p>Kabupaten Karanganyar</p>
                </div>
            </div>
            <ul class="menu">
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#profil">Profil Desa</a></li>
                <li><a href="#umkm">UMKM</a></li>
                <li><a href="#peta">Peta GIS</a></li>
            </ul>
            <a class="btn btn-light" href="#umkm">Masuk</a>
        </nav>

        <section class="hero-content container" id="beranda">
            <div class="hero-left">
                <span class="badge">WEBSITE RESMI</span>
                <h2>
                    Selamat Datang<br>
                    di Website<br>
                    <span>Desa Jumantono</span>
                </h2>
                <p>
                    Direktori berbasis GIS untuk mempermudah masyarakat menemukan lokasi UMKM,
                    melihat sebaran usaha, dan mendukung pertumbuhan ekonomi desa.
                </p>
                <div class="hero-actions">
                    <a href="#peta" class="btn btn-primary">Jelajahi Peta</a>
                    <a href="#umkm" class="btn btn-outline">Daftar UMKM</a>
                </div>
            </div>
            <div class="hero-right">
                <article class="feature-card">
                    <h3>Profil Desa</h3>
                    <p>Informasi singkat Desa Jumantono</p>
                    <a href="#profil">Lihat Selengkapnya →</a>
                </article>
                <article class="feature-card">
                    <h3>Produk UMKM</h3>
                    <p>Direktori UMKM berbasis lokasi</p>
                    <a href="#umkm">Lihat Selengkapnya →</a>
                </article>
                <article class="feature-card">
                    <h3>Peta Sebaran</h3>
                    <p>Titik UMKM pada peta interaktif</p>
                    <a href="#peta">Lihat Selengkapnya →</a>
                </article>
            </div>
        </section>
    </header>

    <main>
        <section class="section container" id="profil">
            <h2>Profil Singkat Desa Jumantono</h2>
            <p>
                Desa Jumantono mengembangkan layanan informasi digital untuk memetakan
                potensi ekonomi lokal. Melalui direktori GIS ini, warga dan pengunjung dapat
                menemukan UMKM berdasarkan lokasi dan kategori usaha.
            </p>
        </section>

        <section class="section container" id="umkm">
            <h2>Daftar UMKM</h2>
            <div class="umkm-grid">
                <?php foreach ($umkmData as $umkm): ?>
                    <article class="umkm-card">
                        <span class="pill"><?php echo htmlspecialchars($umkm['kategori'], ENT_QUOTES, 'UTF-8'); ?></span>
                        <h3><?php echo htmlspecialchars($umkm['nama'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><?php echo htmlspecialchars($umkm['deskripsi'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <small><?php echo htmlspecialchars($umkm['alamat'], ENT_QUOTES, 'UTF-8'); ?></small>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="section container" id="peta">
            <h2>Peta GIS Penempatan UMKM</h2>
            <p class="map-caption">Klik marker pada peta untuk melihat detail UMKM.</p>
            <div id="map"></div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>© <?php echo date('Y'); ?> Desa Jumantono - Direktori GIS UMKM</p>
        </div>
    </footer>

    <script>
        window.umkmData = <?php echo json_encode($umkmData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;
    </script>
    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""
    ></script>
    <script src="/assets/js/app.js"></script>
</body>
</html>
