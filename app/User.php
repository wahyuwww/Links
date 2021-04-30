<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = [
        'id',
        'username',
        'email',
        'password',
        'nip',
        'user_type_id',
        'avatar_file',
        'background_color',
        'text_color'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function UserType()
    {
        return $this->belongsTo('App\UserType', 'user_type_id');
    }
    public function linked()
    {
        return $this->hasMany(ShortUrl::class);
    }
    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function visits()
    {
        return $this->hasManyThrough(Visit::class, Link::class);
    }

    public function getRouteKeyName() {
        return 'username';
    }

}
