<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreatmentDetail extends Model
{
    protected $fillable = ['treatment_id', 'medicine_id', 'jumlah_obat'];

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
