<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = false;
    protected $table = 'projects';

    public function bush()
    {
        return $this->belongsTo(Bush::class, 'bush_id', 'id');
    }
}
