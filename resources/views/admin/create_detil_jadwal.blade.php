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
        <div class="container-fluid row">

          <div class="card shadow mb-4 col-sm-8 mr-5">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Detil Jadwal Mahasiswa</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <!--  -->
                <form action="#" method="post">
                  <!-- data -->
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Mahasiswa:</label>
                    <div class="col-sm-10">
                      <input list="mahasiswa" class="form-control" v-model="datas.npm" />

                      <!-- list of mahasiswa -->
                      <datalist id="mahasiswa">
                        <option v-for="(data, index) in all_data[0]" :value="data.npm" v-model="datas.npm">@{{data.npm+" - "+data.nama}}</option>
                      </datalist>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="matkul-text" class="col-sm-2 col-form-label">Mata Kuliah:</label>
                    <div class="col-sm-10">
                      <input list="matkul" class="form-control" v-model="datas.kode_mk" />

                      <!-- list of mata_kuliah -->
                      <datalist id="matkul">
                        <option v-for="(data, index) in all_data[1]" :value="data.kode_mk">@{{data.mata_kuliah}}</option>
                      </datalist>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="day-text" class="col-sm-2 col-form-label">Hari:</label>
                    <div class="col-sm-10">
                      <select v-model="datas.hari" class="form-control">
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="jam-text" class="col-sm-2 col-form-label">Jam Masuk:</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" v-model="datas.jam"/>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="ruang-text" class="col-sm-2 col-form-label">Ruang Masuk:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" v-model="datas.ruang"/>
                    </div>
                  </div>

                  <div class="form-group float-right">
                    <div class="col-sm-12">
                      <button class="btn btn-lg btn-danger btn-circle" type="reset">
                        <i class="fas fa-trash-restore"></i>
                      </button>
                    </div>
                  </div>

                  <div class="form-group float-right">
                    <div class="col-sm-12">
                      <button class="btn btn-lg btn-success btn-circle" type="button" v-on:click="_insertFunc(urls[2], datas)">
                        <i class="fas fa-check"></i>
                      </button>
                    </div>
                  </div>

                </form> <!-- end of form -->
              </div>
            </div>

          </div>

          <div class="card shadow mb-4 col-sm-3">
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item" v-for="data in all_data[0]">@{{data.npm + " - " + data.email_orangtua}}</li>
              </ul>
            </div>
            <div class="card-footer"></div>
          </div>

      </div> <!-- end of content -->

    </div>

<!-- footer -->
@include('admin.partials.footer')
