<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Env_type extends Model
{
    use HasFactory;
    protected $table = 'ecosystems_types';

    // A Eco system  has one type and a type can have many eco systems.
    public function eco_systems()
    {
        return $this->hasMany('App\Models\Env');
    }
    public function environment_restorations()
    {
        return $this->hasMany('App\Models\Environment_Restoration');
    }
}