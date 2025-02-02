Untuk jadi
option saat membuat
attendance class

Mengikat antara
members dan class

<?php

namespace App\Models\RYR;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ryr_schedule extends Model
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = "ryr_schedule";
  protected $primaryKey = 'id';
  public $incrementing = false;
  public $timestamps = false;

  protected $fillable = [
    'id_member',
    'nama_member',
    'id_kelas',
    'nama_kelas',
    'tipe',
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
