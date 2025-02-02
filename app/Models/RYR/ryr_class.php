<?php

namespace App\Models\RYR;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Nama table : ryr_class

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

class ryr_class extends Model
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = "ryr_class";
  protected $primaryKey = 'id';
  public $incrementing = false;
  public $timestamps = false;

  protected $fillable = [
    'nama_kelas',
    'teacher',
    'schedule',
    'biaya',
    'description',

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
