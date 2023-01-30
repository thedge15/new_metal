<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SteelGrade extends Model
{
    protected $guarded = false;
    protected $table = 'steel_grades';

    protected function steelStandards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SteelStandard::class, 'steel_grade_id', 'id');
    }
}

