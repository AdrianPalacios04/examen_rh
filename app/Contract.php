<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'date_start','date_end','user_id','cargo_id','type_contrat'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function cargo()
    {
        return $this->belongsTo(Cargo::class,'cargo_id');
    }
}
