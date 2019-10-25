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
                      <th>Kode Mata Kuliah</th>
                      <th>Mata Kuliah</th>
                      <th>Jumlah SKS</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(data, index) in all_data[1]">
                      <td>@{{'#COD' + data.kode_mk}}</td>
                      <td>@{{data.mata_kuliah}}</td>
                      <td>@{{data.sks}}</td>
                      <td>@{{data.keterangan}}</td>
                      <td>
                        <a v-on:click="_showFunc('mkModal', 1, index)">
                          <button type="button" class="btn btn-warning btn-circle">
                            <i class="fas fa-pencil-ruler"></i>
                          </button>
                        </a>
                        <a v-on:click="_showFunc('mkDel', 1, index)">
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

      <!-- mata kuliah modal delete -->
      <div class="modal fade" id="mkDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <button type="button" class="btn btn-primary" v-on:click="_deleteFunc(result.kode_mk, urls[1])">Submit</button>
            </div>
          </div>
        </div>
      </div>

      <!-- mata kuliah modal -->
      <div class="modal fade" id="mkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Mata Kuliah</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="mk" class="col-form-label">Mata Kuliah:</label>
                  <input type="text" class="form-control" v-bind:value="result.mata_kuliah" v-model="result.mata_kuliah" />
                </div>
                <div class="form-group">
                  <label for="sks-text" class="col-form-label">Jumlah SKS:</label>
                  <input type="number" min="0" class="form-control" v-bind:value="result.sks" v-model="result.sks" />
                </div>
                <div class="form-group">
                  <label for="note-text" class="col-form-label">Keterangan:</label>
                  <textarea class="form-control" v-model="result.keterangan">@{{result.keterangan}}</textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"
                      v-on:click="_updateFunc(result.kode_mk, urls[1],
                              {'mata_kuliah': result.mata_kuliah, 'sks': result.sks,
                              'keterangan': result.keterangan})">Submit
              </button>
            </div>
          </div>
        </div>
      </div>

<!-- footer -->
@include('admin.partials.footer')
