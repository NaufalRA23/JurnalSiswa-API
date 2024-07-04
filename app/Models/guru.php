<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id',
    ];
    
    public function Guru()
    {
        return $this->belongsTo(User::class);
    }
}
