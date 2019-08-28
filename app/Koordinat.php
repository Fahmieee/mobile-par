<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koordinat extends Model
{
    protected $table = 'koordinat';
    protected $fillable = ['type','long','lat'];
    protected $primaryKey = 'id';
}
