  @section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#table').DataTable({
        "iDisplayLength": 50
      });

    } );
  </script>
  @stop
  @extends('layouts.app')

  @section('content')
  <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card center">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-poll-box text-danger icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Surat Masuk</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">12</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total Seluruh Surat Masuk
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md6 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-receipt text-warning icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Surat Keluar</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">12</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Total Surat Keluar
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="row" >
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">

        <div class="card-body">
          <h4 class="card-title">Data Surat Keluar</h4>

          <div class="table-responsive">
            <table class="table table-striped" id="table">
              <thead>
                <tr>
                  <th>Nama Instansi</th>
                  <th>No Surat</th>
                  <th>Jenis Surat</th>
                  <th>Tanggal Terima</th>
                  <th>Penerima</th>
                  <th>Status</th>
                  
                </tr>
              </thead>
              <tbody>
             
                <tr>
                  <td class="py-1">
                    <a href="#"> 
                      Instansi
                    </a>
                  </td>
                  <td>
                      1
                  </td>

                  <td>
                   Surat Masuk
                  </td>
                  <td>
                   12/02/2019
                 </td>
                 <td>
                  Maya 
                </td>
                <td>
                  Balas
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection
