<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinkAdmin extends Model
{
    use SoftDeletes;
    protected $table = 'links';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'user_id',
        'link'
    ];
    public function Userr()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
}
