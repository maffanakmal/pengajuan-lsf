<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';

    protected $primaryKey = 'jabatan_id';

    protected $guarded = [];

    public function scopeFilter(Builder $query, array $filters): void 
    {
        $query->when(isset($filters['search']) ?? false, function($query) {
            $query->where('nama_jabatan', 'like', '%' . request('search') . '%')
            ->orWhere('deskripsi_jabatan', 'like', '%' . request('search') . '%');
        });
    }
}
