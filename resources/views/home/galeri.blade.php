<!doctype html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Galeri Makanan Daerah - resepin.id</title>
    <meta name="description" content="Galeri makanan daerah Indonesia">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/nice-select.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/gijgo.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/slicknav.css">
    <link rel="stylesheet" href="/css/style.css">

    <style>

        .galeri_item {
            background: #ffffff;
            border-radius: 14px;
            padding: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,.1);
            transition: .3s;
            text-align: center;
        }

        .galeri_item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0,0,0,.18);
        }

        .galeri_item img {
            width: 100%;
            height: 200px;
            object-fit: cover;   /* gambar rapi dan proporsional */
            border-radius: 10px;
            display: block;
            margin: 0 auto;
        }

        .galeri_item p {
            font-size: 1rem;
            font-weight: 600;
            margin-top: 10px;
            color: #333;
        }

        .title-text {
            font-family: 'Instrument Sans', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: #1a1a1a;
        }

    </style>

</head>

<body>

@php
$region = request()->get('region', 'jawa');

$data = [
    'jawa' => [
        ['nama' => 'Rawon', 'img' => 'img/galeri/rawon.jpg'],
        ['nama' => 'Gudeg', 'img' => 'img/galeri/gudeg.jpg'],
        ['nama' => 'Pecel Madiun', 'img' => 'img/galeri/pecel.jpg'],
        ['nama' => 'Soto Lamongan', 'img' => 'img/galeri/soto.jpg'],
    ],
    'kalimantan' => [
        ['nama' => 'Soto Banjar', 'img' => 'img/galeri/soto-banjar.jpg'],
        ['nama' => 'Amplang', 'img' => 'img/galeri/amplang.jpg'],
        ['nama' => 'Lontong Orari', 'img' => 'img/galeri/lontong-orari.jpg'],
        ['nama' => 'Pisang Gapit', 'img' => 'img/galeri/gapit.jpg'],
    ],
    'sumatera' => [
        ['nama' => 'Rendang', 'img' => 'img/galeri/rendang.jpg'],
        ['nama' => 'Pempek', 'img' => 'img/galeri/pempek.jpg'],
        ['nama' => 'Gulai Patin', 'img' => 'img/galeri/gulai-patin.jpg'],
        ['nama' => 'Bingka Ambon', 'img' => 'img/galeri/bingka-ambon.jpg'],

    ],
    'sulawesi' => [
        ['nama' => 'Coto Makassar', 'img' => 'img/galeri/coto.jpg'],
        ['nama' => 'Konro Bakar', 'img' => 'img/galeri/konro.jpg'],
        ['nama' => 'Pallubasa', 'img' => 'img/galeri/pallubasa.jpg'],
        ['nama' => 'Pisang Ijo', 'img' => 'img/galeri/pisang-ijo.jpg'],
    ],
    'papua' => [
        ['nama' => 'Papeda', 'img' => 'img/galeri/papeda.jpg'],
        ['nama' => 'Ikan Kuah Kuning', 'img' => 'img/galeri/ikan-kuah-kuning.jpg'],
    ],
    'maluku' => [
        ['nama' => 'Kohu-Kohu', 'img' => 'img/galeri/kohu.jpg'],
        ['nama' => 'Nasi Lapola', 'img' => 'img/galeri/lapola.jpg'],
    ],
    'nusatenggara' => [
        ['nama' => 'Sei Sapi', 'img' => 'img/galeri/sei.jpg'],
        ['nama' => 'Catemak Jagung', 'img' => 'img/galeri/catemak.jpg'],
    ]
];

$judul = "Makanan Khas " . ucfirst($region);
@endphp

<div class="container mt-5">

    <a href="/index" class="btn btn-secondary mb-3">← Kembali</a>
    <h2 class="text-center mb-4 title-text">{{ $judul }}</h2>

    <div class="row" id="galeri_daerah">
        @foreach ($data[$region] as $item)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="galeri_item">
                    <img src="/{{ $item['img'] }}" alt="{{ $item['nama'] }}">
                    <p>{{ $item['nama'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>

</body>
</html>
