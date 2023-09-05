<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedEvent extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'event_id',
        'shared_user_id',
        'sharing_user_id',
    ];
    protected $casts = [
        'event_id'=> 'integer',
        'shared_user_id'=> 'integer',
        'sharing_user_id'=>'integer',
    ];
}
