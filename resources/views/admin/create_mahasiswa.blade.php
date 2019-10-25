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
                <div class="form-group row">
                  <label for="npm" class="col-sm-2 col-form-label">NPM:</label>
                  <div class="col-sm-10">
                    <input type="text" name="npm" class="form-control" placeholder="2016110073"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="John Jiff"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat:</label>
                  <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" placeholder="Jl. Kopo"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tgllahir" class="col-sm-2 col-form-label">Tanggal Lahir:</label>
                  <div class="col-sm-10">
                    <input type="date" name="tgllahir" class="form-control"/>
                  </div>
                </div>

              </div>
            </div>
        </div>
      </div> <!-- end of content -->

    </div>

<!-- footer -->
@include('admin.partials.footer')
