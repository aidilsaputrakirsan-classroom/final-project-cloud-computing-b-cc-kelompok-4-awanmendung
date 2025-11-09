<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="assets/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Tambah Resep | Resepin.id</title>

  <!-- Fonts and Icons -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
</head>

<body class="g-sidenav-show bg-gray-100">

  <!-- Main -->
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="dashboard">Resep</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Resep</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Tambah Resep</h6>
        </nav>
      </div>
    </nav>

    <!-- Form Tambah Resep -->
    <div class="container-fluid py-4">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header pb-0">
              <h5 class="mb-0">Form Tambah Resep</h5>
              <p class="text-sm text-muted mb-0">Isi data resep secara lengkap di bawah ini</p>
            </div>
            <div class="card-body">

              <form id="formTambahResep" enctype="multipart/form-data">
                <!-- Nama Resep -->
                <div class="mb-3">
                  <label class="form-label">Nama Resep</label>
                  <input type="text" class="form-control" name="nama_resep" placeholder="Masukkan nama resep" required>
                </div>

                <!-- Kategori -->
                <div class="mb-3">
                  <label class="form-label">Kategori</label>
                  <select class="form-select" name="kategori" required>
                    <option value="">Pilih kategori...</option>
                    <option value="Makanan Utama">Makanan Utama</option>
                    <option value="Makanan Penutup">Makanan Penutup</option>
                    <option value="Minuman">Minuman</option>
                  </select>
                </div>

                <!-- Gambar -->
                <div class="mb-3">
                  <label class="form-label">Gambar</label>
                  <input type="file" class="form-control" name="gambar" accept="image/*" required>
                  <small class="text-muted">Format yang diperbolehkan: JPG, PNG, JPEG.</small>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                  <label class="form-label">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" rows="4" placeholder="Tuliskan deskripsi resep..." required></textarea>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-between mt-4">
                  <a href="dashboard" class="btn btn-outline-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                  </a>
                  <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-save me-1"></i> Simpan Resep
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- JS -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>

  <script>
    document.getElementById('formTambahResep').addEventListener('submit', function (e) {
      e.preventDefault();
      alert('Resep berhasil disimpan!');
      window.location.href = "dashboard"; // kembali ke halaman utama resep
    });
  </script>
</body>

</html>
