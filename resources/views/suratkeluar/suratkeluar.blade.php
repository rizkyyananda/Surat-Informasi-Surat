    @section('js')
    <script type="text/javascript">
      $(document).ready(function() {
        $('#table').DataTable({
          "iDisplayLength": 10
        });

      } );
    </script>
    @stop
    @extends('layouts.app')

    @section('content')
    <div class="row">

      <div class="col-lg-2">
        <a href="{{ route('suratkeluar.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Surat Keluar</a>
      </div>
      <div class="col-lg-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
        @endif
      </div>
    </div>
    <div class="row" style="margin-top: 20px;">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">

          <div class="card-body">
            <h4 class="card-title">Data Surat Keluar</h4>
            
            <div class="table-responsive">
              <table id="table" class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Nomor Surat
                    </th>
                    <th>
                      Tujuan Surat
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($datas as $data)
                  <tr>
                    <td><a href="{{ url('/review', $data->id) }}">{{$data->nomor_surat}}</a></td>
                    <td>{{$data->tujuan_surat}}</td>
                    <td>
                      <button><a href="{{route('suratkeluar.edit', $data->id)}}"><i class="fa fa-edit btn btn-primary"></i></a></button>
                      <form action="{{ route('suratkeluar.destroy', $data->id) }}" class="pull-left"  method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button onclick="return confirm('Anda yakin ingin menghapus data ini?')"> <i class="fa fa-trash btn btn-danger" ></i>
                        </button>
                      </form>
                      <button><a href="{{route('suratkeluar.show', $data->id)}}"><i class="fa fa-search-plus btn btn-success"></i></a></button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- {!! $datas->links() !!} --}}
          </div>
        </div>
      </div>
    </div>
    @endsection