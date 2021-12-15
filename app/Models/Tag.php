<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    const STATUS = [
        'PENDING' => 0,
        'ACTIVE' => 1,
        'DEACTIVE' => 2
    ];

    protected $fillable = [
        'created_by',
        'title',
        'description',
        'status'
    ];
}
