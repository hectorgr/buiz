<?php

namespace Buiz\Entities;

use Illuminate\Database\Eloquent\Model;

class QuestionsType extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];
}
