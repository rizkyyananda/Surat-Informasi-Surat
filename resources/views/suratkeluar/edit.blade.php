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
        </script>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                plugins: [
                        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
                ],
 
                toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
                toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
                toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
 
                menubar: false,
                toolbar_items_size: 'small',
 
                style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ],
 
                templates: [
                        {title: 'Test template 1', content: 'Test 1'},
                        {title: 'Test template 2', content: 'Test 2'}
                ]
            });
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
                              
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nomor Surat Isntansi</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="nomor_surat" value="{{ $data->nomor_surat }}" required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Sifat Surat</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="sifat_surat" value="{{ $data->sifat_surat }}" required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Lampiran</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="lampiran" value="{{ $data->lampiran }}" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Hal</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="hal" value="{{ $data->hal }}" required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Tujuan Surat</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="tujuan_surat" value="{{ $data->nomor_surat }}" required>
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Tempat Tujuan</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="tempat_tujuan" value="{{ $data->tempat_tujuan }}" required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Alamat Tujuan</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="alamat_tujuan" value="{{ $data->alamat_tujuan }}" required>
                                    </div>
                                </div>
                                
                                 <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Isi Surat</label>
                                <div class="col-md-12">
                                <textarea type="isi_surat" name="isi_surat" value="{{ $data->isi_surat }}"  data-bv-notEmpty="true">{{ $data->isi_surat }}</textarea>
                                     </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Tebusan</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="tebusan" value="{{ $data->tebusan }}" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Review</label>
                                    <div class="col-md-12">
                                        <input id="nama_instansi" type="text" class="form-control" name="review" value="{{ $data->tebusan }}" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label for="level" class="col-md-4 control-label">Disposisi</label>

                                    <div class="col-md-12">
                                    
                                    <select class="form-control" name="disposisi" required="">
                                   <!------Kepala Bbksda---->
                                    @if(Auth::user()->level == 'Kabag TU' || Auth::user()->level == 'Kabag TU')
                                    <?php
                                        $datas = array("Kepala Bbksda");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Kepala Bbksda---->

                                    <!------Kepala Kabag TU---->
                                    @if(Auth::user()->level == 'Subag Umum' || Auth::user()->level == 'Subag Evaluasi & Kehumasan' || Auth::user()->level == 'Subag Program & Kerja Sama')
                                    <?php
                                    
                                        $datas = array("Kabag TU");
                                        foreach($datas as $data){
                                    ?>
                                    <option value="{{$data}}">{{$data}}</option>
                                    <?php 
                                        }
                                    ?>
                                    @endif
                                    <!------Kepala Kabag TU---->

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
                                        $datas = array("Kabag TU");
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
                                <button type="submit" class="btn btn-primary" id="submit">
                                            Tambah
                                </button>
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