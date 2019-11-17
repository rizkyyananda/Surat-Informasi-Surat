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
      <a href="{{ route('disposisi.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Disposisi</a>
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
                    <h4 class="card-title">Data Disposisi</h4>
                    
                    <div class="table-responsive">
                      <table id="table" class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              Disposisi
                            </th>
                            <th>
                              Action
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                          <tr>
                            <td>
                            <a href="{{route('disposisi.show', $data->id_disposisi)}}"> 
                            {{$data->disposisi}}
                            </a>
                            </td>
                          <td>
                              <button><a href="{{route('disposisi.edit', $data->id)}}"><i class="fa fa-edit btn btn-primary"></i></a></button>
                                <form action="{{ route('disposisi.destroy', $data->id) }}" class="pull-left"  method="post">
                              {{ csrf_field() }}
                              {{ method_field('delete') }}
                              <button onclick="return confirm('Anda yakin ingin menghapus data ini?')"> <i class="fa fa-trash btn btn-danger" ></i>
                              </button>
                            </form>
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