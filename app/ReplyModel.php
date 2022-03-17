<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['id_komentar','nama','email','komentar', 'tanggal'];
    protected $table = 'tb_reply';
}
