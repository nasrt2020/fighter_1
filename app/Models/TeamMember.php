<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'role',
        'note',
        'photo_path',
        'is_owner',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_owner'  => 'boolean',
        'is_active' => 'boolean',
    ];
}
