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
        SuratKeluar::create([
            'nomor_surat' => $request->input('nomor_surat'),
            'sifat_surat' => $request->input('sifat_surat'),
            'lampiran' => $request->input('lampiran'),
            'hal' => $request->input('hal'),
            'tujuan_surat' => $request->input('tujuan_surat'),
            'tempat_tujuan' => $request->input('tempat_tujuan'),
            'alamat_tujuan' => $request->input('alamat_tujuan'),
            'isi_surat' => $request->input('isi_surat'),
            'tebusan' => $request->input('tebusan'),
            'review' => $request->input('review'),
            'disposisi' => $request->input('disposisi')
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
    public function review($id)
    {   
       
        $data = SuratKeluar::findOrFail($id);
          if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        return view('suratkeluar.review',  compact('data'));
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

     $user_data->nomor_surat = $request->input('nomor_surat');
     $user_data->sifat_surat = $request->input('sifat_surat');
     $user_data->lampiran = $request->input('lampiran');
     $user_data->hal = $request->input('hal');
     $user_data->tujuan_surat = $request->input('tujuan_surat');
     $user_data->tempat_tujuan = $request->input('tempat_tujuan');
     $user_data->alamat_tujuan = $request->input('alamat_tujuan');
     $user_data->isi_surat = $request->input('isi_surat');
     $user_data->tebusan = $request->input('tebusan');
     $user_data->review = $request->input('review');
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
