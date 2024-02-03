<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;

    protected $table = 'transportations';
    protected $fillable = ['type', 'name'];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
