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
          <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>
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
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Tanggal Lahir</th>
                      <th>Email Orangtua</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(data, index) in all_data[0]">
                      <td>@{{data.npm}}</td>
                      <td>@{{data.nama}}</td>
                      <td>@{{data.alamat}}</td>
                      <td>@{{data.tgllahir}}</td>
                      <td>@{{data.email_orangtua}}</td>
                      <td>
                        <a v-on:click="_showFunc('mhsModal', 0, index)">
                          <button type="button" class="btn btn-warning btn-circle">
                            <i class="fas fa-pencil-ruler"></i>
                          </button>
                        </a>
                        <a v-on:click="_showFunc('mhsDel', 0, index)">
                          <button type="button" class="btn btn-danger btn-circle">
                            <i class="fas fa-trash"></i>
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

      <!-- mahasiswa modal delete -->
      <div class="modal fade" id="mhsDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <button type="button" class="btn btn-primary" v-on:click="_deleteFunc(result.npm, urls[0])">Submit</button>
            </div>
          </div>
        </div>
      </div>

      <!-- mahasiswa modal -->
      <div class="modal fade" id="mhsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Mahasiswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="name" class="col-form-label">Nama:</label>
                  <input type="text" class="form-control" v-bind:value="result.nama" v-model="result.nama" />
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" v-bind:value="result.sandi" v-model="result.sandi" />
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Alamat:</label>
                  <textarea class="form-control" v-model="result.alamat">@{{result.alamat}}</textarea>
                </div>
                <div class="form-group">
                  <label for="birth-text" class="col-form-label">Tanggal Lahir:</label>
                  <input type="date" class="form-control" :value="result.tgllahir" v-model="result.tgllahir"/>
                </div>
                <div class="form-group">
                  <label for="email-text" class="col-form-label">Email Orangtua:</label>
                  <input type="email" class="form-control" :value="result.email_orangtua" v-model="result.email_orangtua"/>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"
                      v-on:click="_updateFunc(result.npm, urls[0],
                              {'nama': result.nama, 'alamat': result.alamat, 'tgllahir': result.tgllahir,
                              'email': result.email_orangtua})">Submit
              </button>
            </div>
          </div>
        </div>
      </div>
<!-- footer -->
@include('admin.partials.footer')
