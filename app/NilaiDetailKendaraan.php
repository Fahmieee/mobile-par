<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiDetailKendaraan extends Model
{
    protected $table = 'nilaidetail_kendaraan';
    protected $fillable = ['nilaitypekendaraan_id', 'name','value'];
    protected $primaryKey = 'id';
}
