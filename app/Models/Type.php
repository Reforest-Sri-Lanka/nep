<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = "organization_types";


    public function organization()
    {
        return $this->hasMany('App\Models\Organization');
    }
}