<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Edit Kategori | Resepin.id</title>

  <!-- Fonts and Icons -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
</head>
<body class="g-sidenav-show bg-gray-100">

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="kategori">Kategori</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Kategori</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Edit Kategori</h6>
        </nav>
      </div>
    </nav>

    <div class="container-fluid py-4">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header pb-0">
              <h5 class="mb-0">Edit Kategori</h5>
            </div>
            <div class="card-body">
              <form id="formEditKategori">
                <div class="mb-3">
                  <label class="form-label">Nama Kategori</label>
                  <input type="text" class="form-control" id="namaKategori" required>
                </div>
                <div class="d-flex justify-content-between mt-4">
                  <a href="kategori" class="btn btn-outline-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                  </a>
                  <button type="submit" class="btn btn-warning text-white">
                    <i class="fa-solid fa-save me-1"></i> Perbarui Kategori
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- JS Library -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>

  <!-- Module JS -->
  <script type="module" src="/assets/js/editKategori.js"></script>
</body>
</html>