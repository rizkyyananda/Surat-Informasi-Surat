<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'suratmasuk';
    protected $fillable =
     ['id','nama_instansi','no_surat','tgl_terima','gambar','nama_pengirim','disposisi','isi_disposisi'];

}
