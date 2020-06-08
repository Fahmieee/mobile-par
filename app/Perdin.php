<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perdin extends Model
{
    protected $table = 'perdin';
    protected $fillable = ['clock_id','doc'];
    protected $primaryKey = 'id';
}
