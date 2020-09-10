<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeParameter extends Model
{
    public function employeeParameters()
    {
        return $this->hasMany(EmployeeParameter::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
