<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'phone',
        'address',
        'description',
        'level',
        'gender',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, '', 'other_key');
    }

    /**
     * Get all of the comments for the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function shift(): BelongsToMany
    {
        return $this->belongsToMany(Shift::class);
    }

    public function getAllDoctor() {
        $allDoctor = User::where('role_id','2');
        return $allDoctor;
    }

    public function getLimitDoctor() {
        $listLimitDoctor =  User::where('role_id', '2')->offset(0)->limit(10)->get();
        return $listLimitDoctor;
    }

    public function getAllPatient() {
        $allPatient = User::where('role_id','3');
        return $allPatient;
    }

    public function getShiftDoctorDetail($id){
        $shiftDetail = User::find($id);
        return $shiftDetail;
    }

}
