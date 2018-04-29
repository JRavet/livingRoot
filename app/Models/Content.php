<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function type()
    {
        return $this->belongsTo(ContentType::class);
    }
}
