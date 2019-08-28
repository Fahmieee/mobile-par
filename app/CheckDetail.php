<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckDetail extends Model
{
    protected $table = 'check_detail';
    protected $fillable = ['name','checktype_id'];
    protected $primaryKey = 'id';
}
