<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $fillable = ['file'];
    public $timestamps = false;
    public $directory = '/images/';

    public function getFileAttribute($value)
    {
        return $this->directory.$value;
    }
}
