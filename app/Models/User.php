<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'tel',
        'password',
        'permission',
        'sex_code',
        'prefecture_id',
    ];

    protected $appends = ['permission_name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // 都道府県　多対1
    public function prefecture()
    {
        return $this->belongsTo('App\Models\Prefecture');
    }

    public function getPermissionNameAttribute(): string
    {
        return $this->permission === 0 ? "有" : "無";
    }

}
