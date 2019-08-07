<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'users_roles';
    protected $fillable = ['user_id','role_id'];
    protected $primaryKey = 'id';
}
