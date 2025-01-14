<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ContactUS extends Authenticatable
{
    // public $table = 'contactus';
    protected $table = "contactus";
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','message','status'];
}
