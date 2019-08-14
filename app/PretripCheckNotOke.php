<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PretripCheckNotOke extends Model
{
    protected $table = 'pretrip_check_notoke';
    protected $fillable = ['pretripdetail_id','ket','status'];
    protected $primaryKey = 'id';
}
