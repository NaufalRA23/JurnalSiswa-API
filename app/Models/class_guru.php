<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id',
        'kelas_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function Guru()
    {
        return $this->belongsTo(User::class);
    }
}
