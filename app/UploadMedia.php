<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadMedia extends Model
{
    protected $table = 'uploadmedia';
    protected $fillable = ['id_jenis','id_kategori', 'keterangan','namafile','path'];
}
