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
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Mata Kuliah</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <!--  -->
                <form action="#" method="post">
                  <!-- data -->
                  <div class="form-group row">
                    <label for="matkul" class="col-sm-2 col-form-label">Mata Kuliah:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Statistik" v-model="datas.mata_kuliah"/>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">SKS:</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" v-model="datas.sks"/>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Keterangan:</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" placeholder="Praktik/Teori" v-model="datas.keterangan"></textarea>
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
                      <button class="btn btn-lg btn-success btn-circle" type="button" v-on:click="_insertFunc(urls[1], datas)">
                        <i class="fas fa-check"></i>
                      </button>
                    </div>
                  </div>

                </form> <!-- end of form -->
              </div>
            </div>
        </div>
      </div> <!-- end of content -->

    </div>

<!-- footer -->
@include('admin.partials.footer')
