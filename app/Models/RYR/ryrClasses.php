<?php

namespace App\Models\RYR;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Nama table : ryrClasses

// Nama kelas | Teacher | Hari Schedule | Biaya | Deskripsi
// Aan Power | Aan | Selasa pagi | 75000 |

// INTERFACE:
// -Kelas

// ->New entry
// Pilih kelas:
// >Okta
// >Agung
// >Aan
// Pilih Tanggal:


// Holiday??

class ryrClasses extends Model
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = "ryrClasses";
  protected $primaryKey = 'id';
  public $incrementing = false;
  public $timestamps = false;

  protected $fillable = [
    'id',
    'nama_kelas',
    'tipe', //public, private
    'teacher',
    'day',
    'schedule',
    'biaya',
    'description',

  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [];

  protected $casts = [];
}
