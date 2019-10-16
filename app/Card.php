<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    public function hands()
    {
        return $this->belongsToMany(Hand::class, 'round');
    }
}
