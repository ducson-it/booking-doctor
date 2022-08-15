<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use HasFactory ,SoftDeletes;

    protected $table = 'shifts';

    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the comments for the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
