<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveGroup extends Model
{
    protected $fillable = ['name'];

    public function leaveConfigs()
    {
        return $this->belongsToMany(LeaveConfig::class);
    }
}
