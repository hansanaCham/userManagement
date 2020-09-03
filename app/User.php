<?php

namespace App;

use App\Roll;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;
    public const STATUS_ACTIVE = 'Active';
    public const STATUS_INACTIVE = 'Inactive';
    public const STATUS_ARCHIVED = 'Archived';
    public const GENDER_MALE = 'Male';
    public const GENDER_FEMALE = 'Female';

    public const CIVIL_SINGLE = 'Single';
    public const CIVIL_MARRIED = 'Married';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    public function findForPassport($username)
    {
        return $this->where('user_name', $username)->first();
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userParameters()
    {
        return $this->hasMany(UserParameter::class);
    }




    // public function authentication($id)
    // {
    //     $pre = $this->privileges;
    //     foreach ($pre as $p) {
    //         if ($p['id'] == $id) {
    //             return $p['pivot'];
    //         }
    //     }
    //     return null;
    // }



}
