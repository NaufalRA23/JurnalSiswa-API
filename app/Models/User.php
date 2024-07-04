<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'foto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function Guru()
    {
        return $this->hasMany(guru::class);
    }

    public function Murid()
    {
        return $this->hasMany(murid::class,'siswa_id');
    }

    public function kelasGuru()
    {
        return $this->hasMany(class_guru::class);
    }

    public function kelasSiswa()
    {
        return $this->hasMany(kelas_siswa::class,'murid_id');
    }

    public function jurnalSiswa()
    {
        return $this->hasMany(jurnal_siswa::class);
    }
}
