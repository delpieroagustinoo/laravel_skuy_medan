<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogspotModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['judul','konten','gambar','tanggal','dibuat','tanggalperbarui','alamat'];
    protected $table = 'tb_blogspot';
}
