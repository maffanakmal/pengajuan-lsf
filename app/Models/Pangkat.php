<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pangkat extends Model
{
    use HasFactory;

    protected $table = 'pangkat';

    protected $primaryKey = 'pangkat_id';

    protected $guarded = [];

    public function scopeFilter(Builder $query, array $filters): void 
    {
        $query->when(isset($filters['search']) ?? false, function($query) {
            $query->where('nama_pangkat', 'like', '%' . request('search') . '%')
            ->orWhere('golongan', 'like', '%' . request('search') . '%');
        });
    }
}
