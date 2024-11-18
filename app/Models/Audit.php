<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{


  protected $table = "audit";
  protected $primaryKey = 'id';

  protected $fillable = [
    'user_id',
    'event',
    'description',
    'ip_address',
    'user_agent',
  ];
}
