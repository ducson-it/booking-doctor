<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_package extends Model
{
    use HasFactory ,SoftDeletes;

    protected $table = 'user_packages';

    protected $fillable = [
        'user_id',
        'doctor_package_id',
        'package_id',
    ];



}
