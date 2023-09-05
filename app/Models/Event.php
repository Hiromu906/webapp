<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
    'title',
    'user_id',
    'start_time',
    'end_time',
    'location',
    'description',
    'send_at',
    'is_release',
    'is_template',
    ];
    protected $casts = [
        'title' => 'string',
        'user_id' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'location' => 'string',
        'description' => 'string',
        'send_at' => 'datetime',
        'is_release' => 'boolean',
        'is_template' => 'boolean',
    ];
    public function getPagenateByLimit(int $limit_count = 5){// updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
