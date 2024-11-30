<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // Nama tabel jika berbeda dengan konvensi Laravel
    protected $table = 'users';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nip',
        'username',
        'password',
        'role',
        'last_login',
        'status',
    ];

    // Kolom yang tidak dapat diisi secara massal
    protected $guarded = ['user_id'];

    // Relasi dengan model Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nip');
    }

    // Untuk hashing password
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = bcrypt($user->password);
        });
    }
}

