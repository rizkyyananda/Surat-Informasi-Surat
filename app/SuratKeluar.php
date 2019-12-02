<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'suratkeluar';
    protected $fillable =
     ['id','nomor_surat','sifat_surat','lampiran','hal','tujuan_surat','tempat_tujuan','alamat_tujuan','isi_surat','tebusan','review_subag','review_kabag','review_kepala_balai','disposisi','status','pembuat_surat'];

}
