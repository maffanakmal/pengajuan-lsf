<?php

namespace App\Models;

use App\Models\Komisi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subkomisi extends Model
{
    use HasFactory;

    protected $table = 'subkomisi';

    protected $primaryKey = 'subkomisi_id';

    protected $guarded = [];

    public function komisi(): BelongsTo
    {
        return $this->belongsTo(Komisi::class, 'komisi_id', 'komisi_id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(isset($filters['search']) ?? false, function ($query) {
            $query->join('komisi', 'komisi.komisi_id', '=', 'subkomisi.komisi_id')
                ->where('nama_subkomisi', 'like', '%' . request('search') . '%')
                ->orWhere('komisi.nama_komisi', 'like', '%' . request('search') . '%');
        });
    }
}
