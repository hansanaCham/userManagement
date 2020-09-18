<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveConfig extends Model
{
    protected $fillable = ['leave_type', 'no_of_days'];
}
