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
  </style>
</head>
<body>
    <div class="container-fluid">

      <!-- Page Heading -->
      <h5>Selamat Siang,</h5>
      <h6>Berikut Rekap Kehadiran dari {{$body['npm']}}:</h6>

      <table width="100%" cellspacing="0">
        <!-- table content -->
        <tbody>
          <tr>
            <th>NPM:</th>
            <td>{{ $body['npm'] }}</td>
          </tr>
          <tr>
            <th>Nama:</th>
            <td>{{ $body['nama'] }}</td>
          </tr>
          <tr>
            <th>Mata Kuliah:</th>
            <td>{{ $body['matkul'] }}</td>
          </tr>
          <tr>
            <th>Status Kehadiran:</th>
            <td>{{ $body['hadir'] }}</td>
          </tr>
          <tr>
            <th>Tanggal:</th>
            <td>{{ $body['tanggal'] }}</td>
          </tr>
          </tbody>

        </table>

      <h5>Terima kasih</h5>
    </div>

</body>
</html>
