<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';
    protected $fillable = ['pemesan', 'driver_id', 'transportation_id', 'status'];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }
}
