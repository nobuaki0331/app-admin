<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const PERMISSION_USER = 0;
    const PERMISSION_ADMIN = 1;
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

    public function getSexCodeAttribute($value): string
    {
        switch($value) {
            case 0:
                return '不明';
            case 1:
                return '男性';
            case 2:
                return '女性';
            default:
                return '';
        }
    }

    public function getPermissionAttribute($value): string
    {
        return $value == 0 ? "なし" : "あり";
    }

    public function setSexCodeAttribute($value)
    {
        switch($value) {
            case "不明" :
                $this->attributes['sex_code'] = 0;
                return;
            case "男性" :
                $this->attributes['sex_code'] = 1;
                return;
            case "女性" :
                $this->attributes['sex_code'] = 2;
                return;
        }
    }

    public function setPermissionAttribute($value)
    {
        switch($value) {
            case "なし" :
                $this->attributes['sex_code'] = 0;
                return;
            case "あり" :
                $this->attributes['sex_code'] = 1;
                return;
        }
    }
}
