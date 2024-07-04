<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class murid extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
    ];

    public function Murid()
    {
        return $this->belongsTo(User::class);
    }
}
