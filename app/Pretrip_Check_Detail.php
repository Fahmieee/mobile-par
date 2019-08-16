<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pretrip_Check_Detail extends Model
{
    protected $table = 'pretrip_check_detail';
    protected $fillable = ['pretripcheck_id','checktype_id','value'];
    protected $primaryKey = 'id';
}
