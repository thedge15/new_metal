<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bush extends Model
{
    protected $guarded = false;
    protected $table = 'bushes';

    public function projects(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Project::class, 'bush_id', 'id');
    }
}
