<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const STATUS = [
        'PENDING' => 0,
        'ACTIVE' => 1,
        'DEACTIVE' => 2
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'status'
    ];
}
