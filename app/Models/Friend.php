<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    
class Friend extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'followee_id',
        'follower_id',
    ];
    protected $casts = [
        'followee_id'=> 'string',
        'follower_id'=> 'string',
    ];
    public $timestamps = false;
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id', 'id');
    }

    public function followee()
    {
        return $this->belongsTo(User::class, 'followee_id', 'id');
    }

}
