<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function cargos()
    {
        return $this->hasMany(Cargo::class);
    }
}
