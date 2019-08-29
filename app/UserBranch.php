<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBranch extends Model
{
    protected $table = 'user_branches';
    protected $fillable = ['name','code'];
    protected $primaryKey = 'id';
}
