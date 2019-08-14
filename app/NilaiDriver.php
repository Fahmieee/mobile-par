<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiDriver extends Model
{
    protected $table = 'nilai_driver';
    protected $fillable = ['driver_id','value'];
    protected $primaryKey = 'id';
}
