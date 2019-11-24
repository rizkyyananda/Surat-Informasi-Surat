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
							  <table class="col-md-12"> 
							  <tr>
							    <td width="150px;">Nomor Surat</td>
							     <td>:</td>
							    <td>{{ $data->nomor_surat }}</td>
							  </tr>
							  <tr>
							    <td>Sifat Surat</td>
							    <td>:</td>
							    <td>{{ $data->sifat_surat }}</td>
							  </tr>
							  <tr>
							    <td>Lampiran</td>
							    <td>:</td>
							    <td>{{ $data->lampiran }}</td>
							  </tr>
							  <tr>
							    <td>Hal</td>
							    <td>:</td>
							    <td>{{ $data->hal }}</td>
							  </tr>
							  <tr>
							    <td>Tujuan Surat</td>
							    <td>:</td>
							    <td>{{ $data->tujuan_surat }}</td>
							  </tr>
							  <tr>
							    <td>Tempat Tujuan</td>
							    <td>:</td>
							    <td>{{ $data->tempat_tujuan }}</td>
							  </tr>
                <tr>
                <td>Alamat Tujuan</td>
                <td>:</td>
                <td>{{ $data->alamat_tujuan }}</td>
                </tr>
                <br>
                  <tr>
                    <td>Isi Surat</td>
                    <td>:</td>
                    <td style="text-align: justify;">{{ $data->isi_surat }}</td>
                  </tr>
                  <tr>
                    <td>Tebusan</td>
                    <td>:</td>
                    <td>{{ $data->tebusan }}</td>
                  </tr>
                  <tr>
                    <td style="color: red;">Review</td>
                    <td>:</td>
                    <td style="color: red;">{{ $data->review }}</td>
                  </tr>
							  </tr>
							  <tr>
							  </tr>
							</table>
                            <br>
                              <center>
                                @if(Auth::user()->level == 'PjP2' || Auth::user()->level == 'PjP3')
                            <a href=" {{ url('/unduh', $data->id) }}" class="btn btn-success">Download Surat</a>
                            @endif
                        </center>
                        <a href="{{route('suratkeluar.index')}}" class="btn btn-light pull-right">Back</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
        @endsection