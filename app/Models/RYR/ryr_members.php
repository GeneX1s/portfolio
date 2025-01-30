<!-- Nama table: ryr_members
Nama murid | Tipe | Join Date | Total Attendance | Usia | Jenis Kelamin | Deskripsi
Yanna | Member 1(bulanan 400k) | 25/1/2025 | 199 kelas |
Silvie | Non member | 25/1/2025 | 199 kelas |


 -->

 <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ryr_members extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = "ryr_members";
  protected $primaryKey = 'id';
  public $incrementing = false;
  public $timestamps = false;

  protected $fillable = [
    'nama_murid',
    'tipe',
    'join_date',
    'total_attendance',
    'usia',
    'jenis_kelamin',
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
