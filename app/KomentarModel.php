<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['id_blogspot','nama','email','komentar', 'tanggal'];
    protected $table = 'tb_komentar';
}
