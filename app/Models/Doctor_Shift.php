<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor_Shift extends Model
{
    use HasFactory;

    protected $table = 'doctor_shift';

    protected $fillable = [
        'shift_doctor_id',
        'doctor_id',
        'date'
    ];
}
