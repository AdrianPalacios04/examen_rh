<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'nom_cargo','area_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }
    public function contract()
    {
        return $this->hasOne(Contract::class);
    }
}
