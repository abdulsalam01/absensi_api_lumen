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
          <h1 class="h3 mb-2 text-gray-800">Rekap Kehadiran</h1>
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
                    <tr v-for="(data, index) in all_data[3]">
                      <td>@{{data.kd_detil}}</td>
                      <td>@{{data.hadir}}</td>
                      <td>@{{data.tanggal}}</td>
                      <td>
                        <a v-on:click="_showFunc('rkModal', 3, index)">
                          <button type="button" class="btn btn-warning btn-circle">
                            <i class="fas fa-pencil-ruler"></i>
                          </button>
                        </a>
                        <a v-on:click="_showFunc('rkDel', 3, index)">
                          <button type="button" class="btn btn-danger btn-circle">
                            <i class="fas fa-trash"></i>
                          </button>
                        </a>
                        <a v-on:click="_sendMail(urls[3], data)">
                          <button type="button" class="btn btn-success btn-circle">
                            <i class="fas fa-mail-bulk"></i>
                          </button>
                        </a>
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

      <!-- rekap_kehadiran modal delete -->
      <div class="modal fade" id="rkDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" v-on:click="_deleteFunc([result.kd_detil, result.tanggal], urls[3])">Submit</button>
            </div>
          </div>
        </div>
      </div>

      <!-- rekap_kehadiran modal -->
      <div class="modal fade" id="rkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Rekap Kehadiran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="name" class="col-form-label">Kode Detil:</label>
                  <select class="form-control" :value="result.kd_detil" v-model="result.kd_detil">
                    <option v-for="(data, index) in all_data[2]" :value="data.kd_detil">
                      @{{data.npm + ' # ' + data.hari + '-' + data.jam + ' # ' + data.ruang}}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="status-text" class="col-form-label">Status Kehadiran:</label>
                  <select class="form-control" :value="result.hadir" v-model="result.hadir">
                    <option v-for="(stats, index) in status" :value="index">@{{stats}}</option>
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"
                      v-on:click="_updateFunc([result.kd_detil, result.tanggal], urls[3],
                              {'kd_detil': result.kd_detil, 'hadir': result.hadir})">Submit
              </button>
            </div>
          </div>
        </div>
      </div>

<!-- footer -->
@include('admin.partials.footer')
