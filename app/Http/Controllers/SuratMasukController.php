<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use App\Disposisi;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class SuratMasukController extends Controller
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

        $datas = SuratMasuk::get();
        return view('suratmasuk.suratmasuk', compact('datas'));
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
        $datas = Disposisi::get();
        return view('suratmasuk.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
        $count = SuratMasuk::where('no_surat',$request->input('no_surat'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('suratmasuk');
        }

        $this->validate($request, [
            'nama_instansi' => 'required|string|max:255',
            'no_surat' => 'required|string|max:255',
            'tgl_terima' => 'required|string|max:255',
            'nama_pengirim' => 'required|string|max:255',
            'disposisi' => 'required|string|max:255',
            'isi_disposisi'=> 'required|string|max:255'
                
        ]);

         if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('gambar')->move("images/user", $fileName);
            $gambar = $fileName;
        }

        SuratMasuk::create([
            'nama_instansi' => $request->input('nama_instansi'),
            'no_surat' => $request->input('no_surat'),
            'tgl_terima' => $request->input('tgl_terima'),
            'nama_pengirim' => $request->input('nama_pengirim'),
            'disposisi' => $request->input('disposisi'),
            'isi_disposisi'=>$request->input('isi_disposisi'),
            'gambar' => $gambar
        ]);

        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('suratmasuk.index');

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

        $data = SuratMasuk::findOrFail($id);

        return view('suratmasuk.show', compact('data'));
    }

    public function edit($id)
    {   
       
        $data = SuratMasuk::findOrFail($id);

        // return view('disposisi.edit', compact('data'));
        $datas = Disposisi::get();
        return view('suratmasuk.edit',  compact('data'), compact('datas'));
    }

     public function dispo($id)
    {   
       
        $data = SuratMasuk::findOrFail($id);

        $datas = Disposisi::get();
        return view('suratmasuk.disposisi',  compact('data'), compact('datas'));
    }

     public function updatedisposisi($id)
    {   
       
        $user_data = SuratMasuk::findOrFail($id);
        $user_data->disposisi = $request->input('disposisi');
        $user_data->isi_disposisi = $request->input('isi_disposisi');


        $user_data->update();
        Session::flash('message', 'Berhasil diubah!');
        Session::flash('message_type', 'success');
        return redirect()->to('suratmasuk');
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
       $user_data = SuratMasuk::findOrFail($id);

        $user_data->nama_instansi = $request->input('nama_instansi');
        $user_data->no_surat = $request->input('no_surat');
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
        $user_data->isi_disposisi = $request->input('isi_disposisi');


        $user_data->update();
        Session::flash('message', 'Berhasil diubah!');
        Session::flash('message_type', 'success');
        return redirect()->to('suratmasuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id != $id) {
            $user_data = SuratMasuk::findOrFail($id);
            $user_data->delete();
            Session::flash('message', 'Berhasil dihapus!');
            Session::flash('message_type', 'success');
        } else {
            Session::flash('message', 'Akun anda sendiri tidak bisa dihapus!');
            Session::flash('message_type', 'danger');
        }
        return redirect()->to('suratmasuk');
    }
}
