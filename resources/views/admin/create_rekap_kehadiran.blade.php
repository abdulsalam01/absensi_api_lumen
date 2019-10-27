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
              <h6 class="m-0 font-weight-bold text-primary">Tambah Rekap Kehadiran</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <!--  -->
                <form action="#" method="post">
                  <!-- data -->
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Kode Detil:</label>
                    <div class="col-sm-10">
                      <select class="form-control" v-model="datas.kd_detil">
                        <option v-for="(data, index) in all_data[2]" :value="data.kd_detil">
                          @{{data.npm + ' # ' + data.hari + '-' + data.jam + ' # ' + data.ruang}}
                        </option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="status-text" class="col-sm-2 col-form-label">Status Kehadiran:</label>
                    <div class="col-sm-10">
                      <select class="form-control" v-model="datas.hadir">
                        <option v-for="(stats, index) in status" :value="index">@{{stats}}</option>
                      </select>
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
                      <button class="btn btn-lg btn-success btn-circle" type="button" v-on:click="_insertFunc(urls[3], datas)">
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
                <li class="list-group-item" v-for="data in all_data[2]">@{{data.kd_detil + " - " + data.users.npm}}</li>
              </ul>
            </div>
            <div class="card-footer"></div>
          </div>

      </div> <!-- end of content -->

    </div>

<!-- footer -->
@include('admin.partials.footer')
