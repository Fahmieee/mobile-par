<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiTypeDriver extends Model
{
    protected $table = 'nilaitype_driver';
    protected $fillable = ['type'];
    protected $primaryKey = 'id';
}
