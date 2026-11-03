<?php
// app/Models/CampStat.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampStat extends Model
{
    protected $fillable = ['fighters_trained','pro_fights_won','years_of_camps'];
}
