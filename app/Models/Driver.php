<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';
    protected $fillable = ['name', 'gender'];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
