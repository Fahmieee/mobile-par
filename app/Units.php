<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $table = 'units';
    protected $fillable = ['type_unit','merk'];
    protected $primaryKey = 'id';
}
