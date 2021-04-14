<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
    protected $fillable = [
        'type',
        'question',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'correct_option_no',
        'correct_answer'
    ];

}
