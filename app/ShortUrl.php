<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    // use HasFactory;

    protected $fillable = ['original_url', 'short_url','user_id'];

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
