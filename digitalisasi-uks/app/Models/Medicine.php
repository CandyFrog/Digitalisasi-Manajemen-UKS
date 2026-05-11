<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['nama_obat', 'satuan', 'stok'];

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class, 'treatment_details')
                    ->withPivot('jumlah_obat')
                    ->withTimestamps();
    }
}
