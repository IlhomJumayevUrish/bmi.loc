<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $guarded = [];
    protected $table = "regions";
    public function districts()
    {
        return $this->hasMany(District::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    
}
