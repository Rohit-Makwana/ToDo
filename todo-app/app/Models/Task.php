<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'admin_id',
        'admin_user',
        'admin_state',
        'admin_time',
        'admin_saved',
        'toggle'
    ];
}
