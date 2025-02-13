<?php

namespace App\Models\RYR;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ryr_participants extends Model
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = "ryr_participants";
  protected $primaryKey = 'id';
  public $incrementing = false;
  public $timestamps = false;

  protected $fillable = [
    'id_member',
    'nama_member',
    'id_kelas',
    'nama_kelas',
    'tipe',
    'grup',
    'payment_type',
    'payment_status',
    'id_schedule',
    'deskripsi',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
  ];

  protected $casts = [
  ];
}
