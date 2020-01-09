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
              <h6 class="m-0 font-weight-bold text-primary">Tambah Mahasiswa</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <!--  -->
                <form action="#" method="post">
                  <!-- data -->
                  <div class="form-group row">
                    <label for="npm" class="col-sm-2 col-form-label">NPM:</label>
                    <div class="col-sm-10">
                      <input type="text" name="npm" class="form-control" placeholder="NPM..." v-model="datas.npm"/>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" placeholder="Nama..." v-model="datas.nama"/>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Sandi:</label>
                    <div class="col-sm-10">
                      <input type="password" name="sandi" class="form-control" v-model="datas.sandi" />
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat:</label>
                    <div class="col-sm-10">
                      <textarea name="alamat" class="form-control" placeholder="Alamat..." v-model="datas.alamat"></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tgllahir" class="col-sm-2 col-form-label">Tanggal Lahir:</label>
                    <div class="col-sm-10">
                      <input type="date" name="tgllahir" class="form-control" v-model="datas.tgllahir" />
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email Orangtua:</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" required="required" v-model="datas.email"/>
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
                      <button class="btn btn-lg btn-success btn-circle" type="button" v-on:click="_insertFunc(urls[0], datas)">
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
