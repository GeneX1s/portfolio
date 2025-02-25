<?php

namespace App\Models\RYR;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ryrSchedules extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "ryrSchedules";
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'class_id',
        'class_name',
        'teacher_name',
        'status',
        'tanggal',
        'tipe',
        'harga',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    protected $casts = [];
}
