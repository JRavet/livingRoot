<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    public $fillable = ['type'];
    public $timestamps = false;

    const TEXT = 1;
    const VIDEO = 2;
    const REFERENCE = 3;
}
