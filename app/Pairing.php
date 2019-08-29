<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pairing extends Model
{
    protected $table = 'pairing';
    protected $fillable = ['user_id','driver_id'];
    protected $primaryKey = 'id';
}
