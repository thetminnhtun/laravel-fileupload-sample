<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function getImageLinkAttribute()
    {
        return asset('upload/' . $this->name);
    }
}
