<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $with = ['department', 'tire', 'user'];

    public function employeeParameters()
    {
        return $this->hasMany(EmployeeParameter::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function tire()
    {
        return $this->belongsTo(Tire::class);
    }
}
