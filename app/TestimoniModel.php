<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimoniModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['nama','testimoni'];
    protected $table = 'tb_testimoni';
}
