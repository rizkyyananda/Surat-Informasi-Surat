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


    </script>
    @stop

    @extends('layouts.app')

    @section('content')

    <form method="POST" action="{{ route('suratkeluar.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Data Surat Keluar</h4>
                      
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nomor Surat</label>
                        <div class="col-md-12">
                            <input id="nama_instansi" type="text" class="form-control" name="nomor_surat" value="{{ old('nomor_surat') }}" required>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Sifat Surat</label>
                        <div class="col-md-12">
                            <input id="sifat_surat" type="text" class="form-control" name="sifat_surat" value="{{ old('sifat_surat') }}" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Lampiran</label>
                        <div class="col-md-12">
                            <input id="lampiran" type="text" class="form-control" name="lampiran" value="{{ old('lampiran') }}" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Hal</label>
                        <div class="col-md-12">
                            <input id="hal" type="text" class="form-control" name="hal" value="{{ old('hal') }}" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Tujuan Surat</label>
                        <div class="col-md-12">
                            <input id="tujuan_surat" type="text" class="form-control" name="tujuan_surat" value="{{ old('tujuan_surat') }}" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Tempat Tujuan</label>
                        <div class="col-md-12">
                            <input id="tempat_tujuan" type="text" class="form-control" name="tempat_tujuan" value="{{ old('tempat_tujuan') }}" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Alamat Tujuan</label>
                        <div class="col-md-12">
                            <input id="alamat_tujuan" type="text" class="form-control" name="alamat_tujuan" value="{{ old('alamat_tujuan') }}" required>
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Isi Surat</label>
                        <div class="col-md-12">
                            <textarea id="isi_surat" type="textarea" class="form-control" name="isi_surat" value="{{ old('isi_surat') }}" required></textarea> 
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Tebusan</label>
                        <div class="col-md-12">
                            <input id="tebusan" type="text" class="form-control" name="tebusan" value="{{ old('tebusan') }}" required>
                        </div>
                    </div>

                <!--     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Review</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="review" value="" required>
                                    </div>
                    </div> -->

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