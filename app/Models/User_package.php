<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_package extends Model
{
    use HasFactory ;

    protected $table = 'user_packages';

    protected $fillable = [
        'user_id',
        'doctor_package_id',
        'package_id',
        'count',
        'buy_number'
    ];

    /**
     * Get the package_care that owns the User_package
     *
     * @return \Illuminate\package_care\Eloquent\Relations\BelongsTo
     */
    public function Package_care(): BelongsTo
    {
        return $this->belongsTo(package_care::class, 'package_id', 'id');
    }
}
