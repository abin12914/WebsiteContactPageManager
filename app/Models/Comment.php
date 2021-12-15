<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    const STATUS = [
        'PENDING' => 0,
        'ACTIVE' => 1,
        'DEACTIVE' => 2
    ];

    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
        'status'
    ];
}
 