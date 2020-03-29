<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    protected $table = 'attendances';
    protected $fillable = ['driver_id','status_id'];
    protected $primaryKey = 'id';
}
