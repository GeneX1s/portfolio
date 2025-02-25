<!--

Nama table : ryrAttendances

Nama murid | Status | Tanggal | Tipe Pembayaran(nullable) | Status Pembayaran | Kelas | Deskripsi
Yenkhe | Hadir | 25/1/2024 | Transfer | Belum Lunas | Kelas Okta
Yanna | Hadir | 25/1/2024 | Bulanan |  Lunas | Special Class Henri Take | Special Class Januari 2025
-->


<?php

namespace App\Models\RYR;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ryrAttendances extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "ryrAttendances";
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nama_member',
        'status',
        'tanggal',
        'payment_type',
        'payment_status',
        'class_name',
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
