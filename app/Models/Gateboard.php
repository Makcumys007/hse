<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gateboard extends Model
{
    use HasFactory;

    protected $table = 'gateboard';

    protected $fillable = [
                            'lost_time_injuries_free_days',
                            'count_of_lti_year',
                            'user_id',
                            'runnig_string',
                            'last_lti_date'];
}
