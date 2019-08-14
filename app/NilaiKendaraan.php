<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKendaraan extends Model
{
    protected $table = 'nilai_kendaraan';
    protected $fillable = ['unit_id','value'];
    protected $primaryKey = 'id';
}
