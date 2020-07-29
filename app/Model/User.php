<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','telephone', 'password','role_id','status_id'
    ];

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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getJSONUser(){
        
        return [
            'id'=>$this->attributes['id'],
            'email'=>$this->attributes['email'],
            'telephone'=>$this->attributes['telephone'],
            'role'=>['role'=>$this->role->role,],
            'detail'=>[
                'gender'=>$this->userDetail->gender,
                'path_photoprofil'=>$this->userDetail->path_photoprofil,
                'address'=>$this->userDetail->address
                ],
            'otp' => [
                'code_otp'=> $this->otp->code_otp,
                'status' => ($this->otp->status_id == 2) ? true : false
                ]
        ];
    }

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function agent(){
        return $this->hasOne('App\Agent');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function userDetail(){
        return $this->hasOne('App\UserDetail');
    }

    public function otp(){
        return $this->hasOne('App\OTPUser');
    }
}
