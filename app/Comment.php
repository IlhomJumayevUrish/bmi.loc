<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    protected $table = "comments";
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
