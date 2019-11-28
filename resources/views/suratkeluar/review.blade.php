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

        <form method="post" action="{{ route('suratkeluar.update', $data->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
        <div class="row">
                    <div class="col-md-12 d-flex align-items-stretch grid-margin">
                      <div class="row flex-grow">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Edit Data Surat Keluar</h4>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="hidden" class="form-control" name="nomor_surat" value="{{ $data->nomor_surat }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="hidden" class="form-control" name="sifat_surat" value="{{ $data->sifat_surat }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="hidden" class="form-control" name="lampiran" value="{{ $data->lampiran }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="hidden" class="form-control" name="hal" value="{{ $data->hal }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="hidden" class="form-control" name="tujuan_surat" value="{{ $data->nomor_surat }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="hidden" class="form-control" name="tempat_tujuan" value="{{ $data->tempat_tujuan }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="hidden" class="form-control" name="alamat_tujuan" value="{{ $data->alamat_tujuan }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="hidden" class="form-control" name="isi_surat" value="{{ $data->isi_surat }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="hidden" class="form-control" name="tebusan" value="{{ $data->tebusan }}" required>
                                    </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Review</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="review" value="{{ $data->review }}" required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label for="level" class="col-md-4 control-label">Disposisi</label>

                                    <div class="col-md-12">
                                    
                                    <select class="form-control" name="disposisi">

                                     @if(Auth::user()->level == 'Kepala Bbksda')
                                    <?php
                                        $datas = array("Kepala Bbksda","Kabag TU", "Kabid Teknis");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                 <!------Kepala Bbksda---->
                                    @if(Auth::user()->level == 'Kabag TU' || Auth::user()->level == 'Kabid Teknis')
                                    <?php
                                        $datas = array("Kepala Bbksda", "Subag Evaluasi & Kehumasan", "Subag P3", "Subag P2","Subag Umum","Subag Program & Kerja Sama");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif

                                    <!------Kepala Kabid Teknis---->
                                    @if(Auth::user()->level == 'Subag P2' || Auth::user()->level == 'Subag P3')
                                    <?php
                                        $datas = array("Kabid Teknis");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Kepala Kabid Teknis---->

                                    <!------Kepala Subag P2---->
                                    @if(Auth::user()->level == 'PjP2')
                                    <?php
                                        $datas = array("Subag P2");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Kepala Subag P2---->

                                    <!------Kepala Subag P3---->
                                    @if(Auth::user()->level == 'PjP3')
                                    <?php
                                        $datas = array("Subag P3");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Kepala Subag P3---->

                                    <!------Pj Evaluasi & Kehumasan---->
                                    @if(Auth::user()->level == 'Pj Evaluasi & Kehumasan')
                                    <?php
                                        $datas = array("Subag Evaluasi & Kehumasan");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Pj Evaluasi & Kehumasan---->

                                    <!------Pj Program & Kerja Sama---->
                                    @if(Auth::user()->level == 'Pj Program & Kerja Sama')
                                    <?php
                                        $datas = array("Subag Program & Kerja Sama");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Pj Program & Kerja Sama---->

                                    <!------Pj Umum---->
                                    @if(Auth::user()->level == 'Pj Umum')
                                    <?php
                                        $datas = array("Subag Umum");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Pj Umum---->

                                    <!------Subag Umum || Subag Program & Kerja Sama || Pj Evaluasi & Kehumasan---->
                                    @if(Auth::user()->level == 'Subag Umum' || Auth::user()->level == 'Subag Program & Kerja Sama' || Auth::user()->level == 'Subag Evaluasi & Kehumasan')
                                    <?php
                                        $datas = array("Kabag TU", "Pj Evaluasi & Kehumasan", "Pj Program & Kerja Sama");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Subag Umum || Subag Program & Kerja Sama || Pj Evaluasi & Kehumasan---->
                                    </select>
                                    </div>
                                </div>

                                 <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label for="level" class="col-md-4 control-label">Status Disposisi</label>

                                    <div class="col-md-12">
                                    
                                    <select class="form-control" name="status" required="">
                                 <!------Kepala Bbksda---->
                                    <?php
                                        $datas = array("Terima","Tolak");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" id="submit">
                                            Simpan
                                </button>
                                </form>
                                <button type="reset" class="btn btn-danger">
                                            Reset
                                </button>
                                <a href="{{route('suratkeluar.index')}}" class="btn btn-light pull-right">Back</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

        </div>
        </form>
        @endsection