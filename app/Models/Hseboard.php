<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hseboard extends Model
{
    use HasFactory;

    protected $table = 'hseboard';

    protected $fillable = ['lost_time_injuries',
                            'medical_treatment',
                            'first_aid_cases',
                            'lost_time_injuries_free_days',
                            'safe_men_hours',
                            'date'];
}
