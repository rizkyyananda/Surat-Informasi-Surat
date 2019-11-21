<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKeluar;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use WordTemplate;
use DateTimeZone;
use DateTime;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $datas = SuratKeluar::get();
        return view('suratkeluar.suratkeluar', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        // $datas = Disposisi::get();
        return view('suratkeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'nomor_surat' => 'required|string|max:255',
        //     'sifat_surat' => 'required|string|max:255',
        //     'lampiran' => 'required|string|max:255',
        //     'hal' => 'required|string|max:255',
        //     'tujuan_surat' => 'required|string|max:255',
        //     'tempat_tujuan' => 'required|string|max:255',
        //     'alamat_tujuan' => 'required|string|max:255',
        //     'isi_surat' => 'required|string|max:255',
        //     'tebusan' => 'required|string|max:255',

        // ]);
        SuratKeluar::create([
            'nomor_surat' => $request->input('nomor_surat'),
            'sifat_surat' => $request->input('sifat_surat'),
            'lampiran' => $request->input('lampiran'),
            'hal' => $request->input('hal'),
            'tujuan_surat' => $request->input('tujuan_surat'),
            'tempat_tujuan' => $request->input('tempat_tujuan'),
            'alamat_tujuan' => $request->input('alamat_tujuan'),
            'isi_surat' => $request->input('isi_surat'),
            'tebusan' => $request->input('tebusan')
        ]);

        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('suratkeluar.index');

    }
     public function unduh($id)
    {
       $file = public_path("suratkeluar.rtf");
        $data = SuratKeluar::findOrFail($id);
        $timezone = new DateTimeZone('Asia/Jakarta');
        $date = new DateTime();
        $date->setTimeZone($timezone);
        $array = array(
            '[nomor]' => $data->nomor_surat,
            '[sifat]' => $data->sifat_surat,
            '[lampiran]' => $data->lampiran,
            '[hal]' => $data->hal,
            '[tanggal]' => $date->format('d F Y'),
            '[tujuan_surat]' => $data->tujuan_surat,
            '[tempat_tujuan]' => $data->tempat_tujuan,
            '[alamat_tujuan]' => $data->alamat_tujuan,
            '[isi]' => $data->isi_surat,
            '[tebusan]' => $data->tebusan,
        );
        $namafile = $data->nomor_surat.'.doc';
        $dokumen =  WordTemplate::export($file, $array, $namafile);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = SuratKeluar::findOrFail($id);

        return view('suratkeluar.show', compact('data'));
    }

    public function edit($id)
    {   

        $data = SuratKeluar::findOrFail($id);

        // return view('disposisi.edit', compact('data'));
        return view('suratkeluar.edit',  compact('data'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $user_data = SuratKeluar::findOrFail($id);

     $user_data->nama_instansi = $request->input('nama_instansi');
     $user_data->no_surat = $request->input('no_surat');
     $user_data->jenis_surat = $request->input('jenis_surat');
     $user_data->tgl_terima = $request->input('tgl_terima');
     if($request->file('gambar')) 
     {
        $file = $request->file('gambar');
        $dt = Carbon::now();
        $acak  = $file->getClientOriginalExtension();
        $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
        $request->file('gambar')->move("images/user", $fileName);
        $user_data->gambar = $fileName;
    }
    $user_data->nama_pengirim = $request->input('nama_pengirim');
    $user_data->disposisi = $request->input('disposisi');


    $user_data->update();
    Session::flash('message', 'Berhasil diubah!');
    Session::flash('message_type', 'success');
    return redirect()->to('suratkeluar');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_data = SuratKeluar::findOrFail($id);
        $user_data->delete();
        Session::flash('message', 'Berhasil dihapus!');
        Session::flash('message_type', 'success');
        return redirect()->to('suratkeluar');
    }
}
