<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Srvice extends Model
{
    protected $guarded = [];
    protected $table = "services";
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
