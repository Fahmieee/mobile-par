<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driving extends Model
{
    protected $table = 'driving';
    protected $fillable = ['driver_id','unit_id','km_awal','km_akhir'];
    protected $primaryKey = 'id';
}
