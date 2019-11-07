<!DOCTYPE html>
<html lang="en">
<head>
  <!-- manual stylesheet -->
  <style media="screen">
    .container-fluid {
      width: 100%;
      padding-right: 0.75rem;
      padding-left: 0.75rem;
      margin-right: auto;
      margin-left: auto;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      margin-right: -0.75rem;
      margin-left: -0.75rem;
    }
    p,
    h2,
    h3 {
      orphans: 3;
      widows: 3;
    }
    h2,
    h3 {
      page-break-after: avoid;
    }
    .mb-2,
    .my-2 {
      margin-bottom: 0.5rem !important;
    }
    .mb-4,
    .my-4 {
      margin-bottom: 1.5rem !important;
    }
    .pt-3,
    .py-3 {
      padding-top: 1rem !important;
    }
    .m-0 {
      margin: 0 !important;
    }
    .text-gray-800 {
      color: #5a5c69 !important;
    }
    .card .card-header .dropdown {
      line-height: 1;
    }
    .card-body {
      flex: 1 1 auto;
      padding: 1.25rem;
    }
    .shadow {
      box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
    }
    .font-weight-bold {
      font-weight: 700 !important;
    }
    .text-primary {
      color: #4e73df !important;
    }
    .table-responsive {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }
    .table-responsive > .table-bordered {
      border: 0;
    }
    .table {
      border-collapse: collapse !important;
    }
    .table tbody + tbody {
      border-top: 2px solid #e3e6f0;
    }
    .table td,
    .table th {
      background-color: #fff !important;
    }
    .table-bordered th,
    .table-bordered td {
      border: 1px solid #dddfeb !important;
    }
  </style>
</head>
<body>
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Selamat Siang,</h1>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">

        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Berikut Rekap Kehadiran {{$body['npm']}}:</h6>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <tbody>

                <tr>
                  <td>NPM:</td>
                  <td>{{ $body['npm'] }}</td>
                </tr>
                <tr>
                  <td>Nama:</td>
                  <td>{{ $body['nama'] }}</td>
                </tr>
                <tr>
                  <td>Mata Kuliah:</td>
                  <td>{{ $body['matkul'] }}</td>
                </tr>
                <tr>
                  <td>Status Kehadiran:</td>
                  <td>{{ $body['hadir'] }}</td>
                </tr>
                <tr>
                  <td>Tanggal:</td>
                  <td>{{ $body['tanggal'] }}</td>
                </tr>

              </tbody>
            </table>

          </div>
        </div>
      </div> <!-- end of content -->

      <h3>Terima kasih</h3>
    </div>
</body>
</html>
