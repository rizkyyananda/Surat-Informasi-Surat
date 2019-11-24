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


            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="row">
                    <div class="col-md-12 d-flex align-items-stretch grid-margin">
                      <div class="row flex-grow">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Detail Surat Masuk</h4>
							  <table class="col-md-12"> 
							  <tr>
							    <td width="150px;">Nama Instansi</td>
							     <td>:</td>
							    <td>{{ $data->nama_instansi }}</td>
							  </tr>
							  <tr>
							    <td>No Surat</td>
							    <td>:</td>
							    <td>{{ $data->no_surat }}</td>
							  </tr>
							  <tr>
							    <td>Tanggal Terima</td>
							    <td>:</td>
							    <td>{{ $data->tgl_terima }}</td>
							  </tr>
							  <tr>
							    <td>Nama Pengirim</td>
							    <td>:</td>
							    <td>{{ $data->nama_pengirim }}</td>
							  </tr>
							  <tr>
							    <td>Disposisi</td>
							    <td>:</td>
							    <td>{{ $data->disposisi }}</td>
							  </tr>
							  </tr>
                               <tr>
                                <td>Isi Disposisi</td>
                                <td>:</td>
                                <td>{{ $data->isi_disposisi }}</td>
                              </tr>
							</table>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-12 d-flex align-items-stretch grid-margin">
                      <div class="row flex-grow">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                                <center>
                              <table class="col-md-12"> 
                              <tr>
                                <td>Gambar</td>
                                 <tr>
                                <style type="text/css">
                                    input[type=checkbox] {
                                  display: none;
                                }

                                .container img {
                                  margin-left: 150%;
                                  transition: transform 0.30s ease;
                                  cursor: zoom-in;
                                }

                                td [type=checkbox]:checked ~ label > img {
                                  transform: scale(4);
                                  cursor: zoom-out;
                                }
                                    </style>
                                <center><td  class="container" >
                                  <input type="checkbox" id="zoomCheck">
                                  <label for="zoomCheck">
                                    <a href="{{ asset('images/user/'.$data->gambar) }}"></a>
                                    <img class="product" width="200" height="200" .click() @if($data->gambar) src="{{ asset('images/user/'.$data->gambar) }}" @endif />

                                    </label>
                                </td>
                              </tr>
                            </table>
                            </center>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                          </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection