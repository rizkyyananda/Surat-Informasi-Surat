        @section('js')
            <script type="text/javascript">
                function readURL() {
                    var input = this;
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $(input).prev().attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $(function () {
                    $(".uploads").change(readURL)
                    $("#f").submit(function(){
                        // do ajax submit or just classic form submit
                      //  alert("fake subminting")
                        return false
                    })
                })


        // var check = function() {
        //   if (document.getElementById('password').value ==
        //     document.getElementById('confirm_password').value) {
        //     document.getElementById('submit').disabled = false;
        //     document.getElementById('message').style.color = 'green';
        //     document.getElementById('message').innerHTML = 'matching';
        //   } else {
        //     document.getElementById('submit').disabled = true;
        //     document.getElementById('message').style.color = 'red';
        //     document.getElementById('message').innerHTML = 'not matching';
        //   }
        // }
            </script>
        @stop

        @extends('layouts.app')

        @section('content')

        <form method="post" action="{{ route('suratmasuk.update', $data->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
        <div class="row">
                    <div class="col-md-12 d-flex align-items-stretch grid-margin">
                      <div class="row flex-grow">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Edit Data Surat Masuk</h4>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nama Isntansi</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="nama_instansi" value="{{ $data->nama_instansi }}" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Nomor Surat</label>
                                    <div class="col-md-12">
                                        <input id="username" type="text" class="form-control" name="no_surat" value="{{ $data->no_surat }}" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Tanggal Terima</label>
                                    <div class="col-md-12">
                                        <input id="email" data-date-format="DD MMMM YYYY"  min="2019-01-01" type="date" class="form-control" name="tgl_terima" value="{{ $data->tgl_terima }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">Foto Surat</label>
                                    <div class="col-md-6">
                                        <img class="product" width="200" height="200" @if($data->gambar) src="{{ asset('images/user/'.$data->gambar) }}" @endif />
                                        <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Nama Pengirim</label>
                                    <div class="col-md-12">
                                        <input id="pengirim" type="text" class="form-control" name="nama_pengirim" value="{{ $data->nama_pengirim }}" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label for="level" class="col-md-4 control-label">Disposisi</label>

                                    <div class="col-md-12">
                                    
                                    <select class="form-control" name="disposisi" required="">
                                   <?php
                                    $level = Array("Kabag TU","Kabid Teknis");
                                    foreach ($level as $kunci ) {
                                    ?>
                                     @if(Auth::user()->level == 'Kepala Bbksda')
                                    <option value="{{$kunci}}">{{$kunci}}</option>
                                    @endif
                                    @endforech
                                    <?php
                                     }
                                     ?>
                                    <?php
                                    $level = Array("Kepala Bbksda");
                                    foreach ($level as $kunci ) {
                                    ?>
                                     @if(Auth::user()->level == 'sekretaris')
                                    <option value="{{$kunci}}">{{$kunci}}</option>
                                    @endif
                                    @endforech
                                    <?php
                                      }
                                    $level = Array("Subag Umum","Subag Evaluasi dan Kehumasan","Subag Program dan Kerja Sama");
                                    foreach ($level as $kunci ) {
                                    ?>
                                     @if(Auth::user()->level == 'Kabag TU')
                                    <option value="{{$kunci}}">{{$kunci}}</option>
                                    @endif
                                    @endforech
                                    <?php
                                     }
                                    $level = Array("Pelayanan Masyarakat","Perencanaan, Perlindungan dan Pengawetan");
                                    foreach ($level as $kunci ) {
                                    ?>
                                     @if(Auth::user()->level == 'Kabid Teknis')
                                    <option value="{{$kunci}}">{{$kunci}}</option>
                                    @endif
                                    @endforech
                                    <?php
                                     }
                                     ?>
                                    </select>

                                    </div>
                                </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Isi Disposisi</label>
                            <div class="col-md-12">
                                <textarea id="isi_disposisi" type="textarea" class="form-control" name="isi_disposisi" value="{{$data->isi_disposisi}}" required></textarea> 
                            </div>
                            </div>
                                        
                                <button type="submit" class="btn btn-primary" id="submit">
                                            Tambah
                                </button>
                                <button type="reset" class="btn btn-danger">
                                            Reset
                                </button>
                                <a href="{{route('suratmasuk.index')}}" class="btn btn-light pull-right">Back</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

        </div>
        </form>
        @endsection