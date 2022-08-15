<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_Care extends Model
{
    use HasFactory;

    protected $table = 'package_cares';

    protected $fillable = [
        'name',
        'description',
        'price',
        'count'
    ];
}
