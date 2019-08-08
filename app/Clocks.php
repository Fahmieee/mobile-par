<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clocks extends Model
{
    protected $table = 'clocks';
    protected $fillable = ['date','time','kilometer','type'];
    protected $primaryKey = 'id';
}
