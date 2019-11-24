  @section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#table').DataTable({
        "iDisplayLength": 10
      });

    } );
  </script>
   <script type="text/javascript">
    $(document).ready(function() {
      $('#table2').DataTable({
        "iDisplayLength": 10
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
                <h3 class="font-weight-medium text-right mb-0">{{$suratmasuk->count()}}</h3>
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
                <h3 class="font-weight-medium text-right mb-0">{{$suratkeluar->count()}}</h3>
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
          <h4 class="card-title">Data Surat Masuk</h4>
          <div class="table-responsive">
            <table class="table table-striped" id="table">
              <thead>
                <tr>
                  <th>Nama Instansi</th>
                  <th>No Surat</th>
                  <th>Nama Pengirim</th>
                  <th>Tanggal Terima</th>
                  
                </tr>
              </thead>
              <tbody>
               @foreach($suratmasuk as $data)
                <tr>
                  <td class="py-1">
                      {{$data->nama_instansi}}
                  </td>
                  <td>
                    {{$data->no_surat}}
                  </td>

                  <td>
                   {{$data->nama_pengirim}}
                  </td>
                  <td>
                  {{$data->tgl_terima}}
                 </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
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
            <table class="table table-striped" id="table2">
              <thead>
                <tr>
                  <th>Nomor Surat</th>
                  <th>Tujuan Surat</th>
                  <th>Hal</th>
                  <th>Alamat Tujuan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($suratkeluar as $data)
                <tr>
                  <td class="py-1">
                      {{$data->nomor_surat}}
                  </td>
                  <td>
                     {{$data->tujuan_surat}}
                  </td>

                  <td>
                   {{$data->hal}}
                  </td>
                  <td>
                  {{$data->alamat_tujuan}}
                 </td>
              </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
  </div>
  @endsection
