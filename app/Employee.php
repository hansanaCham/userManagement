<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    public function employeeParameters()
    {
        return $this->hasMany(EmployeeParameter::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
