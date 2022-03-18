<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Srvice extends Model
{
    protected $guarded = [];
    protected $table = "srvices";
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
