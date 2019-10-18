<!-- header -->
@include('admin.partials.header')

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('admin.partials.menu')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('admin.partials.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Mata Kuliah</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Detail</th>
                      <th>Status Kehadiran</th>
                      <th>Tanggal/Waktu</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="data in all_data[3]">
                      <td>@{{data.kd_detil}}</td>
                      <td>@{{data.hadir}}</td>
                      <td>@{{data.tanggal}}</td>
                      <td>
                        <a v-bind:href="data.kd_detil">Edit</a>|
                        <a v-bind:href="data.kd_detil">Delete</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- footer -->
@include('admin.partials.footer')