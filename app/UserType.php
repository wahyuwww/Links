<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_type';
    protected $primaryKey = 'user_type_id';
    protected $fillable = [
        'user_type_id',
        'type',
    ];
}
