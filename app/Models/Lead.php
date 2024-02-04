<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = ['nama_prospek', 'email_prospek', 'nomor_telepon_prospek', 'tipe_prospek'];
}
