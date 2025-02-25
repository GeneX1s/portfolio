<?php

namespace App\Models\RYR;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ryrMembers extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "ryrMembers";
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nama_murid',
        'tipe',
        'join_date',
        'total_attendance',
        'dob',
        'jenis_kelamin',
        'deskripsi',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    protected $casts = [];
}
