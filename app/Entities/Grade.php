<?php

namespace Buiz\Entities;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];
}
