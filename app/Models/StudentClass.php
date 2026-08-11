<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $table = 'student_classes';

    protected $fillable = [
        'name',
        'level_two',
        'level_three',
        'level_four',
    ];
}
