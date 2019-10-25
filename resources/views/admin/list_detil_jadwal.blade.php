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
                      <th>NPM</th>
                      <th>Kode Mata Kuliah</th>
                      <th>Hari</th>
                      <th>Jam</th>
                      <th>Ruang</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(data, index) in all_data[2]">
                      <td>@{{data.kd_detil}}</td>
                      <td>@{{data.npm}}</td>
                      <td>@{{data.kode_mk}}</td>
                      <td>@{{data.hari}}</td>
                      <td>@{{data.jam}}</td>
                      <td>@{{data.ruang}}</td>
                      <td>
                        <a v-on:click="_showFunc('detilModal', 2, index)">
                          <button type="button" class="btn btn-warning btn-circle">
                            <i class="fas fa-pencil-ruler"></i>
                          </button>
                        </a>
                        <a v-on:click="_showFunc('detilDel', 2, index)">
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

      <!-- detil_jadwal modal delete -->
      <div class="modal fade" id="detilDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <button type="button" class="btn btn-primary" v-on:click="_deleteFunc(result.kd_detil, urls[2])">Submit</button>
            </div>
          </div>
        </div>
      </div>

      <!-- detil modal -->
      <div class="modal fade" id="detilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Detil Jadwal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="name" class="col-form-label">Mahasiswa:</label>
                  <input list="mahasiswa" class="form-control" :value="result.users.npm" v-model="result.users.npm" />
                  <small>@{{result.users.nama}}</small>

                  <!-- list of mahasiswa -->
                  <datalist id="mahasiswa">
                    <option v-for="(data, index) in all_data[0]" :value="data.npm">@{{data.npm+" - "+data.nama}}</option>
                  </datalist>
                </div>
                <div class="form-group">
                  <label for="matkul-text" class="col-form-label">Mata Kuliah:</label>
                  <input list="matkul" class="form-control" :value="result.kode_mk" v-model="result.kode_mk" />

                  <!-- list of mata_kuliah -->
                  <datalist id="matkul">
                    <option v-for="(data, index) in all_data[1]" :value="data.kode_mk">@{{data.mata_kuliah}}</option>
                  </datalist>
                </div>
                <div class="form-group">
                  <label for="day-text" class="col-form-label">Hari:</label>
                  <select :value="result.hari" v-model="result.hari" class="form-control">
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jam-text" class="col-form-label">Jam Masuk:</label>
                  <input type="time" class="form-control" :value="result.jam" v-model="result.jam"/>
                </div>
                <div class="form-group">
                  <label for="ruang-text" class="col-form-label">Ruang Masuk:</label>
                  <input type="text" class="form-control" :value="result.ruang" v-model="result.ruang"/>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"
                      v-on:click="_updateFunc(result.kd_detil, urls[2],
                              {'npm': result.users.npm, 'kode_mk': result.kode_mk, 'hari': result.hari,
                              'jam': result.jam, 'ruang': result.ruang})">Submit
              </button>
            </div>
          </div>
        </div>
      </div>

<!-- footer -->
@include('admin.partials.footer')
