<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiDetailDriver extends Model
{
    protected $table = 'nilaidetail_driver';
    protected $fillable = ['nilaitypedriver_id', 'name','value'];
    protected $primaryKey = 'id';
}
