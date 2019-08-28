<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckAnswer extends Model
{
    protected $table = 'check_answer';
    protected $fillable = ['parameter','checkdetail_id','kategori','level'];
    protected $primaryKey = 'id';
}
