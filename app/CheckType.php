<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckType extends Model
{
    protected $table = 'check_types';
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
}
