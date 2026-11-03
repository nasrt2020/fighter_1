<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeRequest extends Model
{
    protected $fillable = [
        'ehf_fighter_id',

        'type',
        'status',

        'org_name',
        'contact_name',
        'email',
        'phone',
        'country',
        'city',

        'challenger_name',
        'challenger_age',
        'challenger_weight_kg',
        'challenger_weight_class',

        'record_wins',
        'record_losses',
        'record_draws',

        'profile_link',
        'photo_path',

        'preferred_date_from',
        'preferred_date_to',
        'location_preference',
        'message',

        'admin_notes',
    ];

    public function ehfFighter()
    {
        return $this->belongsTo(EhfFighter::class);
    }

    // Optional helper: "12-3-2"
    public function getChallengerRecordAttribute(): string
    {
        return "{$this->record_wins}-{$this->record_losses}-{$this->record_draws}";
    }
}
