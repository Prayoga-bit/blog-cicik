<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectArea extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon_url',
        'image_url',
    ];
}
