<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];
    protected $table = "countries";
    public function regions()
    {
        return $this->hasMany(Region::class);
    }


}
