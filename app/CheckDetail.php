<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckDetail extends Model
{
    protected $table = 'check_detail';
    protected $fillable = ['name','kategori','level','checktype_id'];
    protected $primaryKey = 'id';
}
