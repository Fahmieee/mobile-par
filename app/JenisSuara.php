<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisSuara extends Model
{
    protected $table = 'jenis_suara';
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
}
