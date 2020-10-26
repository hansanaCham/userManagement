<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveApply extends Model
{
    use SoftDeletes;
    protected $fillable = ['leave_config_id', 'from_date', 'to_date', 'user_id', 'comment', 'attachment'];
}
