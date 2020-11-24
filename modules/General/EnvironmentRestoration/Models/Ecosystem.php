<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecosystem extends Model
{
    use HasFactory;

    public function restorations(){
        return $this->hasMany('App\Models\EnvironmentRestoration');
    }
}
