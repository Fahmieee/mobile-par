<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceStatuses extends Model
{
    protected $table = 'attendance_statuses';
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
}
