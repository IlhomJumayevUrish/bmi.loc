<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = [];
    protected $table = "districts";
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

}
