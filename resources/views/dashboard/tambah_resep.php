<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Resep | Resepin.id</title>

  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
</head>

<body class="bg-gray-100">

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

    <div class="container-fluid py-4">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header pb-0">
              <h5 class="mb-0">Form Tambah Resep</h5>
              <p class="text-sm text-muted mb-0">Isi data resep secara lengkap di bawah ini</p>
            </div>

            <div class="card-body">

              <form id="formTambahResep">

                <!-- Nama Resep -->
                <div class="mb-3">
                  <label class="form-label">Nama Resep</label>
                  <input type="text" name="nama_resep" class="form-control" required>
                </div>

                <!-- Kategori (FK) -->
                <div class="mb-3">
                  <label class="form-label">Kategori</label>
                  <select name="kategori" id="kategoriSelect" class="form-select" required>
                    <option value="">Memuat kategori...</option>
                  </select>
                </div>

                <!-- Gambar -->
                <div class="mb-3">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar" id="gambarInput" class="form-control" accept="image/*" required>
                </div>

                <!-- Preview Gambar -->
                <img id="previewImg" class="img-fluid border rounded mb-3 d-none" style="max-height:200px">

                <!-- Deskripsi -->
                <div class="mb-3">
                  <label class="form-label">Deskripsi</label>
                  <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-between mt-4">
                  <a href="dashboard" class="btn btn-outline-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                  </a>
                  <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-save"></i> Simpan Resep
                  </button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- File JS Eksternal -->
  <script type="module" src="/assets/js/resep.js"></script>

</body>

</html>
