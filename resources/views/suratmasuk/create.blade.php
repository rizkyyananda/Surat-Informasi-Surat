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

    <form method="POST" action="{{ route('suratmasuk.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="row">
                <div class="col-md-12 d-flex align-items-stretch grid-margin">
                  <div class="row flex-grow">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Tambah Data Surat Masuk</h4>
                          
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nama Isntansi</label>
                                <div class="col-md-12">
                                    <input id="nama_instansi" type="text" class="form-control" name="nama_instansi" value="{{ old('nama_instansi') }}" required>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Nomor Surat</label>
                                <div class="col-md-12">
                                    <input id="username" type="text" class="form-control" name="no_surat" value="{{ old('username') }}" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Tanggal Terima</label>
                                <div class="col-md-12">
                                    <input id="email" data-date-format="DD MMMM YYYY"  min="2019-01-01" type="date" class="form-control" name="tgl_terima" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Foto Surat</label>
                                <div class="col-md-12">
                                    <img class="product" width="200" height="200" />
                                    <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Nama Pengirim</label>
                                <div class="col-md-12">
                                    <input id="pengirim" type="text" class="form-control" name="nama_pengirim" required>
                                </div>
                            </div>

                             <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label for="level" class="col-md-4 control-label">Disposisi</label>

                                    <div class="col-md-12">
                                    
                                    <select class="form-control" name="disposisi" required="">
                                    <!------Sekretaris---->
                                    @if(Auth::user()->level == 'sekretaris')
                                    <?php
                                        $datas = array("Kepala Bbksda");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Sekretaris---->

                                     <!------Kepala Bbksda---->
                                    @if(Auth::user()->level == 'Kepala Bbksda')
                                    <?php
                                        $datas = array("Kabag TU","Kabid Teknis");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Kepala Bbksda---->

                                    <!------Kepala Kabag TU---->
                                    @if(Auth::user()->level == 'Kabag TU')
                                    <?php
                                        $datas = array("Subag Umum","Subag Evaluasi & Kehumasan","Subag Program & Kerja Sama");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Kepala Kabag TU---->

                                    <!------Kepala Kabid Teknis---->
                                    @if(Auth::user()->level == 'Kabid Teknis')
                                    <?php
                                        $datas = array("Subag P2","Subag P3");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Kepala Kabid Teknis---->

                                    <!------Kepala Subag P2---->
                                    @if(Auth::user()->level == 'Subag P2')
                                    <?php
                                        $datas = array("Pj P2");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Kepala Subag P2---->

                                    <!------Kepala Subag P3---->
                                    @if(Auth::user()->level == 'Subag P3')
                                    <?php
                                        $datas = array("Pj P3");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Kepala Subag P2---->

                                    </select>

                                    </div>
                                </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Isi Disposisi</label>
                            <div class="col-md-12">
                                <textarea id="isi_disposisi" type="textarea" class="form-control" name="isi_disposisi" value="{{ old('isi_disposisi') }}" required></textarea> 
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