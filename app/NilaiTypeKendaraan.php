<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiTypeKendaraan extends Model
{
    protected $table = 'nilaitype_kendaraan';
    protected $fillable = ['type'];
    protected $primaryKey = 'id';
}
