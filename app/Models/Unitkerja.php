<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unitkerja extends Model
{
    use HasFactory;

    protected $table = 'unitkerja';

    protected $primaryKey = 'unitkerja_id';

    protected $guarded = [];

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(isset($filters['search']) ?? false, function ($query) {
            $query->where('nama_unit', 'like', '%' . request('search') . '%')
                ->orWhere('lokasi_unit', 'like', '%' . request('search') . '%');
        });
    }
}
