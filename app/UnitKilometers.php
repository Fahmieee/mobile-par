<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitKilometers extends Model
{
    protected $table = 'unit_kilometers';
    protected $fillable = ['unit_id','km_awal','km_akhir'];
    protected $primaryKey = 'id';
}
