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


            {{ csrf_field() }}
            {{ method_field('put') }}
        <div class="row">
                    <div class="col-md-12 d-flex align-items-stretch grid-margin">
                      <div class="row flex-grow">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Edit Data Surat Masuk</h4>
                              <center>
							  <table class="col-md-6"> 
							  <tr>
							    <td>Nama Instansi</td>
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
							    <td>Jenis Surat</td>
							    <td>:</td>
							    <td>{{ $data->jenis_surat }}</td>
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
							    <td>Gambar</td>
							    <td>:</td>
							    <td>
							    	<script language="javascript" type="text/javascript">
 <!--

 document.getElementById('foo').addEventListener('click', function (e) {

var img = document.createElement('img');

img.setAttribute('src', 'http://blog.stackoverflow.com/wp-content/uploads/stackoverflow-logo-300.png');

e.target.appendChild(img);
});

  // -->
 </script>

							    	<a href="{{ asset('images/user/'.$data->gambar) }}"></a>
							    	<img class="product" width="200" height="200" .click() @if($data->gambar) src="{{ asset('images/user/'.$data->gambar) }}" @endif />
							    </td>
							  </tr>
							</table>
							</center>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
        @endsection