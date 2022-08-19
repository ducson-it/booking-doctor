<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $with = ['user', 'shift'];

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'shift_doctor_id',
        'status',
        'shift',
        'packageId',
        'file'
    ];

    /**
     * Get the user that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }

    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class, 'shiftId', 'id');
    }
}
