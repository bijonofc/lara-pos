<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Outlet extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [/**
     * @property integer $id 
     * @property integer $saas_id 
     * @property string $name 
     * @property string $email 
     * @property string $phone 
     * @property string $country 
     * @property string $state 
     * @property string $city 
     * @property string $street 
     * @property string $zip_code 
     * @property string $wh_timezone 
     * @property string $main_branch 
     * @property string $allowed_ip 
     * @property string $status 
     * @property integer $added_by 
     * @property \Illuminate\Support\Carbon $created_at 
     * @property \Illuminate\Support\Carbon $updated_at 
     */
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
