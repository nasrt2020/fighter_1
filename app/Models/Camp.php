<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'session',
        'title',
        'start_time',
        'end_time',
        'is_active',
    ];
}
